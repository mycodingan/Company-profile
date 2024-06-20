@extends('components.admin.dhasboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Products</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal"
                            data-bs-target="#productModal" id="showCreateModal">
                            Add Product
                        </button>

                        <!-- Table to display products -->
                        <table class="table">
                            <!-- Table headers -->
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- Table body -->
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->title }}</td>
                                        <td>
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                                style="max-width: 100px; max-height: 100px;">
                                        </td>
                                        <td>
                                            <!-- Edit button -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#productModal{{ $product->id }}">
                                                Edit
                                            </button>
                                            <!-- Delete button -->
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <!-- Modal content -->
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal header -->
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Add Product</h5>
                {{-- <button type="button" class="btn-close" aria-label="Close" id="closeModalButton"></button> --}}
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Form to add product -->
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">nama product</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">isi product</label>
                        <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <!-- Edit Product Modals -->
    @foreach ($products as $product)
        <!-- Modal for each product edit -->
        <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1"
            aria-labelledby="productModal{{ $product->id }}Label" aria-hidden="true">
            <!-- Modal content -->
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="productModal{{ $product->id }}Label">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <!-- Form to edit product -->
                        <form action="{{ route('products.update', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $product->title }}">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="3">{{ $product->content }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Update Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = new bootstrap.Modal(document.getElementById('productModal'));

        // Event listener untuk menampilkan modal create saat tombol Add Product ditekan
        document.getElementById('showCreateModal').addEventListener('click', function() {
            modal.show();
        });

        // Event listener untuk menutup modal saat tombol Close di klik
        document.getElementById('closeModalButton').addEventListener('click', function() {
            modal.hide();
        });
    });
</script>
    </script>
@endsection
