@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Banner</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('banner.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required
                            value="{{ $row->name ?? old('name') }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea class="form-control" id="description" name="description" rows="2" cols="30"> {{ $row->description ?? old('description') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image"
                            onchange="loadFile(event)"></input>
                        <img id="output" class="mt-2" width="100" src="{{ asset('storage/' . $row->image) }}" />
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Edit Banner</button>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('output');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>