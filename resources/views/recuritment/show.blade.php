@extends('layouts.app')
@section('styletags')
<style>
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
</style>
@endsection
@section('content')
<div class="container">
    <h1 style="text-align:center;color:black; font-weight:bold; background-color:lightgrey;">SUMMARY FORM</h1>
    <table class="table">
        <tr>
            <th>Applicant Number</th>
            <th>CNIC No.</th>
            <th>Picture</th>
        </tr>
        <tr>
            
            <td>{{$applicant->diary_num}}</td>
            <td>{{$applicant->cnic}}</td>
            <td><b style="color:red;">Not Available</b></td>

        </tr>

        <table>
            <tr><b style="text-align:center; color:chocolate;"> DEMOGRAPHICS</b></tr>
            <tr>
                <th>Diary Number</th>
                <th>Name</th>
                <th>Father/Husband Name</th>
                <th></th>
            </tr>
            <tr>
                <td>{{$applicant->dairy_num}}</td>
                <td>{{$applicant->name}}</td>
                <td>{{$applicant->ApplicantDetail->father_name}}</td>
                <td></td>
            </tr>
            <tr>
                <th>Religion</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender </th>
            </tr>
            <tr>
                <td> 
                    @if($applicant->religion=='NA')
                     <b style="color:red;">Not Available</b> 
                    @else
                    {{$applicant->religion}}
                    @endif
                </td>
                <td>{{$applicant->dob}}</td>
                <td>{{$age}} Years Old</td>
                <td>{{$applicant->gender}}</td>
            </tr>
            <tr>
                <th>Domicile Province</th>
                <th>Domicile District</th>
                <th>City</th>
                <th>Postal Address</th>
            </tr>
            <tr>
                <td>{{$applicant->ApplicantDetail->Province->name}}</td>
                <td>{{$applicant->ApplicantDetail->District->name}}</td>
                <td>{{$applicant->ApplicantDetail->city}}</td>
                <td>{{$applicant->ApplicantDetail->postal_add}}</td>
            </tr>
            <tr>
                <th>Email Address</th>
                <th>Cell Number 1</th>
                <th>Cell Number 2</th>
                <th>Phone Number</th>
            </tr>
            <tr>
                <td> 
                    @if($applicant->email=='NA')
                        <b style="color:red;">Not Available</b> 
                       @else
                    {{$applicant->email}}
                    @endif
                </td>
                <td>
                    @if($applicant->ApplicantDetail->cell_num=='+92')
                    <b style="color:red;">Not Available</b> 
                    @else
                    {{$applicant->ApplicantDetail->cell_num}}
                    @endif
                </td>
                <td>
                    @if($applicant->ApplicantDetail->cellnum_2=='+92')
                    <b style="color:red;">Not Available</b> 
                    @else
                    {{$applicant->ApplicantDetail->cellnum_2}}
                   @endif
            </td>
                <td>
                    @if($applicant->ApplicantDetail->phone_num=='+92')
                    <b style="color:red;">Not Available</b> 
                    @else
                    {{$applicant->ApplicantDetail->phone_num}}
                @endif
                </td>
            </tr>
            
        </table>
       
        <table>
         <tr><th style="color:white; background-color:black;">Secondary Education</th></tr>
            <tr style="background-color:gray; color:black;" >
                <th >Type</th>
                <th>Board</th>
                <th>School Name</th>
                <th>Subjects</th>
                <th>Distinction</th>
                <th>Total Marks</th>
                <th>Achieved Marks</th>
                <th>Percentage</th>
                <th>Division</th>
                <th>Grades</th>
            </tr> 
            @foreach($applicant->ApplicantSecondaryEducation as $applicant_secondaryEdu)
            <tr> 
                <td>{{$applicant_secondaryEdu->qualification_type}}</td>
                <td>{{$applicant_secondaryEdu->board}}</td>
                <td>{{$applicant_secondaryEdu->name_of_school}}</td>
                <td>                          
                @foreach($applicant->ApplicantSecondaryEducation as $applicant_secondaryEdu)
                {{$applicant_secondaryEdu->SecondarySubject->subject_name}}
                @endforeach
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
         <tr><th style="color:white; background-color:black;">Graduation Education</th></tr>
           @foreach($applicant->ApplicantHigherEducation as $applicant_higherEdu)
            {
                @if($applicant_higherEdu->bach_year=='2 years')
                   { <tr  style="background-color:gray; color:black;" >
                        <th>Bachelor Year</th>
                        <th>Institute Name</th>
                        <th>Degree</th>
                        <th>Distinction</th>
                        <th>Total Marks</th>
                        <th>Achieved Marks</th>
                        <th>Percentage</th>
                        <th>Division</th>
                    </tr>
                    <tr>
                    <td>{{$applicant_higherEdu->bach_year}}</td>
                        <td>{{$applicant_higherEdu->University->name}}</td>
                        <td>{{$applicant_higherEdu->higherSubject->subject_name}}</td>
                        <td>{{$applicant_higherEdu->distinction}}</td>
                        <td>{{$applicant_higherEdu->total_marks}}</td>
                        <td>{{$applicant_higherEdu->achieved_marks}}</td>
                        <td>{{$applicant_higherEdu->percentage}}</td>
                        <td>{{$applicant_higherEdu->division}}</td>
                     
                    </tr>
                 }
               
              @elseif($applicant_higherEdu->bach_year=='4 years')
               {
                 <tr  style="background-color:gray; color:black;" >
                    <th>Bachelor Year</th>
                    <th>Institute Name</th>
                    <th>Degree</th>
                    <th>Distinction</th>
                    <th>CGPA</th>
                    <th>Total Marks</th>
                    <th>Achieved Marks</th>
                    <th>Percentage</th>
                    <th>Final DMC Date</th>
                    <th>Division</th>
                </tr>
                <tr>
                    
                    <td>{{$applicant_higherEdu->bach_year}}</td>
                    <td>{{$applicant_higherEdu->University->name}}</td>
                    <td>{{$applicant_higherEdu->higherSubject->subject_name}}</td>
                    <td>{{$applicant_higherEdu->distinction}}</td>
                    <td>
                        @if($applicant_higherEdu->cgpa==NULL)
                        <b style="color:red;">Not Available</b> 
                        @else
                        {{$applicant_higherEdu->cgpa}}
                    @endif
                    </td>
                    <td>{{$applicant_higherEdu->total_marks}}</td>
                    <td>{{$applicant_higherEdu->achieved_marks}}</td>
                    <td>{{$applicant_higherEdu->percentage}}</td>
                    <td>
                        @if($applicant_higherEdu->final_dmc_date==NULL)
                        <b style="color:red;">Not Available</b> 
                        @else
                        {{$applicant_higherEdu->final_dmc_date}}
                    @endif
                    </td>
                    <td>{{$applicant_higherEdu->division}}</td>
                </tr>
                }
                @endif
             }
           @endforeach
        
        <tr><th style="color:white; background-color:black;">POST GRADUATION EDUCATION</th></tr>
        
        
        </table>
         
    </table>
</div>
@endsection