<div id="wrapper">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="top-area">
            <div class="container">
                <div class="row">
                    
                    @include('layouts.notification')

                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <p class="bold text-right">Call us now 0808 289 4764</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container navigation">

            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="img/logos/jorax_1.png" alt="" width="100" height="50" />
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a class="mouse-p" onclick="navPage('{{url('/welcome')}}')">home</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/blog')}}')">blog</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#intro')}}')">about us</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#service')}}')">service</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#facilities')}}')">products</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#doctor')}}')">pharmacists</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#testimonial')}}')">testimonials</a></li>
                    <li><a class="mouse-p" onclick="navPage('{{url('/#partner')}}')">contact us</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">More<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @guest
                                <li class="nav-item">
                                    <a class="mouse-p" onclick="navPage('{{route('login') }}')">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="mouse-p" onclick="navPage('{{route('register') }}')">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="dropdown-item mouse-p" onclick="navPage('{{url('/admin')}}')">
                                        {{ Auth::user()->name }}
                                    </a>
                                    <a class="dropdown-item mouse-p"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            @endguest
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>

<script>
    // Go to page
    function navPage(params) {
        window.location=params;
    }
</script>