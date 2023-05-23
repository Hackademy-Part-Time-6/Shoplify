<?php

namespace App\Http\Controllers;
use App\Models\Ad;
use App\Models\Category;
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

    public function destroy(Ad $ad) {
        if (Auth::check() && $ad->user_id == Auth::user()->id) {
            $ad->delete();
            return redirect()->route('my-ads')->with('success', __('Anuncio eliminado correctamente'));
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

    public function edit($id)
    {
        $ad = Ad::findOrFail($id);
        $categories = Category::all();
        return view('ad.edit', compact('ad', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $ad = Ad::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'body' => 'required',
        ]);

        $ad->title = $validatedData['title'];
        $ad->category_id = $validatedData['category'];
        $ad->price = $validatedData['price'];
        $ad->body = $validatedData['body'];

        $ad->save();

        return redirect()->route('my-ads');
    }
}