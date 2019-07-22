<?php

namespace App\Http\Controllers\adm;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index() {
        $users = Admin::all();
        return view('adm.usuario.index',compact('users'));
    }

    public function create() {
        $nivel = ['0' => 'Usuario','1' => 'Administrador'];
        return view('adm.usuario.create',compact('nivel'));
    }
    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'username' => ['required', 'unique:admins'],
            'email' => ['required', 'email'],

        ]);

        $user = new Admin();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->admin_status = $request->admin_status;
        $user->save();

        return back();
    }

    public function edit($id) {
        $user = Admin::find($id);
        $nivel = ['0' => 'Usuario','1' => 'Administrador'];
        //dd($user);
        return view('adm.usuario.edit',compact('user','nivel'));
    }

    public function update(Request $request, $id) {

        $user = Admin::find($id);
        $user->name = $request->name;
        $user->username = $request->username;
        if ($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
         $user->admin_status = $request->admin_status;
        $user->update();
        return redirect()->route('usuario.principal');
    }


    public function eliminar($id) {
        $user = Admin::find($id);
        $user->delete();
        return redirect()->back()->with('alert','se elimino correctamente');
    }
}
