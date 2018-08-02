@section('header')
 <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top back-hight">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{URL::asset('home')}}">
          <img src="img/logo.png" width="100%" height="100%" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
              @guest
            <li class="nav-item active">
            {{--   <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}
                <span class="sr-only">(current)</span>
              </a> --}}
            </li>
            @else
            <li class="nav-item header-plus active smart-finder-plus">
                <a class="nav-link " href="#">SMARTFINDER PLUS
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item header-plus active smart-finder-pro">
                <a class="nav-link " href="#">SMARTFINDER PRO
                    <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            
            @endguest
          </ul>
        </div>
      </div>
    </nav>

@endsection
