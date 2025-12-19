@extends('layouts.app')

@section('title', 'Create Article')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-plus-circle me-2"></i>Create New Article
                        </h4>
                       
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" id="articleForm">
                        @csrf

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
                                           value="{{ old('title') }}"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="slug" class="form-label">
                                        Slug <span class="text-danger">*</span>
                                        <small class="text-muted">(URL-friendly version)</small>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text">/articles/</span>
                                        <input type="text" 
                                               class="form-control @error('slug') is-invalid @enderror" 
                                               id="slug" 
                                               name="slug" 
                                               value="{{ old('slug') }}"
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
                                           value="{{ old('subtitle') }}"
                                           placeholder="Brief summary of the article">
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
                                              rows="3"
                                              placeholder="Brief description for listings">{{ old('description') }}</textarea>
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
                                              rows="10"
                                              placeholder="Write your article content here...">{{ old('content') }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="form-text">
                                        <span id="contentCount">0</span> characters
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <div class="card border-light mb-4">
                                    <!-- <div class="card-header bg-light">
                                        <h6 class="mb-0">Article Settings</h6>
                                    </div> -->
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
                                                    <option value="{{ $menu->id }}" {{ old('menu_id') == $menu->id ? 'selected' : '' }}>
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
                                                    <i class="fas fa-save me-1"></i>Publish
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Preview Card -->
                                
                            </div>
                        </div>
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
    const contentInput = document.getElementById('content');
    const contentCount = document.getElementById('contentCount');
    
    // Auto-generate slug from title
    titleInput.addEventListener('blur', function() {
        if (!document.getElementById('slug').value) {
            const slug = this.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-')
                .trim();
            document.getElementById('slug').value = slug;
        }
    });
    
    // Content character count
    contentInput.addEventListener('input', function() {
        contentCount.textContent = this.value.length;
    });
    
    // Live preview updates
    const previewTitle = document.getElementById('previewTitle');
    const previewSubtitle = document.getElementById('previewSubtitle');
    const previewDescription = document.getElementById('previewDescription');
    
    titleInput.addEventListener('input', function() {
        previewTitle.textContent = this.value || 'Article Title';
    });
    
    subtitleInput.addEventListener('input', function() {
        previewSubtitle.textContent = this.value || 'Subtitle will appear here';
    });
    
    descriptionInput.addEventListener('input', function() {
        previewDescription.textContent = this.value ? (this.value.length > 100 ? this.value.substring(0, 100) + '...' : this.value) : 'Description preview...';
    });
    
    // Initialize counts
    contentCount.textContent = contentInput.value.length;
});



function removeImage() {
    document.getElementById('image').value = '';
    document.getElementById('imagePreview').innerHTML = `
        <div class="no-image">
            <i class="fas fa-image fa-3x text-muted"></i>
            <p class="mt-2 mb-0">No image selected</p>
        </div>
    `;
}

function saveAsDraft() {
    // Add a hidden input for draft status
    const draftInput = document.createElement('input');
    draftInput.type = 'hidden';
    draftInput.name = 'status';
    draftInput.value = 'draft';
    document.getElementById('articleForm').appendChild(draftInput);
    
    // Submit form
    document.getElementById('articleForm').submit();
}
</script>

<style>
.image-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 6px;
    padding: 20px;
    text-align: center;
    background: #f8f9fa;
}
.image-preview .no-image {
    color: #6c757d;
}
.article-preview {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 6px;
    border-left: 3px solid #17a2b8;
}
.input-group-text {
    background-color: #f8f9fa;
}
.form-label {
    font-weight: 500;
}
</style>
@endsection