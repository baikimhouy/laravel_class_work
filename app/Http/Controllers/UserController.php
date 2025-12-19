<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
class UserController extends Controller{
    public function index()
    {
        $user = User::latest()->get();
        return view('users.index', compact(var_name: 'user'));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'email' => 'nullable|string',
            'password' => 'required',
        ]);

        // Find and update the role
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully!');
    }
    public function destroy($id)
    {
        
            $user = User::findOrFail($id);
            
            $user->forceDelete();
            
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
            
       
    }
}