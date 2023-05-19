<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AdController extends Controller
{
    //
    public function __construct () {
        $this->middleware('auth');
    }


    public function create () {
        return view('ad.create');  
    }

    public function destroy(Ad $ad)
{
    if (Auth::check() && $ad->user_id == Auth::user()->id) {
        $ad->delete();
        return redirect()->route('home')->with('success', __('Anuncio eliminado correctamente'));
    } else {
        return redirect()->route('home')->with('error', __('No tienes permiso para eliminar este anuncio'));
    }
}

    public function show(Ad $ad) {
        return view("ad.show", compact('ad'));
    }

    public function myAds()
        {
    if (Auth::check()) {
        $user = Auth::user();
        $ads = $user->ads;
        return view('my-ads.my-ads', compact('ads'));
    } else {
        return redirect()->route('login');
    }
        }
    
}