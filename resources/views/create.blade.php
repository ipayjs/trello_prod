@extends('templates.app', ['title' => 'Create Blog'])

@section('content-dinamis')

    <body>
        <div class="container mt-5">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Add New Blog Post</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('article.add.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Publisher</label>
                            <input type="text" class="form-control" id="publisher" name="publisher"
                                value="{{ old('publisher') }}">
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title') }}">
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="5" value="{{ old('content') }}"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select class="form-select" id="type" name="type">
                                <option value="Edukasi" {{ old('type') == 'edukasi' ? 'selected' : '' }}>Edukasi</option>
                                <option value="Religi" {{ old('type') == 'religi' ? 'selected' : '' }}>Religi</option>
                                <option value="Teknologi" {{ old('type') == 'teknologi' ? 'selected' : '' }}>Teknologi
                                </option>
                                <option value="Hiburan" {{ old('type') == 'hiburan' ? 'selected' : '' }}>Hiburan</option>
                                <option value="Olahraga" {{ old('type') == 'olahraga' ? 'selected' : '' }}>Olahraga</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label" value = "{{ old('photo') }}">Upload Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                                >
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
@endsection
