@extends('layouts.app')

@section('title', 'Create New Role')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Create New Role</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Role Name *</label>
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" 
                               name="name" 
                               value="{{ old('name') }}"
                               placeholder="e.g., admin, user, moderator"
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Unique identifier for the role (lowercase, no spaces)</div>
                    </div>


                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" 
                                  id="description" 
                                  name="description" 
                                  rows="3"
                                  placeholder="Describe what this role can do...">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('role.index') }}" class="btn btn-secondary me-md-2">
                            <i class="fas fa-arrow-left"></i> Back to Roles
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Create Role
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection