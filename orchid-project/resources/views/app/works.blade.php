@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        Multiplied<br />
                        By One Hundred
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tp-portfolio-inner-ptb tp-animate-tab pb-90">
    <div class="container">
        <div class="tp-portfolio-tab-content-wrap">
            <div class="tp-portfolio-inner-tab-wrap mb-55 tp_fade_anim" data-delay=".7">
                <nav>
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <!-- Кнопка "All" -->
                        <button
                            class="nav-link active"
                            id="nav-all-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-all"
                            type="button"
                            role="tab"
                            aria-controls="nav-all"
                            aria-selected="true">
                            All
                        </button>

                        <!-- Кнопки для категорий -->
                        @foreach($categories as $category)
                        <button
                            class="nav-link"
                            id="nav-{{ Str::slug($category->name) }}-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#nav-{{ Str::slug($category->name) }}"
                            type="button"
                            role="tab"
                            aria-controls="nav-{{ Str::slug($category->name) }}"
                            aria-selected="false">
                            {{ $category->name }}
                        </button>
                        @endforeach
                    </div>
                </nav>
            </div>

            <div class="tab-content p-relative" id="nav-tabContent">
                <!-- Вкладка "All" -->
                <div
                    class="tab-pane show active"
                    id="nav-all"
                    role="tabpanel"
                    aria-labelledby="nav-all-tab"
                    tabindex="0">
                    <div class="row gx-60">
                        @foreach($works as $work)
                        <div class="col-lg-6">
                            <div class="mg-portfolio-item anim-zoomin-wrap mb-55">
                                <div
                                    class="mg-portfolio-thumb anim-zoomin not-hide-cursor"
                                    data-cursor="View<br>Demo">
                                    <a class="cursor-hide" href="{{ $work->link }}" target="_blank">
                                        @if(is_array($work->preview) && !empty($work->preview[0]))
                                        <img class="w-100" src="{{ \Orchid\Attachment\Models\Attachment::find($work->preview[0])->url }}" alt="{{ $work->name }}" />
                                        @else
                                        <img class="w-100" src="assets/img/portfolio/portfolio-col-2/portfolio.jpg" alt="{{ $work->name }}" />
                                        @endif
                                    </a>
                                </div>
                                <div class="mg-portfolio-content cs-portfolio-content align-items-center flex-wrap justify-content-between">
                                    <h3 class="cs-portfolio-title tp-title-anim fix mr-20 tp-ff-sequel-semi-bold">
                                        <a href="{{ $work->link }}" class="tp-title-text">{{ $work->name }}</a>
                                    </h3>
                                    <p>{{ $work->type }}</p>
                                    <div class="cs-portfolio-tag">
                                        <ul>
                                            @if($work->categories && is_array($work->categories))
                                            @foreach($work->categories as $categoryId)
                                            @if(isset($categoryMap[$categoryId]))
                                            <li><a href="#">{{ $categoryMap[$categoryId] }}</a></li>
                                            @endif
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Вкладки для каждой категории -->
                @foreach($categories as $category)
                <div
                    class="tab-pane"
                    id="nav-{{ Str::slug($category->name) }}"
                    role="tabpanel"
                    aria-labelledby="nav-{{ Str::slug($category->name) }}-tab"
                    tabindex="0">
                    <div class="row gx-60">
                        @foreach($works as $work)
                        @if($work->categories && is_array($work->categories) && in_array($category->id, $work->categories))
                        <div class="col-lg-6">
                            <div class="mg-portfolio-item anim-zoomin-wrap mb-55">
                                <div
                                    class="mg-portfolio-thumb anim-zoomin not-hide-cursor"
                                    data-cursor="View<br>Demo">
                                    <a class="cursor-hide" href="{{ $work->link }}" target="_blank">
                                        @if(is_array($work->preview) && !empty($work->preview[0]))
                                        <img class="w-100" src="{{ \Orchid\Attachment\Models\Attachment::find($work->preview[0])->url }}" alt="{{ $work->name }}" />
                                        @else
                                        <img class="w-100" src="assets/img/portfolio/portfolio-col-2/portfolio.jpg" alt="{{ $work->name }}" />
                                        @endif
                                    </a>
                                </div>
                                <div class="mg-portfolio-content cs-portfolio-content align-items-center flex-wrap justify-content-between">
                                    <h3 class="cs-portfolio-title tp-title-anim fix mr-20 tp-ff-sequel-semi-bold">
                                        <a href="{{ $work->link }}" class="tp-title-text">{{ $work->name }}</a>
                                    </h3>
                                    <p>{{ $work->type }}</p>
                                    <div class="cs-portfolio-tag">
                                        <ul>
                                            @if($work->categories && is_array($work->categories))
                                            @foreach($work->categories as $categoryId)
                                            @if(isset($categoryMap[$categoryId]))
                                            <li><a href="#">{{ $categoryMap[$categoryId] }}</a></li>
                                            @endif
                                            @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection