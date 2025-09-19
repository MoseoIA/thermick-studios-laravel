<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientGallery;
use App\Models\GalleryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientGalleryController extends Controller
{
    public function index()
    {
        $galleries = ClientGallery::latest()->paginate(10);
        return view('admin.client-galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.client-galleries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'event_date' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = Str::slug($validated['title']);

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('client_galleries/covers', 'public');
        }

        ClientGallery::create([
            'title' => $validated['title'],
            'slug' => $slug,
            'password' => $validated['password'],
            'cover_image_path' => $coverPath,
            'event_date' => $validated['event_date'],
        ]);

        return redirect()->route('client-galleries.index')->with('success', 'Galería creada exitosamente.');
    }

    public function show(ClientGallery $clientGallery)
    {
        $clientGallery->load('items');
        return view('admin.client-galleries.show', compact('clientGallery'));
    }

    public function edit(ClientGallery $clientGallery)
    {
        $clientGallery->load('items');
        return view('admin.client-galleries.edit', compact('clientGallery'));
    }

    public function update(Request $request, ClientGallery $clientGallery)
    {
        $action = $request->input('action', 'update');

        if ($action === 'add_photo') {
            $validated = $request->validate([
                'photo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ]);

            $path = $request->file('photo')->store('client_galleries/photos', 'public');
            $order = $clientGallery->items()->max('order') ? $clientGallery->items()->max('order') + 1 : 1;

            $clientGallery->items()->create([
                'type' => 'photo',
                'path_or_url' => $path,
                'order' => $order,
            ]);

            return redirect()->route('client-galleries.edit', $clientGallery)->with('success', 'Foto agregada exitosamente.');
        }

        if ($action === 'add_video') {
            $validated = $request->validate([
                'video_url' => 'required|url',
            ]);

            $order = $clientGallery->items()->max('order') ? $clientGallery->items()->max('order') + 1 : 1;

            $clientGallery->items()->create([
                'type' => 'video',
                'path_or_url' => $validated['video_url'],
                'order' => $order,
            ]);

            return redirect()->route('client-galleries.edit', $clientGallery)->with('success', 'Video agregado exitosamente.');
        }

        if ($action === 'delete_item') {
            $itemId = $request->input('item_id');
            $item = $clientGallery->items()->find($itemId);
            if ($item) {
                if ($item->type === 'photo' && $item->path_or_url) {
                    Storage::disk('public')->delete($item->path_or_url);
                }
                $item->delete();
                return redirect()->route('client-galleries.edit', $clientGallery)->with('success', 'Item eliminado exitosamente.');
            }
        }

        // Update gallery
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'event_date' => 'nullable|date',
            'cover_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = Str::slug($validated['title']);

        $coverPath = $clientGallery->cover_image_path;
        if ($request->hasFile('cover_image')) {
            if ($coverPath) {
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('client_galleries/covers', 'public');
        }

        $clientGallery->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'password' => $validated['password'],
            'cover_image_path' => $coverPath,
            'event_date' => $validated['event_date'],
        ]);

        return redirect()->route('client-galleries.index')->with('success', 'Galería actualizada exitosamente.');
    }

    public function destroy(ClientGallery $clientGallery)
    {
        if ($clientGallery->cover_image_path) {
            Storage::disk('public')->delete($clientGallery->cover_image_path);
        }

        foreach ($clientGallery->items as $item) {
            if ($item->type === 'photo' && $item->path_or_url) {
                Storage::disk('public')->delete($item->path_or_url);
            }
        }

        $clientGallery->delete();

        return redirect()->route('client-galleries.index')->with('success', 'Galería eliminada exitosamente.');
    }
}
