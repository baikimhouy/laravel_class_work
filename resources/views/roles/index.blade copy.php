{{-- resources/views/roles/index.blade.php --}}
@extends('layouts.app')

@section('title', 'All Roles')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>Role Management</h4>
        <a href="{{ route('role.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Add New Role
        </a>
    </div>
    <div class="card-body">
        @if($roles->count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            </td>
                            <td>{{ $role->description ?? 'N/A' }}</td>
                            <td>{{ $role->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('role.edit', $role->id) }}" 
                                       class="bg-blue-300 btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('role.delete', $role->id) }}" 
                                          method="POST" 
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="btn bg-red-500 btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this role?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">
                No roles found. <a href="{{ route('role.create') }}">Create the first role</a>.
            </div>
        @endif
    </div>
</div>
@endsection