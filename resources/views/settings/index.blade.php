@extends('layouts.app')

@section('title', 'Site Settings')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Please fix the following errors:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-cog me-2"></i>Site Settings
                        </h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data" id="settingsForm">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-lg-8">
                                <div class="mb-4">
                                    <label for="title" class="form-label">
                                    Title <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('title') is-invalid @enderror" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title', $settings->title) }}"
                                           required>
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="form-label">
                                        Email
                                    </label>
                                    <input type="email" 
                                           class="form-control @error('email') is-invalid @enderror" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email', $settings->email) }}"
                                           placeholder="contact@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="phone" class="form-label">
                                    Phone
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('phone') is-invalid @enderror" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone', $settings->phone) }}"
                                           placeholder="+855 12 345 678">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="facebook" class="form-label">
                                    Facebook

                                    </label>
                                    <input type="text" 
                                           class="form-control @error('facebook') is-invalid @enderror" 
                                           id="facebook" 
                                           name="facebook" 
                                           value="{{ old('facebook', $settings->facebook) }}"
                                    @error('facebook')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
            
                                </div>

                                <div class="mb-4">
                                    <label for="telegram" class="form-label">
                                    Telegram
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('telegram') is-invalid @enderror" 
                                           id="telegram" 
                                           name="telegram" 
                                           value="{{ old('telegram', $settings->telegram) }}">
                                    @error('telegram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="instagram" class="form-label">
                                    Instagram
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('instagram') is-invalid @enderror" 
                                           id="instagram" 
                                           name="instagram" 
                                           value="{{ old('instagram', $settings->instagram) }}">
                                    @error('instagram')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="youtube" class="form-label">
                                    YouTube
                                    </label>
                                    <input type="text" 
                                           class="form-control @error('youtube') is-invalid @enderror" 
                                           id="youtube" 
                                           name="youtube" 
                                           value="{{ old('youtube', $settings->youtube) }}">
                                    @error('youtube')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>


                                <div class="mb-4">
                                    <label for="description" class="form-label">
                                        Description
                                    </label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" 
                                              name="description" 
                                              rows="4">{{ old('description', $settings->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                

                                
                            </div>

                            <!-- Right Column -->
                            <div class="col-lg-4">
                                <div class="card border-light mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="logo" class="form-label">
                                                logo
                                            </label>
                                            <div class="logo-upload-container">
                                                <div class="logo-preview mb-3" id="logoPreview">
    @if($settings->logo)
        <img src="{{ asset('storage/app/public/settings/' . $settings->logo) }}" 
             class="img-fluid rounded" 
             alt="Logo"
             style="max-height: 200px; object-fit: contain;"
             id="currentLogo">
        
    @else
        <div class="no-logo">
            <i class="fas fa-image fa-3x text-muted"></i>
            <p class="mt-2 mb-0 text-muted">No logo uploaded</p>
        </div>
    @endif
</div>
                                                <input type="file" 
                                                       class="form-control @error('logo') is-invalid @enderror" 
                                                       id="logo" 
                                                       name="logo"
                                                       accept="image/jpeg,image/png,image/jpg,image/gif,image/svg+xml"
                                                       onchange="previewLogo(event)">
                                                <input type="hidden" name="remove_logo" id="removeLogoFlag" value="0">
                                                @error('logo')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                
                                            </div>
                                        </div>

                                        <div class="border-top pt-3 mt-3">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary btn-lg" id="submitBtn">
                                                   Save Settings
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
// Store original logo state
let hasOriginalLogo = {{ $settings->logo ? 'true' : 'false' }};
let originalLogoUrl = '{{ $settings->logo ? asset('storage/' . $settings->logo) : '' }}';

function previewLogo(event) {
    const preview = document.getElementById('logoPreview');
    const file = event.target.files[0];
    const removeFlag = document.getElementById('removeLogoFlag');
    
    if (file) {
        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB');
            event.target.value = '';
            return;
        }

        // Validate file type
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
        if (!validTypes.includes(file.type)) {
            alert('Invalid file type. Please upload JPG, PNG, GIF, or SVG images only.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     class="img-fluid rounded" 
                     alt="Logo preview"
                     style="max-height: 200px; object-fit: contain;">
                <div class="mt-2">
                    
                </div>
            `;
            removeFlag.value = '0';
        };
        reader.readAsDataURL(file);
    }
}

function cancelLogoUpload() {
    const logoInput = document.getElementById('logo');
    const preview = document.getElementById('logoPreview');
    const removeFlag = document.getElementById('removeLogoFlag');
    
    // Clear file input
    logoInput.value = '';
    removeFlag.value = '0';
    
    // Restore original logo or empty state
    if (hasOriginalLogo && originalLogoUrl) {
        preview.innerHTML = `
            <img src="${originalLogoUrl}" 
                 class="img-fluid rounded" 
                 alt="Logo"
                 style="max-height: 200px; object-fit: contain;"
                 onerror="this.parentElement.innerHTML='<div class=\\'no-logo\\'><i class=\\'fas fa-image fa-3x text-muted\\'></i><p class=\\'mt-2 mb-0 text-danger\\'>Logo file not found</p></div>'">
            <div class="mt-2">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeLogo()">
                    <i class="fas fa-trash me-1"></i>Remove Logo
                </button>
            </div>
        `;
    } else {
        preview.innerHTML = `
            <div class="no-logo">
                <i class="fas fa-image fa-3x text-muted"></i>
                <p class="mt-2 mb-0 text-muted">No logo uploaded</p>
            </div>
        `;
    }
}

function removeLogo() {
    if (confirm('Are you sure you want to remove the logo? This will be applied when you save the settings.')) {
        const logoInput = document.getElementById('logo');
        const preview = document.getElementById('logoPreview');
        const removeFlag = document.getElementById('removeLogoFlag');
        
        // Clear file input and set remove flag
        logoInput.value = '';
        removeFlag.value = '1';
        
        // Update preview
        preview.innerHTML = `
            <div class="no-logo border border-warning bg-warning bg-opacity-10">
                <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                <p class="mt-2 mb-0 text-warning fw-bold">Logo will be removed when you save</p>
                <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="cancelLogoRemoval()">
                    <i class="fas fa-undo me-1"></i>Undo
                </button>
            </div>
        `;
    }
}

function cancelLogoRemoval() {
    const removeFlag = document.getElementById('removeLogoFlag');
    removeFlag.value = '0';
    cancelLogoUpload();
}

// Form submission handling
document.getElementById('settingsForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
});

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script> -->
<script>
// Store original logo state
let hasOriginalLogo = {{ $settings->logo ? 'true' : 'false' }};
let originalLogoUrl = '{{ $settings->logo ? Storage::url($settings->logo) : '' }}';

function previewLogo(event) {
    const preview = document.getElementById('logoPreview');
    const file = event.target.files[0];
    const removeFlag = document.getElementById('removeLogoFlag');
    
    if (file) {
        // Validate file size (2MB)
        if (file.size > 2 * 1024 * 1024) {
            alert('File size must be less than 2MB');
            event.target.value = '';
            return;
        }

        // Validate file type
        const validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
        if (!validTypes.includes(file.type)) {
            alert('Invalid file type. Please upload JPG, PNG, GIF, or SVG images only.');
            event.target.value = '';
            return;
        }

        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" 
                     class="img-fluid rounded" 
                     alt="Logo preview"
                     style="max-height: 200px; object-fit: contain;">
                <div class="mt-2">
                    <button type="button" class="btn btn-sm btn-warning me-1" onclick="cancelLogoUpload()">
                        <i class="fas fa-times me-1"></i>Cancel
                    </button>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeLogo()">
                        <i class="fas fa-trash me-1"></i>Remove
                    </button>
                </div>
            `;
            removeFlag.value = '0';
        };
        reader.readAsDataURL(file);
    }
}

function cancelLogoUpload() {
    const logoInput = document.getElementById('logo');
    const preview = document.getElementById('logoPreview');
    const removeFlag = document.getElementById('removeLogoFlag');
    
    // Clear file input
    logoInput.value = '';
    removeFlag.value = '0';
    
    // Restore original logo or empty state
    if (hasOriginalLogo && originalLogoUrl) {
        preview.innerHTML = `
            <img src="${originalLogoUrl}" 
                 class="img-fluid rounded" 
                 alt="Logo"
                 style="max-height: 200px; object-fit: contain;">
            <div class="mt-2">
                <button type="button" class="btn btn-sm btn-danger" onclick="removeLogo()">
                    <i class="fas fa-trash me-1"></i>Remove Logo
                </button>
            </div>
        `;
    } else {
        preview.innerHTML = `
            <div class="no-logo">
                <i class="fas fa-image fa-3x text-muted"></i>
                <p class="mt-2 mb-0 text-muted">No logo uploaded</p>
            </div>
        `;
    }
}

function removeLogo() {
    if (confirm('Are you sure you want to remove the logo? This will be applied when you save the settings.')) {
        const logoInput = document.getElementById('logo');
        const preview = document.getElementById('logoPreview');
        const removeFlag = document.getElementById('removeLogoFlag');
        
        // Clear file input and set remove flag
        logoInput.value = '';
        removeFlag.value = '1';
        
        // Update preview
        preview.innerHTML = `
            <div class="no-logo border border-warning bg-warning bg-opacity-10">
                <i class="fas fa-exclamation-triangle fa-3x text-warning"></i>
                <p class="mt-2 mb-0 text-warning fw-bold">Logo will be removed when you save</p>
                <button type="button" class="btn btn-sm btn-secondary mt-2" onclick="cancelLogoRemoval()">
                    <i class="fas fa-undo me-1"></i>Undo
                </button>
            </div>
        `;
    }
}

function cancelLogoRemoval() {
    const removeFlag = document.getElementById('removeLogoFlag');
    removeFlag.value = '0';
    cancelLogoUpload();
}

// Form submission handling
document.getElementById('settingsForm').addEventListener('submit', function(e) {
    const submitBtn = document.getElementById('submitBtn');
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';
});

// Auto-dismiss alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000);
    });
});
</script>

<style>
.logo-upload-container {
    border: 2px dashed #dee2e6;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    background: #f8f9fa;
    transition: all 0.3s ease;
}

.logo-upload-container:hover {
    border-color: #adb5bd;
    background: #e9ecef;
}

.logo-preview {
    min-height: 120px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.no-logo {
    padding: 30px 20px;
    border-radius: 6px;
}

.form-label {
    font-weight: 500;
    color: #495057;
}

.alert {
    border-left: 4px solid #28a745;
}

.alert-danger {
    border-left-color: #dc3545;
}

.card {
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 0 15px rgba(0,0,0,0.08);
}

#submitBtn:disabled {
    cursor: not-allowed;
    opacity: 0.7;
}

.btn-sm {
    font-size: 0.875rem;
    padding: 0.25rem 0.5rem;
}
</style>
@endsection