@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
@if(@isset($job->poster))
<div class="ar-banner-area pt-85">
    <div class="ar-banner-wrap ar-about-us-4">
        <img
            class="w-100"
            src="{{ \Orchid\Attachment\Models\Attachment::find($job->poster[0])->url }}"
            alt="{{$job->name}}"
            data-speed=".8" />
    </div>
</div>
@endif
<section class="tp-career-details-ptb pt-120 pb-100">
    <div class="container container-1230">
        <div class="row">
            <div class="col-lg-8">
                <div class="tp-career-details-wrapper pb-40">
                    <div class="tp-career-details-top pb-80">
                        @if(@isset($job->type))
                        <span class="tp-career-details-subtitle">{{$job->type}}</span>
                        @endif
                        @if(@isset($job->name))
                        <h4 class="tp-career-details-title">{{ $job->name }}</h4>
                        @endif
                        <div
                            class="tp-career-details-info d-flex align-items-center">
                            @if(@isset($job->location))
                            <div class="tp-career-details-info-item">
                                <span>Location:</span>
                                <h5>{{$job->location}}</h5>
                            </div>
                            @endif
                            @if(@isset($job->date))
                            <div class="tp-career-details-info-item">
                                <span>Date:</span>
                                <h5>{{ $job->date }}</h5>
                            </div>
                            @endif
                            @if(@isset($job->employment))
                            <div class="tp-career-details-info-item">
                                <span>Job Type</span>
                                <h5>{{ $job->employment }}</h5>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tp-career-details-wrap">
                        @if(@isset($job->summary_description))
                        <h4 class="tp-career-details-title-2">Job Summary</h4>
                        <p class="pb-50">
                            {{ $job->summary_description }}
                        </p>
                        @endif
                        @if(@isset($job->responsibilities))
                        <h4 class="tp-career-details-title-2">
                            Key Responsibilities
                        </h4>
                        <div class="tp-career-details-list pb-50">
                            <ul>
                                @foreach($job->responsibilities as $item)
                                <li>
                                    {{ $item['point'] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(@isset($job->qualifications))
                        <h4 class="tp-career-details-title-2">Qualifications</h4>
                        <div class="tp-career-details-list pb-50">
                            <ul>
                                @foreach($job->qualifications as $item)
                                <li>
                                    {{ $item['point'] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(@isset($job->perks_description) || @isset(job->perks_list))
                        <h4 class="tp-career-details-title-2">
                            Perks & Benefits
                        </h4>
                        @endif
                        @if(@isset($job->perks_description))
                        <p>
                            {{ $job->perks_description }}
                        </p>
                        @endif
                        @if(@isset($job->perks_list))
                        <div class="tp-career-details-list pb-20">
                            <ul>
                                @foreach($job->perks_list as $item)
                                <li>
                                    {{ $item['point'] }}
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(@isset($job->common_description))
                        <p>
                            {{ $job->common_description }}
                        </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="tp-career-details-sidebar">
                    <div class="tp-career-details-sidebar-box">
                        @if(@isset($job->payment))
                        <div class="tp-career-details-sidebar-heading">
                            <span>Avg. Salary</span>
                            <h4 class="tp-career-details-sidebar-title">
                                {{ $job->payment }}
                            </h4>
                        </div>
                        @endif
                        @if(@isset($job->experience))
                        <div class="tp-career-details-sidebar-item d-flex">
                            <div class="tp-career-details-sidebar-item-icon">
                                <span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none">
                                        <path
                                            d="M1.47656 9.05273L1.62139 12.1098C1.77701 15.3703 1.85481 17.0006 2.95336 18.0003C4.05191 19.0001 5.76545 19.0001 9.19252 19.0001H10.8132C14.2403 19.0001 15.9538 19.0001 17.0524 18.0003C18.1509 17.0006 18.2287 15.3703 18.3844 12.1098L18.5292 9.05273"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M1.32891 8.52513C2.93877 11.5864 6.56977 12.8422 10 12.8422C13.4302 12.8422 17.0612 11.5864 18.6711 8.52513C19.4396 7.06382 18.8577 4.31592 16.965 4.31592H3.03495C1.14233 4.31592 0.560447 7.06382 1.32891 8.52513Z"
                                            stroke="#111013"
                                            stroke-width="1.5" />
                                        <path
                                            d="M10 9.05273H10.0085"
                                            stroke="#111013"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M13.7899 4.31579L13.7062 4.02299C13.2894 2.564 13.0809 1.83451 12.5847 1.41725C12.0885 1 11.4294 1 10.1112 1H9.8896C8.5714 1 7.91229 1 7.41608 1.41725C6.91988 1.83451 6.71145 2.564 6.29459 4.02299L6.21094 4.31579"
                                            stroke="#111013"
                                            stroke-width="1.5" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-career-details-sidebar-item-content">
                                <span>Experience</span>
                                <h5>{{$job->experience}}</h5>
                            </div>
                        </div>
                        @endif
                        @if(@isset($job->hours))
                        <div class="tp-career-details-sidebar-item d-flex">
                            <div class="tp-career-details-sidebar-item-icon">
                                <span><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none">
                                        <circle
                                            cx="10"
                                            cy="10"
                                            r="9"
                                            stroke="#111013"
                                            stroke-width="1.5" />
                                        <path
                                            d="M7.75 7.7499L10.8999 10.8996M13.6 6.3999L9.1 10.8999"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-career-details-sidebar-item-content">
                                <span>Working Hours</span>
                                <h5>{{$job->hours}}</h5>
                            </div>
                        </div>
                        @endif
                        @if(@isset($job->name))
                        <div class="tp-career-details-sidebar-item d-flex">
                            <div class="tp-career-details-sidebar-item-icon">
                                <span><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="20"
                                        height="20"
                                        viewBox="0 0 20 20"
                                        fill="none">
                                        <circle
                                            cx="1.35"
                                            cy="1.35"
                                            r="1.35"
                                            transform="matrix(1 0 0 -1 13.6016 6.40039)"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M1.69681 9.22954C0.793976 10.2379 0.774553 11.7591 1.60315 12.8293C3.2474 14.9529 5.04706 16.7526 7.17069 18.3969C8.24086 19.2254 9.76214 19.206 10.7705 18.3032C13.5081 15.852 16.0152 13.2903 18.4347 10.4752C18.6739 10.1968 18.8235 9.85571 18.8571 9.49027C19.0056 7.87419 19.3107 3.2182 18.0462 1.95377C16.7818 0.68933 12.1258 0.99439 10.5097 1.14289C10.1443 1.17647 9.80316 1.3261 9.52484 1.5653C6.70971 3.98481 4.14802 6.4919 1.69681 9.22954Z"
                                            stroke="#111013"
                                            stroke-width="1.5" />
                                        <path
                                            d="M5.5 11.8003L8.2 14.5003"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-career-details-sidebar-item-content">
                                <span>Job Category</span>
                                <h5>{{$job->name}}</h5>
                            </div>
                        </div>
                        @endif
                        @if(@isset($job->hours))
                        <div class="tp-career-details-sidebar-item d-flex">
                            <div class="tp-career-details-sidebar-item-icon">
                                <span><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="18"
                                        height="19"
                                        viewBox="0 0 18 19"
                                        fill="none">
                                        <path
                                            d="M14.0506 1V2.68423M3.94531 1V2.68423"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M1 9.62565C1 5.95631 1 4.12163 2.05442 2.98172C3.10883 1.8418 4.80589 1.8418 8.2 1.8418H9.8C13.1941 1.8418 14.8912 1.8418 15.9456 2.98172C17 4.12163 17 5.95631 17 9.62565V10.0581C17 13.7274 17 15.5621 15.9456 16.702C14.8912 17.8419 13.1941 17.8419 9.8 17.8419H8.2C4.80589 17.8419 3.10883 17.8419 2.05442 16.702C1 15.5621 1 13.7274 1 10.0581V9.62565Z"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path
                                            d="M1.42188 6.05273H16.5798"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-career-details-sidebar-item-content">
                                <span>Working Days</span>
                                <h5>{{ $job->days }}</h5>
                            </div>
                        </div>
                        @endif
                        @if(@isset($job->date))
                        <div class="tp-career-details-sidebar-item d-flex">
                            <div class="tp-career-details-sidebar-item-icon">
                                <span><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="22"
                                        height="22"
                                        viewBox="0 0 22 22"
                                        fill="none">
                                        <circle
                                            cx="11"
                                            cy="11"
                                            r="10"
                                            stroke="#111013"
                                            stroke-width="1.5" />
                                        <path
                                            d="M8.5 8.5L11.9999 11.9996M15 7L10 12"
                                            stroke="#111013"
                                            stroke-width="1.5"
                                            stroke-linecap="round"
                                            stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="tp-career-details-sidebar-item-content">
                                <span>Deadline</span>
                                <h5>{{ $job->date }}</h5>
                            </div>
                        </div>
                        @endif
                        <div class="tp-career-details-sidebar-btn">
                            <a href="/career-form/{{ Str::slug($job->name) }}-{{ $job->id }}">Apply for the Job</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection