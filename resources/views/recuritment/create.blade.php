@extends('layouts.app')
@section('content')
<form id="form" action="{{route('job_form.store')}}" name="form" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active cnicSection " style="color:black;!important" data-toggle="tab" href="#cnicSection" role="tab" aria-controls="home" aria-selected="true">CNIC</a>
                </li>
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
    <section id="cnicSection" >
        <div class="col-md-3"></div>
        <div class="col-md-6" style="margin-top:20%;">
            <div class="form-group">
                <b style="font-size:20px;">Enter CNIC Number
                    <span style="color:red;font-size:12px;"> (required)</span>
                </b>
                <br>
                <input type="text" id="cnic" maxlength="15" name="cnic" placeholder="xxxxx-xxxxxxx-x" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3"></div>
        <button type="button" class="btn btn-sm btn-success " style=" margin-left: 43%;width: 200px;font-size:1.5em;"id="basic_info">Next</button>
    </section>

    <section id="demographicsSection"   style="display:none"   >
        <div class="row">
            <h3  style="color:gray; text-align:center; font-weight:bold">
                <b>Demographics Info</b>
            </h3>
            <hr />
            
            <div class="col-md-6">
            <div class="form-group">
                    <b>Diary Number</b>
                    <br>
                    <input type="number" name="d_num" id="d_num" class="form-control" >
                </div>
                <div class="form-group">
                    <b>Name
                        <span style="color:red;font-size:12px;"> (required)</span>
                    </b>
                    <br>
                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name" class="form-control"    required>
                </div>
                <div class="form-group">
                    <b>Father / Husband Name </b>
                    <br>
                    <input type="text" name="f_name" id="f_name" placeholder="" class="form-control">
                </div>
                <div class="form-group">
                    <b>Gender </b>
                    <br>

                    Male
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Male" name="gender"> Female
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Female" name="gender">
                    Transgender
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Transgender" name="gender">

                </div>

                <div class="form-group">
                    <b>Date Of Birth </b>
                    <br>
                    <input type="date" name="dob" class="form-control">
                </div>
                <div class="form-group">
                    <b>Domicile Province</b>
                    <select class="form-control" name="dom_province">
                        <option value="">Select Province</option>
                        @foreach($provinces as $province)
                        <option value="{{$province->id}}">{{$province->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <b>Domicile Districts </b>
                    <select class="form-control" name="dom_district">
                        <option value="">Select Districts</option>
                        @foreach($districts as $dist)
                        <option value="{{$dist->id}}">{{$dist->name}}</option>
                        @endforeach


                    </select>
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                        <b>Postal Address </b>
                        <br>
                        <textarea type="text" name="address" class="form-control"></textarea>
                    </div>
                <div class="form-group">
                    <b>City </b>
                    <select class="form-control" name="dom_city">
                        <option value="">Select City:</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach

                    </select>
                </div>
                
                <div class="form-group">
                    <b>Email Address : </b>
                    <br>
                    <input type="email" name="emailaddress" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <b>Phone Number </b>
                    <br>
                    <input id="phone" name="phone" type="tel" class="form-control">
                    
                </div>
                <div class="form-group">
                    <b>Cell Number (1)</b>
                     <input id="" name="mobile_number1" type="tel" class="form-control mobile_number1">
                </div>
                <div class="form-group">
                <b>Cell Number (2)</b>
                <input id="mobile-number" name="mobile_number2" type="tel" class="form-control">
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
                            <select class="form-control" name="b_Name">
                                <option value="">Select Board</option>
                                <option value="">Lhr Board</option>
                                <option value="">grw Board</option>
                                
                            </select>
                                </div>
                        </span>
                    </td>
                    <td>
                        <span class="sch_subjects" style="display:none;">
                            <div>
                                <b> Subjects </b>
                                <select class="form-control" name="s_subjects">
                                    <option value="">Select Subjects</option>
                                    @foreach($sec_edu as $se) 
                                    
                                    @if($se->type=='School')
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @elseif($se->type=='Olevel')
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @endif @endforeach
                                </select>
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
                                    <input type="text" name="divi" id="division" value="" class="form-control"> </span>
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
                        <select class="form-control" name="c_b_Name">
                            <option value="">Select Board</option>
                            <option value="">Lhr Board</option>
                            <option value="">grw Board</option>
                           
                        </select>
                        </span></td>
                    <td><span class="col_subjects" style="display:none">
                            <div>
                                <b> Degree </b>
                                <select class="form-control" name="c_subjects">
                                    <option value="">Select degree:</option>
                                    @foreach($sec_edu as $se)
                                    @if($se->type=="college")
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @elseif($se->type=="alevel")
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @endif
                                    @endforeach

                                </select>
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

                    <td><span class="col_div" style="display:none">Division <br><input type="text" name="c_div" value="" id="c_division" class="form-control">
                        </span> 
                    </td>
                    <td> <span class="col_grades" style="display:none">Grades <br><input type="string" name="c_grades"
                        id="c_grades" class="form-control"> </span> </td>

                    </tr>
            </tbody>
        </table>
        
        <div class="row" id="gradeducation">     
            <div class="col-md-1">
                <button type="button" id="add_grad_level"   class="btn btn-lg btn-success add_grad_level" style="width: 252px;" ><span
                     class="glyphicon glyphicon-plus"> Add Graduation Level</span></button>
            </div>   
        </div>

        <hr/>
        
        <div class="row" id="postgradeducation" style="margin-top:5px;">     
                <div class="col-md-1">
                    <button type="button" id="add_postgrad_level"   class="btn btn-lg btn-success add_postgrad_level" style="width: 252px;" ><span
                            class="glyphicon glyphicon-plus"> Add Post Graduation Level</span></button>
                </div>   
        </div>

        <hr/>

        <div class="row" id="phdeducation" style="margin-top:5px;">     
                <div class="col-md-1">
                    <button type="button" id="add_phd_level"   class="btn btn-lg btn-success add_phd_level" style="width: 252px;" ><span
                            class="glyphicon glyphicon-plus"> Add PHD Level</span></button>
                </div>   
        </div>
        <hr/>

        <div class="row" id="postdoceducation" style="margin-top:5px;"> 
            <div class="col-md-1">
                <button type="button" id="add_postdoc_level"   class="btn btn-lg btn-success add_postdoc_level" style="width: 252px;" ><span
                        class="glyphicon glyphicon-plus"> Add Post Doctral Level</span></button>
             </div>
        </div>

        <hr/>
        
        <div class="row" id="certifications" style="margin-top:5px;">
            <div class="col-md-5">
             <h3> <b>Certifications</b>
            <button type="button" id="add_morecertifications" class="btn btn-md btn-info add_certification "><span
            class="glyphicon glyphicon-plus"></button></h3>
          </div> 

        </div>
        <hr/>

        <div class="row" id="trainings" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Trainings</b>
                    <button type="button" id="add_moretrainings" class="btn btn-md btn-info add_moretrainings" ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
           
             
        </div>

        <hr/>

        <div class="row" id="researchpaper" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Research Papers</b>
                    <button type="button" id="add_morerps" class="btn btn-md btn-info add_morerps" ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
                 
        </div>

        <hr/>

        <div class="row" id="professional_membership" style="margin-top:5px;">
            <div class="col-md-5">
                <h3> <b>Professional Certification Membership</b>
                    <button type="button" id="addmore_pro_member" class="btn btn-md btn-info    " ><span
                    class="glyphicon glyphicon-plus"></span></button></h3>
            </div>
                    
        </div>
        
        <hr/>
        
        <div class="row" style="margin-top:5px;">
            
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-danger " style=" width: 252px;" id="go_demo"> Back</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-success pull-right" style="
                        width: 252px;"
                        id="experience"> Next</button>
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
        </table>
        <div class="row" style="margin-top:5px;">
            
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-danger " style=" width: 252px;" id="go_edu"> Back</button>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-3">
                    <button type="button" class="btn btn-md btn-success pull-right" style="
                        width: 252px;"
                        id="designation"> Next</button>
                </div>
                <div class="col-md-1"></div>
        </div>
    </section>
    
    <section id="designationSection" style="display:none">
            <h1 style="text-align:center;">Designation</h1>
            <table class="table table-bordered" id="designation_table">
                <tr >
                    <th style="text-align:center;">Serial No </th>
                    <th style="text-align:center;">Position Applied</th>
                    <th style="text-align:center;"><button type="button" id="add_moredesignation" class="btn btn-success btn-sm add_moredesignation"><span class="glyphicon glyphicon-plus"></span></button></th>
                </tr>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/intlTelInput.js')}}"></script>
<script>
  
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
      hiddenInput: "full_number",
      initialCountry: "auto",
      localizedCountries: { 'pk': 'Pakistan' },
      nationalMode: false,
    //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      placeholderNumberType: "MOBILE",
    //   preferredCountries: ['cn', 'jp'],
      separateDialCode: true,
      utilsScript: "{{asset('js/utils.js')}}"
     });
     $("#mobile-number").intlTelInput({
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
        hiddenInput: "full_number",
        initialCountry: "auto",
        localizedCountries: { 'pk': 'Pakistan' },
        nationalMode: false,
        //   onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        placeholderNumberType: "MOBILE",
        //   preferredCountries: ['cn', 'jp'],
        separateDialCode: true,
        utilsScript: "{{asset('js/utils.js')}}"
     });
  
    $("#phone").intlTelInput({
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
        hiddenInput: "full_number",
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

        //school percentage and division
        $("#t_marks, #a_marks").keyup( function(){

            var total_marks = $("#t_marks").val();
            var achieved_marks = $("#a_marks").val();
            
              var result = (achieved_marks/total_marks)*100;
             result= result.toFixed(2);
              $("#percentage").val(result);

              if(result >=70 && result <=100)
              {
              $("#division").val('First');
              
              }
              else if(result >=60 && result <=69)
              {
              $("#division").val('Second'); 
              
              }
              else if(result >=50 && result <=59)
              {
              $("#division").val('Third');
              
              }
              else if(result >=40 && result <=49)
              {
              $("#division").val('Fourth');
              
              }
              else if(result >=33 && result <=39)
              {
              $("#division").val('Fifth or Minimum Passing Marks');
              
              }
              else if(result >=0 && result <=32)
              {
              $("#division").val('Fail');
              
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
          else if(result >=36 && result <=59)
          {
          $("#c_division").val('Second');
          
          }
          else if(result >=33 && result <=35)
          {
          $("#c_division").val('Third');
          
          }
          else if(result >=0 && result <=32)
          {
          $("#c_division").val('Fail');
          
          }
       
     });

        $('.school_level').on('change', function () {
            if ($('.school_level').val() == 'Matric') {
                $('.Grades_olevel').hide(1000);
                
                $('input[name="qualification"]').val("school")
                $('.sch_name').show(1000);
                $('.sch_board').show(1000);
                $('.sch_subjects').show(1000);
                $('.school_markstotal').show(1000);
                $('.school_marksobtained').show(1000);
                $('.sch_percentage').show(1000);
                $('.sch_div').show(1000);
                $('.sch_dist').show(1000);
    
            } else if ($('.school_level').val() == 'O-Level') {
                $('input[name="qualification"]').val("olevel")
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
                $('.col_name').show(1000);
                $('.col_board').show(1000);
                $('.col_subjects').show(1000);
                $('.col_totalmarks').show(1000);
                $('.col_achievedmarks').show(1000);
                $('.col_percentage').show(1000);
                $('.col_div').show(1000);
                $('.col_dist').show(1000);
    
            } else if ($('.college_level').val() == 'A-Level') {
                $('input[name="college_qualification_type"]').val("Alevel")
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
            
            var eduprogram ='<div class="row"  id="new_edurow[]">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<div class="col-md-2">Graduate Level'
                            +'<select class="form-control educationYear" name="bch_year[]" onchange="add_newdata(this)">'
                            +'<option value="">Pick year:</option>'
                            +' <option>2 years</option>'
                            +'<option>4 years</option>'
                            +'</select> </div></div></div>';

            $('#gradeducation').append(eduprogram);     
        }); 
    
        $('button#add_postgrad_level').click(function(e)
          {  var eduprogram ='<div class="row" id="new_postgradrow[]">'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<input type="hidden" name="qualification_postuniv[]" value="post_grad">'
                        +'<div class="col-md-2 institute_name">Institution Name<input type="text" name="pg_Name" id="pg_Name" class="form-control"> </div>'    
                        +'<div class="col-md-2 postgrad_subjects">Subjects<select class="form-control" name="post_grad_degree[]"><option value=""></option>'
                        +'<option value="1">cs degree</option><option value="1">cs degree</option></select> </div>'
                        +'<div class="col-md-2 post_cgpa">CGPA<input type="number" step="0.01" name="pg_cgpa" id="pg_cgpa" class="form-control"></div>'
                        +'<div class="col-md-2 post_dmc">Final DMC Date<input type="date" name="pg_dmc_date" id="pg_dmc_date" class="form-control"></div>'
                        +'<div class="col-md-1 distinction">Distinction'
                        +'<select class="form-control" name="pg_distinction[]">'
                        +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>'
                        +'<div class="col-md-1 remove_grad_level"><button type="button" id="remove_grad_level[]"  class="pull-left btn btn-danger btn-sm add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';
                
                $('#postgradeducation').append(eduprogram);       
        });
         
        
        $('button#add_phd_level').click(function(e){
            var eduprogram ='<div class="row" id="new_phdrow[]">'
                           +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                           +'<input type="hidden" name="qualification_phduniv[]" value="phd">'
                           +'<div class="col-md-2 phd_institute_name">Institution Name<input type="text" name="phd_Name[]" id="phd_Name[]" class="form-control"> </div>'    
                           +'<div class="col-md-2 phd_thesis">Thesis Topic<input type="text" name="phd_thesis[]" id="phd_thesis[]" class="form-control">  </div>'
                           +'<div class="col-md-2 phd_dg">Date Of Graduation <input type="date" name="phd_date[]" id="phd_date[]" class="form-control"> </div>'
                           +'<div class="col-md-1 remove_phd_level"><button type="button" id="remove_phd_level[]"  class=" btn btn-danger btn-md remove_phd_level" style="margin-top:21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div></div></div>';
                          
               $('#phdeducation').append(eduprogram);     
       }); 


        $('button#add_postdoc_level').click(function(e){
             var eduprogram ='<div class="row" id="new_postdocrow[]">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<input type="hidden" name="qualification_postdocuniv[]" value="post_graddoc">'
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
                    +'<div class="col-md-2" style="margin-top: 21px;"><button type="button" id="remove_certification[]" onclick="remove_certification(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
                    +'</div></div>';
                $('#certifications').append(certifications_app);
                
        });
                
        $('button#add_moretrainings').click(function(e){
    
            var training_app ='<div class="row" id="new_tr[]" >'
                    +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                    +'<div class="col-md-3"> <b>Training Name</b> <input type="text" name="app_tr[]" id="app_tr[]" class="form-control"></div>'
                    +'<div class="col-md-3"><b>By </b><br> <input type="text" name="tr_by[]" id="tr_by[]" class="form-control"></div>'
                    +'<div class="col-md-3"><b>Duration</b><br><input type="text" name="tr_duration[]" id="tr_duration[]" class="form-control"></div>'
                    +'<div class="col-md-2" style="margin-top: 21px;"><button type="button" name="remove_training[]" id="remove_training[]" onclick="remove_training(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
                    +'</div></div>';
            
                $('#trainings').append(training_app);
                
        });
                
        $('button#add_morerps').click(function(e){

            var research_app ='<div class="row" id="new_rp" >'
                    +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                    +'<div class="col-md-2">Research Type'
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
                    +'<div class="col-md-2"><b>Registeration # </b><br><input type="number" name="pm_reg[]" id="pm_reg[]" class="form-control"></div>'
                    +'<div class="col-md-1 " style="margin-top: 21px;"><button type="button" name="remove_membership[]" id="remove_membership[]" onclick="remove_member(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
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
                +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';

            }
            else if(researchtype=='Conference')
            {
                research='<div class="col-md-2 research_paper">Research Paper<input type="text" name="app_rp[]" id="app_rp[]" class="form-control"></div>'
                +'<div class="col-md-2 conf_pyear">Published Year<input type="number" name="conf_yr[]" id="conf_yr" class="form-control"></div>'
                +'<div class="col-md-2 conf_name">Conference<input type="number" name="app_conf[]" id="app_conf[]" class="form-control"></div>'
                +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 21px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';
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
            exp_row += '<td><select class="form-control" name="org_type[]"><option value="">Select Type:</option><option value="1">Private</option><option value="2">Public</option><option value="3">Government</option><option value="4">Self-Employed</option><option value="5">Own Business</option><option value="5">International</option></select></td>';
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
            designation_row += '<td>1</td>';
            designation_row += '<td><select class="form-control" name="app_designation[]"><option value="">Select Designation:</option><option value="1">Private</option><option value="2">Public</option><option value="3">Government</option><option value="4">Self-Employed</option><option value="5">Own Business</option><option value="5">International</option></select></td>';
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
            
            if(education_y=='2 years')
            {
                add_year_fields='<div class="col-md-2 years">'
                    +'<input type="hidden" name="qualification_univ[]" value="bachelor">'
                +'<span class="twoyear_grad" id="twoyear_grad" >'
            +'Institution Name<select class="form-control"  id="college_university_names[]" name="college_university_names[]" onchange="add_newUC(this)">'
                        +'<option value=""></option>'
                        +'<option >punjab college</option>'
                        +'<option >gujranwala college</option>'
                        +'<option >lahore college</option>'
                        +'<option value="other">other</option>'
                        +'</select><br><input type="hidden" id="real_college_university_names"/>'
                        +'<div id="other_college_univ" style=" margin-top: -20px; display:none;">'
                        +'<input type="text"   name="other_collegebox[]" id="other_univbox[]" class="form-control"/>'
                        +' </div></span></div>'
                        +'<div class="col-md-1 subjects">'
                        +'<span class="univsubjects">'
                        +'Subjects<select class="form-control" name="u_subjects[]">'
                        +'<option ></option>'
                        +'<option >ICS</option>'
                        +'<option >Maths</option>'
                        +'<option >science</option>'
                        +'</select></span></div>'
                        +'<div class="col-md-1 marks">Total Marks<input type="number" name="twoyear_t_marks[]"  class="form-control twoyear_t_marks"/></div>'
                        +'<div class="col-md-2 achievedmarks">Achieved Marks<input type="number" onkeyup="calculatePercentage(this)" name="twoyear_a_marks[]"  class="form-control twoyear_a_marks"></div>'
                        +'<div class="col-md-1 division"> Division'
                        +'<input type="string" name="division[]" value="" class="form-control twoyear_division"></div>'
                        +'<div class="col-md-1 Percentage"> Percentage'
                        +'<input type="number" step="0.01" name="percentage[]" id="twoyear_percentage" value="" class="form-control"></div>'
                        +'<div class="col-md-1 distinction">Distinction'
                        +'<select class="form-control" name="distinction[]">'
                        +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>'
                        +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';

            }
            else if(education_y=='4 years')
            {
                    add_year_fields='<div class="col-md-1 years">'
                   +'<input type="hidden" name="qualification_univ[]" value="bachelor">'
                    +'<span class=" fouryear_grad" id="fouryear_grad" >'
                    +'Institute <input type="hidden" name="qualification_univ[]" value="four_year">'
                   +'<select class="form-control"  id="university_names[]" name="university_names[]" onchange="add_newUC(this)">'
                    +'<option value=""></option>'
                    +'<option value="1">umt</option>'
                    +'<option value="2">ucp</option>'
                    +'<option value="3">gcu</option>'
                    +'<option value="other">other</option>'
                    +'</select><br>'
                    +'<input type="hidden" id="real_university_names[]"/>'
                    +'<div id="other_univ" style=" margin-top: -20px; display:none;">'
                    +'<input type="text"  name="other_univbox[]" id="other_univbox[]" class="form-control"/>'
                    +'</div> </span></div>'
                    +'<div class="col-md-1  subjects">'
                    +'<span class="univsubjects" >'
                    +'Subjects<select class="form-control" name="u_subjects[]">'
                    +'<option value=""></option>'
                    +'<option value="1">ICS</option>'
                    +'<option value="2">Maths</option>'
                    +'<option value="3">science</option>'
                    +'</select></span></div>'
                    +'<div class="col-md-1 cgpamarks">CGPA/4<input type="number" step="0.01" name="cgpa[]" id="cgpa" class="form-control"></div>'
                    +'<div class="col-md-1 marks">Total Marks<input type="number" name="foury_t_marks[]" class="form-control foury_t_marks"/></div>'
                    +'<div class="col-md-1 achievedmarks">Achieved  <input type="number" name="foury_a_marks[]" onkeyup="calculate4Percentage(this)"  class="form-control foury_a_marks"></div>'
                    +'<div class="col-md-1 Percentage">Percentage <input type="number"step="0.01" name="univ_per[]" value="" id="univ_per" class="form-control"></div>'
                    +'<div class="col-md-2 dmc">Final DMC Date<input type="date" name="dmc_date[]" id="dmc_date" class="form-control"></div>'
                    +'<div class="col-md-1 distinction">Distinction'
                    +'<select class="form-control" name="distinction[]">'
                    +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>'
                    +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-md add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>';
            }
            $(e).parent().parent().find('.remove').remove();
            $(e).parent().parent().find('.Percentage').remove();
            $(e).parent().parent().find('.years').remove();
            $(e).parent().parent().find('.subjects').remove();
            $(e).parent().parent().find('.cgpamarks').remove();
            $(e).parent().parent().find('.marks').remove();
            $(e).parent().parent().find('.achievedmarks').remove();
            $(e).parent().parent().find('.grad_date').remove();
            $(e).parent().parent().find('.division').remove();
            $(e).parent().parent().find('.dmc').remove();
            $(e).parent().parent().find('.distinction').remove();
            $(e).parent().parent().append(add_year_fields); 
    }
            
    

    function add_newUC(e)
     {
        if($(e).val()=="other")
        {
            $(e).next().next().next().show()
        }
        else
        {
            $(e).next().next().next().hide()
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
              console.log('ddsdd');
            $(e).parent().siblings('.division').children('input[name="division[]"]').val('First');
          }
          else if(result >=36 && result <=59)
          {
            $(e).parent().siblings('.division').children('input[name="division[]"]').val('Second');
          
          }
          else if(result >=33 && result <=35)
          {
            $(e).parent().siblings('.division').children('input[name="division[]"]').val('Third');
          
          }
          else if(result >=0 && result <=32)
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
          else if(result >=36 && result <=59)
          {
            $(e).parent().siblings('.division').children('input[name="division[]"]').val('Second');
          
          }
          else if(result >=33 && result <=35)
          {
            $(e).parent().siblings('.division').children('input[name="division[]"]').val('Third');
          
          }
          else if(result >=0 && result <=32)
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

    function remove_data(e)
      {
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
