<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rows = Menu::latest()->get();
        return view('menu.index', compact('rows'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:menu,title',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        Menu::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu item created successfully.');
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
        $row = Menu::findOrFail($id);
        return view('menu.edit', compact('row'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|unique:menu,title,'.$id,
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu item deleted successfully.');
    }
}
