<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
     <h1><a class="navbar-brand" href="{{url('/')}}">E-Shop</a></h1> 1
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('category')}}">Categoties</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('cart')}}">Cart <i class="fa fa-shopping-cart"></i></a>
          </li>
     
          @guest
              @if(Route::has('login'))
                <li class="navbar-item">
                    <a class="nav-link" href="{{route('login')}}">{{__('login')}}</a>
                </li>
              @endif
              @if(Route::has('login'))
                <li class="navbar-item">
                    <a class="nav-link" href="{{route('register')}}">{{__('register')}}</a>
                </li>
              @endif
              @else
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="collapse">
                    {{Auth::user()->name}}    
                  </a> 
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li>
                      <a class="dropdown-item" href="#">My Profile</a>
                  </li>     
              <li>
              <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault">
                {{__('logout')}}
            </a>
            <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-done">
                @csrf
            </form>
          </li>
          
        </ul>
    </li>
    @endguest
</ul>
      </div>
    </div>
  </nav>