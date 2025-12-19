@extends('layouts.app')

@section('title', 'All Menus')

@section('content')
<div class="container-xxl"> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Menu Items</h4>                      
                        </div>
                        <div class="col-auto"> 
                            <div class="row g-2">
                                <div class="col-auto">
                                    <a class="btn bg-primary-subtle text-primary dropdown-toggle d-flex align-items-center arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" data-bs-auto-close="outside">
                                        <i class="iconoir-filter-alt me-1"></i> Filter
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-start">
                                        <div class="p-2">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-all">
                                                <label class="form-check-label" for="filter-all">
                                                  All Menu Items
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-active">
                                                <label class="form-check-label" for="filter-active">
                                                    Active Menus
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-featured">
                                                <label class="form-check-label" for="filter-featured">
                                                    Featured Items
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-auto">
                                    <a href="{{ route('menu.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add New Menu
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>                                  
                </div>
                
                {{-- Success/Error Messages --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0" id="datatable_1">
                            <thead class="table-light">
                              <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Description</th>
                                <th class="text-end">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $menu)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $menu->title }}</strong>
                                    </td>
                                    <td>{{ $menu->subtitle ?? 'N/A' }}</td>
                                    <td>
                                        @if($menu->description)
                                            {{ Str::limit($menu->description, 50) }}
                                        @else
                                            <span class="text-muted">No description</span>
                                        @endif
                                    </td>
                                    <td class="text-end">                                                       
                                        <a href="{{ route('menu.edit', $menu->id) }}" 
                                               class="btn btn-sm " 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                        
                                        {{-- Delete Form --}}
                                        <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <!-- <button type="submit" class="btn btn-sm " 
                                                    onclick="return confirm('Are you sure you want to delete the menu item \"{{ $menu->title }}\"? This action cannot be undone.')">
                                                <i class="las la-trash-alt"></i> 
                                            </button> -->
                                            <button type="submit" 
                                                    class="btn btn-sm" 
                                                    title="Delete"
                                                    onclick="confirmDelete('{{ route('menu.destroy', $menu->id) }}', '{{ $menu->title }}')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                                @if($rows->isEmpty())
                                <!-- <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-utensils fa-2x mb-3"></i><br>
                                            No menu items found. <br>
                                            <a href="{{ route('menu.create') }}" class="btn btn-sm btn-primary mt-2">Add Your First Menu Item</a>
                                        </div>
                                    </td>
                                </tr> -->
                                @endif
                            </tbody>
                        </table>
                    </div>              
                </div>
            </div>
        </div>
    </div>                                     
</div>

<style>
    .table tbody tr:hover {
        background-color: rgba(0,0,0,.02);
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
</style>
@endsection