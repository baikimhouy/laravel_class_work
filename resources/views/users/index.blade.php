@extends('layouts.app')

@section('title', 'All Users')

@section('content')
<div class="container-xxl"> 
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">                      
                            <h4 class="card-title">Users</h4>                      
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
                                                  All 
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-one">
                                                <label class="form-check-label" for="filter-one">
                                                    New
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" checked id="filter-two">
                                                <label class="form-check-label" for="filter-two">
                                                    VIP
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-auto">
                                    <a href="{{ route('role.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Add New User
                                    </a>
                                </div>
                            </div>    
                        </div>
                    </div>                                  
                </div>
                
                {{-- Success/Error Messages --}}
                <!-- @if(session('success'))
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
                @endif -->
                
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table mb-0" id="datatable_1">
                            <thead class="table-light">
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th class="text-end">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $users)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email ?? 'N/A' }}</td>
                                    <!-- <td class="text-end">                                                       
                                        <a href="{{ route('user.edit', $users->id) }}" class="">
                                            <i class="las la-pen"></i> 
                                        </a>
                                        
                                        {{-- Delete Form --}}
                                        <form action="{{ route('user.delete', $users->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm" 
                                                    onclick="return confirm('Are you sure you want to delete the role \"{{ $users->name }}\"? This action cannot be undone.')">
                                                <i class="las la-trash-alt"></i> 
                                            </button>
                                        </form>
                                    </td> -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                                     
</div>
@endsection