@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
@if(@isset($faq->title))
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        {{ $faq->title }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if(@isset($faq->items))
<div id="faq" class="tp-faq-area pt-80 pb-130">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div
                    class="tp-faq tp-service-details-faq-two tp-service-details-faq mb-30">
                    <div class="accordion" id="accordionExample2">
                        <div class="tp-faq tp-service-details-faq-two tp-service-details-faq mb-30">
                            <div class="accordion" id="accordionExample2">
                                @foreach($faq->items as $index => $item)
                                @php
                                $itemIndex = $index;
                                $itemId = 'faq' . ['One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten'][$index] ?? ('Item' . $itemIndex);
                                @endphp

                                <div class="tp-faq-item">
                                    <h2 class="accordion-header">
                                        <button
                                            class="tp-faq-button {{ $index === 0 ? '' : 'collapsed' }}"
                                            type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#{{ $itemId }}"
                                            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                            aria-controls="{{ $itemId }}">
                                            <span>{{ str_pad($itemIndex, 2, '0', STR_PAD_LEFT) }}</span>{{ $item['title'] }}
                                        </button>
                                    </h2>
                                    <div
                                        id="{{ $itemId }}"
                                        class="tp-faq-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                        data-bs-parent="#accordionExample2">
                                        <div class="tp-faq-body">
                                            <p>
                                                {!! nl2br(e($item['description'])) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection