@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
@if(@isset($about->title))
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        {!! $about->title !!}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(@isset($about->images))
<div class="about-me-slider-area tp-item-anime-area pt-80 p-relative">
    <div class="swiper about-me-slider-active">
        <div class="swiper-wrapper">
            @foreach($about->images as $image)
            <div class="swiper-slide">
                <div class="about-me-slider-thumb tp-item-anime marque">
                    <img
                        class="w-100"
                        src="{{ \Orchid\Attachment\Models\Attachment::find($image)->url }}"
                        alt="" />
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endif
<div class="tp-about-area pt-145">
    <div class="container">
        @if(@isset($slogan->description))
        <div class="row align-items-end">
            <div class="col-xxl-10 col-xl-12">
                <div class="tp-about-title-wrap mb-30">
                    <h2 class="tp-section-title reveal-text">
                        {!! $slogan->description !!}
                    </h2>
                </div>
            </div>
        </div>
        @endif
        <div class="tp-about-border mt-20 pt-55">
            <div class="row">
                <div class="col-lg-4">
                    <div class="tp-about-subtitle-wrap mb-30">
                        <span class="tp-about-subtitle text-uppercase">
                            <svg
                                width="23"
                                height="20"
                                viewBox="0 0 23 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 1V13.8182H20.7232"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round" />
                                <path
                                    d="M23 13.8182L15.0349 19.1718L15.0349 8.46456L23 13.8182Z"
                                    fill="currentColor" />
                            </svg>
                            About Us
                        </span>
                    </div>
                </div>
                @if(@isset($slogan->items))
                <div class="col-lg-8">
                    <div class="tp-about-thumb-wrap ml-75">
                        <div class="row gx-80">
                            @foreach($slogan->items as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="tp-about-item anim-zoomin-wrap mb-40">
                                    @if(@isset($item['photo']))
                                    <div class="mb-35">
                                        <div class="tp-about-thumb fix anim-zoomin">
                                            <img
                                                data-speed=".8"
                                                src="{{ \Orchid\Attachment\Models\Attachment::find($item['photo'][0])->url }}"
                                                alt="" />
                                        </div>
                                    </div>
                                    @endif
                                    <div class="tp-about-content">
                                        @if(@isset($item['title']))
                                        <h3 class="tp-about-title mb-10">
                                            {{ $item['title'] }}
                                        </h3>
                                        @endif
                                        @if(@isset($item['description']))
                                        <p class="tp-about-dec">
                                            {!! $item['description'] !!}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="ca-brand-area pt-95 pb-160">
    <div class="swiper cs-brand-slider-active">
        <div class="swiper-wrapper slide-transtion">
            @foreach($partners->partner as $item)
            <div class="swiper-slide">
                <a href="#" class="cs-brand-logo">
                    <img src="{{ \Orchid\Attachment\Models\Attachment::find($item)->url }}" alt="Zow" />
                </a>
            </div>
            @endforeach
            @foreach($partners->partner as $item)
            <div class="swiper-slide">
                <a href="#" class="cs-brand-logo">
                    <img src="{{ \Orchid\Attachment\Models\Attachment::find($item)->url }}" alt="Zow" />
                </a>
            </div>
            @endforeach
            @foreach($partners->partner as $item)
            <div class="swiper-slide">
                <a href="#" class="cs-brand-logo">
                    <img src="{{ \Orchid\Attachment\Models\Attachment::find($item)->url }}" alt="Zow" />
                </a>
            </div>
            @endforeach
            @foreach($partners->partner as $item)
            <div class="swiper-slide">
                <a href="#" class="cs-brand-logo">
                    <img src="{{ \Orchid\Attachment\Models\Attachment::find($item)->url }}" alt="Zow" />
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection