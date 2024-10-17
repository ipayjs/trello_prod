@extends('templates.app', ['title' => 'Create Blog'])

@section('content-dinamis')

<body>
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Edit Blog Post</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('articles.edit.update', $articles->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="publisher" class="form-label">Publisher</label>
                        <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $articles->publisher }}">
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $articles->title }}">
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5">{{ $articles->content }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-select" id="type" name="type">
                            <option value="Edukasi" {{ $articles->type === 'Edukasi' ? 'selected' : '' }}>Edukasi</option>
                            <option value="Religi" {{ $articles->type === 'Religi' ? 'selected' : '' }}>Religi</option>
                            <option value="Teknologi" {{ $articles->type === 'Teknologi' ? 'selected' : '' }}>Teknologi</option>
                            <option value="Hiburan" {{ $articles->type === 'Hiburan' ? 'selected' : '' }}>Hiburan</option>
                            <option value="Olahraga" {{ $articles->type === 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="photo" class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
                        @if($articles->photo)
                            <img src="{{ asset('storage/' . $articles->photo) }}" alt="Current Photo" class="img-thumbnail mt-2" style="max-width: 200px;">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
