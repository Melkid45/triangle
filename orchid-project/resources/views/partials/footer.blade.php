<footer>
    <div
        class="tp-footer-area mp-footer-style cs-footer-style pt-105"
        data-bg-color="#09090b">
        <div class="container">
            <div class="row">
                <div class="col-xxl-3 col-xl-3 col-lg-4">
                    <div
                        class="tp-footer-logo mb-40 tp_fade_anim"
                        data-delay=".4">
                        <a href="{{route('home')}}">
                            <div class="trv-logo trv-logo--light"></div>
                        </a>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-8">
                    <div
                        class="tp-footer-widget tp-footer-link cs-footer-widget-1 mb-30 tp_fade_anim"
                        data-delay=".5">
                        <h5 class="tp-footer-subtitle text-white mb-25">
                            Quick links
                        </h5>
                        <div class="tp-hero-social">
                            <a href="{{route('about')}}">About</a>
                            <a href="{{route('works')}}">Our works</a>
                            <a href="{{route('faq')}}">Questions & Answers</a>
                            <a href="{{route('career')}}">Career</a>
                            <a href="{{route('contact')}}">Get in Touch</a>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 offset-xxl-1 col-xl-4 offset-xl-1">
                    @if(@isset($contact->email))
                    <div
                        class="tp-footer-widget cs-footer-widget-2 mb-30 tp_fade_anim"
                        data-delay=".6">
                        <span class="tp-footer-dec text-white">Searching for exceptional talents?</span>
                        <h4 class="tp-footer-email tp-ff-sequel-roman text-white">
                            <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                        </h4>
                    </div>
                    @endif
                </div>
            </div>
            @if(@isset($contact->footer_title))
            <div
                class="tp-footer-copyright-area tp-about-border mt-65 pt-30 pb-30">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div
                            class="tp-title-anim no-animrtion text-center fix pb-15 tp_fade_anim"
                            data-delay=".4"
                            data-fade-from="bottom"
                            data-ease="bounce">
                            <h2
                                class="tp-title-anim-inner cs-footer-bigtitle justify-content-center tp-ff-sequel-heavy-disp text-uppercase text-white">
                                <a class="tp-title-text" href="{{route('contact')}}">{{$contact->footer_title}}</a>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if(@isset($contact->copyright))
            <div class="tp-footer-copyright-area tp-about-border pt-30 pb-10">
                <div class="row align-items-center">
                    <div class="col-xl-12 text-center">
                        <div class="tp-footer-copyright-wrap mb-20">
                            <span class="tp-footer-copyright">
                                {{ $contact->copyright }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</footer>