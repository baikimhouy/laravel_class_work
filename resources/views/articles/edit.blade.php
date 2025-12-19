@extends('layouts.app')

@section('title', 'Edit Article')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-edit me-2"></i>Edit Article
                            <small class="text-muted fs-6">#{{ $article->id }}</small>
                        </h4>
                        <div class="d-flex gap-2">
                            <a href="{{ route('articles.create') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-plus me-1"></i>New
                            </a>
                            <a href="{{ route('articles.index') }}" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-list me-1"></i>All Articles
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data" id="editArticleForm">
                        @csrf
                        @method('PUT')

                    

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label">
                                        Article Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $article->title) }}"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="form-label">
                                        Slug <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">/articles/</span>
                                        <input type="text" 
                                               class="form-control @error('slug') is-invalid @enderror" 
                                               id="slug" 
                                               name="slug" 
                                               value="{{ old('slug', $article->slug) }}"
                                               required>
                                        @error('slug')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="subtitle" class="form-label">
                                        Subtitle
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('subtitle') is-invalid @enderror" 
                                           id="subtitle" 
                                           name="subtitle" 
                                           value="{{ old('subtitle', $article->subtitle) }}">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="description" class="form-label">
                                        Short Description
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="3">{{ old('description', $article->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="content" class="form-label">
                                        Content
                                    </label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" 
                                              id="content" 
                                              name="content" 
                                              rows="12">{{ old('content', $article->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <span id="contentCount">{{ strlen(old('content', $article->content)) }}</span> characters
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <div class="card border-light mb-4">
                                    
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="menu_id" class="form-label">
                                                Menu Category <span class="text-danger">*</span>
                                            </label>
                                            <select class="form-select @error('menu_id') is-invalid @enderror" 
                                                    id="menu_id" 
                                                    name="menu_id"
                                                    required>
                                                <option value="">Select Menu</option>
                                                @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}" {{ old('menu_id', $article->menu_id) == $menu->id ? 'selected' : '' }}>
                                                        {{ $menu->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('menu_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">
                                                Featured Image
                                            </label>
                                            <div class="image-upload-container">
                                                <div class="image-preview mb-3" id="imagePreview">
                                                    @if($article->image)
                                                        <img src="{{ Storage::url($article->image) }}" 
                                                             class="img-fluid rounded" 
                                                             style="max-height: 200px; object-fit: cover;">
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="removeImage()">
                                                                <i class="fas fa-trash me-1"></i>Remove
                                                            </button>
                                                            <input type="hidden" name="remove_image" id="removeImageFlag" value="0">
                                                        </div>
                                                    @else
                                                        <div class="no-image">
                                                            <i class="fas fa-image fa-3x text-muted"></i>
                                                            <p class="mt-2 mb-0">No image selected</p>
                                                        </div>
                                                    @endif
                                                </div>
                                                <input type="file" 
                                                       class="form-control @error('image') is-invalid @enderror" 
                                                       id="image" 
                                                       name="image"
                                                       accept="image/*"
                                                       onchange="previewImage(event)">
                                                @error('image')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="border-top pt-3 mt-3">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save me-1"></i>Update Article
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                              
                            </div>
                        </div>
                    </form>

                    <!-- Delete Form -->
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" id="deleteForm" class="d-none">
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
    const contentInput = document.getElementById('content');
    const contentCount = document.getElementById('contentCount');
    
    // Character count
    contentInput.addEventListener('input', function() {
        contentCount.textContent = this.value.length;
    });
});

function previewImage(event) {
    const preview = document.getElementById('imagePreview');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     class="img-fluid rounded" 
                     style="max-height: 200px; object-fit: cover;">
                <div class="mt-2">
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeImage()">
                        <i class="fas fa-trash me-1"></i>Remove
                    </button>
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
}

function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').innerHTML = `
        <div class="no-image">
            <i class="fas fa-image fa-3x text-muted"></i>
            <p class="mt-2 mb-0">No image selected</p>
        </div>
    `;
    document.getElementById('removeImageFlag').value = '1';
}

function confirmDelete() {
    if (confirm('Are you sure you want to delete this article? This action cannot be undone.')) {
        document.getElementById('deleteForm').submit();
    }
}
</script>

<style>
.image-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 6px;
    padding: 15px;
    text-align: center;
    background: #f8f9fa;
}
.form-label {
    font-weight: 500;
}
.alert {
    border-left: 4px solid #17a2b8;
}
</style>
@endsection