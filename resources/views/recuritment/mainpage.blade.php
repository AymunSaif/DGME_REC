@extends('layouts.dashboard')
<style>
.mybox:hover{
    background-image: linear-gradient(to bottom, #87CB16 0%, rgba(109, 192, 48, 0.7) 100%);
    color::white;
}

</style>
@section('content')
@role('dataentry')
<div class="content">
    <div class="container-fluid" style="height:100%;">
        <p style="text-align:center; background:white; padding:20px; font-size:20px;">Welcome {{Auth::user()->name}} 🙂</p>
        <div class="row" style="margin-top:10%;">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">   
                    <div class="card-body all-icons">
                        <div class="row">
                            <div class="font-icon-list col-lg-6 col-md-4 col-sm-4 col-6">
                                <div class="mybox font-icon-detail">
                                        <a href="{{route('createCnic')}}"> <i class="fa fa-user-plus" aria-hidden="true" style="color:black; font-size: 58px; margin-right: 30px;"></i>
                                    <p><b  style="color:dimgrey; font-size:14px;">ADD NEW APPLICANT</b></p>
                                </a>
                                </div>
                            </div>
                        
                            <div class="font-icon-list col-lg-6 col-md-4 col-sm-4 col-6">
                                    <div class="mybox font-icon-detail">
                                            <a href="{{route('job_form.index')}}"> <i class="nc-icon nc-notes icon-bold" style="color:black; font-size: 51px; margin-right: 30px;"></i>
                                        <p><b style="color:dimgrey; font-size:14px;">VIEW ALL APPLICANTS</b></p>
                                            </a>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    </div>   
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
</div>
@endrole

@role('admin')
<div class="content">
    <div class="container-fluid" style="height:100%;">
        <p style="text-align:center; background:white; padding:20px; font-size:20px;">Welcome {{Auth::user()->name}} 🙂</p>
    </div>
</div>
@endif
@endsection