@extends('templates.app',['title'=>'Landing || Blog'])

@section("content-dinamis")

<style>
   /* styles.css */

/* Hero Section Customization */
.hero {
    background: url('https://via.placeholder.com/1500x800') no-repeat center center; 
    background-size: cover;
    height: 100vh; /* Tinggi Hero Section */
}

/* About Section Customization */
#about {
    background-color: #f8f9fa; /* Warna latar belakang yang lebih terang */
}

/* Footer Customization */
footer {
    background-color: #343a40; /* Warna latar belakang footer */
}

    }
  </style>

<body>

  <section class="hero d-flex align-items-center text-center text-white" style="background-image: url('https://via.placeholder.com/1500x800'); height: 100vh; background-size: cover; background-position: center;">
    <div class="container">
        <h1 class="display-4">Welcome to Article Web</h1>
        <p class="lead">Discover insights, news, and stories from the world of articles.</p>
        <a href="#about" class="btn btn-light btn-lg mt-3">Learn More</a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5">
    <div class="container text-center">
        <h2 class="mb-4">About Us</h2>
        <p>At ArticleWeb, we bring together the latest insights and compelling stories from across various domains. Whether you're here to read or to contribute, our platform welcomes writers and readers alike to engage and explore knowledge.</p>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <p>&copy; 2024 ArticleWeb. All rights reserved.</p>
        <div>
            <a href="#" class="text-white me-3">Facebook</a>
            <a href="#" class="text-white me-3">Twitter</a>
            <a href="#" class="text-white">Instagram</a>
        </div>
    </div>
</footer>

</body>


@endsection