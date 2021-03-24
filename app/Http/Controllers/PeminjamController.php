<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeminjamRequest;
use App\Http\Requests\UpdatePeminjamRequest;
use App\Repositories\PeminjamRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;

class PeminjamController extends AppBaseController
{
    /** @var  PeminjamRepository */
    private $peminjamRepository;

    public function __construct(PeminjamRepository $peminjamRepo)
    {
        $this->middleware('active')->except('create', 'store');
        $this->middleware('peminjam');
        $this->peminjamRepository = $peminjamRepo;
    }

    /**
     * Display a listing of the Peminjam.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->peminjamRepository->pushCriteria(new RequestCriteria($request));
        $peminjams = $this->peminjamRepository->all();

        return view('peminjams.index')
            ->with('peminjams', $peminjams);
    }

    /**
     * Show the form for creating a new Peminjam.
     *
     * @return Response
     */
    public function create($userId)
    {
        $user = User::find($userId);
        return view('peminjams.create')
              ->with('user', $user);
    }

    /**
     * Store a newly created Peminjam in storage.
     *
     * @param CreatePeminjamRequest $request
     *
     * @return Response
     */
    public function store(CreatePeminjamRequest $request)
    {
        $input = $request->all();

        $peminjam = $this->peminjamRepository->create($input);

        Flash::success('Data sudah dilengkapi.');

        return redirect(route('home'));
    }

    /**
     * Display the specified Peminjam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $peminjam = $this->peminjamRepository->findWithoutFail($id);

        if (empty($peminjam)) {
            Flash::error('Peminjam not found');

            return redirect(route('peminjams.index'));
        }

        return view('peminjams.show')->with('peminjam', $peminjam);
    }

    /**
     * Show the form for editing the specified Peminjam.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $peminjam = $this->peminjamRepository->findWithoutFail($id);

        if (empty($peminjam)) {
            Flash::error('Peminjam not found');

            return redirect(route('peminjams.index'));
        }

        return view('peminjams.edit')->with('peminjam', $peminjam);
    }

    /**
     * Update the specified Peminjam in storage.
     *
     * @param  int              $id
     * @param UpdatePeminjamRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeminjamRequest $request)
    {
        $peminjam = $this->peminjamRepository->findWithoutFail($id);

        if (empty($peminjam)) {
            Flash::error('Peminjam not found');

            return redirect(route('peminjams.index'));
        }

        $peminjam = $this->peminjamRepository->update($request->all(), $id);

        Flash::success('Peminjam updated successfully.');

        return redirect(route('peminjams.index'));
    }

    /**
     * Remove the specified Peminjam from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $peminjam = $this->peminjamRepository->findWithoutFail($id);

        if (empty($peminjam)) {
            Flash::error('Peminjam not found');

            return redirect(route('peminjams.index'));
        }

        $this->peminjamRepository->delete($id);

        Flash::success('Peminjam deleted successfully.');

        return redirect(route('peminjams.index'));
    }
}
