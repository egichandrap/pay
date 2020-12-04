<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>Hello, {{Auth::user()->name}}</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="{{ Request::is('prepaired') ? 'active' : '' }}">
            <a href="{{ route('prepaired') }}">Prepaired Balance</a>
          </li>
          <li class="{{ Request::is('product') ? 'active' : '' }}">
            <a href="{{ route('product') }}">Product Page</a>
          </li>
          <li class="{{ Request::is('historyOrder') ? 'active' : '' }}">
            <a href="{{ route('historyOrder') }}">History</a>
          </li>
          <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </li>
          <form id="logout-form" class="dropdown-item" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form> 
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->