@extends('layouts.app')

@section('title', 'Edit Menu Item')

@section('content')
<div class="container-xxl">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">
                          Edit Menu
                            
                        </h4>
                        
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('menu.update', $row->id) }}" method="POST" id="editMenuForm">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">
                                    Menu Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       class="form-control @error('title') is-invalid @enderror" 
                                       id="title" 
                                       name="title" 
                                       value="{{ old('title', $row->title) }}"
                                       placeholder="Enter menu item title"
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
                                       value="{{ old('subtitle', $row->subtitle) }}"
                                       placeholder="Brief description of the menu item">
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
                                          rows="6"
                                          placeholder="Detailed description including ingredients, preparation, serving suggestions, etc.">{{ old('description', $row->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-text">
                                    <span id="charCount">{{ strlen(old('description', $row->description)) }}</span> characters
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            
                            <div class="d-flex gap-2">

                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i>Update Menu Item
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    {{-- Delete Form (Hidden) --}}
                    <form action="{{ route('menu.destroy', $row->id) }}" method="POST" id="deleteForm" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('title');
        const subtitleInput = document.getElementById('subtitle');
        const descriptionInput = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        const originalData = {
            title: "{{ $row->title }}",
            subtitle: "{{ $row->subtitle }}",
            description: "{{ $row->description }}"
        };
        
        // Update character count
        descriptionInput.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
        
        // Live preview updates
        titleInput.addEventListener('input', function() {
            document.getElementById('previewTitle').textContent = this.value || originalData.title;
        });
        
        subtitleInput.addEventListener('input', function() {
            const preview = document.getElementById('previewSubtitle');
            if (this.value) {
                if (!preview) {
                    const newPreview = document.createElement('p');
                    newPreview.className = 'text-muted mb-2';
                    newPreview.id = 'previewSubtitle';
                    document.querySelector('.menu-preview h4').after(newPreview);
                }
                document.getElementById('previewSubtitle').textContent = this.value;
            } else if (preview) {
                preview.remove();
            }
        });
        
        descriptionInput.addEventListener('input', function() {
            const preview = document.getElementById('previewDescription');
            if (this.value) {
                preview.textContent = this.value;
                preview.classList.remove('text-muted');
            } else {
                preview.textContent = 'No description provided';
                preview.classList.add('text-muted');
            }
        });
    });
    
    function resetToOriginal() {
        if (confirm('Reset all changes to original values?')) {
            document.getElementById('editMenuForm').reset();
            window.location.reload();
        }
    }
    
    function confirmDelete() {
        if (confirm('Are you sure you want to delete this menu item? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

<style>
    .menu-preview {
        background: #f8f9fa;
        padding: 1.5rem;
        border-radius: 0.5rem;
        border-left: 4px solid #28a745;
    }
    .menu-preview h4 {
        color: #212529;
        margin-bottom: 0.5rem;
    }
    .form-label {
        font-weight: 500;
    }
    .alert-info {
        border-left: 4px solid #17a2b8;
    }
</style>
@endsection