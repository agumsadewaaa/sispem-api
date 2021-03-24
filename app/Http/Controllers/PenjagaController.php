<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePenjagaRequest;
use App\Http\Requests\UpdatePenjagaRequest;
use App\Repositories\PenjagaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PenjagaController extends AppBaseController
{
    /** @var  PenjagaRepository */
    private $penjagaRepository;

    public function __construct(PenjagaRepository $penjagaRepo)
    {
        $this->middleware('active');
        $this->penjagaRepository = $penjagaRepo;
    }

    /**
     * Display a listing of the Penjaga.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->penjagaRepository->pushCriteria(new RequestCriteria($request));
        $penjagas = $this->penjagaRepository->all();

        return view('penjagas.index')
            ->with('penjagas', $penjagas);
    }

    /**
     * Show the form for creating a new Penjaga.
     *
     * @return Response
     */
    public function create()
    {
        return view('penjagas.create');
    }

    /**
     * Store a newly created Penjaga in storage.
     *
     * @param CreatePenjagaRequest $request
     *
     * @return Response
     */
    public function store(CreatePenjagaRequest $request)
    {
        $input = $request->all();

        $penjaga = $this->penjagaRepository->create($input);

        Flash::success('Penjaga saved successfully.');

        return redirect(route('penjagas.index'));
    }

    /**
     * Display the specified Penjaga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $penjaga = $this->penjagaRepository->findWithoutFail($id);

        if (empty($penjaga)) {
            Flash::error('Penjaga not found');

            return redirect(route('penjagas.index'));
        }

        return view('penjagas.show')->with('penjaga', $penjaga);
    }

    /**
     * Show the form for editing the specified Penjaga.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $penjaga = $this->penjagaRepository->findWithoutFail($id);

        if (empty($penjaga)) {
            Flash::error('Penjaga not found');

            return redirect(route('penjagas.index'));
        }

        return view('penjagas.edit')->with('penjaga', $penjaga);
    }

    /**
     * Update the specified Penjaga in storage.
     *
     * @param  int              $id
     * @param UpdatePenjagaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePenjagaRequest $request)
    {
        $penjaga = $this->penjagaRepository->findWithoutFail($id);

        if (empty($penjaga)) {
            Flash::error('Penjaga not found');

            return redirect(route('penjagas.index'));
        }

        $penjaga = $this->penjagaRepository->update($request->all(), $id);

        Flash::success('Penjaga updated successfully.');

        return redirect(route('penjagas.index'));
    }

    /**
     * Remove the specified Penjaga from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $penjaga = $this->penjagaRepository->findWithoutFail($id);

        if (empty($penjaga)) {
            Flash::error('Penjaga not found');

            return redirect(route('penjagas.index'));
        }

        $this->penjagaRepository->delete($id);

        Flash::success('Penjaga deleted successfully.');

        return redirect(route('penjagas.index'));
    }
}
