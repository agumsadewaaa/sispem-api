<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Flash;
use Auth;

class AkunController extends Controller
{
    public function __construct()
    {
        $this->middleware('active');
        $this->middleware(
          function ($request, $next) {
              if (!Auth::user()->isAdmin()) {
                  Flash::warning("You are not admin!");
                  return redirect()->back();
              }
              return $next($request);
          },
    ['except' => 'changePassword']
      );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akuns = User::join('roles', 'roles.id', '=', 'users.role_id')
                ->orderBy('role_id', 'ASC')->select('users.*')->get();

        return view('akuns.index')->with('akuns', $akuns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('role', 'id');
        return view('akuns.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(User::$rules);
        $akun = new User();
        $akun->name = $request->name;
        $akun->nip_nim = $request->nip_nim;
        $akun->email = $request->email;
        $akun->role_id = $request->role_id;
        $akun->status = 1;
        $akun->password = bcrypt($request->password);
        if ($akun->save()) {
            Flash::success('Akun berhasil dibuat');
            return redirect(route('akuns.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun = User::find($id);
        $roles = Role::pluck('role', 'id');
        return view('akuns.edit')->with('akun', $akun)
                ->with('roles', $roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'email' => 'required|email',
          'name' => 'required',
          'nip_nim' => 'required',
          'password' => 'required|min:6'
          ]);
        $akun = User::find($id);
        $akun->name = $request->name;
        $akun->email = $request->email;
        $akun->nip_nim = $request->nip_nim;
        $akun->role_id = $request->role_id;
        $akun->password = bcrypt($request->password);
        if ($akun->save()) {
            Flash::success('Akun berhasil update');
            return redirect(route('akuns.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $akun = User::find($id);
        if (empty($akun)) {
            Flash::error('Akun not found');

            return redirect(route('akuns.index'));
        }

        $akun->delete();

        Flash::success('Akun deleted successfully.');

        return redirect(route('akuns.index'));
    }

    public function changeStatus($id, Request $request)
    {
        $akun = User::find($id);
        // dd($akun);
        $akun->status = $request->status;
        $akun->save();
        Flash::success('Status akun dirubah!');
        return redirect(route('akuns.index'));
    }

    public function changePassword($id, Request $request)
    {
        $akun = User::find($id);
        $akun->password = bcrypt($request->password);
        $akun->save();
        Flash::success("Password berhasil dirubah!");
        return redirect()->back();
    }
}
