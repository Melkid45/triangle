@extends('layouts.app')


@section('title', 'TriangleVision - Digital content Agency!')
@section('content')
<div class="tp-pd-2-ptb pt-140">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-pd-2-top pb-50 text-center">
                    @if(@isset($contact->title))
                    <h3
                        class="tp-section-title fs-92 tp-ff-sequel-semi-bold tp_fade_anim"
                        data-delay=".5">
                        {{ $contact->title }}
                    </h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div id="contact" class="tp-contact-area pt-80 pb-110">
    <div class="container">
        <div class="tp-contact-bg">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="tp-contact-info mb-30">
                        @if(@isset($contact->email))
                        <div class="mb-30">
                            <a
                                class="tp-contact-mail"
                                href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </div>
                        @endif
                        @if(@isset($contact->company))
                        <div class="tp-contact-address mb-30">
                            <h4>Company</h4>
                            <a>{{ $contact->company }}</a>
                        </div>
                        @endif
                        @if(@isset($contact->register))
                        <div class="tp-contact-address mb-30">
                            <h4>Register code</h4>
                            <a>{{ $contact->register }}</a>
                        </div>
                        @endif
                        @if(@isset($contact->van))
                        <div class="tp-contact-address mb-30">
                            <h4>VAT number</h4>
                            <a>{{ $contact->van }}</a>
                        </div>
                        @endif
                        @if(@isset($contact->address))
                        <div class="tp-contact-address mb-30">
                            <h4>Address</h4>
                            <a
                                href="{{ $contact->address_link }}"
                                class="common-underline"
                                target="_blank">{{ $contact->address }}</a>
                        </div>
                        @endif
                        @if(@isset($contact->phone))
                        <div class="tp-contact-address">
                            <h4>Phone number</h4>
                            @php
                            $newPhone = str_replace(array('+',' ', '(', ')', '_', '-'), array('','','','','',''), $contact->phone);
                            @endphp
                            <a
                                href="tel:+{{$newPhone}}"
                                class="common-underline"
                                target="_blank">{{ $contact->phone }}</a>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="tp-contact-form-wrap ml-95 mb-30">
                        <form id="contact-form" action="{{ route('contact.send') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="tp-contact-form-input mb-20">
                                        <label>Full name*</label>
                                        <input name="name" type="text" required
                                            placeholder="John Doe"
                                            class="@error('name') error @enderror" />
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="tp-contact-form-input mb-20">
                                        <label>Email address*</label>
                                        <input name="email" type="email" required
                                            placeholder="john@example.com"
                                            class="@error('email') error @enderror" />
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tp-contact-form-input mb-20">
                                        <label>Website link</label>
                                        <input name="website" type="url"
                                            placeholder="https://example.com"
                                            class="@error('website') error @enderror" />
                                        <span class="error-message"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="tp-contact-form-input mb-20">
                                        <label>How Can We Help You*</label>
                                        <textarea name="message" required
                                            placeholder="Please describe how we can assist you..."
                                            rows="6"
                                            class="@error('message') error @enderror"></textarea>
                                        <span class="error-message"></span>
                                    </div>
                                    <div class="tp-contact-form-btn">
                                        <button type="submit"
                                            class="tp-btn tp-btn-xxl tp-btn-red d-inline-flex align-items-center w-100"
                                            id="submit-btn">
                                            <span>
                                                <span class="text-1">Send Message</span>
                                                <span class="text-2">Send Message</span>
                                            </span>
                                        </button>
                                        <p id="response" style="margin-top: 10px;" class="mt-5"></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection