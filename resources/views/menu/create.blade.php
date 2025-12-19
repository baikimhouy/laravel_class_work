@extends('layouts.app')

@section('title', 'Create Menu Item')

@section('content')
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i>Create New Menu Item
                        </h4>
                        <a href="{{ route('menu.index') }}" class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Back to Menu
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.store') }}" method="POST" id="menuForm">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">
                                    Menu Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title') }}"
                                       required
                                       autofocus>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="subtitle" class="form-label">
                                    Subtitle 
                                </label>
                                <input type="text" 
                                       class="form-control @error('subtitle') is-invalid @enderror" 
                                       id="subtitle" 
                                       name="subtitle" 
                                       value="{{ old('subtitle') }}">
                                @error('subtitle')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-12 mb-4">
                                <label for="description" class="form-label">
                                    Full Description
                                </label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" 
                                          name="description" 
                                          rows="5"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            
                            <div class="d-flex gap-2">
                                
                                <button type="submit" class="btn btn-primary">
                                    Create 
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>



<style>
    .form-label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }
    .form-text {
        font-size: 0.875rem;
    }
    #charCount {
        font-weight: 500;
        color: #6c757d;
    }
</style>
@endsection