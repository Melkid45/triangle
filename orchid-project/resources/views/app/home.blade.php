@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
<div class="mp-hero-area mp-hero-spacing">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-12 text-center">
                <div class="mp-hero-content">
                    @if(@isset($hero->title))
                    <h2
                        class="mp-hero-title tp-ff-inter mb-40 tp-char-animation">
                        {!! $hero->soft_title !!}
                    </h2>
                    @endif
                    <div class="mp-hero-btn d-flex flex-wrap gap-2 mb-50">
                        <div
                            class="tp_fade_anim"
                            data-delay=".4"
                            data-fade-from="bottom"
                            data-ease="bounce">
                            <a class="tp-btn mb-10" href="{{route('works')}}">
                                <span>
                                    <span class="text-1">Our works</span>
                                    <span class="text-2">Our works</span>
                                </span>
                                <i>
                                    <svg
                                        width="11"
                                        height="11"
                                        viewBox="0 0 11 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                            fill="currentColor" />
                                    </svg>
                                    <svg
                                        width="11"
                                        height="11"
                                        viewBox="0 0 11 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                            fill="currentColor" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                        <div
                            class="tp_fade_anim"
                            data-delay=".6"
                            data-fade-from="bottom"
                            data-ease="bounce">
                            <a
                                class="tp-btn tp-btn-grey mb-10"
                                href="{{route('contact')}}">
                                <span>
                                    <span class="text-1">Get in Touch</span>
                                    <span class="text-2">Get in Touch</span>
                                </span>
                                <i>
                                    <svg
                                        width="11"
                                        height="11"
                                        viewBox="0 0 11 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                            fill="currentColor" />
                                    </svg>
                                    <svg
                                        width="11"
                                        height="11"
                                        viewBox="0 0 11 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                            fill="currentColor" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(@isset($hero->title))
        <div class="row">
            <div class="col-lg-12">
                <div
                    class="mp-hero-bigtitle-wrap jump-anim text-center pt-10 tp_fade_anim"
                    data-delay=".8"
                    data-fade-from="bottom"
                    data-ease="bounce">
                    <h2 class="mp-hero-bigtitle tp-ff-sequel-semi-bold">
                        {{ $hero->title }}
                    </h2>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@if(@isset($hero->description))
<div class="mp-about-area pt-155 pb-160" data-bg-color="#09090b">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <div class="mp-about-content text-center">
                    <div class="trv-logo trv-logo--light mb-30"></div>

                    <h4
                        class="mp-about-title tp-ff-sequel-semi-bold text-white mb-40">
                        {{ $hero->description }}
                    </h4>
                    <a
                        class="tp-btn ca-footer-btn tp-ff-inter text-white"
                        href="{{route('about')}}">
                        <span>
                            <span class="text-1">Discover Now</span>
                            <span class="text-2">Discover Now</span>
                        </span>
                        <i>
                            <svg
                                width="11"
                                height="11"
                                viewBox="0 0 11 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                    fill="currentColor" />
                            </svg>
                            <svg
                                width="11"
                                height="11"
                                viewBox="0 0 11 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z"
                                    fill="currentColor" />
                            </svg>
                        </i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(@isset($ways->items))
<div id="about" class="about-me-resume-area pt-145 pb-160">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="inner-service-2-wrap about-me-resume-wrap mt-50">
                    @foreach($ways->items as $item)
                    <div
                        class="about-me-resume-item tp_fade_anim"
                        data-delay=".3">
                        <div class="row">
                            @if(@isset($item['years']))
                            <div class="col-lg-2">
                                <div class="about-me-resume-date mb-30">
                                    <span>{{$item['years']}}</span>
                                </div>
                            </div>
                            @endif
                            @if(@isset($item['way']))
                            <div class="col-lg-5">
                                <div class="about-me-resume-info ml-40 mb-30">
                                    <h3
                                        class="about-me-resume-title tp-ff-sequel-semi-bold">
                                        {!! $item['way'] !!}
                                    </h3>
                                </div>
                            </div>
                            @endif
                            @if(@isset($item['description']))
                            <div class="col-lg-5">
                                <div class="about-me-resume-dec ml-50 mb-30">
                                    <p>
                                        {{ $item['description'] }}
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="mg-gallery-area fix">
    <div class="container-fluid container-1886">
        <div class="tp-gallery-wrapper">
            <div class="row gx-30">
                @if(@isset($preview->works1))
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="tp-gallery-item-wrapper" data-speed="-0.1">
                        @foreach($preview->works1 as $work)
                        <div class="tp-gallery-item mb-30">
                            <a href="{{$work->link}}">
                                <img style="aspect-ratio: 1/1;object-fit:cover;" class="w-100"
                                    src="{{ \Orchid\Attachment\Models\Attachment::find($work->preview[0])->url }}"
                                    alt="{{ $work->name }}" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if(@isset($preview->works2))
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="tp-gallery-item-wrapper" data-speed="0.8">
                        @foreach($preview->works2 as $work)
                        <div class="tp-gallery-item mb-30">
                            <a href="{{$work->link}}">
                                <img style="aspect-ratio: 1/1;object-fit:cover;" class="w-100"
                                    src="{{ \Orchid\Attachment\Models\Attachment::find($work->preview[0])->url }}"
                                    alt="{{ $work->name }}" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
                @if(@isset($preview->works3))
                <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="tp-gallery-item-wrapper" data-speed="-0.1">
                        @foreach($preview->works3 as $work)
                        <div class="tp-gallery-item mb-30">
                            <a href="{{$work->link}}">
                                <img style="aspect-ratio: 1/1;object-fit:cover;" class="w-100"
                                    src="{{ \Orchid\Attachment\Models\Attachment::find($work->preview[0])->url }}"
                                    alt="{{ $work->name }}" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="tp-funfact-area pt-150 pb-165">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="tp-funfact-title-wrap mb-30">
                    @if(@isset($facts->soft_title))
                    <span class="tp-section-subtitle">{{$facts->soft_title}}</span>
                    @endif
                    @if(@isset($facts->title))
                    <h2
                        class="tp-section-title reveal-text tp-ff-sequel-semi-bold">
                        {{ $facts->title }}
                    </h2>
                    @endif
                </div>
            </div>
            <div class="col-lg-7">
                <div class="tp-funfact-content-wrap mt-75">
                    @if(@isset($facts->description))
                    <div class="tp-funfact-content-dec mb-80 ml-25">
                        <p>
                            {!! $facts->description !!}
                        </p>
                    </div>
                    @endif
                    @if(@isset($facts->items))
                    <div class="tp-funfact-item-wrap">
                        @foreach($facts->items as $index => $item)
                        <div class="tp-funfact-item d-flex align-items-center">
                            @if(@isset($item['point']))
                            <h2 class="tp-funfact-numbar tp-ff-sequel-semi-bold mr-40 mb-20">
                                <span
                                    data-purecounter-duration="1"
                                    data-purecounter-end="{{$item['point']}}"
                                    class="purecounter">0</span>
                                {{-- Проверяем последний ли элемент --}}
                                @if($loop->last)
                                %
                                @else
                                +
                                @endif
                            </h2>
                            @endif
                            <div class="tp-funfact-info mb-20">
                                @if(@isset($item['soft']))
                                <span>{{$item['soft']}}</span>
                                @endif
                                @if(@isset($item['title']))
                                <h5 class="tp-funfact-info-title tp-ff-sequel-semi-bold">
                                    {{ $item['title'] }}
                                </h5>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection