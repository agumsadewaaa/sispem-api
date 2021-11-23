<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\CreatePengaduanRequest;
use App\Http\Requests\UpdatePengaduanRequest;
use App\Repositories\PengaduanRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class PengaduanController extends AppBaseController
{
    /** @var  PengaduanRepository */
    private $pengaduanRepository;

    public function __construct(PengaduanRepository $pengaduanRepo)
    {
        // $this->middleware('active');
        $this->pengaduanRepository = $pengaduanRepo;
    }

    /**
     * Display a listing of the Pengaduan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $kritiks = DB :: table('pengaduans')
        ->join('transaksis','transaksis.id','=','pengaduans.transaksi_id')
        ->join('ruangans','ruangans.id','=','transaksis.ruangan_id')
        ->join('peminjams','peminjams.id','=','transaksis.peminjam_id')
        ->join('users','users.id','=','peminjams.user_id')
        ->select('pengaduans.*', 'users.name as nama_peminjam', 'transaksis.tanggal_mulai as mulai', 'transaksis.tanggal_selesai as selesai', 'ruangans.nama_ruangan as nama_ruangan')
        ->orderBy('pengaduans.id', 'desc')->get();
        return response($kritiks);
    }

    /**
     * Show the form for creating a new Pengaduan.
     *
     * @return Response
     */
    public function create()
    {
        return view('pengaduans.create');
    }

    /**
     * Store a newly created Pengaduan in storage.
     *
     * @param CreatePengaduanRequest $request
     *
     * @return Response
     */
    public function store(CreatePengaduanRequest $request)
    {
        $transaksi = Transaksi::find($request->transaksi_id);
        $input = $request->all();

        $pengaduan = $this->pengaduanRepository->create($input);
        $transaksi->status = 1;
        $transaksi->save();

        return response()->json([$pengaduan]);
    }

    /**
     * Display the specified Pengaduan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pengaduan = $this->pengaduanRepository->findWithoutFail($id);

        if (empty($pengaduan)) {
            Flash::error('Pengaduan not found');

            return redirect(route('pengaduans.index'));
        }

        return view('pengaduans.show')->with('pengaduan', $pengaduan);
    }

    /**
     * Show the form for editing the specified Pengaduan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pengaduan = $this->pengaduanRepository->findWithoutFail($id);

        if (empty($pengaduan)) {
            Flash::error('Pengaduan not found');

            return redirect(route('pengaduans.index'));
        }

        return view('pengaduans.edit')->with('pengaduan', $pengaduan);
    }

    /**
     * Update the specified Pengaduan in storage.
     *
     * @param  int              $id
     * @param UpdatePengaduanRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePengaduanRequest $request)
    {
        $pengaduan = $this->pengaduanRepository->findWithoutFail($id);

        if (empty($pengaduan)) {
            Flash::error('Pengaduan not found');

            return redirect(route('pengaduans.index'));
        }

        $pengaduan = $this->pengaduanRepository->update($request->all(), $id);

        Flash::success('Pengaduan updated successfully.');

        return redirect(route('pengaduans.index'));
    }

    /**
     * Remove the specified Pengaduan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pengaduan = $this->pengaduanRepository->findWithoutFail($id);

        if (empty($pengaduan)) {
            Flash::error('Pengaduan not found');

            return redirect(route('pengaduans.index'));
        }

        $this->pengaduanRepository->delete($id);

        Flash::success('Pengaduan deleted successfully.');

        return redirect(route('pengaduans.index'));
    }
}
