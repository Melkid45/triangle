@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
@if(@isset($careerBlock->title))
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        {!! $careerBlock->title !!}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(@isset($career))
<section class="tp-career-opening-ptb pt-80 pb-160">
    <div class="container container-1230">
        <div class="tp-career-opening-item">
            <div class="row">
                <div class="col-lg-4">
                    <div class="tp-career-opening-heading">
                        <span>Position</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tp-career-opening-heading">
                        <span>Roles</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="tp-career-opening-heading">
                        <span>Type</span>
                    </div>
                </div>
            </div>
        </div>
        @foreach($career as $job)
        <div class="tp-career-opening-item ptb">
            <div class="row align-items-center">
                @if(@isset($job->name))
                <div class="col-lg-4">
                    <div class="tp-career-opening-title">
                        <h4 class="tp-career-opening-title-name">
                            {{ $job->name }}
                        </h4>
                    </div>
                </div>
                @endif
                @if(@isset($job->role))
                <div class="col-lg-4">
                    <div class="tp-career-opening-role">
                        <span>{{$job->role}}</span>
                    </div>
                </div>
                @endif
                <div class="col-lg-4">
                    <div
                        class="tp-career-opening-Type d-flex justify-content-between align-items-center">
                        @if(@isset($job->employment))
                        <span>{{$job->employment}}</span>
                        @endif
                        <div class="tp-career-opening-btn">
                            <a class="tp-btn" href="/career/{{ Str::slug($job->name) }}-{{ $job->id }}">
                                <span>
                                    <span class="text-1">Apply Now</span>
                                    <span class="text-2">Apply Now</span>
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
        @endforeach
    </div>
</section>
@endif
@endsection