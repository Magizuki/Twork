{{-- Mengatur link dan pilihan menu header (navbar) --}}
<div class="collapse navbar-collapse d-inline-block" id="navbarNav" >

    @guest
        {{-- Jika guest yang mengakses halaman --}}
        <a class="navbar-brand" style="color: rgb(231, 231, 22); font-family: 'Oswald', sans-serif;" href=" {{ route('root') }}">TWORK</a>
    @else
        {{-- Jika admin dan member yang mengakses halaman --}}
        <a class="navbar-brand" style="color: rgb(231, 231, 22); font-family: 'Oswald', sans-serif;" href=" {{ route('home') }}">TWORK</a>
    @endguest

    {{-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button> --}}

    <ul class="navbar-nav ml-auto">

        @guest
          {{-- Jika guest yang mengakses halaman --}}
          <li class="nav-item">
              <a class="nav-link text-white js-scroll-trigger mr-3" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link text-white js-scroll-trigger ml-3" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
        @else


        @endguest

    </ul>

</div>