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

            <td></td>
            <td>{{$applicant->cnic}}</td>
            <td><b style="color:red;">Not Available</b></td>

        </tr>
    </table>

        <table>
        <tr><th style="color:white; background-color:black;"><b> DEMOGRAPHICS</b></th></tr>
            <tr>
                <th>Diary Number</th>
                <th>Name</th>
                <th>Father/Husband Name</th>
                <th></th>
            </tr>
            <tr>
                <td>{{$applicant->diary_num}}</td>
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
                <td>
                    @if(isset($applicant->ApplicantDetail->Province->name))
                    {{$applicant->ApplicantDetail->Province->name}}
                    @else <b style="color:red;">Not Available</b> @endif
                </td>
                <td>
                    @if(isset($applicant->ApplicantDetail->District->name))
                    {{$applicant->ApplicantDetail->District->name}}
                    @else<b style="color:red;">Not Available</b> @endif
                </td>
                <td>
                    @if(isset($applicant->ApplicantDetail->city))
                    {{$applicant->ApplicantDetail->city}}
                    @else <b style="color:red;">Not Available</b> @endif
                </td>
                <td>
                    @if(isset($applicant->ApplicantDetail->postal_add))
                    {{$applicant->ApplicantDetail->postal_add}}
                    @else <b style="color:red;">Not Available</b> @endif
                </td>
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
        <tr ><th colspan="2" style="color:white; background-color:black;">Secondary Education</th></tr>
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
            {{-- {{dd($applicant->ApplicantSecondaryEducation)}} --}}
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
        <tr><th  colspan="2" style="color:white; background-color:black;">Graduation Education</th></tr>
        @foreach($applicant->ApplicantHigherEducation as $applicant_higherEdu)
            @if($applicant_higherEdu->bach_year=='2 years')
                    <tr  style="background-color:gray; color:black;" >
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
                            {{$applicant_higherEdu->percentage}}
                            @endif
                        </td>
                        <td>{{$applicant_higherEdu->division}}</td>

                    </tr>


            @elseif($applicant_higherEdu->bach_year=='4 years')

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
                    <td>{{$applicant_higherEdu->distinction}}</td>
                    <td>
                        @if($applicant_higherEdu->cgpa==NULL)
                        <b style="color:red;">Not Available</b>
                        @else
                        {{$applicant_higherEdu->cgpa}}
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
                        {{$applicant_higherEdu->percentage}} @endif</td>
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
                </tr>
            @endif

               {{-- postgraduation --}}
            @if($applicant_higherEdu->qualification_type=='post_grad')
                    <tr><th style="color:white; background-color:black;">POST GRADUATION EDUCATION</th></tr>
                    <tr  style="background-color:gray; color:black;" >
                        <th>Qualification</th>
                        <th>Institute Name</th>
                        <th>Degree</th>
                        <th>Distinction</th>
                        <th>CGPA</th>
                        <th>Final DMC Date</th>
                        <th>Total Marks</th>
                        <th>Achieved Marks</th>
                        <th>Percentage</th>
                        <th>Division</th>
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
                            @if($applicant_higherEdu->distinction==NULL || $applicant_higherEdu->distinction=='NA')
                            <b style="color:red;">Not Available</b>
                            @else
                            {{$applicant_higherEdu->distinction}}
                            @endif
                        </td>
                        <td>
                            @if($applicant_higherEdu->cgpa==NULL || $applicant_higherEdu->cgpa=='NA')
                            <b style="color:red;">Not Available</b>
                            @else
                            {{$applicant_higherEdu->cgpa}}
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
                            @if( $applicant_higherEdu->division==NULL || $applicant_higherEdu->division=='NA')
                            <b style="color:red;">Not Available</b>
                            @else
                            {{$applicant_higherEdu->division}}
                             @endif
                            </td>

                    </tr>
            @endif
                {{-- PHD --}}
            @if($applicant_higherEdu->qualification_type=='phd')
                  <tr><th style="color:white; background-color:black;">PHD</th></tr>
                    <tr  style="background-color:gray; color:black;" >
                        <th>Qualification</th>
                        <th>Institute Name</th>
                        <th>Degree</th>
                        <th>Thesis Topic</th>
                        <th>Final DMC Date</th>

                    </tr>

                    <tr>
                        <td>
                            @if(isset($applicant_higherEdu->qualification_type))
                            PHD
                           @else
                            <b style="color:red;">Not Available</b>
                            @endif
                        </td>

                        <td>
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
                        <td>
                            @if($applicant_higherEdu->thesis_topic==NULL || $applicant_higherEdu->thesis_topic=='NA')
                            <b style="color:red;">Not Available</b>
                            @else
                            {{$applicant_higherEdu->thesis_topic}}
                            @endif
                        </td>
                        <td>
                            @if($applicant_higherEdu->final_dmc_date==NULL || $applicant_higherEdu->final_dmc_date=='NA')
                            <b style="color:red;">Not Available</b>
                            @else
                            {{$applicant_higherEdu->final_dmc_date}}
                            @endif
                        </td>


                    </tr>
            @endif
             {{-- POST DOC --}}
            @if($applicant_higherEdu->qualification_type=='post_doc')
                <tr><th style="color:white; background-color:black;">POST DOCTRAL</th></tr>
                <tr  style="background-color:gray; color:black;" >
                    <th>Qualification</th>
                    <th>Institute Name</th>
                    <th>Degree</th>
                    <th>Thesis Topic</th>
                    <th>Final DMC Date</th>

                </tr>

                <tr>
                    <td>
                        @if($applicant_higherEdu->qualification_type==NULL || $applicant_higherEdu->qualification_type=='NA')
                        <b style="color:red;">Not Available</b>
                        @else
                        POST DOCTRAL
                        @endif
                    </td>

                    <td>
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
                    <td>
                        @if($applicant_higherEdu->thesis_topic==NULL || $applicant_higherEdu->thesis_topic=='NA')
                        <b style="color:red;">Not Available</b>
                        @else
                        {{$applicant_higherEdu->thesis_topic}}
                        @endif
                    </td>
                    <td>
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

       <table>
                    <tr><th style="color:white; background-color:black;"><b>CERTIFICATIONS</b></th></tr>
                    <tr>
                            <th>Certification Name</th>
                            <th>Certification Number</th>
                            <th>Issued By</th>
                            <th>Date Of Issuance</th>
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


                    <tr><th style="color:white; background-color:black;"><b>TRAININGS</b></th></tr>
                    <tr>
                        <th>Training Name</th>
                        <th>By</th>
                        <th>Duration</th>
                    </tr>
                 @foreach($applicant->ApplicantTraining as $ApplicantTraining)
                       <tr>
                        <td>{{$ApplicantTraining->training_name}}</td>
                        <td>{{$ApplicantTraining->by_name}}</td>
                        <td>{{$ApplicantTraining->duration}}</td>
                       </tr>
                 @endforeach
                <tr><th style="color:white; background-color:black;"><b>RESEARCH PAPERS</b></th></tr>
                        <tr>
                                <th>Name </th>
                                <th>Conference Name </th>
                                <th>Published Year</th>
                                <th>Date</th>
                        </tr>
                        @foreach($applicant->ApplicantResearchWork as $research)

                           @if($research->researchtype=="Journal")
                           <tr>
                            <td><b>JOURNAL :</b> {{$research->name}}</td>
                            <td>{{$research->published_year}}</td>
                            <td>{{$research->date_published}}</td>
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


                <tr><th colspan="1" style="color:white; background-color:black;"><b>PROFESSIONAL MEMBERSHIP</b></th></tr>
                    <tr>
                        <th>Name</th>
                        <th>Membership Level</th>
                        <th>Issued By</th>
                        <th>Issuance date</th>
                        <th>Registeration Number</th>
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

     <table>
         <tr><tr><th style="color:white; background-color:black;"><b>EXPERIENCE</b></th></tr></tr>
         <tr>
             <th>Organization Name</th>
             <th>Organization Type</th>
             <th>Duration</th>
             <th>Role</th>
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
     <table>
            <tr><tr><th style="color:black; background-color:lightblue;font-weight:bold;"><b>POSITION APPLIED FOR</b></th></tr></tr>
            <tr>
                <td>
                  <ol>
              @foreach ($applicant->ApplicantAppliedFor as $ApplicantAppliedFor)
                 <li><b > {{$ApplicantAppliedFor->position_name}} </b></li>
            @endforeach
          </ol>
              </td>
          </tr>

        </table>

</div>
@endsection
