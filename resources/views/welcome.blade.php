
@extends('layouts.app')
@section('content')
<div class="jumbotron" style="margin-left: 12%;width: 75%;margin-top: 136px;
padding-top: 134px; padding-bottom: 132px;color:white; text-align:center; background-color:lightblue;"> 
<h1    style="font-size: 73px; font-weight:bold;"> DGME JOB PORTAL</h1>
<a href="/" style="margin-left:10px;margin-right:10px; color:black;"><b>Home</b></a>
<a href="{{route('job_form.create')}}" style="margin-left:10px;margin-right:10px; color:black;"><b>Apply For Job</b></a> 
<a href="#" style="margin-left:10px;margin-right:10px; color:black;"><b>Contact Us</b></a>
<a href="#" style="margin-left:90px;margin-right:10px;color:black;"><b>Login</b></a>

</div>
@endsection