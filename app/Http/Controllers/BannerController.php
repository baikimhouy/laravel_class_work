<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Banner::all();
        return view('banner.index', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // 1. Validate input
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'description'  => 'nullable|string|max:255',
        'image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // 2. Handle image image upload
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('banner', 'public');
    }

    // 3. Create user
    Banner::create([
        'name'     => $validated['name'],
        'description'  => $validated['description'] ?? null,
        'image'  => $imagePath,
    ]);

    // 4. Redirect
    return redirect()
        ->route('banner.index')
        ->with('success', 'Banner created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $row = Banner::findOrFail($id);
        return view('banner.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $banner = Banner::findOrFail($id);

    // 1. Validate
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'description'  => 'nullable|string|max:255',
        'image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // 2. Handle profile upload
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')
            ->store('banner', 'public');
    }

    // 3. Update user
    $banner->update($validated);

    // 4. Redirect
    return redirect()
        ->route('banner.index')
        ->with('success', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $banner = Banner::findOrFail($id);

         // Delete image if exists
    if ($banner->image && Storage::disk('public')->exists($banner->image)) {
        Storage::disk('public')->delete($banner->image);
    }

          $banner->delete();
          
           return redirect()->route("banner.index")->with('success', 'Banner deleted sucessfully');
    }
}