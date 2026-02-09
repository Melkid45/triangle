<header>
  <div class="tp-header-area tp-header-spacing header-transparent">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-6">
          <div class="tp-header-logo">
            <a href="{{route('home')}}">
              <div class="trv-logo trv-logo--dark"></div>
            </a>
          </div>
        </div>
        <div class="col-xl-6 d-none">
          <div class="tp-main-menu d-flex justify-content-center">
            <nav class="tp-mobile-menu-active">
              <ul>
                <li>
                  <a href="{{route('home')}}">Home</a>
                </li>
                <li>
                  <a href="{{route('about')}}">About</a>
                </li>
                <li>
                  <a href="{{route('works')}}">Our works</a>
                </li>
                <li>
                  <a href="{{route('faq')}}">Questions & Answers</a>
                </li>
                <li>
                  <a href="{{route('career')}}">Career</a>
                </li>
                <li>
                  <a href="{{route('contact')}}">Get in Touch</a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-6">
          <div
            class="tp-header-right d-flex justify-content-end align-items-center">
            <button
              class="hamburger-open-btn tp-menu-bar tp-header-sidebar-btn ml-10">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <button
    id="header-sticky"
    class="hamburger-open-btn tp-header-sidebar-btn hamburger-sticky-menu">
    <span></span>
    <span></span>
  </button>
</header>