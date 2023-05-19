<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function add(Ad $ad)
    {

        if (Auth::check()) {

            if (!$ad->isFavoritedBy(Auth::user())) {

                $favorite = new Favorite();
                $favorite->user_id = Auth::user()->id;
                $favorite->ad_id = $ad->id;
                $favorite->save();
            }
        }
        

        return redirect()->back();
    }

    public function remove(Ad $ad)
    {

        if (Auth::check()) {

            $favorite = Favorite::where('user_id', Auth::user()->id)
                        ->where('ad_id', $ad->id)
                        ->first();
            

            if ($favorite) {
                $favorite->delete();
            }
        }
        

        return redirect()->back();
    }

    public function index()
{
    if (Auth::check()) {
        $user = Auth::user();
        $favorites = $user->favorites;

        return view('favorites.index', compact('user', 'favorites'));
    }

    return redirect()->route('login'); 
}
}