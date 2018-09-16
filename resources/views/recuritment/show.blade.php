@extends('layouts.dashboard')
@section('styletags')
{{-- <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    
    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    
    tr:nth-child(even) {
        background-color: #white;
    }
</style> --}}
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ml-auto mr-auto">
                    <form id="wizardForm" method="" action="#">
                        <div class="card card-wizard">
                            <div class="card-header ">
                                <h3 class="card-title text-center">Summary Report</h3>
                                <p class="card-category text-center"></p>
                            </div>
                            <div class="card-body ">
                                <div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-3 ">
                                           <label class="control-label" style="color:black; font-weight:bold;">APPLICANT # :</label>
                                           <span style="font-size:12px;">{{$applicant->uniqueNumber}}</span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">CNIC # :</label>
                                            <span style="font-size:12px;">{{$applicant->cnic}}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="control-label" style="color:black; font-weight:bold;">Picture :</label>
                                            <span style="font-size:12px;"><b style="color:red;">Not Available</b></span>
                                        </div>
                                    </div>
                                    {{-- demographics --}}
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 text-center">
                                            <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">DEMOGRAPHICS</label>
                                        </div> 
                                    </div>
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Diary #:</label>
                                            <span style="font-size:11px;">{{$applicant->diary_num}}</span>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Name :</label>
                                            <span style="font-size:11px;">{{$applicant->name}}</span>
                                        </div> 
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">Father Name:</label>
                                            <span style="font-size:11px;">{{$applicant->ApplicantDetail->father_name}}</span>
                                        </div> 
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">Religion :</label>
                                            <span style="font-size:11px;">
                                                @if($applicant->religion=='NA')
                                                <b style="color:red;">Not Available</b>
                                                @else
                                                {{$applicant->religion}}
                                                @endif
                                            </span>
                                        </div>  
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Age :</label>
                                            <span style="font-size:11px;">{{$age}} Years Old</span>
                                        </div> 
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Gender :</label>
                                            <span style="font-size:11px;">{{$applicant->gender}}</span>
                                        </div>
                                        <div class="col-md-3">
                                                <label class="control-label" style="color:black; font-weight:bold;">Date Of Birth :</label>
                                                <span style="font-size:11px;">{{$applicant->dob}}</span>
                                            </div>
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">Email:</label>
                                            <span style="font-size:11px;">
                                                 @if($applicant->email=='NA')
                                                    <b style="color:red;">Not Available</b>
                                                   @else
                                                {{$applicant->email}}
                                                @endif
                                            </span>
                                        </div>      
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Province :</label>
                                            <span style="font-size:11px;">
                                                @if(isset($applicant->ApplicantDetail->Province->name))
                                                {{$applicant->ApplicantDetail->Province->name}}
                                                @else <b style="color:red;">Not Available</b> @endif
                                            </span>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">District :</label>
                                            <span style="font-size:11px;">
                                                @if(isset($applicant->ApplicantDetail->District->name))
                                                {{$applicant->ApplicantDetail->District->name}}
                                                @else<b style="color:red;">Not Available</b> @endif
                                            </span>
                                        </div> 
                                        <div class="col-md-6">
                                            <label class="control-label" style="color:black; font-weight:bold;">Postal Address :</label>
                                            <span style="font-size:11px;">
                                                @if(isset($applicant->ApplicantDetail->postal_add))
                                                {{$applicant->ApplicantDetail->postal_add}}
                                                @else <b style="color:red;">Not Available</b> @endif
                                            </span>
                                        </div> 
                                        
                                    </div>    
                                    <div class="row justify-content-center">
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">City:</label>
                                            <span style="font-size:11px;">
                                                    @if(isset($applicant->ApplicantDetail->city))
                                                    {{$applicant->ApplicantDetail->city}}
                                                    @else <b style="color:red;">Not Available</b> @endif
                                            </span>
                                        </div> 
                                        <div class="col-md-2">
                                            <label class="control-label" style="color:black; font-weight:bold;">Cell #:</label>
                                            <span style="font-size:11px;">
                                                @if($applicant->ApplicantDetail->cell_num=='+92')
                                                <b style="color:red;">Not Available</b>
                                                @else
                                                {{$applicant->ApplicantDetail->cell_num}}
                                                @endif  
                                            </span>
                                        </div> 
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">Cell # 2:</label>
                                            <span style="font-size:11px;">
                                                @if($applicant->ApplicantDetail->cellnum_2=='+92')
                                                <b style="color:red;">Not Available</b>
                                                @else
                                                {{$applicant->ApplicantDetail->cellnum_2}}
                                                @endif      
                                            </span>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label" style="color:black; font-weight:bold;">Phone Number :</label>
                                            <span style="font-size:11px;">
                                                @if($applicant->ApplicantDetail->phone_num=='+92')
                                                <b style="color:red;">Not Available</b>
                                                @else
                                                {{$applicant->ApplicantDetail->phone_num}}
                                            @endif 
                                            </span>
                                        </div> 
                                    </div>
                                    {{-- secondary education --}}
                                    <hr/>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 text-center">
                                            <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">SECONDARY EDUCATION</label>
                                        </div> 
                                    </div>
                                  
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 text-center">
                                            <div class="card bootstrap-table">
                                                <div class="card-body table-full-width">
                                                    <table id="bootstrap-table" class="table">
                                                        <tr>
                                                            <th  style="text-align:center;" >Type</th>
                                                            <th  style="text-align:center;" >Board</th>
                                                            <th  style="text-align:center;" >Institute Name</th>
                                                            <th  style="text-align:center;" >Subjects</th>
                                                            <th  style="text-align:center;" >Distinction</th>
                                                            <th  style="text-align:center;">Total Marks</th>
                                                            <th  style="text-align:center;">Achieved Marks</th>
                                                            <th  style="text-align:center;">Percentage</th>
                                                            <th  style="text-align:center;">Division</th>
                                                            <th  style="text-align:center;">Grades</th> 
                                                        </tr>
                                                        @foreach($applicant->ApplicantSecondaryEducation as $applicant_secondaryEdu)
                                                        <tr>
                                                            <td>{{$applicant_secondaryEdu->qualification_type}}</td>
                                                            <td>{{$applicant_secondaryEdu->board}}</td>
                                                            <td>{{$applicant_secondaryEdu->name_of_school}}</td>
                                                            <td>
                                                            @if(isset($applicant_secondaryEdu->SecondarySubject->subject_name))
                                                            {{$applicant_secondaryEdu->SecondarySubject->subject_name}}
                                                            @endif
                                                            </td>
                                                            <td>{{$applicant_secondaryEdu->distinction}}</td>
                                                            <td>{{$applicant_secondaryEdu->total_marks}}</td>
                                                            <td>{{$applicant_secondaryEdu->achieved_marks}}</td>
                                                            <td>{{$applicant_secondaryEdu->percentage}} %</td>
                                                            <td>{{$applicant_secondaryEdu->division}}</td>
                                                            <td>
                                                                @if($applicant_secondaryEdu->grades==NULL || $applicant_secondaryEdu->grades=='NA')
                                                                <b style="color:red;">Not Available</b>
                                                                @else
                                                                {{$applicant_secondaryEdu->grades}}
                                                                @endif
                                                            </td>  
                                                        </tr>
                                                        @endforeach                          
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  

                                    {{-- higher education --}}
                                   
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 text-center">
                                            <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">HIGHER EDUCATION</label>
                                        </div> 
                                    </div>

                                    <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                            @foreach($applicant->ApplicantHigherEducation as $applicant_higherEdu)
                                                            @if($applicant_higherEdu->bach_year=='2 years')
                                                                <tr>
                                                                    <th  style="text-align:center;" >Bachelor Year</th>
                                                                    <th  style="text-align:center;" >Institute Name</th>
                                                                    <th  style="text-align:center;" >Degree</th>
                                                                    <th  style="text-align:center;" >Distinction</th>
                                                                    <th  style="text-align:center;">Total Marks</th>
                                                                    <th  style="text-align:center;">Achieved Marks</th>
                                                                    <th  style="text-align:center;">Percentage</th>
                                                                    <th  style="text-align:center;">Division</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$applicant_higherEdu->bach_year}}</td>
                                                                    <td>@if(isset($applicant_higherEdu->University->name))
                                                                        {{$applicant_higherEdu->University->name}}
                                                                        @else<b style="color:red;">Not Available</b> @endif
                                                                    </td>
                                            
                                                                    <td>@if(isset($applicant_higherEdu->higherSubject->subject_name))
                                                                        {{$applicant_higherEdu->higherSubject->subject_name}}
                                                                        @else <b style="color:red;">Not Available</b> @endif
                                                                    </td>
                                                                    <td>{{$applicant_higherEdu->distinction}}</td>
                                                                    <td>@if($applicant_higherEdu->total_marks==NULL)
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$applicant_higherEdu->total_marks}}
                                                                        @endif
                                                                    </td>
                                                                    <td>@if($applicant_higherEdu->achieved_marks==NULL)
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$applicant_higherEdu->achieved_marks}}
                                                                        @endif
                                                                    </td>
                                                                    <td>@if($applicant_higherEdu->percentage==NULL)
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$applicant_higherEdu->percentage}}%
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$applicant_higherEdu->division}}</td>
                                                                </tr>
                                                            @elseif($applicant_higherEdu->bach_year=='4 years')
                                                                <tr>
                                                                    <th  style="text-align:center;" >Bachelor Year</th>
                                                                    <th  style="text-align:center;" >Institute Name</th>
                                                                    <th  style="text-align:center;" >Degree</th>
                                                                    <th  style="text-align:center;" >CGPA</th>
                                                                    <th  style="text-align:center;" >Total Marks</th>
                                                                    <th  style="text-align:center;" >Achieved Marks</th>
                                                                    <th  style="text-align:center;" >Percentage</th>
                                                                    <th  style="text-align:center;" >Final DMC Date</th>
                                                                    <th  style="text-align:center;" >Division</th>
                                                                    <th  style="text-align:center;" >Distinction</th>
                                                                </tr>
                                                                <tr>
                                                                    <td>{{$applicant_higherEdu->bach_year}}</td>
                                                                    <td>
                                                                        @if(isset($applicant_higherEdu->University->name))
                                                                        {{$applicant_higherEdu->University->name}}
                                                                        @else <b style="color:red;">Not Available</b> @endif
                                                                    </td>
                                                                    <td>
                                                                        @if(isset($applicant_higherEdu->higherSubject->subject_name))
                                                                        {{$applicant_higherEdu->higherSubject->subject_name}}
                                                                        @else <b style="color:red;">Not Available</b> @endif
                                                                    </td>
                                                                
                                                                    <td>
                                                                        @if($applicant_higherEdu->cgpa==NULL)
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{number_format($applicant_higherEdu->cgpa,2)}}
                                                                    @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->total_marks==NULL)
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->total_marks}} @endif
                                                                    </td>
                                                                    <td> @if($applicant_higherEdu->achieved_marks==NULL)
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->achieved_marks}} @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->percentage==NULL)
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->percentage}}% @endif</td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->final_dmc_date==NULL)
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->final_dmc_date}}
                                                                    @endif
                                                                    </td>
                                                                    <td>
                                                                    @if($applicant_higherEdu->division==NULL)
                                                                    <b style="color:red;">Not Available</b>
                                                                    @else
                                                                    {{$applicant_higherEdu->division}}@endif</td>

                                                                    <td>{{$applicant_higherEdu->distinction}}</td>
 
                                                                </tr>
                                                            @endif
                                                            @if($applicant_higherEdu->qualification_type=='post_grad')
                                                                <tr>
                                                                    <th style="text-align:center;">Qualification</th>
                                                                    <th style="text-align:center;">Institute Name</th>
                                                                    <th style="text-align:center;">Degree</th>
                                                                    <th style="text-align:center;">CGPA</th>
                                                                    <th style="text-align:center;">Total Marks</th>
                                                                    <th style="text-align:center;">Achieved Marks</th>
                                                                    <th style="text-align:center;">Percentage</th>
                                                                    <th style="text-align:center;">Final DMC Date</th>
                                                                    <th style="text-align:center;">Division</th>
                                                                    <th style="text-align:center;">Distinction</th>
                                                                </tr>
                                            
                                                                <tr>
                                                                <td>
                                                                        @if($applicant_higherEdu->qualification_type==NULL || $applicant_higherEdu->qualification_type=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        MASTERS
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if(isset($applicant_higherEdu->University->name))
                                                                        {{$applicant_higherEdu->University->name}}
                                                                        @else<b style="color:red;">Not Available</b>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if(isset($applicant_higherEdu->higherSubject->subject_name))
                                                                        {{$applicant_higherEdu->higherSubject->subject_name}}
                                                                        @else
                                                                        <b style="color:red;">Not Available</b>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->cgpa==NULL || $applicant_higherEdu->cgpa=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{number_format($applicant_higherEdu->cgpa,2)}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->total_marks==NULL || $applicant_higherEdu->total_marks=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->total_marks}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->achieved_marks==NULL || $applicant_higherEdu->achieved_marks=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->achieved_marks}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->percentage==NULL || $applicant_higherEdu->percentage=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->percentage}}
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($applicant_higherEdu->final_dmc_date==NULL || $applicant_higherEdu->final_dmc_date=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->final_dmc_date}}
                                                                        @endif
                                                                    </td>
                                            
                                                                    <td>
                                                                        @if( $applicant_higherEdu->division==NULL || $applicant_higherEdu->division=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->division}}
                                                                        @endif
                                                                    </td>
                                                                    <td style="display:block;">
                                                                        @if($applicant_higherEdu->distinction==NULL || $applicant_higherEdu->distinction=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                        {{$applicant_higherEdu->distinction}}
                                                                        @endif
                                                                    </td>
                                                                    </tr>
                                                                @endif
                                                                @if($applicant_higherEdu->qualification_type=='phd')
                                                                  <tr >
                                                                      <th  style="text-align:center;">Qualification</th>
                                                                      <th colspan="2" style="text-align:center;" >Institute Name</th>
                                                                      <th  style="text-align:center;">Degree</th>
                                                                      <th colspan="4" style="text-align:center;">Thesis Topic</th>
                                                                      <th colspan="2" style="text-align:center;">Final DMC Date</th>
                                                                      
                                                                  </tr>
                                              
                                                                  <tr>
                                                                      <td>
                                                                          @if(isset($applicant_higherEdu->qualification_type))
                                                                          PHD
                                                                         @else
                                                                          <b style="color:red;">Not Available</b>
                                                                          @endif
                                                                      </td>
                                              
                                                                      <td colspan="2">
                                                                          @if(isset($applicant_higherEdu->University->name))
                                                                          {{$applicant_higherEdu->University->name}}
                                                                          @else
                                                                          <b style="color:red;">Not Available</b>
                                                                          @endif
                                                                      </td>
                                                                      <td>
                                                                          @if(isset($applicant_higherEdu->higherSubject->subject_name))
                                                                          {{$applicant_higherEdu->higherSubject->subject_name}}
                                                                          @else
                                                                          <b style="color:red;">Not Available</b>
                                                                          @endif
                                                                      </td>
                                                                      <td colspan="4">
                                                                          @if($applicant_higherEdu->thesis_topic==NULL || $applicant_higherEdu->thesis_topic=='NA')
                                                                          <b style="color:red;">Not Available</b>
                                                                          @else
                                                                          {{$applicant_higherEdu->thesis_topic}}
                                                                          @endif
                                                                      </td>
                                                                      <td colspan="2">
                                                                          @if($applicant_higherEdu->final_dmc_date==NULL || $applicant_higherEdu->final_dmc_date=='NA')
                                                                          <b style="color:red;">Not Available</b>
                                                                          @else
                                                                          {{$applicant_higherEdu->final_dmc_date}}
                                                                          @endif
                                                                      </td>
                                                                     <td></td>
                                                                    </tr>
                                                                    @endif
                                                                    @if($applicant_higherEdu->qualification_type=='post_doc')
                                                                    <tr><th style="color:white; background-color:black;">POST DOCTRAL</th></tr>
                                                                    <tr  style="background-color:gray; color:black;" >
                                                                            <th  style="text-align:center;">Qualification</th>
                                                                            <th colspan="2" style="text-align:center;" >Institute Name</th>
                                                                            <th  style="text-align:center;">Degree</th>
                                                                            <th colspan="4" style="text-align:center;">Thesis Topic</th>
                                                                            <th colspan="2" style="text-align:center;">Final DMC Date</th>
                                                    
                                                                    </tr>
                                                    
                                                                    <tr>
                                                                        <td>
                                                                            @if($applicant_higherEdu->qualification_type==NULL || $applicant_higherEdu->qualification_type=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                            POST DOCTRAL
                                                                            @endif
                                                                        </td>
                                                    
                                                                        <td colspan="2">
                                                                            @if(isset($applicant_higherEdu->University->name))
                                                                            {{$applicant_higherEdu->University->name}}
                                                                            @else
                                                                            <b style="color:red;">Not Available</b>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            @if(isset($applicant_higherEdu->higherSubject->subject_name))
                                                                            {{$applicant_higherEdu->higherSubject->subject_name}}
                                                                            @else
                                                                            <b style="color:red;">Not Available</b>
                                                                            @endif
                                                                        </td>
                                                                        <td colspan="4">
                                                                            @if($applicant_higherEdu->thesis_topic==NULL || $applicant_higherEdu->thesis_topic=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                            {{$applicant_higherEdu->thesis_topic}}
                                                                            @endif
                                                                        </td>
                                                                        <td colspan="2">
                                                                            @if($applicant_higherEdu->final_dmc_date==NULL || $applicant_higherEdu->final_dmc_date=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                            {{$applicant_higherEdu->final_dmc_date}}
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                @endif
                                                        @endforeach                          
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Certifications --}}
                                    @if(isset($applicant->ApplicantCertification[0]) && $applicant->ApplicantCertification!=null)
                                    
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 text-center">
                                                <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">CERTIFICATIONS</label>
                                            </div> 
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                                <tr>
                                                                    <th  style="text-align:center;" >Certification Name</th>
                                                                    <th  style="text-align:center;" >Certification Number</th>
                                                                    <th  style="text-align:center;" >Issued By</th>
                                                                    <th  style="text-align:center;" >Date Of Issuance</th>
                                                                </tr>
                                                                @foreach($applicant->ApplicantCertification as $ApplicantCertification)
                                                                <tr>
                                                                <td> @if( $ApplicantCertification->name_certifictaion==NULL ||  $ApplicantCertification->name_certifictaion=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                    {{$ApplicantCertification->name_certifictaion}} @endif</td>
                                                                <td>
                                                                        @if( $ApplicantCertification->certification_number==NULL ||  $ApplicantCertification->certification_number=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                    {{$ApplicantCertification->certification_number}}@endif
                                                                </td>
                                                                <td>
                                                                        @if( $ApplicantCertification->issued_by==NULL ||  $ApplicantCertification->issued_by=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                    {{$ApplicantCertification->issued_by}}@endif</td>
                                                                <td>
                                                                        @if( $ApplicantCertification->date_of_issuance==NULL || $ApplicantCertification->date_of_issuance=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                    {{$ApplicantCertification->date_of_issuance}}@endif</td>
                                                                </tr>
                                                            @endforeach
                                                                                        
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Trainings --}}

                                    @if(isset($applicant->ApplicantTraining[0]) && $applicant->ApplicantTraining!=null)
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 text-center">
                                                <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">TRAININGS</label>
                                            </div> 
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                                <tr>
                                                                    <th  style="text-align:center;" >Training Name</th>
                                                                    <th  style="text-align:center;" >By</th>
                                                                    <th  style="text-align:center;" >Duration</th>
                                                                </tr>
                                                                @foreach($applicant->ApplicantTraining as $ApplicantTraining)
                                                                <tr>
                                                                <td>
                                                                    @if($ApplicantTraining->training_name==NULL ||  $ApplicantTraining->training_name=='NA')
                                                                        <b style="color:red;">Not Available</b>
                                                                        @else
                                                                    {{$ApplicantTraining->training_name}}@endif
                                                                    </td>
                                                                <td>
                                                                    @if($ApplicantTraining->by_name==NULL || $ApplicantTraining->by_name=='NA')
                                                                    <b style="color:red;">Not Available</b>
                                                                    @else
                                                                    {{$ApplicantTraining->by_name}} @endif
                                                                </td>
                                                                <td>
                                                                    @if($ApplicantTraining->duration==NULL ||$ApplicantTraining->duration=='NA')
                                                                    <b style="color:red;">Not Available</b>
                                                                    @else
                                                                    {{$ApplicantTraining->duration}}@endif
                                                                    </td>
                                                                </tr>
                                                        @endforeach                                                                                     
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Rsearch work --}}

                                    @if(isset($applicant->ApplicantResearchWork [0]) && $applicant->ApplicantResearchWork !=null)
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 text-center">
                                                <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">RESEARCH WORK</label>
                                            </div> 
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                                <tr>
                                                                    <th  style="text-align:center;" >Name</th>
                                                                    <th  style="text-align:center;" >Conference/Journal Name</th>
                                                                    <th  style="text-align:center;" >Published Year</th>
                                                                    <th  style="text-align:center;" >Date</th>
                                                                </tr>
                                                                @foreach($applicant->ApplicantResearchWork as $research)
                                                                @if($research->researchtype=="Journal")
                                                                    <tr>
                                                                        <td><b>JOURNAL :</b> {{$research->name}}</td>
                                                                        <td>{{$research->conference}}</td>
                                                                        <td>{{$research->published_year}}</td>
                                                                        <td>{{$research->date_published}}</td>
                                                                        <td></td>
                                                                    </tr> 
                                                                    @elseif($research->researchtype=="Conference")
                                                                    <tr>
                                                                        <td> <b>RESEARCH :</b> {{$research->name}}</td>
                                                                        <td>{{$research->conference}}</td>
                                                                        <td>{{$research->published_year}}</td>
                                                                        <td>{{$research->date_published}}</td>
                                                                    </tr>
                                                                    @endif
                                                                @endforeach                                                          
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  @endif


                                    {{-- Professional Certifications --}}

                                    @if(isset($applicant->ProfessionalCertificationMember[0]) && $applicant->ProfessionalCertificationMember !=null)
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 text-center">
                                                <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">PROFESSIONAL MEMBERSHIP</label>
                                            </div> 
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                                <tr>
                                                                    <th  style="text-align:center;" >Name</th>
                                                                    <th  style="text-align:center;" >Membership Level</th>
                                                                    <th  style="text-align:center;" >Issued By</th>
                                                                    <th  style="text-align:center;" >Issuance date</th>
                                                                    <th  style="text-align:center;" >Registeration Number</th>
                                                                </tr>
                                                                @foreach($applicant->ProfessionalCertificationMember as $ProfessionalCertificationMember)
                                                                <tr>
                                                                    <td>@if($ProfessionalCertificationMember->name==NULL || $ProfessionalCertificationMember->name=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$ProfessionalCertificationMember->name}} @endif
                                                                    </td>
                                                                    <td>@if($ProfessionalCertificationMember->membership_level==NULL || $ProfessionalCertificationMember->membership_level=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$ProfessionalCertificationMember->membership_level}}@endif</td>
                                                                    <td>@if($ProfessionalCertificationMember->issued_by==NULL || $ProfessionalCertificationMember->issued_by=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$ProfessionalCertificationMember->issued_by}}@endif</td>
                                                                    <td>@if($ProfessionalCertificationMember->issuance_date==NULL || $ProfessionalCertificationMember->issuance_date=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$ProfessionalCertificationMember->issuance_date}}@endif</td>
                                                                    <td>@if($ProfessionalCertificationMember->registeration==NULL || $ProfessionalCertificationMember->registeration=='NA')
                                                                            <b style="color:red;">Not Available</b>
                                                                            @else
                                                                        {{$ProfessionalCertificationMember->registeration}}@endif</td>
                                                                    </tr>
                                                                @endforeach                                                          
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Experience --}}

                                    @if(isset($applicant->ApplicantExperience[0]) && $applicant->ApplicantExperience !=null)
                                        <div class="row justify-content-center">
                                            <div class="col-md-10 text-center">
                                                <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">EXPERIENCE</label>
                                            </div> 
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 text-center">
                                                <div class="card bootstrap-table">
                                                    <div class="card-body table-full-width">
                                                        <table id="bootstrap-table" class="table">
                                                                <tr>
                                                                    <th  style="text-align:center;" >Organization Name</th>
                                                                    <th  style="text-align:center;" >Organization Type</th>
                                                                    <th  style="text-align:center;" >Duration</th>
                                                                    <th  style="text-align:center;" >Role</th>
                                                                </tr>
                                                                @foreach ($applicant->ApplicantExperience as $ApplicantExperience)
                                                                <tr>
                                                                <td>{{$ApplicantExperience->org_name}}</td>
                                                                        <td>{{$ApplicantExperience->org_type}}</td>
                                                                        <td>
                                                                            @php
                                                                            $s_date=date('Y-m-d',strtotime($ApplicantExperience->start_date));
                                                                            $e_date=date('Y-m-d',strtotime($ApplicantExperience->end_date));
                                                                            $duration=date_diff(date_create($s_date), date_create($e_date));
                                                                            @endphp
                                                                            {{$duration->y}} Years {{$duration->m}} Months {{$duration->d}} Days</td>
                                                                        <td>{{$ApplicantExperience->role}}</td>
                                                                    </tr>
                                                                @endforeach                                    
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                   @endif

                                    {{-- Designation --}}

                                    @if(isset($applicant->ApplicantAppliedFor[0]) && $applicant->ApplicantAppliedFor!=null)
                                    <div class="row justify-content-center">
                                        <div class="col-md-10 text-center">
                                            <label class="control-label " style="color:black; font-size:18px; font-weight:bold;">POSITION APPLIED FOR</label>
                                        </div> 
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 text-center">
                                            <div class="card bootstrap-table">
                                                <div class="card-body ">
                                                    <table id="bootstrap-table" class="table">
                                                        <tr>
                                                            <ol>
                                                                @foreach ($applicant->ApplicantAppliedFor as $ApplicantAppliedFor)
                                                                <li><b style="color:red;"> {{$ApplicantAppliedFor->position_name}} </b> <br></li>
                                                                @endforeach
                                                                </ol>
                                                        </tr>
                                                                                   
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                               @endif


                                </div>
                            <div class="card-footer text-center">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection