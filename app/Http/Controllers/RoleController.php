<?php
// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'description' => 'nullable|string',
        ]);

        // Create the role
        Role::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect to index with success message
        return redirect()->route('role.index')
            ->with('success', 'Role created successfully!');
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'description' => 'nullable|string',
        ]);

        // Find and update the role
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('role.index')
            ->with('success', 'Role updated successfully!');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy($id)
    {
        
            $role = Role::findOrFail($id);
            
            $role->forceDelete();
            
            return redirect()->route('role.index')->with('success', 'Role deleted successfully.');
            
       
    }
}