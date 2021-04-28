


<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Admin Panel
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#"
          id="navbarScrollingDropdown" role="button" data-toggle="dropdown"
          aria-expanded="false">
          <span class="fa fa-user"></span>@guest Login @else  {{ Auth::guard('admin')->user()->name }}
          @endguest
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
@guest
<li><a class="dropdown-item" href="{{route('admin.login')}}">Login</a></li>
            <li><a class="dropdown-item" href="{{route('admin.register')}}">Register</a></li>

   @else

            <li><a class="dropdown-item" href="{{route('admin.home')}}">Account</a></li>

             <li><hr class="dropdown-divider"></li>
            <li>
             <a class="dropdown-menu dropdown-item dropdown-menu-right" aria-labelledby="navbarDropdown">
             <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                                    </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </a>

            </li>

@endguest

          </ul>
        </li>
                    </ul>


                </div>
            </div>
        </nav>
