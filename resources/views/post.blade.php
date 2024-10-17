@extends('templates.app', ['title' => 'Create Blog'])

@section('content-dinamis')
    <!-- Page content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Post content-->
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1">Welcome to Blog Post!</h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted by {{ $post->publisher }}</div>
                        <!-- Post categories-->
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                    </header>
                    <!-- Preview image figure-->
                    <figure class="mb-4">
                        <img class="img-fluid rounded" id="post-image" src="{{ asset($post->photo) }}" alt="..." />
                    </figure>
                    <!-- Post content-->
                    <section class="mb-5">
                        {{ $post->content }}
                    </section>
                </article>
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

    <style>
        #post-image {
            max-width: 100%;
            height: auto;
            max-height: 400px; /* Adjust this value to your preferred maximum height */
            object-fit: cover;
        }
    </style>
@endsection
