{{-- resources/views/roles/create.blade.php --}}
@extends('layouts.app')

@section('title', 'Create Role')

@section('content')
<div class="container-xxl">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create New Role</h4> 
        </div>
        <div class="card-body">
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Role Name *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Role Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" name="description" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create Role</button>
                <a href="{{ route('role.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection