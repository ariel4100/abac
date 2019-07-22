<?php

namespace App\Http\Controllers\adm;

use App\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletter = Newsletter::all();
        return view('adm.newsletter.index',compact('newsletter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:newsletters',
        ]);
         $newsletter = new Newsletter();
         $newsletter->email = $request->email;
         $newsletter->save();
         return back()->with('success','Gracias por suscribirte a nuestro newletter');
    }

    public function eliminar($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return back();
    }

}
