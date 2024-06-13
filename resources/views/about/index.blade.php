@extends('components.admin.dhasboard')

@section('content')
<style>
    
</style>
    {{-- <h1>{{ $about->title }}</h1>
    <p>{{ $about->content }}</p>
    @if ($about->image)
        <img src="{{ asset('storage/' . $about->image) }}" alt="About Image">
    @endif
    <a href="{{ route('about.edit') }}">Edit</a> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Edit About</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title:</label>
                                <input type="text" id="title" name="title" value="{{ $about->title }}" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content:</label>
                                <textarea id="content" name="content" class="form-control" required>{{ $about->content }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image:</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @if ($about->image)
                                    <img src="{{ Storage::url($about->image) }}" alt="About Image" style="max-width: 200px;" class="mt-2">
                                @endif
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
