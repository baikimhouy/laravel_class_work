@extends('layouts.app')

@section('title', 'All Articles')

@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title">
                                Articles
                            </h4>
                            <p class="text-muted mb-0">Manage your articles and blog posts</p>
                        </div>
                        <div class="col-auto">
                            <div class="row g-2">
                                <div class="col-auto">
                                    <a class="btn bg-primary-subtle text-primary dropdown-toggle" data-bs-toggle="dropdown">
                                        <i class="fas fa-filter me-1"></i> Filter
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="p-2">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-all">
                                                <label class="form-check-label" for="filter-all">All Articles</label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="filter-published">
                                                <label class="form-check-label" for="filter-published">Published</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="filter-drafts">
                                                <label class="form-check-label" for="filter-drafts">Drafts</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <a href="{{ route('articles.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus me-1"></i> New Article
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">No</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th class="text-end" width="150">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($rows as $article)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($article->image)
                                            <img src="{{ Storage::url($article->image) }}" 
                                                 alt="{{ $article->title }}"
                                                 class="img-thumbnail"
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $article->title }}</strong>
                                        
                                    </td>
                                    <td>
                                        @if($article->menu)
                                            <span class="">{{ $article->menu->title }}</span>
                                        @else
                                            <span class="">No Menu</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-end">
                                        <div class="btn-group" role="group">
                                            
                                            <a href="{{ route('articles.edit', $article->id) }}" 
                                               class="btn btn-sm " 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" 
                                                    class="btn btn-sm" 
                                                    title="Delete"
                                                    onclick="confirmDelete('{{ route('articles.destroy', $article->id) }}', '{{ $article->title }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                               
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>

<form id="deleteForm" method="POST" class="d-none">
    @csrf
    @method('DELETE')
</form>

<script>
function confirmDelete(url, title) {
    if (confirm(`Are you sure you want to delete "${title}"? This action cannot be undone.`)) {
        const form = document.getElementById('deleteForm');
        form.action = url;
        form.submit();
    }
}
</script>

<style>
.table tbody tr:hover {
    background-color: rgba(0,0,0,.02);
}
.img-thumbnail {
    border-radius: 4px;
}
.badge {
    font-size: 0.8em;
}
.btn-group .btn {
    border-radius: 4px !important;
}
</style>
@endsection