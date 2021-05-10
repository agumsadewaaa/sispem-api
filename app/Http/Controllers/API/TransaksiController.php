<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CreateTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Repositories\TransaksiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Ruangan;
use App\Models\Transaksi;
use App\Models\Peminjam;
use Carbon\Carbon;

class TransaksiController extends AppBaseController
{
    /** @var  TransaksiRepository */
    private $transaksiRepository;

    public function __construct(TransaksiRepository $transaksiRepo)
    {
        // $this->middleware('active');
        // $this->middleware('peminjam')->except('listSemua', 'rekapPeminjaman', 'rekapPengaduan', 'detail');
        // $this->middleware('sekarang')->only('show');
        // $this->middleware('jadwal')->only('store');
        // $this->middleware('admin')->only('rekapPengaduan', 'rekapPeminjaman');
        $this->transaksiRepository = $transaksiRepo;
    }

    public function rekapPeminjaman()
    {
        $periode = request()->periode ?: 0;
        $ruangan = request()->ruangan ?: 0;
        $periodes = Transaksi::select('transaksis.periode as periode')->groupBy('transaksis.periode')->pluck('periode', 'periode')
                  ->toArray();
        $ruangans = Ruangan::pluck('nama_ruangan', 'id')->toArray();
        $ruangans[0] = "Semua Ruangan";
        ksort($ruangans);
        $periodes[0] = "Semua Periode";
        ksort($periodes);
        $transaksis = Transaksi::where('status', 1)
                      ->where('periode', $periode == 0 ? '>' : '=', $periode)
                      ->where('ruangan_id', !$ruangan ? '>' : '=', $ruangan)
                      ->get();
        return view('transaksis.rekap_peminjaman')
              ->with('transaksis', $transaksis)
              ->with('periode', $periode)
              ->with('periodes', $periodes)
              ->with('ruangans', $ruangans)
              ->with('ruangan', $ruangan);
    }

    public function cetak($id)
    {
        $transaksi = Transaksi::find($id);

        return view('transaksis.print')
                ->with('transaksi', $transaksi);
    }

    public function rekapPengaduan()
    {
        $periode = request()->periode ?: 0;
        $ruangan = request()->ruangan ?: 0;
        $periodes = Transaksi::select('transaksis.periode as periode')->groupBy('transaksis.periode')->pluck('periode', 'periode')
                  ->toArray();
        $periodes[0] = "Semua Periode";
        $ruangans = Ruangan::pluck('nama_ruangan', 'id')->toArray();
        $ruangans[0] = "Semua Ruangan";
        ksort($ruangans);
        ksort($periodes);
        $transaksis = Transaksi::where('status', 1)
                      ->where('periode', $periode == 0 ? '>' : '=', $periode)
                      ->where('ruangan_id', !$ruangan ? '>' : '=', $ruangan)
                      ->get();
        return view('transaksis.rekap_pengaduan')
              ->with('transaksis', $transaksis)
              ->with('periode', $periode)
              ->with('periodes', $periodes)
              ->with('ruangans', $ruangans)
              ->with('ruangan', $ruangan);
    }

    public function listSemua(Request $request)
    {
        $this->transaksiRepository->pushCriteria(new RequestCriteria($request));
        $transaksis = $this->transaksiRepository->orderBy('id', 'desc')->all();
        if (\Auth::user()->isWr()) {
            $transaksis = $transaksis->filter(function ($value, $key) {
                return $value->ruangan->need_wr_conf == 1;
            });
        } elseif (\Auth::user()->isKbsd()) {
            $transaksis = $transaksis->filter(function ($value, $key) {
                return $value->ruangan->need_wr_conf == 0;
            });
        }
        return view('transaksis.list')->with('transaksis', $transaksis);
    }

    /**
     * Display a listing of the Transaksi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {   
        $jenis = $request->jenis ?: 'semua';
        $mulai = $request->mulai ?: Date('Y-m-d', strtotime("+3 days"));
        $akhir = $request->akhir ?: null;
        $this->transaksiRepository->pushCriteria(new RequestCriteria($request));
        $transaksis = $this->transaksiRepository->all();
        // dd(Date('Y'));
        $nope = Ruangan::terpakai($mulai, $akhir);
        $nopeId = [];
        foreach ($nope as $key => $value) {
            $nopeId[] = $value->id;
        }
        // dd($nope);
        
        $tersedia = Ruangan::whereNotIn('ruangans.id', $nopeId)
        ->join('penjagas','penjagas.id','=','ruangans.penjaga_id')->get();

        $dipinjam = Ruangan::whereIn('ruangans.id', $nopeId)
        ->join('penjagas','penjagas.id','=','ruangans.penjaga_id')->get();

        foreach ($tersedia as $tersedias){
            $tersedias->status = 'Tersedia';
        }

        foreach ($dipinjam as $dipinjams){
            $dipinjams->status = 'Sedang Dipinjam';
        }
       
        $semua = $tersedia->merge($dipinjam);
        // dd($jenis);
        switch ($jenis) {
          case 'tersedia':
            $ruangans = $tersedia;
            break;
          case 'telah dipinjam':
            $ruangans = $nope;
            break;
          case 'semua':
            $ruangans = $semua;
            break;
          default:
            Flash::error("Request gagal!");
            return redirect()->back();
        }
        // dd($nope);
        // return view('transaksis.index')
        //     ->with('transaksis', $transaksis)
        //     ->with('ruangans', $ruangans)
        //     ->with('jenis', $jenis)
        //     ->with('mulai', $mulai)
        //     ->with('akhir', $akhir);
        return response($semua);
    }

    /**
     * Show the form for creating a new Transaksi.
     *
     * @return Response
     */
    public function create()
    {
        return view('transaksis.create');
    }

    public function detail($id)
    {
        $transaksi = Transaksi::find($id);
        return view('transaksis.detail', [
        'transaksi' => $transaksi,
      ]);
    }

    /**
     * Store a newly created Transaksi in storage.
     *
     * @param CreateTransaksiRequest $request
     *
     * @return Response
     */
    public function store(CreateTransaksiRequest $request)
    {
        $peminjam = $request->peminjam_id;
        $input = $request->all();
        $input['status'] = 0;
        $input['periode'] = Date('Y');
        $transaksi = $this->transaksiRepository->create($input);

        return response()->json([$transaksi]);
    }

    /**
     * Display the specified Transaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaksis = Transaksi::where('peminjam_id' , '=', $id)
        ->join('ruangans','ruangans.id','=','transaksis.ruangan_id')
        ->join('penjagas','penjagas.id','=','ruangans.penjaga_id')
        ->select('transaksis.*', 'ruangans.nama_ruangan', 'penjagas.nomor_handphone')
        ->orderBy('transaksis.id')->get();
        // dd($transaksis);
        return response($transaksis);
    }

    /**
     * Show the form for editing the specified Transaksi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        return view('transaksis.edit')->with('transaksi', $transaksi);
    }

    /**
     * Update the specified Transaksi in storage.
     *
     * @param  int              $id
     * @param UpdateTransaksiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransaksiRequest $request)
    {
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            Flash::error('Transaksi not found');

            return redirect(route('transaksis.index'));
        }

        $transaksi = $this->transaksiRepository->update($request->all(), $id);

        Flash::success('Transaksi updated successfully.');

        return redirect(route('transaksis.index'));
    }

    /**
     * Remove the specified Transaksi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($peminjam, $id)
    {
        $transaksi = $this->transaksiRepository->findWithoutFail($id);

        if (empty($transaksi)) {
            Flash::error('Peminjaman not found');

            return redirect()->back();
        }

        $this->transaksiRepository->delete($id);

        Flash::success('Peminjaman berhasil dibatalkan');

        return redirect()->back();
    }
}