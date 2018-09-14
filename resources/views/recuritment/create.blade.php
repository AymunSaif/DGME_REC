@extends('layouts.app')
@section('styletags')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
{{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> --}}
      <link href="{{ asset('css/intlTelInput.css') }}" rel="stylesheet">
@endsection
@section('content')
<form id="form" action="{{route('job_form.store')}}" name="form" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
            <input type="hidden" name="person_id" value="{{$applicant->id}}">
                {{-- <li class="nav-item">
                    <a class="nav-link active cnicSection " style="color:black;!important" data-toggle="tab" href="#cnicSection" role="tab" aria-controls="home" aria-selected="true">CNIC</a>
                </li> --}}
                <li class="nav-item">
                        <a class="nav-link active demographicsSection " style="color:black;!important" data-toggle="tab" href="#demographicsSection" role="tab" aria-controls="home" aria-selected="true">Demographics</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link educationSection" style="color:black;!important" id="profile-tab" data-toggle="tab" href="#experienceSection" role="tab" aria-controls="profile" aria-selected="false">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link experienceSection" style="color:black;!important" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Experience</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link designationSection" style="color:black;!important" id="designation-tab" data-toggle="tab" href="#designationSection" role="tab" aria-controls="contact" aria-selected="false">Designation</a>
                </li>
            </ul>
        </div>
    </div>

    <section id="demographicsSection">
        <div class="row">
            <h3  style="color:gray; text-align:center; font-weight:bold">
                <b>Demographics Info</b>
            </h3>
            <hr />

            <div class="col-md-6">
            <div class="form-group">
                    <b>Diary Number</b>
                    <br>
                    @if($applicant->diary_num!='' && $applicant->diary_num!=NULL)
                      <input type="text" value="<?= $applicant->diary_num  ?>" disabled class="form-control" >
                    @else
                      <input type="text" name="d_num" id="d_num" class="form-control" >
                    @endif
                </div>
                <div class="form-group">
                    <b>Name
                        <span style="color:red;font-size:12px;"> (required)</span>
                    </b>
                    <br>
                    @if($applicant->name!='' && $applicant->name!=NULL)
                      <input type="text" value="<?= $applicant->name  ?>" disabled placeholder="Enter Your Full Name" class="form-control" >
                    @else
                      <input type="text" name="name" id="name" placeholder="Enter Your Full Name" class="form-control"    required>
                    @endif
                </div>
                <div class="form-group">
                    <b>Father / Husband Name </b>
                    <br>
                    @if(isset($applicant->ApplicantDetail->father_name) && $applicant->ApplicantDetail->father_name!='' && $applicant->ApplicantDetail->father_name!=NULL)
                      <input type="text" name="f_name" id="f_name" value="<?= $applicant->ApplicantDetail->father_name  ?>" disabled placeholder="" class="form-control">
                    @else
                      <input type="text" name="f_name" id="f_name" placeholder="" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <b>Gender </b>
                    <br>

                    Male
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Male" <?= $applicant->gender=='Male' ? 'checked disabled' : '' ?> name="gender">
                    Female
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Female" <?= $applicant->gender=='Female' ? 'checked disabled' : '' ?> name="gender">
                    Transgender
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Transgender" <?= $applicant->gender=='Transgender' ? 'checked disabled' : '' ?> name="gender">

                </div>

                <div class="form-group">
                    <b>Date Of Birth </b>
                    <br>
                    @if ($applicant->dob!=NULL && $applicant->dob!='')
                      <input type="date" name="dob" value="<?= $applicant->dob ? $applicant->dob : '' ?>" disabled class="form-control">
                    @else
                      <input type="date" name="dob" class="form-control">
                    @endif
                </div>
                <div class="form-group">
                    <b>Religion</b>
                    <br>
                    @if ($applicant->religion!=NULL && $applicant->religion!='' && $applicant->religion!="NA")
                      <input type="text" name="religion" value="{{$applicant->religion}}" disabled class="form-control">
                    @else
                      <input type="text" name="religion" class="form-control">
                    @endif
                </div>


            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <b>Domicile Province</b>
                  @if(isset($applicant->ApplicantDetail->Province->name)&&$applicant->ApplicantDetail->province_id!=NULL)
                    <input type="text" value="{{$applicant->ApplicantDetail->Province->name}}" class="form-control" disabled>
                  @else
                    <select class="form-control dom_province" name="dom_province" >
                        <option value="">Select Province</option>
                        @foreach($provinces as $province)
                            <option value="{{$province->id}}" >{{$province->name}}</option>
                        @endforeach

                    </select>
                  @endif
                </div>

                <div class="form-group">
                    <b>Domicile Districts </b>
                    @if(isset($applicant->ApplicantDetail->District->name)&&$applicant->ApplicantDetail->district_id!=NULL)
                      <input type="text" value="{{$applicant->ApplicantDetail->District->name}}" class="form-control" disabled>
                    @else
                      <select class="form-control dom_district " name="dom_district">
                          <option value="">Select Districts</option>

                      </select>
                    @endif
                </div>
                <div class="form-group">
                        <b>Postal Address </b>
                        <br>
                        @if(isset($applicant->ApplicantDetail->postal_add) && $applicant->ApplicantDetail->postal_add!='' && $applicant->ApplicantDetail->postal_add!=NULL)
                          <input type="text" value="{{$applicant->ApplicantDetail->postal_add}}" class="form-control" disabled>
                        @else
                          <textarea type="text" name="address" class="form-control"></textarea>
                        @endif
                    </div>
                <div class="form-group">
                  @if(isset($applicant->ApplicantDetail->city) && $applicant->ApplicantDetail->city!='' && $applicant->ApplicantDetail->city!=NULL)
                    <input type="text" value="{{$applicant->ApplicantDetail->city}}" class="form-control" disabled>
                  @else
                    <b>City </b>  <input type="text" name="city" id="city" class="form-control">
                  @endif
                </div>

                <div class="form-group">
                    <b>Email Address : </b>
                    <br>
                    @if($applicant->email!='NA' && $applicant->email!=NULL && $applicant->email!='')
                      <input type="text" value="{{$applicant->email}}" class="form-control" disabled>
                    @else
                      <input type="email" name="emailaddress" id="email" class="form-control">
                    @endif
                </div>

                <div class="form-group">
                    <b>Phone Number </b>
                    <br>
                    @if(isset($applicant->ApplicantDetail->phone_num)&&$applicant->ApplicantDetail->phone_num!=NULL)
                      <input type="text" value="{{$applicant->ApplicantDetail->phone_num}}" class="form-control" disabled>
                    @else
                      <input id="phone" name="phone" type="tel" class="form-control">
                      <span id="valid-msg" style="color:#3c763d" class="hide valid-msg">✓ Valid</span>
                      <span id="error-msg" style="color:red" class="hide error-msg">X Invalid number</span>
                    @endif
                </div>
                <div class="form-group">
                    <b>Cell Number (1)</b>
                    @if(isset($applicant->ApplicantDetail->cell_num)&&$applicant->ApplicantDetail->cell_num!=NULL)
                      <input type="text" value="{{$applicant->ApplicantDetail->cell_num}}" class="form-control" disabled>
                    @else
                     <input id="mobilenumber" name="mobile_number1" type="tel" class="form-control mobile_number">
                     <span id="valid-msg" style="color:#3c763d" class="hide valid-msg">✓ Valid</span>
                     <span id="error-msg" style="color:red" class="hide error-msg">X Invalid number</span>
                    @endif
                </div>
                <div class="form-group">
                <b>Cell Number (2)</b>
                @if(isset($applicant->ApplicantDetail->cellnum_2)&&$applicant->ApplicantDetail->cellnum_2!=NULL)
                  <input type="text" value="{{$applicant->ApplicantDetail->cellnum_2}}" class="form-control" disabled>
                @else
                  <input id="mobile_number2" name="mobile_number" type="tel" class="form-control">
                  <span id="valid-msg" style="color:#3c763d" class="hide valid-msg">✓ Valid</span>
                  <span id="error-msg" style="color:red" class="hide error-msg">X Invalid number</span>
                @endif
                </div>

            </div>


        </div>
        <hr />

        <button type="button" class="btn btn-lg btn-danger " style=" width: 252px;" id="go_cnic"> Back</button>
        <button type="button" class="btn btn-lg btn-success pull-right" style="width: 252px;" id="education"> Next</button>
    </section>

    <section id="educationSection" style="display:none">
        <h1 style="color:gray; text-align:center; "><b>Education</b> </h1>

        <table class="table " id="secondaryeducation" >
            <tbody>
              @if(isset($applicant->ApplicantSecondaryEducation) && $applicant->ApplicantSecondaryEducation!=NULL)
                @foreach ($applicant->ApplicantSecondaryEducation as $secondary_edu)
                  @if ($secondary_edu->qualification_type=='School')
                    <tr>
                        <td>
                          <span class=""> School Level
                              <br>
                              @if (isset($secondary_edu->SecondarySubject->type))
                                <input type="text" value="{{$secondary_edu->SecondarySubject->type}}" disabled class="form-control">
                              @else
                                <input type="text" value="NA" disabled class="form-control">
                              @endif
                          </span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <span class=""> School Name
                          <br>
                          <input type="text" value="{{$secondary_edu->name_of_school}}" disabled class="form-control">
                        </span>
                      </td>
                        <td>
                          <span class=""> Board Name
                              <br>
                              <input type="text" value="{{$secondary_edu->board}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Subject
                              <br>
                              @if (isset($secondary_edu->SecondarySubject->subject_name))
                                <input type="text" value="{{$secondary_edu->SecondarySubject->subject_name}}" disabled class="form-control">
                              @endif
                          </span>
                        </td>
                        <td>
                          <span class=""> Distinction
                              <br>
                                <input type="text" value="{{$secondary_edu->distinction}}" disabled class="form-control">
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class=""> Total
                              <br>
                                <input type="text" value="{{$secondary_edu->total_marks}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Achieved Marks
                              <br>
                                <input type="text" value="{{$secondary_edu->achieved_marks}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Percentage %
                              <br>
                                <input type="text" value="{{$secondary_edu->percentage}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Division
                              <br>
                                <input type="text" value="{{$secondary_edu->division}}" disabled class="form-control">
                          </span>
                        </td>
                        @if (isset($secondary_edu->SecondarySubject->type) && $secondary_edu->SecondarySubject->type=='O-Level')
                          <td>
                            <span class=""> Grades
                                <br>
                                  <input type="text" value="{{$secondary_edu->grades}}" disabled class="form-control">
                            </span>
                          </td>
                        @endif
                      </tr>
                  @elseif($secondary_edu->qualification_type=='Intermediate')
                    <tr>
                        <td>
                          <span class=""> College Level
                              <br>
                              @if (isset($secondary_edu->SecondarySubject->type))
                                <input type="text" value="{{$secondary_edu->SecondarySubject->type}}" disabled class="form-control">
                              @else
                                <input type="text" value="NA" disabled class="form-control">
                              @endif
                          </span>
                        </td>
                    </tr>
                    <tr>
                      <td>
                        <span class=""> School Name
                          <br>
                          <input type="text" value="{{$secondary_edu->name_of_school}}" disabled class="form-control">
                        </span>
                      </td>
                        <td>
                          <span class=""> Board Name
                              <br>
                              <input type="text" value="{{$secondary_edu->board}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Subject
                              <br>
                              @if (isset($secondary_edu->SecondarySubject->subject_name))
                                <input type="text" value="{{$secondary_edu->SecondarySubject->subject_name}}" disabled class="form-control">
                              @endif
                          </span>
                        </td>
                        <td>
                          <span class=""> Distinction
                              <br>
                                <input type="text" value="{{$secondary_edu->distinction}}" disabled class="form-control">
                          </span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <span class=""> Total
                              <br>
                                <input type="text" value="{{$secondary_edu->total_marks}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Achieved Marks
                              <br>
                                <input type="text" value="{{$secondary_edu->achieved_marks}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Percentage %
                              <br>
                                <input type="text" value="{{$secondary_edu->percentage}}" disabled class="form-control">
                          </span>
                        </td>
                        <td>
                          <span class=""> Division
                              <br>
                                <input type="text" value="{{$secondary_edu->division}}" disabled class="form-control">
                          </span>
                        </td>
                        @if (isset($secondary_edu->SecondarySubject->type) && $secondary_edu->SecondarySubject->type=='A-Level')
                          <td>
                            <span class=""> Grades
                                <br>
                                  <input type="text" value="{{$secondary_edu->grades}}" disabled class="form-control">
                            </span>
                          </td>
                        @endif
                      </tr>
                  @endif
                @endforeach
              @endif
                <tr>
                    <td>
                        <div>
                            <b>
                                <span style="color:red; font-size:2em;">*</span>Schooling Level</b>
                            <select class="form-control school_level" name="schooling_level">
                                <option value="">Select :</option>
                                <option>Matric</option>
                                <option>O-Level</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr>
                    <input type="hidden" name="qualification" value="">
                    <td>
                        <span class="sch_name" style="display:none;"> School Name
                            <br>
                            <input type="text" name="s_Name" id="s_Name" class="form-control">
                        </span>
                    </td>
                    <td>
                        <span class="sch_board" style="display:none;">Board
                         <div>
                            <select class="form-control b_Name " name="b_Name" >
                                <option disabled selected="selected"> Select Board</option>
                                <option  value="other" style="background-color:peachpuff;">Other</option>
                                <option style="background-color:plum;">IGCSE-Cambridge</option>
                                <option >Federal BISE</option>
                                <option>PBTE Punjab Board Of Technical Education</option>
                                <option >Mirpur AJK BISE</option>
                                <option >Faisalabad BISE</option>
                                <option >Gujranwala BISE</option>
                                <option >Lahore BISE</option>
                                <option >Bahawalpur BISE</option>
                                <option >Multan BISE</option>
                                <option >Rawalpindi BISE</option>
                                <option >Sahiwal BISE</option>
                                <option >Sargodha BISE</option>
                                <option >Dera Ghazi Khan BISE</option>
                                <option >Karachi BISE</option>
                                <option >Sukkur BISE</option>
                                <option >Hyderabad BISE</option>
                                <option >Larkana BISE</option>
                                <option >Mirpur Khas BISE</option>
                                <option >Abbottabad BISE</option>
                                <option >Bannu BISE</option>
                                <option >Malakand BISE</option>
                                <option >Peshawar BISE</option>
                                <option >Kohat BISE</option>
                                <option >Mardan BISE</option>
                                <option >Swat BISE</option>
                                <option >Dera Ismail Khan BISE</option>
                                <option >Quetta BISE</option>
                                <option >Turbat BISE</option>
                                <option >Loralai BISE</option>
                                <option >Khuzdar BISE</option>
                                <option >Dera Murad Jamali BISE</option>


                            </select><br>
                        {{-- <input type="hidden" id="real_college_university_names"/> --}}
                        <div class="sch_otherboard" style=" margin-top: -20px; display:none;">
                        <input type="text"   name="sch_otherboard" id="sch_otherboard" class="form-control"/>
                        </div></div></span>
                    </td>
                    <td>
                        <span class="sch_subjects" style="display:none;">
                            <div>
                                <b> Subjects </b>
                                <select class="form-control subjects_school" name="s_subjects" onchange="add_newsub(this)">

                                </select><br>
                                <div class="subjectsschool_other" style=" margin-top: -20px; display:none;">
                                <input type="text"   name="subjectsschool_other" id="subjectsschool_other" class="form-control"/>
                                </div>
                            </div>
                        </span>
                    </td>
                    <td>
                        <span class="sch_dist" style="display:none;">
                            <div>
                                <b>Distinction</b>
                                <select class="form-control" name="dist">
                                    <option value=""></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </span>
                    </td>
                    <td></td>

                </tr>
                <tr>
                        <td>
                            <span class="school_markstotal" style="display:none">Total Marks
                                <br>
                                <input type="number" name="t_marks" id="t_marks" class="form-control"> </span>
                            </td>
                            <td>
                                <span class="school_marksobtained" style="display:none"> Achieved Marks
                                    <br>
                                    <input type="number" name="a_marks" id="a_marks" class="form-control">
                                </span>
                            </td>
                            <td>
                                <span class="sch_percentage" style="display:none">Percentage %<br>
                                <input type="number" step="0.01" name="sch_percentage" id="percentage" value="" class="form-control" ></span>
                            </td>

                            <td>
                                <span class="sch_div" style="display:none;">Division
                                    <br>
                                    <input type="text" name="divi" id="division" value="" class="form-control">
                                </span>
                            </td>
                            <td>
                                <span class="Grades_olevel" style="display:none">Grades  <br>
                                <input type="string" name="grades_olevel" id="grades_olevel" class="form-control"> </span>
                            </td>
                    </tr>

                <tr >
                    <td>
                        <div>
                            <b>
                                <span style="color:red; font-size:2em;">*</span>College Level</b>
                            <select class="form-control college_level" name="college_level">
                                <option value="">Select :</option>
                                <option>Intermediate</option>
                                <option>A-Level</option>
                            </select>
                        </div>
                    </td>
                </tr>

                <tr >
                    <input type="hidden" name="college_qualification_type" value="">
                    <td> <span class="col_name" style="display:none">College Name<br><input type="text" name="c_Name"
                                id="c_Name" class="form-control"></span></td>
                    <td><span class="col_board" style="display:none"> <b> Board </b>
                        <select class="form-control c_b_Name" name="c_b_Name">
                            <option disabled selected="selected"> Select Board</option>
                            <option value ="other" style="background-color:peachpuff;">Other</option>
                            <option style="background-color:plum;">IGCSE-Cambridge</option>
                            <option>Federal BISE</option>
                            <option>PBTE Punjab Board Of Technical Education</option>
                            <option>Mirpur AJK BISE</option>
                            <option>Faisalabad BISE</option>
                            <option>Gujranwala BISE</option>
                            <option>Lahore BISE</option>
                            <option>Bahawalpur BISE</option>
                            <option>Multan BISE</option>
                            <option>Rawalpindi BISE</option>
                            <option>Faisalabad BISE</option>
                            <option>Sahiwal BISE</option>
                            <option>Sargodha BISE</option>
                            <option>Dera Ghazi Khan BISE</option>
                            <option>Karachi BISE</option>
                            <option>Sukkur BISE</option>
                            <option>Hyderabad BISE</option>
                            <option>Larkana BISE</option>
                            <option>Mirpur Khas BISE</option>
                            <option>Abbottabad BISE</option>
                            <option>Bannu BISE</option>
                            <option>Malakand BISE</option>
                            <option>Peshawar BISE</option>
                            <option>Kohat BISE</option>
                            <option>Mardan BISE</option>
                            <option>Swat BISE</option>
                            <option>Dera Ismail Khan BISE</option>
                            <option>Quetta BISE</option>
                            <option>Turbat BISE</option>
                            <option>Loralai BISE</option>
                            <option>Khuzdar BISE</option>
                            <option>Dera Murad Jamali BISE</option>
                            </select><br>
                            <div class="college_otherboard" style=" margin-top: -20px; display:none;">
                            <input type="text"   name="college_otherboard" id="college_otherboard" class="form-control"/>
                            </div></span>
                            </td>
                    <td>
                        <span class="col_subjects" style="display:none">
                            <div>
                                <b> Subjects </b>
                                <select class="form-control college_subjects " name="c_subjects" onchange="add_newsub(this)">
                                </select><br>
                                <div class="c_othersubjects" style=" margin-top: -20px; display:none;">
                                        <input type="text"   name="c_othersubjects" id="c_othersubjects" class="form-control"/>
                                </div>
                            </div>
                        </span></td>


                    <td><span class="col_dist" style="display:none">
                            <div>
                                <b>Distinction</b>
                                <select class="form-control" name="c_dist">
                                        <option value=""></option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                </select>
                            </div>
                        </span></td>
                        <td></td>
                </tr>
                <tr>
                    <td>
                        <span class="col_totalmarks" style="display:none">Total Marks <br><input type="number" name="c_t_marks"
                                id="c_t_marks" class="form-control"> </span>
                    </td>
                    <td><span class="col_achievedmarks" style="display:none">Achieved Marks <br><input type="number"
                                name="c_a_marks" id="c_a_marks" class="form-control"></span> </td>

                    <td> <span class="col_percentage" style="display:none">Percentage <br>
                        <input type="number"  step="0.01" name="c_percentage" id="c_percentage" value="" class="form-control"> </span>
                    </td>

                    <td>
                        <span class="col_div" style="display:none">Division <br>
                            <input type="text" name="c_div" value="" id="c_division" class="form-control">
                    </span>
                    </td>
                    <td> <span class="col_grades" style="display:none">Grades <br><input type="string" name="c_grades"
                        id="c_grades" class="form-control"> </span> </td>

                    </tr>
            </tbody>
        </table>

        <div class="row" id="gradeducation">
            <div class="row container-fluid">

                <div class="col-md-1">
                <button type="button" id="add_grad_level"   class="btn btn-lg btn-success add_grad_level" style="width: 252px;" ><span
                     class="glyphicon glyphicon-plus"> Add Graduation Level</span></button>
            </div>

        </div>
        </div>

        <hr/>
        @if (isset($applicant->ApplicantHigherEducation) && $applicant->ApplicantHigherEducation!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantHigherEducation as $high_edu)
              @if ($high_edu->bach_year=='4 years' || $high_edu->bach_year=='2 years')
                <div class="row">
                  <div class="col-md-4">
                    Graduate Level
                    <br>
                    <input type="text" value="{{$high_edu->bach_year}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-4">
                    Institution Name
                    <br>
                    @if (isset($high_edu->University->name))
                      <input type="text" value="{{$high_edu->University->name}}" class="form-control" disabled>
                    @endif
                  </div>
                  <div class="col-md-4">
                    Degree
                    <br>
                    @if (isset($high_edu->HigherSubject->subject_name))
                      <input type="text" value="{{$high_edu->HigherSubject->subject_name}}" class="form-control" disabled>
                    @endif
                  </div>
                </div>
                <div class="row">
                  @if ($high_edu->bach_year=='4 years')
                    <div class="col-md-2">
                      CGPA/4
                      <br>
                      <input type="text" value="{{$high_edu->cgpa}}" class="form-control" disabled>
                    </div>
                    <div class="col-md-2">
                      Final DMC Date
                      <br>
                      <input type="text" value="{{$high_edu->final_dmc_date}}" class="form-control" disabled>
                    </div>

                  @endif
                  <div class="col-md-2">
                    Total Marks
                    <br>
                    <input type="text" value="{{$high_edu->total_marks}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Achieved Marks
                    <br>
                    <input type="text" value="{{$high_edu->achieved_marks}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Division
                    <br>
                      <input type="text" value="{{$high_edu->division}}" class="form-control" disabled>
                  </div>
                  </div>
                  <div class="col-md-2">
                    Percentage
                    <br>
                      <input type="text" value="{{$high_edu->percentage}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Distinction
                    <br>
                      <input type="text" value="{{$high_edu->distinction}}" class="form-control" disabled>
                  </div>
              @endif
            @endforeach
          </div>
        @endif
        <div class="row" id="postgradeducation" style="margin-top:5px;">
                <div class="col-md-1">
                    <button type="button" id="add_postgrad_level"   class="btn btn-lg btn-success add_postgrad_level" style="width: 252px;" ><span
                            class="glyphicon glyphicon-plus"> Add Post Graduation Level</span></button>
                </div>
        </div>
        @if (isset($applicant->ApplicantHigherEducation) && $applicant->ApplicantHigherEducation!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantHigherEducation as $high_edu)
              @if ($high_edu->qualification_type=='post_grad')
              <div class="row">
                <div class="col-md-4">
                  Institution Name
                  <br>
                  @if (isset($high_edu->University->name))
                    <input type="text" value="{{$high_edu->University->name}}" class="form-control" disabled>
                  @endif
                </div>
                <div class="col-md-4">
                  Degree
                  <br>
                  @if (isset($high_edu->HigherSubject->subject_name))
                    <input type="text" value="{{$high_edu->HigherSubject->subject_name}}" class="form-control" disabled>
                  @endif
                </div>
                <div class="col-md-2">
                  CGPA/4
                  <br>
                  <input type="text" value="{{$high_edu->cgpa}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Final DMC Date
                  <br>
                  <input type="text" value="{{$high_edu->final_dmc_date}}" class="form-control" disabled>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  Total Marks
                  <br>
                  <input type="text" value="{{$high_edu->total_marks}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Achieved Marks
                  <br>
                  <input type="text" value="{{$high_edu->achieved_marks}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Division
                  <br>
                    <input type="text" value="{{$high_edu->division}}" class="form-control" disabled>
                </div>
                </div>
                <div class="col-md-2">
                  Percentage
                  <br>
                    <input type="text" value="{{$high_edu->percentage}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Distinction
                  <br>
                    <input type="text" value="{{$high_edu->distinction}}" class="form-control" disabled>
                </div>
              @endif
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="phdeducation" style="margin-top:5px;">
                <div class="col-md-1">
                    <button type="button" id="add_phd_level"   class="btn btn-lg btn-success add_phd_level" style="width: 252px;" ><span
                            class="glyphicon glyphicon-plus"> Add PHD Level</span></button>
                </div>
        </div>
        @if (isset($applicant->ApplicantHigherEducation) && $applicant->ApplicantHigherEducation!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantHigherEducation as $high_edu)
              @if ($high_edu->qualification_type=='PHD')
              <div class="row">
                <div class="col-md-2">
                  Institution Name
                  <br>
                  @if (isset($high_edu->University->name))
                    <input type="text" value="{{$high_edu->University->name}}" class="form-control" disabled>
                  @endif
                </div>
                <div class="col-md-2">
                  Subject Name
                  <br>
                  @if (isset($high_edu->HigherSubject->subject_name))
                    <input type="text" value="{{$high_edu->HigherSubject->subject_name}}" class="form-control" disabled>
                  @else
                    <input type="text" value="{{$high_edu->HigherSubject->subject_name}}" class="form-control">
                  @endif
                </div>
                <div class="col-md-2">
                  Thesis Topic
                  <br>
                  <input type="text" value="{{$high_edu->thesis_topic}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Date
                  <br>
                  <input type="text" value="{{$high_edu->date_of_grad}}" class="form-control" disabled>
                </div>
              </div>
              @endif
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="postdoceducation" style="margin-top:5px;">
            <div class="col-md-1">
                <button type="button" id="add_postdoc_level"   class="btn btn-lg btn-success add_postdoc_level" style="width: 252px;" ><span
                        class="glyphicon glyphicon-plus"> Add Post Doctral Level</span></button>
             </div>
        </div>
        @if (isset($applicant->ApplicantHigherEducation) && $applicant->ApplicantHigherEducation!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantHigherEducation as $high_edu)
              @if ($high_edu->qualification_type=='post_graddoc')
              <div class="row">
                <div class="col-md-2">
                  Institution Name
                  <br>
                  @if (isset($high_edu->University->name))
                    <input type="text" value="{{$high_edu->University->name}}" class="form-control" disabled>
                  @endif
                </div>
                <div class="col-md-2">
                  Subject Name
                  <br>
                  @if (isset($high_edu->HigherSubject->subject_name))
                    <input type="text" value="{{$high_edu->HigherSubject->subject_name}}" class="form-control" disabled>
                  @endif
                </div>
                <div class="col-md-2">
                  Thesis Topic
                  <br>
                  <input type="text" value="{{$high_edu->thesis_topic}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Date
                  <br>
                  <input type="text" value="{{$high_edu->date_of_grad}}" class="form-control" disabled>
                </div>
              </div>
              @endif
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="certifications" style="margin-top:5px;">
            <div class="col-md-5">
             <h3> <b>Certifications</b>
            <button type="button" id="add_morecertifications" class="btn btn-md btn-info add_certification "><span
            class="glyphicon glyphicon-plus"></button></h3>
          </div>
        </div>
        @if (isset($applicant->ApplicantCertification) && $applicant->ApplicantCertification!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantCertification as $certification)
              <div class="row">
                <div class="col-md-2">
                  Certification Name
                  <br>
                    <input type="text" value="{{$certification->name_certifictaion}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Certificate Number
                  <br>
                    <input type="text" value="{{$certification->certification_number}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Issued By
                  <br>
                  <input type="text" value="{{$certification->issued_by}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Date of Issuance
                  <br>
                  <input type="text" value="{{$certification->date_of_issuance}}" class="form-control" disabled>
                </div>
              </div>
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="trainings" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Trainings</b>
                    <button type="button" id="add_moretrainings" class="btn btn-md btn-info add_moretrainings" ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
        </div>
        @if (isset($applicant->ApplicantTraining) && $applicant->ApplicantTraining!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ApplicantTraining as $training)
              <div class="row">
                <div class="col-md-2">
                  Training Name
                  <br>
                    <input type="text" value="{{$training->training_name}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  By
                  <br>
                    <input type="text" value="{{$training->by_name}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Duration
                  <br>
                  <input type="text" value="{{$training->duration}}" class="form-control" disabled>
                </div>
              </div>
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="researchpaper" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Research Papers</b>
                    <button type="button" id="add_morerps" class="btn btn-md btn-info add_morerps" ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
        </div>
        @if (isset($applicant->ResearchWork) && $applicant->ResearchWork!=NULL)
          <div class="container-fluid">
            @foreach ($applicant->ResearchWork as $research)
              @if ($research->researchtype=='Conference')
              <div class="row">
                <div class="col-md-2">
                  Paper Type
                  <br>
                    <input type="text" value="{{$research->researchtype}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Name of Conference
                  <br>
                    <input type="text" value="{{$training->name}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Published Year
                  <br>
                  <input type="text" value="{{$training->duration}}" class="form-control" disabled>
                </div>
                <div class="col-md-2">
                  Paper of Topic
                  <br>
                  <input type="text" value="{{$training->conference}}" class="form-control" disabled>
                </div>
              </div>
              @else
                <div class="row">
                  <div class="col-md-2">
                    Paper Type
                    <br>
                      <input type="text" value="{{$research->researchtype}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Name of Journal
                    <br>
                      <input type="text" value="{{$training->name}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Published Year
                    <br>
                    <input type="text" value="{{$training->published_year}}" class="form-control" disabled>
                  </div>
                  <div class="col-md-2">
                    Paper of Topic
                    <br>
                    <input type="text" value="{{$training->date_published}}" class="form-control" disabled>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        @endif
        <hr/>

        <div class="row" id="professional_membership" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Professional Membership</b>
                    <button type="button" id="addmore_pro_member" class="btn btn-md btn-info    " ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
        </div>
        @if (isset($applicant->ProfessionalCertificationMember))
          @foreach ($applicant->ProfessionalCertificationMember as $certifica)
            <div class="row">
              <div class="col-md-2">
                Name
                <br>
                <input type="text" disabled value="{{$certifica->name}}">
              </div>
              <div class="col-md-2">
                Membership Level
                <br>
                <input type="text" disabled value="{{$certifica->membership_level}}">
              </div>
              <div class="col-md-2">
                Issued By
                <br>
                <input type="text" disabled value="{{$certifica->issued_by}}">
              </div>
              <div class="col-md-2">
                Issuance Date
                <br>
                <input type="text" disabled value="{{$certifica->issuance_date}}">
              </div>
              <div class="col-md-2">
                Registeration #
                <br>
                <input type="text" disabled value="{{$certifica->registeration}}">
              </div>
            </div>
          @endforeach
        @endif
        <hr/>
        <div class="row" style="margin-top:5px;">

                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-danger " style=" width: 252px;" id="go_demo"> Back</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-success pull-right" style="width: 252px;"id="experience"> Next</button>
                </div>
                <div class="col-md-1"></div>
        </div>
    </section>

    <section id="experienceSection" style="display:none">
        <h1 style="text-align:center;">Experience</h1>
        <table class="table table-bordered" id="exp_table">
            <tr >
                <th style="text-align:center;">Organization Name</th>
                <th style="text-align:center;">Organization Type</th>
                <th style="text-align:center;">From</th>
                <th style="text-align:center;">To</th>
                <th style="text-align:center;">Role</th>
                <th style="text-align:center;"><button type="button" id="add_moreexp" class="btn btn-success btn-sm add_moreexp"><span class="glyphicon glyphicon-plus"></span></button></th>
            </tr>
            @foreach ($applicant->ApplicantExperience as $experience)
              <tr>
                <td>{{$experience->org_name}}</td>
                <td>{{$experience->org_type}}</td>
                <td>{{$experience->start_date}}</td>
                <td>{{$experience->end_date}}</td>
                <td>{{$experience->role}}</td>
              </tr>
            @endforeach
            <tr>
                <td><input type="text" name="org_Name[]" id="org_Name" placeholder="Enter Your Organization Name" class="form-control"></td>
                <td>
                    <select class="form-control" name="org_type[]">
                    <option value="">Select Type:</option>
                     <option value="Private/NGO">Private/NGO</option>
                    <option value="Government">Government</option>
                    <option value="International/INGO">International/INGO</option>
                    <option value="Self-Employed">Self-Employed</option>
                    <option value="Donor Agencies">Donor Agencies</option>
                    </select>
                </td>
                <td> <input type="date" name="start_date[]" id="start_date" class="form-control"></td>
                <td><input type="date" name="end_date[]" id="end_date" class="form-control"></td>
                <td><input type="text" name="role_name[]" class="form-control"></td>
                <td style="text-align:center;"><button type="button" id="remove_exp[]" onclick="remove_exp(this)" class="btn btn-danger btn-sm remove" ><span class=" glyphicon glyphicon-minus"></span></button></td>
              </tr>
        </table>
        <div class="row" style="margin-top:5px;">

                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-danger " style=" width: 252px;" id="go_edu"> Back</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-success pull-right" style="width: 252px;" id="designation"> Next</button>
                </div>
                <div class="col-md-1"></div>
        </div>
    </section>

    <section id="designationSection" style="display:none">
            <h1 style="text-align:center;">Position Applied</h1>
            <table class="table table-bordered" id="designation_table">
                <tr >
                    <th style="text-align:center;">Serial No </th>
                    <th style="text-align:center;">Position Applied</th>
                    <th style="text-align:center;"><button type="button" id="add_moredesignation" class="btn btn-success btn-sm add_moredesignation"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
                @php
                  $i=1;
                @endphp
                @foreach ($applicant->ApplicantAppliedFor as $applied_for)
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$applied_for->position_name}}</td>
                    <td></td>
                  </tr>
                  @php
                    $i++;
                  @endphp
                @endforeach
            </table>

              <h1 style="text-align:center; background-color:azure;">Upload Documents</h1>
            <table class="table table-bordered" id="attach_documents">
                    <tr >
                        <th style="text-align:center;">Upload Picture</th>
                        <th style="text-align:center;">Upload CV</th>
                        <th style="text-align:center;"><button type="button" id="add_moredocuments" class="btn btn-success btn-sm add_moredocuments"><span class="glyphicon glyphicon-plus"></span></button></th>
                    </tr>
            </table>

            <div class="row" style="margin-top:5px;">

                    <div class="col-md-1"></div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-md btn-danger " style=" width: 252px;" id="go_exp"> Back</button>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-md btn-primary pull-right" style=" width: 252px;"
                            id="submit"> Submit</button>
                    </div>
                    <div class="col-md-1"></div>
            </div>
    </section>


</form>
@endsection
@section('scriptTags')
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
    <script src="{{asset('js/intlTelInput.js')}}"></script>
    <script>
    $(document).ready(function() {

      $(document).keypress(function(event){

        if (event.keyCode == 10 || event.keyCode == 13)
        {
            event.preventDefault();
        }
      });
    });
        $('#mobilenumber, #mobile_number2').on('blur',function(){
        if($(this).intlTelInput("isValidNumber"))
        {
            $(this).parent().siblings('.valid-msg').removeClass('hide');
            $(this).parent().siblings('.error-msg').addClass('hide');
        }else{
            $(this).parent().siblings('.error-msg').removeClass('hide');
            $(this).parent().siblings('.valid-msg').addClass('hide');
        }
        });
        $(".mobile_number1").intlTelInput({
                allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "off",
            dropdownContainer: "body",
            formatOnDisplay: false,
            geoIpLookup: function(callback) {
                $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
                });
            },
            hiddenInput: "full_number_mobile1",
            initialCountry: "auto",
            localizedCountries: { 'pk': 'Pakistan' },
            nationalMode: false,
            //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "MOBILE",
            //   preferredCountries: ['cn', 'jp'],
            separateDialCode: true,
            utilsScript: "{{asset('js/utils.js')}}"
        });
        $("#mobile_number2").intlTelInput({
            allowDropdown: true,
        autoHideDialCode: false,
        autoPlaceholder: "off",
        dropdownContainer: "body",
        formatOnDisplay: false,
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
            });
        },
        hiddenInput: "full_mobilenumber2",
        initialCountry: "auto",
        localizedCountries: { 'pk': 'Pakistan' },
        nationalMode: false,
            //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "MOBILE",
            //   preferredCountries: ['cn', 'jp'],
            separateDialCode: true,
            utilsScript: "{{asset('js/utils.js')}}"
        });

        $("#mobilenumber").intlTelInput({
            allowDropdown: true,
            autoHideDialCode: false,
            autoPlaceholder: "off",
            dropdownContainer: "body",
            formatOnDisplay: false,
            geoIpLookup: function(callback) {
                $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
                });
                },
            hiddenInput: "full_mobilenumber1",
            initialCountry: "auto",
            localizedCountries: { 'pk': 'Pakistan' },
            nationalMode: false,
            //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
            placeholderNumberType: "PHONE",
            //   preferredCountries: ['cn', 'jp'],
            separateDialCode: true,
            utilsScript: "{{asset('js/utils.js')}}"
        });
        $("#phone").intlTelInput({
        allowDropdown: true,
        autoHideDialCode: false,
        autoPlaceholder: "on",
        dropdownContainer: "body",
        formatOnDisplay: false,
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            var countryCode = (resp && resp.country) ? resp.country : "";
            callback(countryCode);
            });
        },
        hiddenInput: "full_phone",
        initialCountry: "auto",
        localizedCountries: { 'pk': 'Pakistan' },
        nationalMode: false,
        //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "PHONE",
        //   preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: "{{asset('js/utils.js')}}"
        });

    </script>
    <script>
            $(document).ready(function() {

                $(document).keypress(function(event){

                if (event.keyCode == 10 || event.keyCode == 13)
                {
                    event.preventDefault();
                }
                });
                });

            $('button#basic_info , .demographicsSection').on('click', function () {

                $('section#cnicSection').hide(1000);
                $('section#experienceSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('#demographicsSection').show(1000);

            });


            $('button#education, .educationSection').on('click', function () {

                $('#demographicsSection').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#experienceSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('section#educationSection').show(1000);


            });

            $('button#go_demo, .demographicsSection').on('click', function () {

                $('section#cnicSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#experienceSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('#demographicsSection').show(1000);

            });

            $('button#go_cnic,.cnicSection').on('click', function () {
                $('#demographicsSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('section#experienceSection').hide(1000);
                $('section#cnicSection').show(1000);
            });

            $('button#experience, .experienceSection').on('click', function () {
                $('#demographicsSection').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#experienceSection').show(1000);
            });

            $('button#go_edu').on('click', function () {
                $('section#experienceSection').hide(1000);
                $('#demographicsSection').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#designationSection').hide(1000);
                $('section#educationSection').show(1000);
            });

            $('button#designation, .designationSection').on('click', function () {
                $('section#experienceSection').hide(1000);
                $('#demographicsSection').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#designationSection').show(1000);
            });

            $('button#go_exp, .experienceSection').on('click', function () {
                $('#designationSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#demographicsSection').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#experienceSection').show(1000);
            });

            $('.b_Name').on('change', function ()
                {

                    if($('.b_Name').val()=="other")
                    {
                        $('.sch_otherboard').show(1000);
                        }
                    else{
                        $('.sch_otherboard').hide(1000);
                        $('.b_Name').show(1000);

                }
            });

        function add_newsub(e){
            if($(e).hasClass("subjects_school"))
            {
                // console.log('sgdua');
                if($('.subjects_school :selected').text()=='Other')
                    {
                        // console.log('shdgas');
                    $('.subjectsschool_other').show(1000);
                    }
                else
                {
                    $('.subjectsschool_other').hide(1000);
                    $('.subjects_school').show(1000);
                }
            }
            else if($(e).hasClass("college_subjects"))
            {
                if($('.college_subjects :selected').text()=='Other')
                    {
                    $('.c_othersubjects').show(1000);
                    }
                else
                {
                    $('.c_othersubjects').hide(1000);
                    $('.college_subjects').show(1000);
                }

            }
        }

        $('.c_b_Name').on('change', function () {
            if($('.c_b_Name').val()=="other")
            {
                $('.college_otherboard').show(1000);
                }
            else{
                $('.college_otherboard').hide(1000);
                $('.c_b_Name').show(1000);
            }

        });

            //school percentage and division
            $("#t_marks, #a_marks").keyup( function(){

                var total_marks = $("#t_marks").val();
                var achieved_marks = $("#a_marks").val();

                var result = (achieved_marks/total_marks)*100;
                result= result.toFixed(2);
                $("#percentage").val(result);

                if(result >=60)
                {
                $("#division").val('First');

                }
                else if(result >=45 && result < 60)
                {
                $("#division").val('Second');

                }
                else if(result >=33 && result < 45)
                {
                $("#division").val('Third');
                }
        });


        //college percentage and division
        $("#c_t_marks, #c_a_marks").keyup( function(){

            var total_marks = $("#c_t_marks").val();
            var achieved_marks = $("#c_a_marks").val();

            var result = (achieved_marks/total_marks)*100;
            result= result.toFixed(2);
            $("#c_percentage").val(result);

            if(result >=60 && result <=100)
            {
            $("#c_division").val('First');

            }
            else if(result >=36 && result < 60)
            {
            $("#c_division").val('Second');

            }
            else if(result >=33 && result < 36)
            {
            $("#c_division").val('Third');

            }
            else if(result >=0 && result < 33)
            {
            $("#c_division").val('Fail');

            }

        });



        $('.dom_province').on('change', function () {
            //  $(this).val();
            $.ajax({
                        type: "POST",
                        url: '{{route("getDistrict")}}',
                        data: {
                        "_token": "{{ csrf_token() }}",
                        'province_id' : $(this).val()},
                        success: function(data){
                            // console.log(data);
                        for (let index = 0; index < data.length; index++) {
                            $('.dom_district').append('<option value="'+data[index].id+'" selected="selected">'+data[index].name+'</option>');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                        console.log(JSON.stringify(jqXHR));
                        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
        });

            $('.school_level').on('change', function () {
                if ($('.school_level').val() == 'Matric') {
                    $('.Grades_olevel').hide(1000);
                    $('.subjects_school').children().remove();
                    $('.subjects_school').append('<option disabled selected="selected"> Select Subject</option><option value="other" style="background-color:peachpuff;">Other</option>');
                    $.ajax({
                                type: "POST",
                                url: '{{route("getSecondaryCustomSubject")}}',
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : $(this).val()},
                                success: function(data){
                                    // console.log(data);
                                    for (let index = 1; index <=data.length; index++) {
                                        $('.subjects_school').append('<option value="'+data[index].id+'" selected="selected">'+data[index].subject_name+'</option>');
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                    $('input[name="qualification"]').val("School")
                    $('.sch_name').show(1000);
                    $('.sch_board').show(1000);
                    $('.sch_subjects').show(1000);
                    $('.school_markstotal').show(1000);
                    $('.school_marksobtained').show(1000);
                    $('.sch_percentage').show(1000);
                    $('.sch_div').show(1000);
                    $('.sch_dist').show(1000);

                } else if ($('.school_level').val() == 'O-Level') {
                    $('input[name="qualification"]').val("O-Level");
                    $('.subjects_school').children().remove();
                    $('.subjects_school').append('<option disabled selected="selected"> Select Subject</option><option value="other" style="background-color:peachpuff;">Other</option>');
                    $.ajax({
                                type: "POST",
                                url: '{{route("getSecondaryCustomSubject")}}',
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : $(this).val()},
                                success: function(data){
                                    // console.log(data);
                                    for (let index = 0; index < data.length; index++) {
                                        $('.subjects_school').append('<option value="'+data[index].id+'" selected="selected">'+data[index].subject_name+'</option>');
                                    }
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                    $('.sch_name').show(1000);
                    $('.sch_board').show(1000);
                    $('.sch_subjects').show(1000);
                    $('.school_markstotal').show(1000);
                    $('.school_marksobtained').show(1000);
                    $('.sch_percentage').show(1000);
                    $('.Grades_olevel').show(1000);
                    $('.sch_div').show(1000);
                    $('.sch_dist').show(1000);
                }
            });

            $('.college_level').on('change', function () {
                if ($('.college_level').val() == 'Intermediate') {
                    $('.col_grades').hide(1000);

                    $('input[name="college_qualification_type"]').val("Intermediate")
                    $('.college_subjects').children().remove();
                    $('.college_subjects').append('<option disabled selected="selected">Select Subject</option><option value="other" style="background-color:peachpuff;">Other</option>');
                    $.ajax({
                                type: "POST",
                                url: '{{route("getSecondaryCustomSubject")}}',
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : $(this).val()},
                                success: function(data){
                                    // console.log(data);
                                for (let index = 0; index < data.length; index++) {
                                    $('.college_subjects').append('<option value="'+data[index].id+'" selected="selected">'+data[index].subject_name+'</option>');
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            }
                        });
                    $('.col_name').show(1000);
                    $('.col_board').show(1000);
                    $('.col_subjects').show(1000);
                    $('.col_totalmarks').show(1000);
                    $('.col_achievedmarks').show(1000);
                    $('.col_percentage').show(1000);
                    $('.col_div').show(1000);
                    $('.col_dist').show(1000);

                } else if ($('.college_level').val() == 'A-Level') {
                    $('input[name="college_qualification_type"]').val("A-Level")
                    $('.college_subjects').children().remove();
                    $('.college_subjects').append('<option disabled selected="selected"> Select Subject</option><option value="other" style="background-color:peachpuff;">Other</option>');
                    $.ajax({
                                type: "POST",
                                url: '{{route("getSecondaryCustomSubject")}}',
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : $(this).val()},
                                success: function(data){
                                    // console.log(data);
                                for (let index = 0; index < data.length; index++) {
                                    $('.college_subjects').append('<option value="'+data[index].id+'" selected="selected">'+data[index].subject_name+'</option>');
                                }
                            },
                            error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                            }
                        });
                    $('.col_totalmarks').show(1000);
                    $('.col_achievedmarks').show(1000);
                    $('.col_grades').show(1000);
                    $('.col_percentage').show(1000);
                    $('.col_name').show(1000);
                    $('.col_board').show(1000);
                    $('.col_subjects').show(1000);
                    $('.col_div').show(1000);
                    $('.col_dist').show(1000);
                }
            });



            $('button#add_grad_level').click(function(e){

                var eduprogram ='<div class="row container-fluid"  id="new_edurow">'
                                +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                                +'<div class="row" >'
                                +'<div class="col-md-4">Graduate Level'
                                +'<select class="form-control educationYear" name="bch_year[]" onchange="add_newdata(this)">'
                                +'<option value="">Pick year:</option>'
                                +' <option>2 years</option>'
                                +'<option>4 years</option>'
                                +'</select> </div></div></div>';

                $('#gradeducation').append(eduprogram);
            });

            $('button#add_postgrad_level').click(function(e)
            { var masterSubjects=[];
                var secndvar='';
                var thirdvar='';

                var univ=[];
                var uniname_start='';
                var uniname_end='';

                var eduprogram ='<div class="row container-fluid" id="new_postgradrow">'
                            +'<div class="row">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<input type="hidden" name="qualification_postuniv[]" value="post_grad">'
                            +'<div class="col-md-4 institute_name">Institution Name'
                            +'<select name="pg_Name[]" class="form-control" onchange="add_newUC(this)">'
                            +'<option value=""></option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "get",
                                url: '{{route("getuniv")}}',
                                async: false,
                                success: function(data){
                                // console.log(data);
                                univ = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < univ.length; ++i) {
                                uniname_start=uniname_start+'<option value="'+univ[i].id+'">'+univ[i].name+'</option>';
                            }
                            uniname_end='</select><br>'
                            +'<input type="hidden" id="university_n[]"/>'
                            +'<div id="otherpost_univ" style=" margin-top: -20px; display:none;">'
                            +'<input type="text"  name="otherpost_univ[]" id="otherpost_univ" class="form-control"/>'
                            +'</div></div>'
                            +'<div class="col-md-4 postgrad_subjects">Degree'
                            +'<select class="form-control" name="post_grad_subject[]" onchange="add_newdegree(this)">'
                            +'<option disabled selected="selected">Select Degree</option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "POST",
                                url: '{{route("getCustomSubject")}}',
                                async: false,
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : 'masters'},
                                success: function(data){
                                // console.log(data);
                                masterSubjects = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < masterSubjects.length; ++i) {
                            secndvar=secndvar+'<option value="'+masterSubjects[i].id+'">'+masterSubjects[i].subject_name+'</option>';
                            }
                            thirdvar='</select></br>'
                            +'<div  style=" margin-top: -20px; display:none;">'
                            +'<input type="text"  name="other_postgradsubjects[]" id="other_postgradsubjects" class="form-control "/>'
                            +'</div></div>'
                            +'<div class="col-md-3 distinction">Distinction'
                            +'<select class="form-control" name="pg_distinction[]">'
                            +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div></div></div>'
                            +'<div class="row">'
                            +'<div class="col-md-12"> <div class="col-md-1 post_cgpa">CGPA/4<input type="number" step="0.01" name="pg_cgpa[]" id="pg_cgpa" class="form-control pg_cgpa" ></div>'
                            +'<div class="col-md-2 marks">'
                            +'Total Marks<input type="number" name="postgrad_marks[]"  class="form-control postgrad_marks" /></div>'
                            +'<div class="col-md-2 achievedmarks">Achieved Marks<input type="number" onkeyup="calculatePercentagePostGrad(this)" name="postgrad_achievedmarks[]"  class="form-control postgrad_achievedmarks"></div>'
                            +'<div class="col-md-2 post_percentage">Percentage<input type="number" step="0.01" name="pg_percentage[]" id="pg_percentage" class="form-control pg_percentage"></div>'
                            +'<div class="col-md-2 division"> Division'
                            +'<input type="string" name="postgrad_division[]" value="" class="form-control postgrad_division"></div>'
                            +'<div class="col-md-2 post_dmc">Final DMC Date<input type="date" name="pg_dmc_date[]" id="pg_dmc_date" class="form-control"></div>'
                            +'<div class="col-md-1 remove_grad_level"><button type="button" id="remove_grad_level[]"  class="pull-left btn btn-danger btn-sm add" style=" margin-top: 24px;" onclick="remove_data(this,1)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div></div>';

                    $('#postgradeducation').append(eduprogram+uniname_start+uniname_end+secndvar+thirdvar);
            });


            $('button#add_phd_level').click(function(e){
                var phdSubjects=[];
                var secndvar='';
                var thirdvar='';

                var univ=[];
                var uniname_start='';
                var uniname_end='';
                var eduprogram ='<div class="row" id="new_phdrow[]">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<input type="hidden" name="qualification_phduniv[]" value="phd">'
                            +'<div class="col-md-3 institute_name">Institution Name'
                            +'<select name="phd_Name[]" class="form-control" onchange="add_newUC(this)">'
                            +'<option value=""></option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "get",
                                url: '{{route("getuniv")}}',
                                async: false,
                                success: function(data){
                                // console.log(data);
                                univ = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < univ.length; ++i) {
                                uniname_start=uniname_start+'<option value="'+univ[i].id+'">'+univ[i].name+'</option>';
                            }
                            uniname_end='</select><br>'
                            +'<input type="hidden" id="university_n[]"/>'
                            +'<div id="otherphd_univ" style=" margin-top: -20px; display:none;">'
                            +'<input type="text"  name="otherphd_univ[]" id="otherphd_univ" class="form-control"/>'
                            +'</div></div>'
                            +'<div class="col-md-3 phd_SubjectName">Subject Name'
                            +'<select class="form-control" name="phd_SubjectName[]" onchange="add_newdegree(this)">'
                            +'<option disabled selected="selected">Select Degree</option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "POST",
                                url: '{{route("getCustomSubject")}}',
                                async: false,
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : 'phd'},
                                success: function(data){
                                // console.log(data);
                                phdSubjects = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < phdSubjects.length; ++i) {
                            secndvar=secndvar+'<option value="'+phdSubjects[i].id+'">'+phdSubjects[i].subject_name+'</option>';
                            }
                            thirdvar='</select></br>'
                            +'<div  style=" margin-top: -20px; display:none;">'
                            +'<input type="text"  name="phd_other_SubjectName[]" id="phd_other_SubjectName" class="form-control "/>'
                            +'</div></div>'
                            +'<div class="col-md-2 phd_thesis">Thesis Topic<input type="text" name="phd_thesis[]" id="phd_thesis" class="form-control">  </div>'
                            +'<div class="col-md-2 phd_dg">Final DMC Date <input type="date" name="phd_date[]" id="phd_date" class="form-control"> </div>'
                            +'<div class="col-md-1 remove_phd_level"><button type="button" id="remove_phd_level[]"  class=" btn btn-danger btn-md remove_phd_level" style="margin-top:21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';

                $('#phdeducation').append(eduprogram+uniname_start+uniname_end+secndvar+thirdvar);
        });


            $('button#add_postdoc_level').click(function(e){
                var eduprogram ='<div class="row" id="new_postdocrow[]">'
                                +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                                +'<input type="hidden" name="qualification_postdocuniv[]" value="post_doc">'
                                +'<div class="col-md-2 pd_institute_name">Institution Name<input type="text" name="pd_Name[]" id="pd_Name[]" class="form-control"> </div>'
                                +'<div class="col-md-2 postdoc_thesis">Thesis Topic<input type="text" name="pd_thesis[]" id="pd_thesis[]" class="form-control"> </div>'
                                +'<div class="col-md-2 postdoc_dg">Date Of Graduation <input type="date" name="pd_date[]" id="pd_date[]" class="form-control"> </div>'
                                +'<div class="col-md-1 remove_graddoc_level"><button type="button" id="remove_graddoc_level[]"  class="btn btn-danger btn-md " style=" margin-top: 21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';
                    $('#postdoceducation').append(eduprogram);
            });

            $('button#add_morecertifications').click(function(e){

                var certifications_app ='<div class="row" id="new_cer[]" >'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-3"><b>Certification Name</b><input type="text" name="app_cer[]" id="app_cer[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Certificate Number</b><input type="string" name="cer_num[]" id="cer_num[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Issued By </b><br> <input type="text" name="certificate_i[]" id="certificate_i[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Date Of Issuance</b> <br><input type="date" name="i_date[]" id="i_date[]" class="form-control"></div>'
                        +'<div class="col-md-1" style="margin-top: 21px;"><button type="button" id="remove_certification[]" onclick="remove_certification(this)" class="btn btn-danger btn-md "><span class="glyphicon glyphicon-minus"></span></button></div>'
                        +'</div></div>';
                    $('#certifications').append(certifications_app);

            });

            $('button#add_moretrainings').click(function(e){

                var training_app ='<div class="row" id="new_tr[]" >'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-3"> <b>Training Name</b> <input type="text" name="app_tr[]" id="app_tr[]" class="form-control"></div>'
                        +'<div class="col-md-3"><b>By </b><br> <input type="text" name="tr_by[]" id="tr_by[]" class="form-control"></div>'
                        +'<div class="col-md-3"><b>Duration</b><br><input type="text" name="tr_duration[]" id="tr_duration[]" class="form-control"></div>'
                        +'<div class="col-md-2" style="margin-top: 21px;"><button type="button" name="remove_training[]" id="remove_training[]" onclick="remove_training(this)" class="btn btn-md btn-danger"><span class="glyphicon glyphicon-minus"></span></button></div>'
                        +'</div></div>';

                    $('#trainings').append(training_app);

            });

            $('button#add_morerps').click(function(e){

                var research_app ='<div class="row" id="new_rp" >'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-2">Paper Type'
                        +'<select class="form-control researchType" name="researchType[]" onchange="add_newresearch(this)">'
                        +'<option value=""></option>'
                        +' <option>Journal</option>'
                        +'<option>Conference</option>'
                        +'</select></div></div></div>';

                    $('#researchpaper').append(research_app);

            });

            $('button#addmore_pro_member').click(function(e){

                var professional_app ='<div class="row" id="new_pm" >'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-3"> <b>Name</b> <input type="text" name="app_pmname[]" id="app_pmname[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Membership Level</b><br> <input type="text" name="m_level[]" id="m_level[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Issued By</b><br><input type="string" name="issued_name[]" id="issued_name[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Issuance Date</b><br><input type="date" name="pm_doi[]" id="pm_doi[]" class="form-control"></div>'
                        +'<div class="col-md-2"><b>Registeration # </b><br><input type="string" name="pm_reg[]" id="pm_reg[]" class="form-control"></div>'
                        +'<div class="col-md-1 " style="margin-top: 21px;"><button type="button" name="remove_membership[]" id="remove_membership[]" onclick="remove_member(this)" class="btn btn-md btn-danger "><span class="glyphicon glyphicon-minus"></span></button></div>'
                        +'</div></div>';

                    $('#professional_membership').append(professional_app);

            });

        function add_newresearch(e)
            {
                var researchtype = $(e).val();

                var research="";

                if(researchtype=='Journal')
                {
                research='<div class="col-md-2 J_name">Name Of Journal<input type="text" name="app_jr[]" id="app_jr[]" class="form-control"></div>'
                    +'<div class="col-md-2 J_pyear">Published Year<input type="number" name="journal_yr[]" id="app_yr[]" class="form-control"></div>'
                    +'<div class="col-md-2 J_date">Date<input type="date" name="journal_dt[]" id="journal_dt" class="form-control"></div>'
                    +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class=" btn btn-danger btn-md " style=" margin-top: 21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';

                }
                else if(researchtype=='Conference')
                {
                    research='<div class="col-md-2 research_paper">Name of Conference<input type="text" name="app_conf[]" id="app_conf" class="form-control"></div>'
                    +'<div class="col-md-2 conf_pyear">Published Year<input type="number" name="conf_yr[]" id="conf_yr" class="form-control"></div>'
                    +'<div class="col-md-2 J_date">Date<input type="date" name="rp_dt[]" id="rp_dt" class="form-control"></div>'
                    +'<div class="col-md-2 conf_name">Paper Topic<input type="text" name="app_rp[]" id="app_rp" class="form-control"></div>'
                    +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class=" btn btn-danger btn-md " style=" margin-top: 21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';
                }
                $(e).parent().parent().find('.remove').remove();
                $(e).parent().parent().find('.J_name').remove();
                $(e).parent().parent().find('.J_pyear').remove();
                $(e).parent().parent().find('.J_date').remove();
                $(e).parent().parent().find('.research_paper').remove();
                $(e).parent().parent().find('.conf_pyear').remove();
                $(e).parent().parent().find('.conf_name').remove();
                $(e).parent().parent().append(research);
        }

            //experience section
            $('button#add_moreexp').click(function(e){

                var exp_row = '';
                exp_row += '<tr>';
                exp_row += '<td><input type="text" name="org_Name[]" id="org_Name" placeholder="Enter Your Organization Name" class="form-control"></td>';
                exp_row += '<td><select class="form-control" name="org_type[]"><option value="">Select Type:</option><option value="Private/NGO">Private/NGO</option><option value="Government">Government</option><option value="International/INGO">International/INGO</option><option value="Self-Employed">Self-Employed</option><option value="Donor Agencies">Donor Agencies</option></select></td>';
                exp_row += '<td> <input type="date" name="start_date[]" id="start_date" class="form-control"></td>';
                exp_row +='<td><input type="date" name="end_date[]" id="end_date" class="form-control"></td>'
                exp_row +='<td><input type="text" name="role_name[]" class="form-control"></td>'
                exp_row += '<td style="text-align:center;"><button type="button" id="remove_exp[]" onclick="remove_exp(this)" class="btn btn-danger btn-sm remove" ><span class=" glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#exp_table').append(exp_row);
            });

            //designation
            var i=0;
            $('button#add_moredesignation').click(function(e){

                var designation_row = '';
                designation_row += '<tr>';
                designation_row += '<td style="text-align:center;">'+ ++i +' </td>';
                designation_row += '<td><select class="form-control" name="app_designation[]"><option value="">Select Designation:</option><option >Deputy Director (Admin/HR)</option><option >Deputy Director (Finance & Accounts)</option><option >Deputy Director (IT)</option><option >Communication Specialist</option><option >Assistant Director IT</option><option >Assistant Director (Programming)</option><option >Assistant Director (Database)</option><option >Admin/Hr Officer </option><option >Finance Officer</option><option >Audit Officer</option><option >Research Associates</option><option >M & E Expert</option><option >Socio Economic Development Specialist</option><option >Evaluation Specialist </option><option >Project Management Specialist</option><option >Financial Management Specialist</option><option >Procurement Specialist</option></select></td>';
                designation_row += '<td style="text-align:center;"><button type="button" id="remove_designation[]" onclick="remove_designation(this)" class="btn btn-danger btn-sm remove" style="text-align:center;"><span class=" glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#designation_table').append(designation_row);
            });

            //documents
            $('button#add_moredocuments').click(function(e){

                var documents_row = '';
                documents_row += '<tr>';
                documents_row +='<td> <input type="file" name="picture[]" class="form-control" multiple></td>'
                documents_row += '<td> <input type="file" name="cv[]" class="form-control" multiple></td>';
                documents_row += '<td style="text-align:center;"><button type="button" name="remove_documents[]" id="remove_documents[]" onclick="remove_documents(this)" class="btn btn-danger btn-sm remove" style="text-align:center;"><span class=" glyphicon glyphicon-minus"></span></button></td></tr>';
                $('#attach_documents').append(documents_row);
            });

        function add_newdata(e)
            {
                var education_y = $(e).val();

                var add_year_fields="";
                var bachelorSubjects=[];
                var secndvar='';
                var thirdvar='';
                var  univ=[];
                var uniname_start='';
                var uniname_end='';
                if(education_y=='2 years')
                {
                    add_year_fields='<div class="col-md-4 years">'
                        +'<input type="hidden" name="qualification_univ[]" value="bachelor2year">'
                    +'<span class="twoyear_grad" id="twoyear_grad" >'
                +'Institution Name<select class="form-control"  id="college_university_names" name="college_university_names[]" onchange="add_newUC(this)">'
                            +'<option >Select Degree</option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "get",
                                url: '{{route("getuniv")}}',
                                async: false,
                                success: function(data){
                                // console.log(data);
                                univ = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < univ.length; ++i) {
                                uniname_start=uniname_start+'<option value="'+univ[i].id+'">'+univ[i].name+'</option>';
                            }
                            uniname_end='</select> <br>'
                            +'<input type="hidden" id="real_college_university_names"/>'
                            +'<div id="other_college_univ" style=" margin-top: -20px; display:none;">'
                            +'<input type="text"   name="other_collegebox[]" id="other_collegebox[]" class="form-control"/>'
                            +' </div></span></div>'
                            +'<div class="col-md-4 colsubjects">'
                            +'<span >'
                            +'Degree<select class="form-control u_collegesubjects" name="u_collegesubjects[]" onchange="add_newdegree(this)">'
                            +'<option disabled selected="selected">Select Degree</option>'
                            +'<option value="other" style="background-color:peachpuff;">Other</option>';
                            $.ajax({
                                type: "POST",
                                url: '{{route("getCustomSubject")}}',
                                async: false,
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : 'bachelor'},
                                success: function(data){
                                // console.log(data);
                                bachelorSubjects = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            console.log(bachelorSubjects);//SSS
                            for (var i = 0; i < bachelorSubjects.length; ++i) {
                            secndvar=secndvar+'<option value="'+bachelorSubjects[i].id+'">'+bachelorSubjects[i].subject_name+'</option>';
                            }
                            thirdvar='</select></br>'
                            +'<div  style=" margin-top: -20px; display:none;">'
                            +'<input type="text"  name="other_univ_colsubjects[]" id="other_univ_colsubjects" class="form-control "/>'
                            +'</div> </span></div>'
                            +'<div class="row "><div class="col-md-12"><div class="col-md-2 marks">'
                            +'Total Marks<input type="number" name="twoyear_t_marks[]"  class="form-control twoyear_t_marks"/></div>'
                            +'<div class="col-md-2 achievedmarks">Achieved Marks<input type="number" onkeyup="calculatePercentage(this)" name="twoyear_a_marks[]"  class="form-control twoyear_a_marks"></div>'
                            +'<div class="col-md-2 division"> Division'
                            +'<input type="string" name="division[]" value="" class="form-control twoyear_division"></div>'
                            +'<div class="col-md-2   Percentage"> Percentage'
                            +'<input type="number" step="0.01" name="percentage[]" id="twoyear_percentage" value="" class="form-control"></div>'
                            +'<div class="col-md-2 distinction">Distinction'
                            +'<select class="form-control" name="distinction[]">'
                            +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>'
                            +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 19px;" onclick="remove_data(this,2)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';


                }
                else if(education_y=='4 years')
                {
                        add_year_fields='<div class="col-md-4 years">'
                    +'<input type="hidden" name="qualification_univ[]" value="bachelor4year">'
                        +'<span class=" fouryear_grad" id="fouryear_grad" >'
                        +'Institute <select class="form-control"  id="university_names[]" name="university_names[]" onchange="add_newUC(this)">'
                        +'<option value=""></option>'
                        +'<option value="other" style="background-color:peachpuff;">Other</option>';
                        $.ajax({
                                type: "get",
                                url: '{{route("getuniv")}}',
                                async: false,
                                success: function(data){
                                // console.log(data);
                                univ = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            for (var i = 0; i < univ.length; ++i) {
                                uniname_start=uniname_start+'<option value="'+univ[i].id+'">'+univ[i].name+'</option>';
                            }
                            uniname_end='</select> <br>'
                        +'<input type="hidden" id="real_university_names[]"/>'
                        +'<div id="other_univ" style=" margin-top: -20px; display:none;">'
                        +'<input type="text"  name="other_univbox[]" id="other_univbox[]" class="form-control"/>'
                        +'</div> </span></div>'
                        +'<div class="col-md-4 univsubjects">'
                        +'<span>'
                        +'Degree<select class="form-control u_subjects" name="u_subjects[]" onchange="add_newdegree(this)">'
                        +'<option disabled selected="selected">Select Degree</option>'
                        +'<option value="other" style="background-color:peachpuff;">Other</option>'
                        $.ajax({
                                type: "POST",
                                url: '{{route("getCustomSubject")}}',
                                async: false,
                                data: {
                                "_token": "{{ csrf_token() }}",
                                'type' : 'bachelor'},
                                success: function(data){
                                // console.log(data);
                                bachelorSubjects = data;
                                },
                                error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
                                console.log(JSON.stringify(jqXHR));
                                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                                }
                            });
                            console.log(bachelorSubjects);
                            for (var i = 0; i < bachelorSubjects.length; ++i) {
                            secndvar=secndvar+'<option value="'+bachelorSubjects[i].id+'">'+bachelorSubjects[i].subject_name+'</option>';
                            }

                        thirdvar='</select> <br>'
                        +'<div class="other_univsubjects" style=" margin-top: -20px; display:none;">'
                        +'<input type="text"  name="other_univsubjects[]" class="form-control"/>'
                        +'</div> </span></div>'
                        +'<div class="row "><div class="col-md-12"><div class="col-md-1 cgpamarks">CGPA/4<input type="number" step="0.01" name="cgpa[]" id="cgpa" class="form-control"></div>'
                        +'<div class="col-md-2 dmc">Final DMC Date<input type="date" name="dmc_date[]" id="dmc_date" class="form-control"></div>'
                        +'<div class="col-md-2 marks">Total Marks<input type="number" name="foury_t_marks[]" class="form-control foury_t_marks"/></div>'
                        +'<div class="col-md-2 achievedmarks">Achieved  <input type="number" name="foury_a_marks[]" onkeyup="calculate4Percentage(this)"  class="form-control foury_a_marks"></div>'
                        +'<div class="col-md-1 Percentage">Percentage <input type="number"step="0.01" name="univ_per[]" value="" id="univ_per" class="form-control"></div>'
                        +'<div class="col-md-1 division">Division <input type="string" name="division[]" value="" class="form-control  "></div>'
                        +'<div class="col-md-2 distinction">Distinction'
                        +'<select class="form-control" name="distinction[]">'
                        +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>'
                        +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 19px;" onclick="remove_data(this,2)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';
                }
                $(e).parent().parent().find('.remove').remove();
                $(e).parent().parent().find('.Percentage').remove();
                $(e).parent().parent().find('.years').remove();
                $(e).parent().parent().find('.univsubjects').remove();
                $(e).parent().parent().find('.colsubjects').remove();
                $(e).parent().parent().find('.cgpamarks').remove();
                $(e).parent().parent().find('.marks').remove();
                $(e).parent().parent().find('.fouryear_grad').remove();
                $(e).parent().parent().find('.achievedmarks').remove();
                $(e).parent().parent().find('.grad_date').remove();
                $(e).parent().parent().find('.division').remove();
                $(e).parent().parent().find('.dmc').remove();
                $(e).parent().parent().find('.distinction').remove();
                $(e).parent().parent().append(add_year_fields+uniname_start+uniname_end+secndvar+thirdvar);


        }

        function add_newUC(e)
        {
            // if($(e).attr('name')=="pg_Name")
            // {
            //     $(e).next().next().next().show(1000);
            // }
            // else
            // {
            //     $(e).next().next().next().hide(1000);

                if($(e).val()=="other")
                {
                    $(e).next().next().next().show(1000)
                }
                else
                {
                    $(e).next().next().next().hide(1000)
                }
            // }
        }
        //add new degree

        function add_newdegree(e)
        {

             if($(e).val()=="other")
            {

                $(e).next().next().show(1000)
            }
            else
            {
                $(e).next().next().hide(1000)
            }
        }

        //postgrad
        function calculatePercentagePostGrad(e)
        {      var total_marks=0;var achieved_marks=0;
            if($(e).hasClass("postgrad_marks"))
                {
                    achieved_marks = $(e).parent().siblings('.achievedmarks').children('input[name="postgrad_achievedmarks[]"]').val();
                    total_marks=$(e).val();
                }
            else if($(e).hasClass("postgrad_achievedmarks"))
                {
                    total_marks = $(e).parent().siblings('.marks').children('input[name="postgrad_marks[]"]').val();
                    achieved_marks=$(e).val();
                }

            var percntgInput= $(e).parent().siblings('.post_percentage').children('input[name="pg_percentage[]"]');
            var result = (achieved_marks/total_marks)*100;
            result= result.toFixed(2);
            percntgInput.val(result);
            // console.log(result);
            if(result >=60 && result <=100)
            {

                $(e).parent().siblings('.division').children('input[name="postgrad_division[]"]').val('First');
            }
            else if(result >=36 && result < 60)
            {
                $(e).parent().siblings('.division').children('input[name="postgrad_division[]"]').val('Second');

            }
            else if(result >=33 && result < 36)
            {
                $(e).parent().siblings('.division').children('input[name="postgrad_division[]"]').val('Third');

            }
            else if(result >=0 && result < 33)
            {
                $(e).parent().siblings('.division').children('input[name="postgrad_division[]"]').val('Fail');

            }
        }

        //2year graduation
        function calculatePercentage(e){
            var total_marks=0;var achieved_marks=0;
            if($(e).hasClass("twoyear_t_marks"))
                {
                    achieved_marks = $(e).parent().siblings('.achievedmarks').children('input[name="twoyear_a_marks[]"]').val();
                    total_marks=$(e).val();
                }
            else if($(e).hasClass("twoyear_a_marks"))
                {
                    total_marks = $(e).parent().siblings('.marks').children('input[name="twoyear_t_marks[]"]').val();
                    achieved_marks=$(e).val();
                }

            var percntgInput= $(e).parent().siblings('.Percentage').children('input[name="percentage[]"]');
            var result = (achieved_marks/total_marks)*100;
            result= result.toFixed(2);
            percntgInput.val(result);

            if(result >=60 && result <=100)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('First');
            }
            else if(result >=36 && result < 60)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Second');

            }
            else if(result >=33 && result < 36)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Third');

            }
            else if(result >=0 && result < 33)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Fail');

            }

        }

        //4year graduation
        function calculate4Percentage(e){
            var total_marks=0;var achieved_marks=0;
            if($(e).hasClass("foury_t_marks"))
                {
                    achieved_marks = $(e).parent().siblings('.achievedmarks').children('input[name="foury_a_marks[]"]').val();
                    total_marks=$(e).val();
                }
            else if($(e).hasClass("foury_a_marks"))
                {
                    total_marks = $(e).parent().siblings('.marks').children('input[name="foury_t_marks[]"]').val();
                    achieved_marks=$(e).val();
                }

            var percntgInput= $(e).parent().siblings('.Percentage').children('input[name="univ_per[]"]');
            var result = (achieved_marks/total_marks)*100;
            result= result.toFixed(2);
            percntgInput.val(result);

            if(result >=60 && result <=100)
            {

                $(e).parent().siblings('.division').children('input[name="division[]"]').val('First');
            }
            else if(result >=45 && result < 60)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Second');

            }
            else if(result >=33 && result < 45)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Third');

            }
            else if(result >=0 && result < 33)
            {
                $(e).parent().siblings('.division').children('input[name="division[]"]').val('Fail');

            }

        }

        //exp duration
        $("#start_date").datepicker({ 	});
        $("#end_date").datepicker({
            onSelect: function () {
                var  duration_of_exp= duration();
                $('#expduration').val(duration_of_exp);
                }
            });

        function duration(){
            var start= $("#start_date").datepicker("getDate");
            var end= $("#end_date").datepicker("getDate");
            days = (end- start) / (1000 * 60 * 60 * 24);
            months= days/31;
            years= months/12;
            return  Math.floor(days) + "days " + Math.floor(months) + "months " +    Math.floor(years) + "years";
        }


        function remove_certification(e){
                $(e).parent().parent().parent().remove();
        }

        function remove_member(e){
        $(e).parent().parent().parent().remove();
        }



        function remove_training(e){
            $(e).parent().parent().parent().remove();
        }

        function remove_researchpaper(e)
        {
                $(e).parent().parent().parent().remove();
        }

        function remove_data(e,row=0)
        {
        if(row==1)
        $(e).parent().parent().parent().parent().remove();
        else if(row==2)
        $(e).parent().parent().parent().parent().parent().parent().remove();
        else
        $(e).parent().parent().parent().remove();
        }

        function remove_exp(e){
        $(e).closest('tr').remove();
        }

        function remove_designation(e){
        $(e).closest('tr').remove();
        }

        function remove_documents(e){
            $(e).closest('tr').remove();
        }

        $('#cnic').keydown(function () {

            //allow  backspace, tab, ctrl+A, escape, carriage return
            if (event.keyCode == 8 || event.keyCode == 9 ||
                event.keyCode == 27 || event.keyCode == 13 ||
                (event.keyCode == 65 && event.ctrlKey === true))
                return;
            if ((event.keyCode < 48 || event.keyCode > 57))
                event.preventDefault();

            var length = $(this).val().length;

            if (length == 5 || length == 13)
                $(this).val($(this).val() + '-');
        });


    </script>
@endsection
