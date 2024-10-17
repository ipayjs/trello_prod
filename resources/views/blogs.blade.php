@extends('templates.app', ['title' => 'Content Blog'])

@section('content-dinamis')

<style>
    .custom-img {
        width: 100%; /* Atur lebar gambar */
        height: 200px; /* Atur tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Pastikan gambar tidak terdistorsi */
    }
</style>

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Welcome to Blog Home!</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://i.pinimg.com/originals/02/01/1e/02011ec8554277b8c70bf22fb192123c.gif"
                        alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2023</div>
                    <h2 class="card-title">Featured Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid
                        atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero
                        voluptate voluptatibus possimus, veniam magni quis!</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>

            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($articles as $article)
                    <!-- Blog post-->
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <img src="{{ asset($article->photo) }}" alt="{{ $article->title }}" class="img-fluid custom-img" />
                            <div class="card-body">
                                <div class="small text-muted">{{ $article->publisher }}</div>
                                <h2 class="card-title h4">{{ $article->title }}</h2>
                                <p class="card-text">{{ Str::limit($article->content, 20) }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a class="btn btn-primary" href="{{ route('articles.post', $article->id) }}">Read more →</a>
                                    <div>
                                        <a href="{{ route('articles.edit', $article['id']) }}" 
                                           class="btn btn-primary btn-sm me-2 shadow-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm shadow-sm" 
                                           onclick="showModal('{{ $article->id }}', '{{ $article->title }}')">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form id="form-delete-user" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Hapus Artikel</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus artikel "<span id="nama-artikel"></span>"?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Pagination-->
            <nav aria-label="Pagination">
                <div class="d-flex justify-content-end mt-3">
                    {{ $articles->links() }}
                </div>
            </nav>
        </div>

        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Informational text widget-->
            <div class="card mb-4">
                <div class="card-header">Informasi</div>
                <div class="card-body">
                    <p>Selamat datang di blog kami! Temukan artikel terbaru dan berguna tentang berbagai topik di sini.</p>
                    <p>Jelajahi berbagai kategori dan pastikan untuk mengikuti pembaruan terbaru!</p>
                </div>
            </div>
            
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div> 
        </div>
    </div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Core theme JS-->
<script src="js/scripts.js"></script>

@push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModal(id, title) {
            let action = '{{ route('articles.destroy', ':id') }}';
            action = action.replace(':id', id);
            $('#form-delete-user').attr('action', action);
            $('#nama-artikel').text(title);
            $('#exampleModal').modal('show');
        }
    </script>
@endpush

@endsection
