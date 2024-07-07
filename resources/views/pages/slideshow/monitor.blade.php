@extends('layouts.slideshow')


@section('content')
    <!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-end align-items-center ukuran cover">

    <div id="heroCarousel" data-bs-interval="10000" class="carousel carousel-fade px-5" data-bs-ride="carousel">

      <!-- Slide 1 -->
      @foreach ($slideshow as $item)

      <div class="carousel-item @if ($loop->iteration==1)
          active
      @endif">
        <div  style="@if (strlen($item->deskripsi) < 300)
            font-size: 19pt
        @endif" class="carousel-container">
            @if (!empty($item->gambar))
            <h2 class="animate__animated animate__fadeInDown mytext">
                {{ $item->judul }}
            </h2>
            <a href="{{ url('gambar/slideshow', [$item->gambar]) }}" target="_blank">
                <img class="animate__animated animate__fadeInDown mt-3 gambarku" style="border-radius: 15px" src="{{ url('gambar/slideshow', [$item->gambar]) }}" width="100%" alt="">
            </a>

                <br>
                <br>
                <br>
                <br>
                @else

                <h2 class="animate__animated animate__fadeInDown mytext">
                    {{ $item->judul }}
                </h2>

                    <?php
                        echo strip_tags(htmlspecialchars_decode($item->deskripsi),'<img><ul><li><ol><strong><i><u><center><b></b><h1><h2><h3><h4><h5><a><table><tr><td><th><div><p></p>');
                    ?>

                    @if (strlen($item->deskripsi) > 400)
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        @else
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                    @endif
            @endif





        </div>
      </div>
      @endforeach





      <a class="carousel-control-prev" href="#heroCarousel" id="prev" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" id="next" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" style="z-index: 800" preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255, 123, 0, 0.427)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255, 123, 0, 0.508)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="rgba(0, 204, 255, 0.845)">
      </g>
    </svg>

</section><!-- End Hero -->
@endsection

<style>
    .coba {
        color: rgba(0, 204, 255, 0.945);
    }
</style>
