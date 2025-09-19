<?php

namespace App\Http\Controllers;

use App\Models\ClientGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientGalleryViewController extends Controller
{
    public function portal()
    {
        $galleries = ClientGallery::latest()->get(['title', 'slug', 'cover_image_path']);
        return view('client-area.portal', compact('galleries'));
    }

    public function showPasswordForm(ClientGallery $slug)
    {
        $gallery = $slug;
        return view('client-area.password', compact('gallery'));
    }

    public function showGallery(Request $request, ClientGallery $slug)
    {
        $gallery = $slug;
        $request->validate(['password' => 'required']);

        if (!Hash::check($request->password, $gallery->password)) {
            return back()->withErrors(['password' => 'La contraseña es incorrecta.']);
        }

        $items = $gallery->items()->orderBy('order')->get();

        return view('client-area.gallery', compact('gallery', 'items'));
    }
}
