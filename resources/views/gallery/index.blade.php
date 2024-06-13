@extends('components.admin.dhasboard    ')

@section('content')
<style>
    /* custom.css */

.gallery-item {
    margin-bottom: 20px;
}

.gallery-item img {
    max-width: 100%;
    height: auto;
    display: block;
    margin: 10px 0;
}

.modal-body img {
    max-width: 100%;
    height: auto;
    display: block;
    margin-bottom: 10px;
}

.gallery-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 10px;
}

.gallery-content {
    font-size: 1rem;
    margin-top: 10px;
}

.gallery-caption {
    font-size: 0.9rem;
    color: #6c757d;
    margin-top: 5px;
}
/* custom.css */

.gallery-item {
    margin-bottom: 20px;
}

.gallery-item .card-img-top {
    object-fit: cover;
    height: 200px; /* Sesuaikan dengan tinggi yang diinginkan */
}

.modal-body img {
    max-width: 100%;
    height: auto;
    display: block;
    margin-bottom: 10px;
}

.gallery-title {
    font-size: 1.5rem;
    font-weight: bold;
    margin-top: 10px;
}

.gallery-content {
    font-size: 1rem;
    margin-top: 10px;
}

.gallery-caption {
    font-size: 0.9rem;
    color: #6c757d;
    margin-top: 5px;
}


</style>
    <div class="container mt-4">
        <h1 class="mb-4">Galleries</h1>
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#createGalleryModal">Create New Gallery</button>

        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 gallery-item">
                    <div class="card">
                        @if ($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                        @endif
                        <div class="card-body">
                            <h2 class="gallery-title">{{ $gallery->title }}</h2>
                            <p class="gallery-content">{{ $gallery->content }}</p>
                            <p class="gallery-caption">{{ $gallery->caption }}</p>
                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#editGalleryModal-{{ $gallery->id }}">Edit</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteGalleryModal-{{ $gallery->id }}">Delete</button>
                        </div>
                    </div>
                </div>

                <!-- Edit Gallery Modal -->
                <div class="modal fade" id="editGalleryModal-{{ $gallery->id }}" tabindex="-1" aria-labelledby="editGalleryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editGalleryModalLabel">Edit Gallery</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <label for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $gallery->title) }}">
                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="content">Content:</label>
                                        <textarea name="content" id="content" class="form-control">{{ old('content', $gallery->content) }}</textarea>
                                        @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="image">Image:</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                        @if ($gallery->image)
                                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                                        @endif
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="caption">Caption:</label>
                                        <input type="text" name="caption" id="caption" class="form-control" value="{{ old('caption', $gallery->caption) }}">
                                        @error('caption')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Gallery Modal -->
                <div class="modal fade" id="deleteGalleryModal-{{ $gallery->id }}" tabindex="-1" aria-labelledby="deleteGalleryModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('gallery.destroy', $gallery) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteGalleryModalLabel">Delete Gallery</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this gallery?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Create Gallery Modal -->
        <div class="modal fade" id="createGalleryModal" tabindex="-1" aria-labelledby="createGalleryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createGalleryModalLabel">Create Gallery</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div>
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="content">Content:</label>
                                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="image">Image:</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="caption">Caption:</label>
                                <input type="text" name="caption" id="caption" class="form-control" value="{{ old('caption') }}">
                                @error('caption')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
