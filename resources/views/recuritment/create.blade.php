@extends('layouts.app')
@section('content')
<form id="form" action="{{route('job_form.store')}}" name="form" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <section id="cnicSection">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="margin-top:20%;">
            <div class="form-group">
                <b style="font-size:20px;">Enter CNIC Number
                    <span style="color:red;font-size:12px;"> (required)</span>
                </b>
                </br>
                <input type="text" id="cnic" maxlength="15" name="cnic" placeholder="xxxxx-xxxxxxx-x" class="form-control" required>
            </div>
        </div>
        <div class="col-md-3"></div>
        <button type="button" class="btn btn-sm btn-success " style=" margin-left: 43%;width: 200px;font-size:1.5em;"id="basic_info">Next</button>
    </section>

    <sectioon id="demographics"      >
        <div class="row">
            <h3 align=center style="color:gray; font-weight:bold">
                <b>Demographics Info</b>
            </h3>
            <hr />
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group " style="text-align: center;font-size: 15px;font-weight: bold;">
                        <b>Serial Number :</b> HIS_2018_000</br>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <b>Name
                        <span style="color:red;font-size:12px;"> (required)</span>
                    </b>
                    </br>
                    <input type="text" name="name" id="name" placeholder="Enter Your Full Name" class="form-control"
                        required>
                </div>
                <div class="form-group">
                    <b>Father / Husband Name </b>
                    </br>
                    <input type="text" name="f_name" id="f_name" placeholder="Father / Spouse Name(Male)" class="form-control">
                </div>
                <div class="form-group">
                    <b>Gender </b>
                    </br>

                    Male
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Male" name="gender"> Female
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Female" name="gender">
                    Transgender
                    <input style="margin-left:6px;margin-right:5px;" type="radio" value="Transgender" name="gender">

                </div>

                <div class="form-group">
                    <b>Date Of Birth </b>
                    </br>
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
                    <b>City </b>
                    <select class="form-control" name="dom_city">
                        <option value="">Select City:</option>
                        @foreach($cities as $city)
                        <option value="{{$city->id}}">{{$city->name}}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <b>Postal Address </b>
                    </br>
                    <textarea type="text" name="address" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <b>Email Address : </b>
                    </br>
                    <input type="email" name="emailaddress" id="email" class="form-control">
                </div>

                <div class="form-group">
                    <b>Phone Number </b>
                    </br>
                    <input id="phone" name="phone" type="tel" class="form-control">
                </div>
                {{--
                <div class="form-group">
                    <select name="countryCode" id="phonenum">
                        <option data-countryCode="GB" value="44" Selected>UK (+44)</option>
                        <option data-countryCode="US" value="1">USA (+1)</option>
                        <optgroup label="Other countries">
                            <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                            <option data-countryCode="AD" value="376">Andorra (+376)</option>
                            <option data-countryCode="AO" value="244">Angola (+244)</option>
                            <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                            <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                            <option data-countryCode="AR" value="54">Argentina (+54)</option>
                        </optgroup>
                    </select>


                </div> --}}
                <div class="form-group">
                    <b>Cell Number </b>
                    </br>
                    <input id="mobile-number" name="mobile-number" type="tel" class="form-control">
                </div>
                <div class="form-group">
                    <b>Email Address : </b>
                    </br>
                    <input type="email" name="emailaddress" id="email" class="form-control">
                </div>


            </div>


        </div>
        <hr />

        <button type="button" class="btn btn-lg btn-danger " style=" width: 252px;" id="go_cnic"> Back</button>
        <button type="button" class="btn btn-lg btn-success pull-right" style="width: 252px;" id="education"> Next</button>
    </sectioon>
   
    <section id="educationSection" >
        <h1 align=center style="color:gray;"><b>Education</b> </h1>

        <table class="table " id="secondaryeducation">
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
               
                <tr><input type="hidden" name="school" value="school">
                    <td>
                        <span class="sch_name" style="display:none;"> School Name
                            <br>
                            <input type="text" name="s_Name" id="s_Name" class="form-control">
                        </span>
                    </td>
                    <td>
                        <span class="sch_board" style="display:none;">Board
                            <br>
                            <input type="text" name="b_Name" id="b_Name" class="form-control">
                        </span>
                    </td>
                    <td>
                        <span class="sch_subjects" style="display:none;">
                            <div>
                                <b> Subjects </b>
                                <select class="form-control" name="s_subjects">
                                    <option value="">Select :</option>
                                    @foreach($sec_edu as $se) @if($se->type=='School')
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @elseif($se->type=='olevel')
                                    <option value="{{$se->id}}">{{$se->subject_name}}</option>
                                    @endif @endforeach
                                </select>
                            </div>
                        </span>
                    </td>
                    <td>
                        <span class="school_markstotal" style="display:none">Total Marks
                            <br>
                            <input type="number" name="t_marks" id="t_marks" class="form-control"> </span>
                        <span class="Grades_olevel" style="display:none">Grades
                            <br>
                            <input type="text" name="grades_olevel" id="grades_olevel" class="form-control"> </span>
                    </td>
                    <td>
                        <span class="school_marksobtained" style="display:none"> Achieved Marks
                            <br>
                            <input type="number" name="a_marks" id="a_marks" class="form-control">
                        </span>
                    </td>
                    <td>
                        <span class="sch_div" style="display:none;">Division
                            <br>
                            <input type="text" name="divi" id="divi" class="form-control"> </span>
                    </td>
                    <td>
                        <span class="sch_dist" style="display:none;">
                            <div>
                                <b>Distinction</b>
                                <select class="form-control" name="dist">
                                    <option value=""></option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">3rd</option>
                                </select>
                            </div>
                        </span>
                    </td>

                </tr>
                <tr>
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
                <tr>
                    <input type="hidden" name="college" value="college">
                    <td> <span class="col_name" style="display:none">College Name<br><input type="text" name="c_Name"
                                id="c_Name" class="form-control"></span></td>
                    <td><span class="col_board" style="display:none"> Board <br> <input type="text" name="c_b_Name" id="c_b_Name"
                                class="form-control">
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

                    <td>
                        <span class="col_totalmarks" style="display:none">Total Marks <br><input type="number" name="c_t_marks"
                                id="c_t_marks" class="form-control"> </span>
                        <span class="col_grades" style="display:none">Grades <br><input type="string" name="c_grades"
                                id="c_grades" class="form-control"> </span> </td>
                    </td>
                    <td><span class="col_achievedmarks" style="display:none">Achieved Marks <br><input type="number"
                                name="c_a_marks" id="c_a_marks" class="form-control"></span> </td>
                    <td><span class="col_div" style="display:none">Division <br><input type="text" name="c_div" id="c_div"
                                class="form-control">
                        </span> </td>
                    <td><span class="col_dist" style="display:none">
                            <div>
                                <b>Distinction</b>
                                <select class="form-control" name="c_dist">
                                    <option value=""></option>
                                    <option value="1">1st</option>
                                    <option value="2">2nd</option>
                                    <option value="3">3rd</option>
                                </select>
                            </div>
                        </span></td>
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
    
    <section id="experienceSection"></section>
    
    <section id="designationSection" ></section>

    
</form>
@endsection
@section('scriptTags')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="{{asset('js/intlTelInput.js')}}"></script>
<script>
    
        $('button#basic_info').on('click', function () {
            $('section#cnicSection').hide(1000);
            $('section#demographics').show(1000);
         });
        
        $('button#education').on('click', function () {
    
            $('section#demographics').hide(1000);
            $('section#cnicSection').hide(1000);
            $('section#educationSection').show(1000);
    
    
        });
            $('button#go_demo').on('click', function () {
        
                $('section#cnicSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#demographics').show(1000);
        
            });
            $('button#go_cnic').on('click', function () {
        
        
                $('section#educationSection').hide(1000);
                $('section#demographics').hide(1000);
                $('section#cnicSection').show(1000);
            });
        
            $('button#experience').on('click', function () {
                $('section#demographics').hide(1000);
                $('section#cnicSection').hide(1000);
                $('section#educationSection').hide(1000);
                $('section#experienceSection').show(1000);
            });

        $('.school_level').on('change', function () {
            if ($('.school_level').val() == 'Matric') {
                $('.Grades_olevel').hide(1000);
    
                $('.sch_name').show(1000);
                $('.sch_board').show(1000);
                $('.sch_subjects').show(1000);
                $('.school_markstotal').show(1000);
                $('.school_marksobtained').show(1000);
                $('.sch_div').show(1000);
                $('.sch_dist').show(1000);
    
            } else if ($('.school_level').val() == 'O-Level') {
                $('.school_markstotal').hide(1000);
                $('.school_marksobtained').hide(1000);
                $('.sch_name').show(1000);
                $('.sch_board').show(1000);
                $('.sch_subjects').show(1000);
                $('.Grades_olevel').show(1000);
                $('.sch_div').show(1000);
                $('.sch_dist').show(1000);
            }
        });
    
        $('.college_level').on('change', function () {
            if ($('.college_level').val() == 'Intermediate') {
                $('.col_grades').hide(1000);
    
                $('.col_name').show(1000);
                $('.col_board').show(1000);
                $('.col_subjects').show(1000);
                $('.col_totalmarks').show(1000);
                $('.col_achievedmarks').show(1000);
                $('.col_div').show(1000);
                $('.col_dist').show(1000);
    
            } else if ($('.college_level').val() == 'A-Level') {
                $('.col_totalmarks').hide(1000);
                $('.col_achievedmarks').hide(1000);
                $('.col_grades').show(1000);
                $('.col_name').show(1000);
                $('.col_board').show(1000);
                $('.col_subjects').show(1000);
                $('.col_div').show(1000);
                $('.col_dist').show(1000);
            }
        });

        $('.educationYear').on('change',function(){
            if($('.educationYear').val()=='2 years')
            { 
                $('.fouryear_grad').hide(500);
                $('.univ_cgpa').hide(500);
                $('.grad_date').hide(500);
                $('.dmc').hide(500);

                $('.twoyear_grad').show(1000);
                $('.univsubjects').show(1000);
                $('.total_marks').show(1000);
                $('.achieved_marks').show(1000);
                $('.division').show(1000);
                $('.dist').show(1000);
            }
            else if( $('.educationYear').val()=='4 years')
            {  
                $('.twoyear_grad').hide(1000);
                $('.univsubjects').hide(1000);
                $('.total_marks').hide(1000);
                $('.achieved_marks').hide(1000);
                $('.division').hide(1000);
                
                $('.fouryear_grad').show(1000);
                $('.univsubjects').show(1000);
                $('.univ_cgpa').show(1000);
                $('.grad_date').show(1000);
                $('.dmc').show(1000);
                $('.dist').show(1000);
                
            }
        }); 

        
            $('button#add_grad_level').click(function(e){
            
            var eduprogram ='<div class="row"  id="new_edurow[]">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<div class="col-md-1 remove"><button type="button" id="remove[]"  class="pull-left btn btn-danger btn-sm add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>'
                            +'<div class="col-md-2" >Graduate Level'
                            +'<select class="form-control educationYear" name="bch_year[]" onchange="add_newdata(this)">'
                            +'<option value="">Select year:</option>'
                            +' <option>2 years</option>'
                            +'<option>4 years</option>'
                            +'</select> </div> </div></div></div>';
            $('#gradeducation').append(eduprogram);     
        }); 
        
        $('button#add_postgrad_level').click(function(e){
            
        var eduprogram ='<div class="row" id="new_postgradrow[]">'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-1 remove_grad_level"><button type="button" id="remove_grad_level[]"  class="pull-left btn btn-danger btn-sm add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>'
                        +'<input type="hidden" name="qualification_postuniv" value="post_grad">'
                        +'<div class="col-md-2 institute_name">Institution Name<input type="text" name="pg_Name" id="pg_Name" class="form-control"> </div>'    
                        +'<div class="col-md-2 postgrad_subjects">Major Subjects<select class="form-control" name="post_grad_degree"><option value="">Select degree:</option>'
                        +'<option value="1">cs degree</option><option value="1">cs degree</option></select> </div>'
                        +'<div class="col-md-2 post_cgpa">CGPA<input type="number" step="0.01" name="pg_cgpa" id="pg_cgpa" class="form-control"></div>'
                        +'<div class="col-md-2 post_dg">Date Of Graduation <input type="date" name="pg_date" id="pg_date" class="form-control"> </div>'
                        +'<div class="col-md-2 post_dmc">Final DMC Date<input type="date" name="pg_dmc_date" id="pg_dmc_date" class="form-control"></div></div></div>';
            $('#postgradeducation').append(eduprogram);
            
        }); 

        $('button#add_postdoc_level').click(function(e){
            
            var eduprogram ='<div class="row" id="new_postdocrow[]">'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<div class="col-md-1 remove_graddoc_level"><button type="button" id="remove_graddoc_level[]"  class="pull-left btn btn-danger btn-sm add" style=" margin-top: 19px;" onclick="remove_data(this)" ><span class="glyphicon glyphicon-minus"></span></button></div>'
                            +'<input type="hidden" name="qualification_postuniv" value="post_graddoc">'
                            +'<div class="col-md-2 pd_institute_name">Institution Name<input type="text" name="pd_Name" id="pd_Name" class="form-control"> </div>'    
                            +'<div class="col-md-2 postdoc_subjects">Major Subjects<select class="form-control" name="post_graddoc_degree"><option value="">Select degree:</option>'
                            +'<option value="1">cs degree</option><option value="1">cs degree</option></select> </div>'
                            +'<div class="col-md-2 postdoc_cgpa">CGPA<input type="number" step="0.01" name="pd_cgpa" id="pd_cgpa" class="form-control"></div>'
                            +'<div class="col-md-2 postdoc_dg">Date Of Graduation <input type="date" name="pd_date" id="pd_date" class="form-control"> </div>'
                            +'<div class="col-md-2 postdoc_dmc">Final DMC Date<input type="date" name="pd_dmc_date" id="pd_dmc_date" class="form-control"></div></div></div>';
                $('#postdoceducation').append(eduprogram);
                
            }); 

            $('button#add_morecertifications').click(function(e){
            
                var certifications_app ='<div class="row" id="new_cer[]" >'
                      +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                       +' <div class="col-md-3"><b>Name</b><input type="text" name="app_cer[]" id="app_cer[]" class="form-control"></div>'
                       +' <div class="col-md-3"><b>Issued By </b><br> <input type="text" name="certificate_i[]" id="certificate_i[]" class="form-control"></div>'
                       +'<div class="col-md-3"><b>Date Of Issuance</b> <br><input type="date" name="i_date[]" id="i_date[]" class="form-control"></div>'
                       +'<div class="col-md-3" style="margin-top: 21px;"><button type="button" id="remove_certification[]" onclick="remove_certification(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
                       +'</div></div>';
                    $('#certifications').append(certifications_app);
                    
                });
                
            $('button#add_moretrainings').click(function(e){
        
                var training_app ='<div class="row" id="new_tr[]" >'
                        +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                        +'<div class="col-md-3"> <b>Training Name</b> <input type="text" name="app_cer" id="app_tr" class="form-control"></div>'
                        +'<div class="col-md-3"><b>By </b><br> <input type="text" name="tr_by" id="tr_by" class="form-control"></div>'
                        +'<div class="col-md-3"><b>Duration</b><br><input type="text" name="tr_duration" id="tr_duration" class="form-control"></div>'
                        +'<div class="col-md-3" style="margin-top: 21px;"><button type="button" id="remove_training[]" onclick="remove_training(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
                        +'</div></div>';
                
                    $('#trainings').append(training_app);
                    
                });
                
                $('button#add_morerps').click(function(e){
        
                    var research_app ='<div class="row" id="new_tr[]" >'
                            +'<div class="col-md-12" style="margin-bottom: 15px;margin-top: 15px;">'
                            +'<div class="col-md-3"><b>Research Paper Name</b><input type="text" name="app_rp" id="app_rp" class="form-control"></div>'
                            +'<div class="col-md-3"><b>Published By </b><br> <input type="text" name="pb_by" id="pb_by" class="form-control"></div>'
                            +'<div class="col-md-3"><b>Conference</b> <br><input type="text" name="conf" id="conf" class="form-control"></div>'
                            +'<div class="col-md-3" style="margin-top: 21px;"><button type="button" id="remove_researchpaper[]" onclick="remove_researchpaper(this)" class="btn btn-sm btn-danger form-control">Remove</button></div>'
                            +'</div></div>';
                    
                        $('#researchpaper').append(research_app);
                        
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
                        +'<option value="">Name:</option>'
                        +'<option value="1">punjab college</option>'
                        +'<option value="2">gujranwala college</option>'
                        +'<option value="3">lahore college</option>'
                        +'<option value="other">other</option>'
                        +'</select><br><input type="hidden" id="real_college_university_names"/>'
                        +'<div id="other_college_univ" style=" margin-top: -20px; display:none;">'
                        +'<input type="text"   name="other_collegebox[]" id="other_univbox[]" class="form-control"/>'
                        +' </div></span></div>'
                        +'<div class="col-md-2 subjects">'
                        +'<span class="univsubjects">'
                        +'Subjects<select class="form-control" name="u_subjects[]">'
                        +'<option value="">Subjects:</option>'
                        +'<option value="1">ICS</option>'
                        +'<option value="2">Maths</option>'
                        +'<option value="3">science</option>'
                        +'</select></span></div>'
                        +'<div class="col-md-1 marks">Total Marks<input type="number" name="twoy_t_marks[]" id="twoy_t_marks" class="form-control"/></div>'
                        +'<div class="col-md-1 achievedmarks"> Achieved Marks<input type="number" name="twoy_a_marks[]" id="twoy_a_marks" class="form-control"></div>'
                        +'<div class="col-md-1 division"> Division'
                        +'<input type="number" name="division[]" id="division[]" class="form-control"></div>'
                        +'<div class="col-md-2 distinction">Distinction'
                        +'<select class="form-control" name="distinction[]">'
                        +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>';

            }
            else if(education_y=='4 years')
            {
                    add_year_fields='<div class="col-md-2 years">'
                   +'<input type="hidden" name="qualification_univ[]" value="bachelor">'
                    +'<span class=" fouryear_grad" id="fouryear_grad" >'
                    +'Institution Name<input type="hidden" name="qualification_univ[]" value="four_year">'
                +'<select class="form-control"  id="university_names[]" name="university_names[]" onchange="add_newUC(this)">'
                    +'<option value="">ok:</option>'
                    +'<option value="1">umt</option>'
                    +'<option value="2">ucp</option>'
                    +'<option value="3">gcu</option>'
                    +'<option value="other">other</option>'
                    +'</select><br>'
                    +'<input type="hidden" id="real_university_names[]"/>'
                    +'<div id="other_univ" style=" margin-top: -20px; display:none;">'
                    +'<input type="text"  name="other_univbox[]" id="other_univbox[]" class="form-control"/>'
                    +'</div> </span></div>'
                    +'<div class="col-md-2 subjects">'
                    +'<span class="univsubjects" >'
                    +'Subjects<select class="form-control" name="u_subjects[]">'
                    +'<option value="">Subjects:</option>'
                    +'<option value="1">ICS</option>'
                    +'<option value="2">Maths</option>'
                    +'<option value="3">science</option>'
                    +'</select></span></div>'
                    +'<div class="col-md-1 marks">CGPA<input type="number" step="0.01" name="cgpa[]" id="cgpa" class="form-control"></div>'
                    +'<div class="col-md-1 grad_date">Graduation Date<input type="date" name="grad_date[]" id="grad_date" class="form-control"></div>'
                    +'<div class="col-md-1 dmc">DMC<input type="date" name="dmc_date[]" id="dmc_date" class="form-control"></div>'
                    +'<div class="col-md-2 distinction">Distinction'
                    +'<select class="form-control" name="distinction[]">'
                    +'<option value=""></option><option value="Yes">Yes</option><option value="No">No</option></select></div>';
            }

            $(e).parent().parent().find('.years').remove();
            $(e).parent().parent().find('.subjects').remove();
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
            console.log($(e).next().next().next().show())
            else{
            console.log($(e).next().next().next().hide())
            }
        }
        
        function remove_certification(e)
        {
            $(e).parent().parent().parent().remove(); 
        }
        function remove_training(e)
        {
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
