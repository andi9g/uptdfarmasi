@extends('layouts.slideshow')


@section('tujuan')
<a href="{{ url('/', []) }}" class="badge bg-primary border-0" id="link">
    Visi & Misi
</a>
@endsection

@section('content')
<section id="testimonials" class="testimonials">
    <div class="container">


      <div class="testimonials-slider swiper swiper-initialized swiper-horizontal swiper-backface-hidden aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper" id="swiper-wrapper-1b7f1847768fca84" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-471px, 0px, 0px); transition-delay: 0ms;">


            @foreach ($tanamanherbal as $item)
                <div class="swiper-slide" role="group" aria-label="3 / 5" style="width: 451px;height: auto; margin-right: 20px;" data-swiper-slide-index="1">
                    <div class="testimonial-item bg-light" style="border-radius: 15px;min-height: 620px;box-shadow:2px 3px 2px rgba(169, 169, 169, 0.671);border-top:3px solid rgba(255, 136, 0, 0.808)">
                        <h3>{{ $item->namatanamanherbal }}</h3>
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{ $item->namalain }}
                            <i class="bx bxs-quote-alt-right quote-icon-left pl-2"></i>
                        </p>
                        <img src="{{ url('gambar/tanamanherbal', [$item->gambar]) }}" class="mt-2" style="max-height: 140px;border-radius: 10px;border:1px solid lightgrey" alt="">
                        <p style="line-height: 19px">
                            <small>
                                {{ $item->deskripsi }}
                            </small>
                        </p>

                        <table class="table-striped table table-hover tableku2">
                            <tr>
                                <th colspan="2" style="background: rgb(141, 255, 141)" align="center">{{ $item->klasifikasi }}</th>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">superkerajaan</td>
                                <td valign="top" align="left">{{ $item->superkerajaan }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">kerajaan</td>
                                <td valign="top" align="left">{{ $item->kerajaan }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">divisi</td>
                                <td valign="top" align="left">{{ $item->divisi }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">ordo</td>
                                <td valign="top" align="left">{{ $item->ordo }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">famili</td>
                                <td valign="top" align="left">{{ $item->famili }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">genus</td>
                                <td valign="top" align="left">{{ $item->genus }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">spesies</td>
                                <td valign="top" align="left">{{ $item->spesies }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">khasiat</td>
                                <td valign="top" align="left">{{ $item->khasiat }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">namadaerah</td>
                                <td valign="top" align="left">{{ $item->namadaerah }}</td>
                            </tr>
                            <tr>
                                <td width="38%" class="text-capitalize" valign="top" align="left">Bagian yang Digunakan</td>
                                <td valign="top" align="left">{{ $item->bagianyangdigunakan }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

            @endforeach


        </div>
        <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal" style="">
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 1"></span>
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 2" aria-current="true"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span>
            <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span>
        </div>
      <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

    </div>
  </section>

@endsection

