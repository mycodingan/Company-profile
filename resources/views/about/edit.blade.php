<!DOCTYPE html>
<html>
<head>
    <title>Edit About</title>
</head>
<body>
    <h1>Edit About</h1>

    @if ($errors->any())
        <div>
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

        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $about->title }}" required>
        </div>

        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $about->content }}</textarea>
        </div>

        <div>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image">
            @if ($about->image)
                <img src="{{ Storage::url($about->image) }}" alt="About Image" style="max-width: 200px;">
            @endif
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>
</html>
