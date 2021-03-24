<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRuanganRequest;
use App\Http\Requests\UpdateRuanganRequest;
use App\Repositories\RuanganRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Penjaga;
use App\User;
use Auth;

class RuanganController extends AppBaseController
{
    /** @var  RuanganRepository */
    private $ruanganRepository;
    private $penjagas;
    public function __construct(RuanganRepository $ruanganRepo)
    {
        $this->middleware('active');
        $this->middleware('admin');
        $this->ruanganRepository = $ruanganRepo;
        $this->penjagas = Penjaga::pluck('nama_penjaga', 'id');
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the Ruangan.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->ruanganRepository->pushCriteria(new RequestCriteria($request));
        $ruangans = $this->ruanganRepository->all();

        return view('ruangans.index')
            ->with('ruangans', $ruangans);
    }

    /**
     * Show the form for creating a new Ruangan.
     *
     * @return Response
     */
    public function create()
    {
        return view('ruangans.create')->with('penjagas', $this->penjagas);
    }

    /**
     * Store a newly created Ruangan in storage.
     *
     * @param CreateRuanganRequest $request
     *
     * @return Response
     */
    public function store(CreateRuanganRequest $request)
    {
        $input = $request->all();

        $ruangan = $this->ruanganRepository->create($input);

        Flash::success('Ruangan saved successfully.');

        return redirect(route('ruangans.index'));
    }

    /**
     * Display the specified Ruangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ruangan = $this->ruanganRepository->findWithoutFail($id);

        if (empty($ruangan)) {
            Flash::error('Ruangan not found');

            return redirect(route('ruangans.index'));
        }

        return view('ruangans.show')->with('ruangan', $ruangan);
    }

    /**
     * Show the form for editing the specified Ruangan.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ruangan = $this->ruanganRepository->findWithoutFail($id);

        if (empty($ruangan)) {
            Flash::error('Ruangan not found');

            return redirect(route('ruangans.index'));
        }

        return view('ruangans.edit')->with('ruangan', $ruangan)->with('penjagas', $this->penjagas);
    }

    /**
     * Update the specified Ruangan in storage.
     *
     * @param  int              $id
     * @param UpdateRuanganRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRuanganRequest $request)
    {
        $ruangan = $this->ruanganRepository->findWithoutFail($id);

        if (empty($ruangan)) {
            Flash::error('Ruangan not found');

            return redirect(route('ruangans.index'));
        }

        $ruangan = $this->ruanganRepository->update($request->all(), $id);

        Flash::success('Ruangan updated successfully.');

        return redirect(route('ruangans.index'));
    }

    /**
     * Remove the specified Ruangan from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ruangan = $this->ruanganRepository->findWithoutFail($id);

        if (empty($ruangan)) {
            Flash::error('Ruangan not found');

            return redirect(route('ruangans.index'));
        }

        $this->ruanganRepository->delete($id);

        Flash::success('Ruangan deleted successfully.');

        return redirect(route('ruangans.index'));
    }
}
