@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
@if(@isset($job->name))
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        {{ $job->name }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="tp-application-aera pt-80 pb-140">
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="tp-contact-form-wrap tp-application-form-wrap">
                    <form id="job-application-form" action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_title" value="{{ $job->name }}">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Your Name*</label>
                                    <input name="name" type="text" required
                                        placeholder="John Doe"
                                        class="form-control @error('name') error @enderror" />
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Your Email address*</label>
                                    <input name="email" type="email" required
                                        placeholder="john@example.com"
                                        class="form-control @error('email') error @enderror" />
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Why you decided to apply here and why should we select you?*</label>
                                    <textarea name="why_apply" required
                                        placeholder="Tell us why you're interested in this position and what makes you a great candidate..."
                                        rows="4"
                                        class="form-control @error('why_apply') error @enderror"></textarea>
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Tell us about a project that you worked on and felt proud of IT.</label>
                                    <textarea name="proud_project"
                                        placeholder="Describe a project you're proud of and your role in it..."
                                        rows="4"
                                        class="form-control @error('proud_project') error @enderror"></textarea>
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Share your portfolio (Behance, Dribbble, etc)*</label>
                                    <textarea name="portfolio" required
                                        placeholder="https://behance.net/yourprofile
https://dribbble.com/yourprofile
https://github.com/yourprofile"
                                        rows="3"
                                        class="form-control @error('portfolio') error @enderror"></textarea>
                                    <small style="color: #666; display: block; margin-top: 5px;">Enter one link per line</small>
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tp-contact-form-input mb-20">
                                    <label>Your current salary & what are your salary expectations?*</label>
                                    <textarea name="salary_expectations" required
                                        placeholder="Current: $XX,XXX
Expected: $XX,XXX - $XX,XXX"
                                        rows="3"
                                        class="form-control @error('salary_expectations') error @enderror"></textarea>
                                    <span class="error-message"></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tp-application-form-btn d-flex justify-content-between">
                                    <div class="tp-application-upload mb-15">
                                        <span>Upload your CV *</span>
                                        <input type="file" name="cv" id="cv-upload" required
                                            accept=".pdf,.doc,.docx" />
                                        <small style="color: #666; display: block; margin-top: 5px;">Accepted formats: PDF, DOC, DOCX (Max 5MB)</small>
                                        <span class="error-message"></span>
                                        <div id="file-preview" style="margin-top: 10px;"></div>
                                    </div>
                                    <div class="tp-application-btn mb-15 mt-10">
                                        <button class="tp-btn" type="submit" id="submit-job-btn">
                                            <span>
                                                <span class="text-1">Submit Now</span>
                                                <span class="text-2">Submit Now</span>
                                            </span>
                                            <i>
                                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.21967 9.40717C-0.0732232 9.70006 -0.0732232 10.1749 0.21967 10.4678C0.512563 10.7607 0.987437 10.7607 1.28033 10.4678L0.21967 9.40717ZM10.6875 0.75C10.6875 0.335786 10.3517 2.97145e-09 9.9375 1.50485e-07L3.1875 -2.70983e-07C2.77329 -2.70983e-07 2.4375 0.335786 2.4375 0.75C2.4375 1.16421 2.77329 1.5 3.1875 1.5H9.1875V7.5C9.1875 7.91421 9.52329 8.25 9.9375 8.25C10.3517 8.25 10.6875 7.91421 10.6875 7.5L10.6875 0.75ZM0.75 9.9375L1.28033 10.4678L10.4678 1.28033L9.9375 0.75L9.40717 0.21967L0.21967 9.40717L0.75 9.9375Z" fill="currentColor" />
                                                </svg>
                                            </i>
                                        </button>
                                    </div>
                                </div>
                                <p id="job-response" class="mt-3" style="margin-top: 10px;"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection