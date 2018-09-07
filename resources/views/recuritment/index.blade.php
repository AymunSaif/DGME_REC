@extends('layouts.app')
@section('content')
<div class="row container-fluid" >     
    <h1 style="margin-top:15px; margin-bottom:12px;text-align: center;">ALL RECURITMENTS</h1>
  
   
    <table class="table table-bordered">
        <tr>
            <th>Applicant Name</th>
            <th>CNIC</th>
            <th>Gender</th>
            <th>Date Of Birth</th>
            <th>Position Applied</th>
        </tr>
        @foreach ($persons as $person)
        <tr> 
            <td>
            <a href="{{route('job_form.show',$person->id)}}">{{$person->name}}</a>
            </td>
            <td>{{$person->cnic}}</td>
            <td>{{$person->gender}}</td>
            <td>{{$person->dob}}</td>
            <td>
                <ol>
                @foreach ($person->ApplicantAppliedFor as $pa)       
                <li><b style="color:red;"> {{$pa->position_name}} </b> <br></li>
                @endforeach
                </ol> 
        </td>
          
        </tr>
        @endforeach
    </table>
   

</div>
@endsection