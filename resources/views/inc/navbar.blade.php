<nav class="navbar navbar-default navbar-static-top"  style="background:black;">
        <div class="container">
            <div class="navbar-header">
              {{-- <button class="btn btn-warning " style="margin-top:5%;background-color: #f0ad4e;">VERSION 1.0</button> --}}

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                {{--  <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                  {{config('app.name','VMIS')}}
                </a>  --}}
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                  &nbsp;
                </ul>


                <ul class="nav navbar-nav" >

                <li><a href="{{route('myhome')}}"><b>HOME</b></a></li>
                    <li><a href="{{route('createCnic')}}"><b>Add New Applicant</b></a></li>
                    <li><a href="{{route('job_form.index')}}"><b>View All Applicants</b></a></li>
                       
                  </li>


                </ul>
                @auth
                  @if(Auth::user()->email == "admin@dgme.gov.pk")
                  <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('register') }}">Register</a></li>
                  </ul>
                  @endif
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><b>Sign out</b>
                  </a></li>
                </ul>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>

                @else
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="{!! route('login') !!}"><b>Login</b></a></li>
                </ul>
              @endauth
            </div>
        </div>

</nav>
