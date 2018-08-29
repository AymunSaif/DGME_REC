@extends('layouts.app')
@section('content')
<form id="form" action="{{route('job_form.store')}}" name="form" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
<section id="demographics" >
       
      <div class="row" style="background-color::blanchedalmond; font-size: 15px;margin-top:15px; margin-bottom: -2px;text-align: center;">
            <div class=" col-md-12 form-group" >
                    <b>Apply For Specific Designation  </b></br>
                    <select class="form-control" name="afor">
                            <option value="">Select Designation</option>
                            @foreach($appliedposition as $afor)
                            <option value="{{$afor->id}}">{{$afor->name}}</option>
                            @endforeach
                           
                        </select>
                </div>
              
      </div>
     
        <div class="row" >
                <h3 align=center style="color:gray; font-weight:bold"><b>Demographics Info</b> </h3><hr/>
                <div class="col-md-6">
                        <div class="form-group">
                                <b>Name<span style="color:red;font-size:8px;">   (required)</span>  </b></br>
                                <input type="text" name="name" id="name"  placeholder="Enter Your Full Name" class="form-control" required>   
                            </div>
                            <div class="form-group">
                                    <b>Father / Spouse Name(Male)  </b></br>
                                    <input type="text" name="f_name" id="f_name"  placeholder="Father / Spouse Name(Male)" class="form-control" >   
                                </div>
                            <div class="input-group mb-3 form-group">    
                                    <b>Gender </b> </br>
                                <div class="input-group-append" id="button-addon4">
                                Male<input style="margin-left:6px;margin-right:5px;" type="radio" value="Male" name="gender">
                                Female<input  style="margin-left:6px;margin-right:5px;"  type="radio" value="Female" name="gender">
                                Transgender<input   style="margin-left:6px;margin-right:5px;" type="radio" value="Transgender" name="gender">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <b>Date Of Birth </b></br>
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
                              <select class="form-control"  name="dom_district">
                                <option value="">Select Districts</option>
                                @foreach($districts as $dist)
                                <option value="{{$dist->id}}">{{$dist->name}}</option>
                                @endforeach
                              
                               
                            </select>
                            </div>        
                            
                        </div>
                           
                      
                        <div class="col-md-6">
                                <div class="form-group ">
                                        <b>CNIC NO <span style="color:red;font-size:8px;">   (required)</span> </b></br>
                                        <input type="text" id="cnic" maxlength="15" name="cnic" class="form-control" required>
                                        
                                    </div>
                                    <div class="form-group">
                                            <b>Phone Number  </b></br>
                                            <input type="text" name="phone" id="phone" class="form-control" >   
                                    </div>
                                    <div class="form-group">
                                            <b>Cell Number  </b></br>
                                            <input type="text" name="cell_num" id="cell_num" class="form-control" >   
                                    </div>
                                    <div class="form-group">
                                            <b>Email Address  : </b></br>
                                            <input type="email" name="emailaddress" id="email" class="form-control" >   
                                    </div>
                                    <div class="form-group">
                                        <b>Postal Address </b></br>
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
                                   
                                </div>
                                   
                              
                        </div>
                
                <button type="button" class="btn btn-md btn-success" style=" margin-left: 40%;
                width: 252px;" id="education"> Next</button>                

</section>
<section id="educationSection" style="display:none">

        <h1 align=center style="color:gray;"><b>Education</b> </h1>

        <table class="table ">
            <tbody>
            <tr><td><div >
                    <b><span style="color:red; font-size:2em;">*</span>Schooling Level</b>
                    <select class="form-control school_level"  name="schooling_level" >
                    <option value="">Select :</option>
                    <option >Matric</option>
                    <option >O-Level</option>
                </select>
                </div>
            </td></tr>
            <tr> 
                <input type="hidden" name="school" value="school">
                <td>
                    <span class="sch_name" style="display:none;"> School Name <br><input type="text" name="s_Name" id="s_Name" class="form-control"></span>
                </td>
                <td>  <span class="sch_board" style="display:none;">Board <br> <input type="text" name="b_Name" id="b_Name"   class="form-control" ></span> </td>
                <td> <span class="sch_subjects" style="display:none;"><div >
                        <b> Subjects </b>
                    <select class="form-control" name="s_subjects">
                    <option value="">Select :</option>
                    @foreach($sec_edu as $se)
                        @if($se->type=='School')
                        <option value="{{$se->id}}">{{$se->subject_name}}</option>
                        @elseif($se->type=='olevel')
                        <option value="{{$se->id}}">{{$se->subject_name}}</option>
                        @endif
                    @endforeach    
                </select>
                </div>
                </span>
                </td>
                <td>
                    <span class="school_markstotal" style="display:none">Total Marks <br><input type="number" name="t_marks" id="t_marks" class="form-control">  </span> 
                    <span class="Grades_olevel" style="display:none">Grades <br><input type="text" name="grades_olevel" id="grades_olevel" class="form-control">  </span> 
                </td>
                <td><span class="school_marksobtained" style="display:none"> Achieved Marks <br><input type="number" name="a_marks" id="a_marks" class="form-control" ></span>  </td>
                <td> <span class="sch_div" style="display:none;">Division <br><input type="text" name="divi" id="divi"  class="form-control" > </span> </td>
                <td > <span class="sch_dist" style="display:none;"> <div >
                    <b>Distinction</b>
                <select class="form-control" name="dist">
                <option value=""></option>
                <option value="1">1st</option>
                <option value="2">2nd</option>
                <option value="3">3rd</option>
            </select>
            </div></span></td>

        </tr>
        <tr><td><div >
            <b><span style="color:red; font-size:2em;">*</span>College Level</b>
            <select class="form-control college_level"  name="college_level" >
            <option value="">Select :</option>
            <option >Intermediate</option>
            <option >A-Level</option>
        </select>
        </div>
    </td></tr>
    
    <tr>           
            <input type="hidden" name="college" value="college">
            <td> <span class="col_name" style="display:none">College Name<br><input type="text" name="c_Name" id="c_Name"  class="form-control" ></span></td>
            <td><span class="col_board" style="display:none"> Board <br> <input type="text" name="c_b_Name" id="c_b_Name"   class="form-control" > </span></td>
            <td><span class="col_subjects" style="display:none"><div >
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
            </div></span></td>

            <td>
                <span class="col_totalmarks" style="display:none">Total Marks <br><input type="number" name="c_t_marks" id="c_t_marks" class="form-control"> </span> 
                <span class="col_grades" style="display:none">Grades <br><input type="string" name="c_grades" id="c_grades" class="form-control"> </span> </td>
            </td>
                <td><span class="col_achievedmarks" style="display:none">Achieved Marks <br><input type="number" name="c_a_marks" id="c_a_marks" class="form-control" ></span>  </td>
            <td><span class="col_div" style="display:none">Division <br><input type="text" name="c_div" id="c_div"   class="form-control"> </span> </td>
            <td ><span class="col_dist" style="display:none"> <div >
                <b>Distinction</b>
            <select class="form-control" name="c_dist">
            <option value=""></option>
            <option value="1">1st</option>
            <option value="2">2nd</option>
            <option value="3">3rd</option>
        </select>
        </div></span></td>
        </tr>

        <tr><td> <div >
                <b><span style="color:red; font-size:2em;">*</span>UnderGraduate Level </b>
            <select class="form-control educationYear"  name="bch_year">
            <option value="">Select year:</option>
            <option >2 years</option>
            <option >4 years</option>
        </select>
        </div></td></tr>
            
    <tr>
            <input type="hidden" name="qualification_univ" value="univ">
            <td><span class="univ_name" style="display:none;">   Institution Name<br><input type="text" name="u_Name" id="u_Name"  class="form-control" >   
                </span>     
            </td>
               <td> <span class="univ_subjects" style="display:none;"><div >
                    <b> Degree </b>
                <select class="form-control" name="u_subjects">
                <option value="">Select degree:</option>
                @foreach($high_edu as $he)
                @if($he->type=="university")
                <option value="{{$he->id}}">{{$he->subject_name}}</option>
                @endif
                @endforeach
               
            </select>
            </div></span></td>
            <td>
                <span class="foury_cgpa " style="display:none"> CGPA <br>
                <input type="number" step="0.01" name="cgpa" id="cgpa"  class="form-control" ></span>

                <span class="twoy_totalmarks" style="display:none"> Total Marks <br>
                <input type="number" name="twoy_t_marks" id="twoy_t_marks" class="form-control">
                </span>
            </td>
             <td>
                <span class="grad_d" style="display:none">Date Of Graduation<br> <input type="date"  name="grad_date" id="date"  class="form-control" ></span>    
                  <span class="twoy_achievedmarks" style="display:none"> Achieved Marks <br>
                    <input type="number" name="twoy_a_marks" id="twoy_a_marks" class="form-control">
                    </span>
            </td>
            <td>
                <span class="twoy_divi" style="display:none"> Division<br>
                        <input type="text" name="twoy_div" id="twoy_div" class="form-control"> 
                </span>
             <span class="dmc" style="display:none">Final DMC Date<br>
                <input type="date"  name="dmc_date" id="dmc_date"  class="form-control" ></span></td>
                <td >  <span class="univ_dist" style="display:none;">     <div >
                        <b>Distinction</b>
                    <select class="form-control" name="u_position">
                    <option value=""></option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                </select>
                </div></span></td>
                <td></td>
            </tr>
          
            <tr> 
                <input type="hidden" name="qualification_postuniv" value="postuniv">                

                <td><b>Institution Name (Graduate-Level)</b><br><input type="text" name="pg_Name" id="pg_Name"  class="form-control" >   
                </td>
                <td><div >
                        <b>Degree Major</b>
                    <select class="form-control" name="post_grad_degree">
                    <option value="">Select degree:</option>
                    @foreach($high_edu as $he)
                        @if($he->type=="grad")
                            <option value="{{$he->id}}">{{$he->subject_name}}</option>
                        @endif
                    @endforeach
                </select>
                </div></td>
                <td> CGPA<br>
                    <input type="number" step="0.01" name="pg_cgpa" id="pg_cgpa"  class="form-control" ></td>
                 <td>Date Of Graduation<br>
                        <input type="date"  name="pg_date" id="pg_date"  class="form-control" ></td>
                <td>Final DMC Date<br>
                <input type="date"  name="pg_dmc_date" id="pg_dmc_date"  class="form-control" ></td>
                <td > <div >
                    <b>Distinction</b>
                    <select class="form-control" name="pg_dist">
                            <option value=""></option>
                            <option value="1">1st</option>
                            <option value="2">2nd</option>
                            <option value="3">3rd</option>
            </select>
            </div></td>
              <td></td>
        </tr>

        <tr> 
                <input type="hidden" name="qualification_postgraduniv" value="postgraduniv">                

                <td><b>Institution Name (PostGraduate-Level)</b><br><input type="text" name="postgrad_Name" id="postgrad_Name"  class="form-control" >   
                </td>
                <td><div >
                        <b>Degree Major</b>
                    <select class="form-control" name="postgrad_degree">
                    <option value="">Select degree:</option>
                    @foreach($high_edu as $he)
                        @if($he->type=="post_grad")
                            <option value="{{$he->id}}">{{$he->subject_name}}</option>
                        @endif
                    @endforeach
                </select>
                </div></td>
                <td> CGPA<br>
                    <input type="number" step="0.01" name="postgrad_cgpa" id="postgrad_cgpa"  class="form-control" ></td>
                 <td>Date Of Graduation<br>
                        <input type="date"  name="postgrad_date" id="postgrad_date"  class="form-control" ></td>
                <td>Final DMC Date<br>
                <input type="date"  name="postgrad_dmc_date" id="postgrad_dmc_date"  class="form-control" ></td>
                <td></td>
              <td></td>
        </tr>

        <tr> 
                <input type="hidden" name="qualification_postdocuniv" value="postdocuniv">                

                <td><b>Institution Name (Post Doctoral-Level)</b><br><input type="text" name="postdoc_Name" id="postdoc_Name"  class="form-control" >   
                </td>
                <td><div >
                        <b>Degree Major</b>
                    <select class="form-control" name="postdoc_degree">
                    <option value="">Select degree:</option>
                    @foreach($high_edu as $he)
                        @if($he->type=="postdoc")
                            <option value="{{$he->id}}">{{$he->subject_name}}</option>
                        @endif
                    @endforeach
                </select>
                </div></td>
                <td> CGPA<br>
                    <input type="number" step="0.01" name="postdoc_cgpa" id="postdoc_cgpa"  class="form-control" ></td>
                 <td>Date Of Graduation<br>
                        <input type="date"  name="postdoc_date" id="postdoc_date"  class="form-control" ></td>
                <td>Final DMC Date<br>
                <input type="date"  name="postdoc_dmc_date" id="postdoc_dmc_date"  class="form-control" ></td>
                <td></td>
              <td></td>
        </tr>

            <tr>
                <td><div >
                        <b> Certification</b>
                    <select class="form-control" name="app_cer">
                    <option value="">Select certificate:</option>
                    @foreach($certifications as $cer)
                    <option value="{{$cer->id}}">{{$cer->subject_name}}</option>
                    @endforeach
                </select>
                </div></td>
                <td> Issued By <br> <input type="text"  name="certificate_i" id="certificate_i"  class="form-control" > </td>
                
                <td>Date Of Issuance <br>
                    <input type="date"  name="i_date" id="i_date"  class="form-control" >
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                
            </tr>
         <tr>
               <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>  
         </tr>
    

            
            </tbody>
        </table>
<button type="button" class="btn btn-md btn-success " style=" margin-left: 40%;width: 252px;" id="experience"> Next</button>                

</section>

<section id="experienceSection" style="display:none">
        <h1 align=center style="color:gray;"><b>Experience</b> </h1>

        <div class="row">
         
                <div class="col-md-12">
                        <div class="form-group">
                                <b>Organization Name : </b></br>
                                <input type="text" name="org_Name" id="org_Name"  placeholder="Enter Your Organization Name" class="form-control" >   
                            </div>
                           
                            <div class="form-group" name="org_type">
                                    <b>Organization Type :</b>
                              <select class="form-control">
                                <option value="">Select Type:</option>
                                <option value="1">Private</option>
                                <option value="2">Public</option>
                                <option value="3">Government</option>
                                <option value="4">Self-Employed</option>
                                <option value="5">Own Business</option>
                                <option value="5">International</option>
                               
                            </select>
                            </div>
                          <div class="col-md-6">
                              <div>
                                <b>From </b>
                                <input type="date" name="start_dob" class="form-control" >    
                            </div></div>
                            
                          <div class="col-md-6">
                                <div>
                                        <b>To</b>   <input type="date" name="end_dob" class="form-control"> 
                                </div>
                          </div>
                            
                            <div class="form-group">
                                    <b>Roles :</b>
                                    <input type="text" name="role_name" class="form-control" >
                               
                            </select>
                            </div>        
                            
                        </div>
                        <button type="submit" class="btn btn-md btn-danger " style=" margin-left: 40%;width: 252px;"> Save</button>                
                           
</section>

</form> 
@endsection
@section('scriptTags')
<script>

     $('.school_level').on('change',function(){ 
      if($('.school_level').val()=='Matric')
        { 
        $('.Grades_olevel').hide(1000);

        $('.sch_name').show(1000);
        $('.sch_board').show(1000);
        $('.sch_subjects').show(1000);
        $('.school_markstotal').show(1000);
        $('.school_marksobtained').show(1000);
        $('.sch_div').show(1000);
        $('.sch_dist').show(1000);
        
      }
    else if($('.school_level').val()=='O-Level'){
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

$('.college_level').on('change',function(){ 
    if($('.college_level').val()=='Intermediate')
      { 
      $('.col_grades').hide(1000);

      $('.col_name').show(1000);
      $('.col_board').show(1000);
      $('.col_subjects').show(1000);
      $('.col_totalmarks').show(1000);
      $('.col_achievedmarks').show(1000);
      $('.col_div').show(1000);
      $('.col_dist').show(1000);
      
    }
  else if($('.college_level').val()=='A-Level'){
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
        $('.foury_cgpa').hide(1000);
        $('.grad_d').hide(1000);
        $('.dmc').hide(1000);

        $('.univ_name').show(1000);
        $('.univ_subjects').show(1000);
        $('.twoy_totalmarks').show(1000);
        $('.twoy_achievedmarks').show(1000)
        $('.twoy_divi').show(1000);
        $('.univ_dist').show(1000);
       
      }else if($('.educationYear').val()=='4 years')
            {
            $('.twoy_totalmarks').hide(1000);
            $('.twoy_achievedmarks').hide(1000)
            $('.twoy_divi').hide(1000); 

            $('.univ_name').show(1000);
            $('.univ_subjects').show(1000);
            $('.foury_cgpa').show(1000); 
            $('.grad_d').show(1000);
            $('.dmc').show(1000);
            $('.univ_dist').show(1000);
            }
    });
    
    $('button#education').on('click',function(){
        if ($("input:invalid").length) {
            alert('Please Fill out Name or CNIC.');
          }       
        else{
        $('section#demographics').hide(1000); 
        $('section#educationSection').show(1000); 
        }
    });
    $('button#experience').on('click',function(){
        $('section#demographics').hide(1000); 
        $('section#educationSection').hide(1000); 
        $('section#experienceSection').show(1000); 
    });
        $('#cnic').keydown(function(){
        
          //allow  backspace, tab, ctrl+A, escape, carriage return
          if (event.keyCode == 8 || event.keyCode == 9 
                            || event.keyCode == 27 || event.keyCode == 13 
                            || (event.keyCode == 65 && event.ctrlKey === true) )
                                return;
          if((event.keyCode < 48 || event.keyCode > 57))
           event.preventDefault();
        
          var length = $(this).val().length; 
                      
          if(length == 5 || length == 13)
           $(this).val($(this).val()+'-');
        
         });
</script>
@endsection