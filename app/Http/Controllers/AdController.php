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
}
