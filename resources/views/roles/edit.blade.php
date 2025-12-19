{{-- resources/views/roles/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Role')

@section('content')
<div class="container-xxl">
    <div class="card">
        <div class="card-header">
            <h4>Edit Role: {{ $role->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Role Name *</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           value="{{ old('name', $role->name) }}"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="3">{{ old('description', $role->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('role.index') }}" class="btn btn-secondary me-md-2">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Role
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection