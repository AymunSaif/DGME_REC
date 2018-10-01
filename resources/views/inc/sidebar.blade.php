<div class="sidebar" data-color="green" data-image="{{asset('img/theme/img/sidebar-4.jpg')}}">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

Tip 2: you can also add an image using data-image tag
-->
    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                  <img src="{{asset('img/theme/img/logo2.png')}}" /><br>
            </div>
            <div class="info ">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    <span>
                        {{ucfirst(Auth::user()->name)}}
                        {{-- <b class="caret"></b> --}}
                    </span>
                </a>
            </div>
        </div>
        {{-- @role("datentry") --}}
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="nc-icon nc-notes"></i>
                    <p>
                        RECURITMENTS
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('createCnic')}}">
                                <span class="sidebar-mini">AN</span>
                                <span class="sidebar-normal">ADD NEW APPLICANTS</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('job_form.index')}}">
                                <span class="sidebar-mini">VA</span>
                                <span class="sidebar-normal">VIEW APPLICANTS</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('getDMCWise')}}">
                                <span class="sidebar-mini">VA</span>
                                <span class="sidebar-normal">VIEW APPLICANTS<br>(Without DMC Date)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        {{-- @endrole --}}
        @role("admin")
        {{-- <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#formsExamples">
                    <i class="nc-icon nc-notes"></i>
                    <p>
                       Register
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse " id="formsExamples">
                    <ul class="nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('createCnic')}}">
                                <span class="sidebar-mini">AN</span>
                                <span class="sidebar-normal">ADD NEW USER</span>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('job_form.index')}}">
                                <span class="sidebar-mini">VA</span>
                                <span class="sidebar-normal">VIEW USERS</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul> --}}
        @endrole
    </div>
</div>
