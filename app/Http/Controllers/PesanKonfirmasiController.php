<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePesanKonfirmasiRequest;
use App\Http\Requests\UpdatePesanKonfirmasiRequest;
use App\Repositories\PesanKonfirmasiRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\PesanKonfirmasi;
use App\Models\Transaksi;

class PesanKonfirmasiController extends AppBaseController
{
    /** @var  PesanKonfirmasiRepository */
    private $pesanKonfirmasiRepository;

    public function __construct(PesanKonfirmasiRepository $pesanKonfirmasiRepo)
    {
        $this->middleware('active');
        $this->pesanKonfirmasiRepository = $pesanKonfirmasiRepo;
    }

    /**
     * Display a listing of the PesanKonfirmasi.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pesanKonfirmasiRepository->pushCriteria(new RequestCriteria($request));
        $pesanKonfirmasis = $this->pesanKonfirmasiRepository->all();

        return view('pesan_konfirmasis.index')
            ->with('pesanKonfirmasis', $pesanKonfirmasis);
    }

    /**
     * Show the form for creating a new PesanKonfirmasi.
     *
     * @return Response
     */
    public function create()
    {
        return view('pesan_konfirmasis.create');
    }

    /**
     * Store a newly created PesanKonfirmasi in storage.
     *
     * @param CreatePesanKonfirmasiRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'pesan' => "required"
      ]);
        $tolak = false;
        $transaksi = Transaksi::find($request->transaksi_id);
        if (isset($request->terima)) {
            $konfirmasi = new PesanKonfirmasi();
            $konfirmasi->pesan = $request->pesan;
            $konfirmasi->status = 1;
        } else {
            $konfirmasi = new PesanKonfirmasi();
            $konfirmasi->pesan = $request->pesan;
            $konfirmasi->status = 0;
            $tolak = true;
        }
        $konfirmasi->save();
        $konfirmasi_id = PesanKonfirmasi::all()->last()->id;
        if ($request->target == 0) {
            $transaksi->konfirmasi_wr_id = $konfirmasi_id;
        } elseif ($request->target == 1) {
            $transaksi->konfirmasi_kbsd_id = $konfirmasi_id;
        } elseif ($request->target == 2) {
            $transaksi->konfirmasi_kbu_id = $konfirmasi_id;
        } elseif ($request->target == 3) {
            $transaksi->konfirmasi_ksbrt_id = $konfirmasi_id;
        }
        if ($tolak) {
            $transaksi->status = 2;
        }
        $transaksi->save();
        Flash::success('Pesan Konfirmasi saved successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified PesanKonfirmasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pesanKonfirmasi = $this->pesanKonfirmasiRepository->findWithoutFail($id);

        if (empty($pesanKonfirmasi)) {
            Flash::error('Pesan Konfirmasi not found');

            return redirect(route('pesanKonfirmasis.index'));
        }

        return view('pesan_konfirmasis.show')->with('pesanKonfirmasi', $pesanKonfirmasi);
    }

    /**
     * Show the form for editing the specified PesanKonfirmasi.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pesanKonfirmasi = $this->pesanKonfirmasiRepository->findWithoutFail($id);

        if (empty($pesanKonfirmasi)) {
            Flash::error('Pesan Konfirmasi not found');

            return redirect(route('pesanKonfirmasis.index'));
        }

        return view('pesan_konfirmasis.edit')->with('pesanKonfirmasi', $pesanKonfirmasi);
    }

    /**
     * Update the specified PesanKonfirmasi in storage.
     *
     * @param  int              $id
     * @param UpdatePesanKonfirmasiRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePesanKonfirmasiRequest $request)
    {
        $pesanKonfirmasi = $this->pesanKonfirmasiRepository->findWithoutFail($id);

        if (empty($pesanKonfirmasi)) {
            Flash::error('Pesan Konfirmasi not found');

            return redirect(route('pesanKonfirmasis.index'));
        }

        $pesanKonfirmasi = $this->pesanKonfirmasiRepository->update($request->all(), $id);

        Flash::success('Pesan Konfirmasi updated successfully.');

        return redirect(route('pesanKonfirmasis.index'));
    }

    /**
     * Remove the specified PesanKonfirmasi from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pesanKonfirmasi = $this->pesanKonfirmasiRepository->findWithoutFail($id);

        if (empty($pesanKonfirmasi)) {
            Flash::error('Pesan Konfirmasi not found');

            return redirect(route('pesanKonfirmasis.index'));
        }

        $this->pesanKonfirmasiRepository->delete($id);

        Flash::success('Pesan Konfirmasi deleted successfully.');

        return redirect(route('pesanKonfirmasis.index'));
    }
}
