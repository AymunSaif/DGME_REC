<?php

namespace App\Http\Controllers;

use App\ApplicantLog;
use App\Applicant;
use App\ApplicantDetail;
use App\ApplicantDetailLog;
use App\ApplicantAppliedforLog;
use App\ApplicantAppliedFor;
use App\ApplicantCertification;
use App\ApplicantCertificationLog;
use App\City;
use App\District;
use Auth;
use App\ApplicantExperienceLog;
use App\ApplicantExperience;
use App\ApplicantHigherEducationLog;
use App\ApplicantHigherEducation;
use App\ApplicantSecondaryEducationLog;
use App\ApplicantSecondaryEducation;
use App\Certification;
use App\HigherSubject;
use App\HigherSubjectLog;
use App\SecondarySubjectLog;
use App\SecondarySubject;
use App\Province;
use App\ApplicantDocumentLog;
use App\ApplicantDocument;
use App\User;
use App\CnicLog;
use Illuminate\Http\Request;
use App\ApplicantTraining;
use App\ApplicantTrainingLog;
use App\ApplicantResearchWorkLog;
use App\ApplicantResearchWork;
use App\ProfessionalCertificationMemberLog;
use App\ProfessionalCertificationMember;
use App\UniversityLog;
use App\University;
use phpDocumentor\Reflection\Types\Null_;
class JobFormController extends Controller
{
    public function createCnic($status=null){
      return view('recuritment.storeCnic');
    }
    public function storeCnic(Request $request){
      // dd($request->all());
      $personcheck= Applicant::orderBy('created_at','desc')->first();
      $number='1';
      // dd($personcheck);
      // dd($request->all());
      $person=Applicant::where('cnic',$request->person_cnic)->first();
      if($person){ //if entry stored in Applicant Table
        $cniclog=CnicLog::where('applicant_id',$person->id)->first();
        if($cniclog->status==1 && $cniclog->user_id!=Auth::id()){ //Check Status if some-one working
          return redirect()->back()->with('error',ucfirst($cniclog->User->name).' is working on it.');
        }else if($cniclog->status==1 && $cniclog->user_id==Auth::id()){
          return redirect()->route('job_form_create',$person->id);
        }
        else{
            $cnicLog= new CnicLog();
            // $cnicLog->cnic=$person->cnic;
            $cnicLog->applicant_id=$person->id;
            $cnicLog->user_id=Auth::id();
            $cnicLog->save();
            return redirect()->route('job_form_create',$person->id);
        }
      }else{ //If applicant doesn't exist
        $person= new Applicant();
        $person->cnic=$request->person_cnic;
        $person->created_by=Auth::id();
        if($personcheck){
          $num=explode('_',$personcheck->uniqueNumber);
          $number+=$num[2];
        }
        $person->uniqueNumber="HIS_".date('Y').'_'.$number;
        $person->save();
        // Setting status
        $cnicLog= new CnicLog();
        // $cnicLog->cnic=$person->cnic;
        $cnicLog->applicant_id=$person->id;
        $cnicLog->user_id=Auth::id();
        $cnicLog->save();
        return redirect()->route('job_form_create',$person->id);
      }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
     {
      $persons=Applicant::orderBy('created_at','desc')->paginate(8);
      $person_applied=ApplicantAppliedFor::orderBy('created_at','desc')->paginate(8);
      return view('recuritment.index',['persons'=>$persons,'person_applied'=>$person_applied]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
     {
      $applicant=Applicant::where('id',$id)->first();
      if($applicant){
      $cniclog=CnicLog::where('applicant_id',$applicant->id)->first();
      if($cniclog->status==1 && $cniclog->user_id!=Auth::id()){ //Check Status if some-one working
        return redirect()->back()->with('warning',$cnicLog->User->first_name.' is working on it.');
      }
    }
      else{
      return redirect()->route('createCnic')->with('error','Not Found!');
    }
        $cities=City::all();
        $districts=District::all();
        $provinces=Province::all();
        $sec_edu=SecondarySubject::all();
        $high_edu=HigherSubject::all();
        $certifications=Certification::all();
        $appliedposition=ApplicantAppliedFor::all();
          return view('recuritment.create',['applicant'=>$applicant,'cities'=>$cities,'districts'=> $districts,'provinces'=>$provinces,
                          'sec_edu'=>$sec_edu,'high_edu'=>$high_edu
                          ,'certifications'=> $certifications,'appliedposition'=> $appliedposition]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  private function storeLog(Request $request)
  {
      $person= new ApplicantLog();
      // Applicant Details
     $person->applicant_id=$request->person_id;
     $person->diary_num=$request->d_num;
     $person->name= $request->name;
     $person->gender= $request->gender;
     $person->dob= $request->dob;
     $person->religion=$request->religion;
     $person->email= $request->emailaddress;
     $person->created_by=Auth::id();
     $person->save();
     $person_detail= new ApplicantDetailLog();
     $person_detail->applicant_log_id=$person->id;
     $person_detail->father_name=$request->f_name;
     $person_detail->province_id=$request->dom_province;
     $person_detail->district_id=$request->dom_district;
     $person_detail->city=$request->city;
     $person_detail->postal_add=$request->address;
     $person_detail->phone_num=$request->full_phone;
     $person_detail->cell_num=$request->full_mobilenumber1;
     $person_detail->cellnum_2=$request->full_mobilenumber2;
     $person_detail->save();
    // }

    // dd($person);
     //---------->School Education//

     // else if($request->data_type=='education'){
     if($request->schooling_level=="Matric")
      {
        $person_secondaryEdu = new ApplicantSecondaryEducationLog();
        $person_secondaryEdu->applicant_log_id=$person->id;
        $person_secondaryEdu->name_of_school=$request->s_Name;
        $person_secondaryEdu->qualification_type=$request->qualification;

        if(isset($request->b_Name) && $request->b_Name!=Null && $request->b_Name!='other')
          $person_secondaryEdu->board=$request->b_Name;
        else if(isset($request->sch_otherboard) && $request->sch_otherboard!=Null)
          $person_secondaryEdu->board=$request->sch_otherboard;

        if(isset($request->s_subjects) && $request->s_subjects!=Null &&  $request->s_subjects!='other')
          {
            $seco_sub=SecondarySubject::find($request->s_subjects);
            $seco_sub_log=SecondarySubjectLog::where('subject_name',$seco_sub->subject_name)->first();
            $person_secondaryEdu->secondary_subject_log_id=$seco_sub_log->id;
          }
          // $person_secondaryEdu->secondary_subject_log_id=$request->s_subjects;
        else if(isset($request->subjectsschool_other) && $request->subjectsschool_other!=Null)
          {
          $secondary_subject= new SecondarySubjectLog();
          $secondary_subject->subject_name = $request->subjectsschool_other;
          $secondary_subject->type='Matric';
          $secondary_subject->save();
          $person_secondaryEdu->secondary_subject_log_id=$secondary_subject->id;
          }

        $person_secondaryEdu->total_marks=$request->t_marks;
        $person_secondaryEdu->achieved_marks=$request->a_marks;
        $person_secondaryEdu->percentage=$request->sch_percentage;

        $person_secondaryEdu->division=$request->divi;

        $person_secondaryEdu->distinction=$request->dist;
        $person_secondaryEdu->save();
      }

     elseif($request->schooling_level=="O-Level")
      {
        $person_secondaryEdu = new ApplicantSecondaryEducationLog();

        $person_secondaryEdu->applicant_log_id=$person->id;

        $person_secondaryEdu->name_of_school=$request->s_Name;
        $person_secondaryEdu->qualification_type=$request->qualification;

        if(isset($request->b_Name) && $request->b_Name!=Null && $request->b_Name!='other')
        $person_secondaryEdu->board=$request->b_Name;
        else if(isset($request->sch_otherboard) && $request->sch_otherboard!=Null)
        $person_secondaryEdu->board=$request->sch_otherboard;

        if(isset($request->s_subjects) && $request->s_subjects!=Null  && $request->s_subjects!='other')
        {
          $seco_sub=SecondarySubject::find($request->s_subjects);
          $seco_sub_log=SecondarySubjectLog::where('subject_name',$seco_sub->subject_name)->first();
          $person_secondaryEdu->secondary_subject_log_id=$seco_sub_log->id;
        }
        // $person_secondaryEdu->secondary_subject_log_id=$request->s_subjects;
        else if(isset($request->subjectsschool_other) && $request->subjectsschool_other!=Null)
        {

          $secondary_subject= new SecondarySubjectLog();
          $secondary_subject->subject_name = $request->subjectsschool_other;
          $secondary_subject->type= 'O-Level';
          $secondary_subject->save();
          $person_secondaryEdu->secondary_subject_log_id=$secondary_subject->id;
        }
        $person_secondaryEdu->distinction=$request->dist;
        $person_secondaryEdu->total_marks=$request->t_marks;
        $person_secondaryEdu->achieved_marks=$request->a_marks;
        $person_secondaryEdu->percentage=$request->sch_percentage;


        $person_secondaryEdu->division=$request->divi;
        $person_secondaryEdu->grades=$request->grades_olevel;
        $person_secondaryEdu->save();
       }


    //----->College Education//

     if($request->college_level=="Intermediate")
      {
        $person_secondaryEdu_college = new ApplicantSecondaryEducationLog();
        $person_secondaryEdu_college->applicant_log_id=$person->id;
        $person_secondaryEdu_college->name_of_school=$request->c_Name;
        $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;

        if(isset($request->c_b_Name) && $request->c_b_Name!=Null && $request->c_b_Name!='other')
         $person_secondaryEdu_college->board=$request->c_b_Name;
        else if(isset($request->college_otherboard) && $request->college_otherboard!=Null)
         $person_secondaryEdu_college->board=$request->college_otherboard;

        if(isset($request->c_subjects) && $request->c_subjects!=Null  && $request->c_subjects!='other')
        {
          $seco_sub=SecondarySubject::find($request->c_subjects);
          $seco_sub_log=SecondarySubjectLog::where('subject_name',$seco_sub->subject_name)->first();
          $person_secondaryEdu_college->secondary_subject_log_id=$seco_sub_log->id;
        }
         // $person_secondaryEdu_college->secondary_subject_log_id=$request->c_subjects;
        else if(isset($request->c_othersubjects)  && $request->c_othersubjects!=Null)
        {
          $secondary_subject= new SecondarySubjectLog();
          $secondary_subject->subject_name = $request->c_othersubjects;
          $secondary_subject->type= $request->college_level;
          $secondary_subject->save();
          $person_secondaryEdu_college->secondary_subject_log_id=$secondary_subject->id;

        }
        $person_secondaryEdu_college->total_marks=$request->c_t_marks;
        $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
        $person_secondaryEdu_college->percentage=$request->c_percentage;


        $person_secondaryEdu_college->division=$request->c_div;
        $person_secondaryEdu_college->distinction=$request->c_dist;
        $person_secondaryEdu_college->save();

      }
     elseif($request->college_level=="A-Level")
      {
        $person_secondaryEdu_college = new ApplicantSecondaryEducationLog();

      $person_secondaryEdu_college->applicant_log_id=$person->id;
      $person_secondaryEdu_college->name_of_school=$request->c_Name;
      $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;

      if(isset($request->c_b_Name) && $request->c_b_Name!=Null && $request->c_b_Name!='other')
      $person_secondaryEdu_college->board=$request->c_b_Name;
      else if(isset($request->college_otherboard) && $request->college_otherboard!=Null)
      $person_secondaryEdu_college->board=$request->college_otherboard;

      if(isset($request->c_subjects) && $request->c_subjects!=Null && $request->c_subjects!='other')
      {
        $seco_sub=SecondarySubject::find($request->c_subjects);
        $seco_sub_log=SecondarySubjectLog::where('subject_name',$seco_sub->subject_name)->first();
        $person_secondaryEdu_college->secondary_subject_log_id=$seco_sub_log->id;
      }
      // $person_secondaryEdu_college->secondary_subject_log_id=$request->c_subjects;
      else if(isset($request->c_othersubjects)  && $request->c_othersubjects!=Null)
        {
          $secondary_subject= new SecondarySubjectLog();
          $secondary_subject->subject_name = $request->c_othersubjects;
          $secondary_subject->type= $request->college_level;
          $secondary_subject->save();
          $person_secondaryEdu_college->secondary_subject_log_id=$secondary_subject->id;

        }
      $person_secondaryEdu_college->total_marks=$request->c_t_marks;
      $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
      $person_secondaryEdu_college->percentage=$request->c_percentage;
      $person_secondaryEdu_college->grades=$request->c_grades;
      $person_secondaryEdu_college->division=$request->c_div;
      $person_secondaryEdu_college->distinction=$request->c_dist;
      $person_secondaryEdu_college->save();
    }

     //---------->Bachelors Education 2year and 4 year
     $i=0;$year4=0;$year2=0;
   if($request->bch_year!=null)
   {
    foreach($request->bch_year as $by)
     {
       if($by=="2 years")
        {

          $person_higherEdu_2yr = new ApplicantHigherEducationLog();
          $person_higherEdu_2yr->applicant_log_id=$person->id;

          if(isset($request->college_university_names[$year2]) && $request->college_university_names[$year2] !=Null && $request->college_university_names[$year2]!='other')
            {
              $univ=University::find($request->college_university_names[$year2]);
              $univ_log=UniversityLog::where('name',$univ->name)->first();
              $person_higherEdu_2yr->university_log_id=$univ_log->id;
            }
          else if(isset($request->other_collegebox[$year2]) && ($request->other_collegebox[$year2]!=Null))
           {
             // dd($reuest)
            $new_univ= new UniversityLog();
            $new_univ->name =$request->other_collegebox[$year2];
            $new_univ->status= 'true';
            $new_univ->save();
            $person_higherEdu_2yr->university_log_id=$new_univ->id;

           }

          if(isset($request->qualification_univ[$year2]))
          $person_higherEdu_2yr->qualification_type=$request->qualification_univ[$i];

          $person_higherEdu_2yr->bach_year=$by;

          if(isset($request->u_collegesubjects[$year2]) && $request->u_collegesubjects[$year2]!=Null  && $request->u_collegesubjects[$year2]!='other' )
            {
              $higher_sub=HigherSubject::find($request->u_collegesubjects[$year2]);
              $higher_sub_log=HigherSubjectLog::where('subject_name',$higher_sub->subject_name)->first();
              $person_higherEdu_2yr->higher_subject_log_id=$higher_sub_log->id;
            }
           // $person_higherEdu_2yr->higher_subject_log_id=($request->u_collegesubjects[$year2]-209);
          else if(isset($request->other_univ_colsubjects[$year2]) && ($request->other_univ_colsubjects[$year2]!=Null))
           {
            $new_highersubject= new HigherSubjectLog();
            $new_highersubject->subject_name =$request->other_univ_colsubjects[$year2];
            $new_highersubject->type= 'bachelor';
            $new_highersubject->save();
            $person_higherEdu_2yr->higher_subject_log_id=($new_highersubject->id);
           }

          if(isset($request->twoyear_t_marks[$year2]))
          $person_higherEdu_2yr->total_marks=$request->twoyear_t_marks[$year2];

          if(isset($request->twoy_a_marks[$year2]))
          $person_higherEdu_2yr->achieved_marks=$request->twoyear_a_marks[$year2];

          if(isset($request->percentage[$year2]))
          $person_higherEdu_2yr->percentage=$request->percentage[$year2];

          if(isset($request->division[$i]))
          $person_higherEdu_2yr->division=$request->division[$i];

          if(isset($request->distinction[$i]))
          $person_higherEdu_2yr->distinction=$request->distinction[$i];

          $person_higherEdu_2yr->save();
          $year2++;

        }
      else if($by=="4 years")
       {

        $person_higherEdu_univ = new ApplicantHigherEducationLog();
        $person_higherEdu_univ->applicant_log_id=$person->id;
        if(isset($request->university_names[$year4]) && $request->university_names[$year4]!=Null && $request->university_names[$year4]!='other')
        {
          $univ=University::find($request->university_names[$year4]);
          $univ_log=UniversityLog::where('name',$univ->name)->first();
          $person_higherEdu_univ->university_log_id=$univ_log->id;

          // $person_higherEdu_univ->university_log_id=$request->university_names[$year4];
        }
        else if(isset($request->other_univbox[$year4]) && $request->other_univbox[$year4]!=Null)
        {
          $new_univ= new UniversityLog();
          $new_univ->name = $request->other_univbox[$year4];
          $new_univ->status= 'true';
          $new_univ->save();
          $person_higherEdu_univ->university_log_id=$new_univ->id;

        }
        // dd($request->all());
        if(isset($request->qualification_univ[$year4]))
        $person_higherEdu_univ->qualification_type=$request->qualification_univ[$i];

        $person_higherEdu_univ->bach_year=$by;


        if(isset($request->u_subjects[$year4]) && $request->u_subjects[$year4]!=Null && $request->u_subjects[$year4]!='other' )
        {
          $higher_sub=HigherSubject::find($request->u_subjects[$year4]);
          $higher_sub_log=HigherSubjectLog::where('subject_name',$higher_sub->subject_name)->first();
          $person_higherEdu_univ->higher_subject_log_id=$higher_sub_log->id;
        }
        // $person_higherEdu_univ->higher_subject_log_id=($request->u_subjects[$year4]-209);
        else if(isset($request->other_univsubjects[$year4]) && ($request->other_univsubjects[$year4]!=Null))
        {
          $new_highersubject= new HigherSubjectLog();
          $new_highersubject->subject_name =$request->other_univsubjects[$year4];
          $new_highersubject->type= 'bachelor';
          $new_highersubject->save();
          $person_higherEdu_univ->higher_subject_log_id=($new_highersubject->id);
        }

        if(isset($request->cgpa[$year4]))
        $person_higherEdu_univ->cgpa=$request->cgpa[$year4];

        if(isset($request->foury_t_marks[$year4]))
        $person_higherEdu_univ->total_marks=$request->foury_t_marks[$year4];

        if(isset($request->foury_a_marks[$year4]))
        $person_higherEdu_univ->achieved_marks=$request->foury_a_marks[$year4];

        if(isset($request->univ_per[$year4]))
        $person_higherEdu_univ->percentage=$request->univ_per[$year4];

        if(isset($request->dmc_date[$year4]))
        $person_higherEdu_univ->final_dmc_date=$request->dmc_date[$year4];

        if(isset($request->division[$i]))
        $person_higherEdu_univ->division=$request->division[$i];

        if(isset($request->distinction[$i]))
        $person_higherEdu_univ->distinction=$request->distinction[$i];

        $person_higherEdu_univ->save();
        $year4++;
        // dd('saved'.$person_higherEdu_univ);
      }
      $i++;
      }

   }
   //------------>postgraduation

     $i=0;
    //  dump($request->all());
    if($request->qualification_postuniv[$i]!=null)
     {
      foreach($request->qualification_postuniv as $qualification_postuniv)
      {
        $person_higherEdu_grad = new ApplicantHigherEducationLog();
        $person_higherEdu_grad->applicant_log_id=$person->id;

        if(isset($request->pg_Name[$i]) && $request->pg_Name[$i]!=Null && $request->pg_Name[$i]!='other')
      {
        $univ=University::find($request->pg_Name[$i]);
        $univ_log=UniversityLog::where('name',$univ->name)->first();
        $person_higherEdu_grad->university_log_id=$univ_log->id;

        // $person_higherEdu_grad->university_log_id=$request->pg_Name[$i];
      }  elseif(isset($request->otherpost_univ[$i]) && $request->otherpost_univ[$i]!=Null)
        {
          $new_univ= new UniversityLog();
          $new_univ->name =$request->otherpost_univ[$i];
          $new_univ->status='true';
          $new_univ->save();
          $person_higherEdu_grad->university_log_id=$new_univ->id;

        }

        if(isset($request->qualification_postuniv[$i]))
        $person_higherEdu_grad->qualification_type=$qualification_postuniv;

        if(isset($request->post_grad_subject[$i]) && $request->post_grad_subject[$i]!=Null && $request->post_grad_subject[$i]!="other")
          {
            $higher_sub=HigherSubject::find($request->post_grad_subject[$i]);
            $higher_sub_log=HigherSubjectLog::where('subject_name',$higher_sub->subject_name)->first();
            $person_higherEdu_grad->higher_subject_log_id=$higher_sub_log->id;
          }
        // $person_higherEdu_grad->higher_subject_log_id=($request->post_grad_subject[$i]-209);
        else if(isset($request->other_postgradsubjects[$i]) && ($request->other_postgradsubjects[$i]!=Null))
        {
          $new_highersubject= new HigherSubjectLog();
          $new_highersubject->subject_name =$request->other_postgradsubjects[$i];
          $new_highersubject->type= 'masters';
          $new_highersubject->save();
          $person_higherEdu_grad->higher_subject_log_id=($new_highersubject->id);
        }
        if(isset($request->postgrad_marks[$i]))
          $person_higherEdu_grad->total_marks=$request->postgrad_marks[$i];

        if(isset($request->postgrad_achievedmarks[$i]))
        $person_higherEdu_grad->achieved_marks=$request->postgrad_achievedmarks[$i];

        if(isset($request->pg_cgpa[$i]))
        $person_higherEdu_grad->cgpa=$request->pg_cgpa[$i];

       if(isset($request->pg_prcentage[$i]))
        $person_higherEdu_grad->percentage=$request->pg_percentage[$i];

        if(isset($request->postgrad_division[$i]))
        $person_higherEdu_grad->division=$request->postgrad_division[$i];

        if(isset($request->pg_dmc_date[$i]))
          $person_higherEdu_grad->final_dmc_date=$request->pg_dmc_date[$i];

        if(isset($request->pg_distinction[$i]))
          $person_higherEdu_grad->distinction=$request->pg_distinction[$i];
          // dd($person_higherEdu_grad);
         $person_higherEdu_grad->save();
        $i++;
     }
    }
     //--------------->phd education

     $i=0;
     if($request->phd_Name!=null)
    foreach($request->phd_Name as $phd_name)
     {
      $person_higherEdu_phd = new ApplicantHigherEducationLog();
      $person_higherEdu_phd->applicant_log_id=$person->id;
      if(isset($request->qualification_phduniv[$i]))
      $person_higherEdu_phd->qualification_type=$request->qualification_phduniv[$i];

      if(isset($request->phd_Name[$i]) && $request->phd_Name[$i]!=Null  && $request->phd_Name[$i]!="other")
      {
        $univ=University::find($phd_name);
        $univ_log=UniversityLog::where('name',$univ->name)->first();
        $person_higherEdu_phd->university_log_id=$univ_log->id;
         // $person_higherEdu_phd->university_log_id=$phd_name;
      }
      elseif(isset($request->otherphd_univ[$i]) && $request->otherphd_univ[$i]!=Null)
      {

        $new_univ= new UniversityLog();
        $new_univ->name =$request->otherphd_univ[$i];
        $new_univ->status='true';
        $new_univ->save();
        $person_higherEdu_phd->university_log_id=$new_univ->id;
      }


      if(isset($request->phd_SubjectName[$i]) && $request->phd_SubjectName[$i]!=Null && $request->phd_SubjectName[$i]!="other")
      {
        $higher_sub=HigherSubject::find($request->phd_SubjectName[$i]);
        $higher_sub_log=HigherSubjectLog::where('subject_name',$higher_sub->subject_name)->first();
        $person_higherEdu_phd->higher_subject_log_id=$higher_sub_log->id;
      }
      // $person_higherEdu_phd->higher_subject_log_id=($request->phd_SubjectName[$i]-209);
      if(isset($request->phd_other_SubjectName[$i]) && $request->phd_other_SubjectName!=Null)
      {
        $higher_subject= new HigherSubjectLog();
        $higher_subject->subject_name = $request->phd_other_SubjectName[$i];
        $higher_subject->type= 'PHD';
        $higher_subject->save();
        $person_higherEdu_phd->higher_subject_log_id=($new_highersubject->id);
      }

      if(isset($request->phd_thesis[$i]))
      $person_higherEdu_phd->thesis_topic=$request->phd_thesis[$i];

      if(isset($request->phd_date[$i]))
      $person_higherEdu_phd->final_dmc_date=$request->phd_date[$i];

      $person_higherEdu_phd->save();

      $i++;
    }

     //---------------->postdoc education
      $i=0;
     if($request->pd_Name!=null)
   foreach($request->pd_Name as $pd_name)
     {
      $person_higherEdu_postgrad = new ApplicantHigherEducationLog();
      $person_higherEdu_postgrad->applicant_log_id=$person->id;


      if(isset($request->$request->pd_Name[$i]) && $request->$request->pd_Name[$i]!=Null && $request->$request->pd_Name[$i]!="other")
      {
        $univ=University::find($pd_name);
        $univ_log=UniversityLog::where('name',$univ->name)->first();
        $person_higherEdu_postdoc->university_log_id=$univ_log->id;
        // $person_higherEdu_postdoc->university_log_id=$pd_name;
      }
      elseif(isset($request->otherpostdoc_univ[$i]) && $request->otherpostdoc_univ[$i]!=Null)
      {
        $new_univ= new UniversityLog();
        $new_univ->name =$request->otherpostdoc_univ[$i];
        $new_univ->status='true';
        $new_univ->save();
        $person_higherEdu_postdoc->university_log_id=$new_univ->id;

      }

      if(isset($request->qualification_postdocuniv[$i]))
      $person_higherEdu_postgrad->qualification_type=$request->qualification_postdocuniv[$i];

      if(isset($request->pd_thesis[$i]))
      $person_higherEdu_postgrad->thesis_topic=$request->pd_thesis[$i];


      if(isset($request->postdoc_subjName[$i]))
      $person_higherEdu_phd->higher_subject_log_id=$request->postdoc_subjName[$i];

      if(isset($request->pd_date[$i]))
      $person_higherEdu_postgrad->date_of_grad=$request->pd_date[$i];

      $person_higherEdu_postgrad->save();
      $i++;
  }

     //------------------>certification

     $i=0;
     if($request->app_cer!=null)
    foreach($request->app_cer as $app_cer)
      {
      $person_certificate= new ApplicantCertificationLog();
      $person_certificate->applicant_log_id=$person->id;

      $person_certificate->name_certifictaion=$app_cer;

      if(isset($request->cer_num[$i]))
      $person_certificate->certification_number=$request->cer_num[$i];
      if(isset($request->certificate_i[$i]))
      $person_certificate->issued_by=$request->certificate_i[$i];
      if(isset($request->i_date[$i]))
      $person_certificate->date_of_issuance=$request->i_date[$i];
      $person_certificate->save();
      $i++;
    }

  //-------------------->trainings

     $i=0;
     if($request->app_tr!=null)
   foreach($request->app_tr as $app_tr)
     {
     $person_training= new ApplicantTrainingLog();
     $person_training->applicant_log_id=$person->id;
     $person_training->training_name=$app_tr;
     if(isset($request->tr_by[$i]))
     $person_training->by_name=$request->tr_by[$i];
     if(isset($request->tr_duration[$i]))
     $person_training->duration=$request->tr_duration[$i];
     $person_training->save();
     $i++;
   }

   //--------------------->researchwork

     $i=0;
     if($request->researchType!=null)
   foreach($request->researchType as $rp)
    {
      $person_researchwork= new ApplicantResearchWorkLog();
      $person_researchwork->applicant_log_id=$person->id;
      $person_researchwork->researchtype=$rp;
        if($request->researchType[$i]=="Journal")
        {
            if(isset($request->app_jr[$i]))
          $person_researchwork->name=$request->app_jr[$i];
          if(isset($request->journal_yr[$i]))
          $person_researchwork->published_year=$request->journal_yr[$i];
          if(isset($request->journal_dt[$i]))
          $person_researchwork->date_published=$request->journal_dt[$i];

        }
        else if($request->researchType[$i]=="Conference")
        {
          if(isset($request->app_conf[$i]))
          $person_researchwork->conference=$request->app_conf[$i];
          if(isset($request->conf_yr[$i]))
          $person_researchwork->published_year=$request->conf_yr[$i];
          if(isset($request->rp_dt[$i]))
          $person_researchwork->date_published=$request->rp_dt[$i];
          if(isset($request->app_rp[$i]))
          $person_researchwork->name=$app_rp[$i];

        }
        $person_researchwork->save();
        $i++;
  }

  //---------------------->professional trainings

     $i=0;
     if($request->app_pmname!=null)
     foreach($request->app_pmname as $app_pmname)
      {
        $person_pm= new ProfessionalCertificationMemberLog();
        $person_pm->applicant_log_id=$person->id;

        if(isset($request->app_pmname))
        $person_pm->name=$app_pmname;

        if(isset($request->m_level[$i]))
        $person_pm->membership_level=$request->m_level[$i];

        if(isset($request->issued_name[$i]))
        $person_pm->issued_by=$request->issued_name[$i];

        if(isset($request->pm_doi[$i]))
        $person_pm->issuance_date=$request->pm_doi[$i];

        if(isset($request->pm_reg[$i]))
        $person_pm->registeration=$request->pm_reg[$i];
        $person_pm->save();

        $i++;
    }

   //---------------------->experience
    // }
  // else if($request->data_type=='experience'){
      $i=0;
      if($request->org_Name!=null)
     foreach($request->org_Name as $org)
       {
          $person_exp= new ApplicantExperienceLog();
          $person_exp->applicant_log_id=$person->id;

          if(isset($request->org_Name[$i]))
          $person_exp->org_name=$org;

          if(isset($request->org_type[$i]))
          $person_exp->org_type=$request->org_type[$i];

          if(isset($request->start_date[$i]))
          $person_exp->start_date=$request->start_date[$i];

          if(isset($request->end_date[$i]))
          $person_exp->end_date=$request->end_date[$i];

          if(isset($request->role_name[$i]))
          $person_exp->role=$request->role_name[$i];

          $person_exp->save();
          $i++;
      }
    // }


    //---------------------->position applied for
    // else if($request->data_type=='designation'){
      $i=0;
       if($request->app_designation!=null)
     foreach($request->app_designation as $app_designation)
      {
        if($request->app_designation!=null){
              $person_designation= new ApplicantAppliedforLog();
              $person_designation->applicant_log_id=$person->id;
              $person_designation->position_name=$app_designation;
          }
          $person_designation->save();
          $i++;
    }


    //------------------------>documents

     $i=0;
     if($request->cv!=null)
    foreach($request->cv as $cv){
          $person_document= new ApplicantDocumentLog();
          $person_document->applicant_log_id=$person->id;
          if(isset($request->picture[$i]))
          $person_document->applicant_picture=$request->picture[$i];
          $person_document->cv=$cv;
          $person_document->save();
          $i++;
    }

  }
  public function store(Request $request)
    {
        $this->storeLog($request);
        $person=Applicant::where('id',$request->person_id)->first();
        if($person)
        {
          $cniclog=CnicLog::where('applicant_id',$person->id)->first();
          if($cniclog->status==1 && $cniclog->user_id!=Auth::id())
          { //Check Status if some-one working
            return redirect()->back()->withMessage($cnicLog->User->first_name.' is working on it.');
          }
        }
        else
        {
          return redirect()->route('createCnic')->with('error',' Not Found!');
        }

    // Applicant Details
       // $person= new Applicant();
      // if($request->data_type=='applicant_detail'){
      if(isset($request->d_num) && $request->d_num!='' && $request->d_num!=NULL)
       $person->diary_num=$request->d_num;
    //    $person->uniqueNumber="HIS_2018_0001";
    if(isset($request->name) && $request->name!='' && $request->name!=NULL)
       $person->name= $request->name;
       // $person->cnic= $request->person_cnic;
       if(isset($request->gender) && $request->gender!='' && $request->gender!=NULL)
        $person->gender= $request->gender;
       if(isset($request->dob) && $request->dob!='' && $request->dob!=NULL)
        $person->dob= $request->dob;
       if(isset($request->religion) && $request->religion!='' && $request->religion!=NULL)
        $person->religion=$request->religion;
       if(isset($request->emailaddress) && $request->emailaddress!='' && $request->emailaddress!=NULL)
        $person->email= $request->emailaddress;
        $person->created_by=Auth::id();
        $person->save();
       $person_detail= new ApplicantDetail();
       $person_detail->applicant_id=$person->id;
       $person_detail->father_name=$request->f_name;
       $person_detail->province_id=$request->dom_province;
       $person_detail->district_id=$request->dom_district;
       $person_detail->city=$request->city;
       $person_detail->postal_add=$request->address;
       $person_detail->phone_num=$request->full_phone;
       $person_detail->cell_num=$request->full_mobilenumber1;
       $person_detail->cellnum_2=$request->full_mobilenumber2;
       $person_detail->save();
      // }

      // dd($person);
       //---------->School Education//

       // else if($request->data_type=='education'){
       if($request->schooling_level=="Matric")
        {
          $person_secondaryEdu = new ApplicantSecondaryEducation();
          $person_secondaryEdu->applicant_id=$person->id;
          $person_secondaryEdu->name_of_school=$request->s_Name;
          $person_secondaryEdu->qualification_type=$request->qualification;

          if(isset($request->b_Name) && $request->b_Name!=Null && $request->b_Name!='other')
            $person_secondaryEdu->board=$request->b_Name;
          else if(isset($request->sch_otherboard) && $request->sch_otherboard!=Null)
            $person_secondaryEdu->board=$request->sch_otherboard;

          if(isset($request->s_subjects) && $request->s_subjects!=Null &&  $request->s_subjects!='other')
            $person_secondaryEdu->secondarysubject_id=$request->s_subjects;
          else if(isset($request->subjectsschool_other) && $request->subjectsschool_other!=Null)
            {
            $secondary_subject= new SecondarySubject();
            $secondary_subject->subject_name = $request->subjectsschool_other;
            $secondary_subject->type='Matric';
            $secondary_subject->save();
            $person_secondaryEdu->secondarysubject_id=$secondary_subject->id;
            }

          $person_secondaryEdu->total_marks=$request->t_marks;
          $person_secondaryEdu->achieved_marks=$request->a_marks;
          $person_secondaryEdu->percentage=$request->sch_percentage;

          $person_secondaryEdu->division=$request->divi;

          $person_secondaryEdu->distinction=$request->dist;
          $person_secondaryEdu->save();
        }

       elseif($request->schooling_level=="O-Level")
        {
          $person_secondaryEdu = new ApplicantSecondaryEducation();

          $person_secondaryEdu->applicant_id=$person->id;

          $person_secondaryEdu->name_of_school=$request->s_Name;
          $person_secondaryEdu->qualification_type=$request->qualification;

          if(isset($request->b_Name) && $request->b_Name!=Null && $request->b_Name!='other')
          $person_secondaryEdu->board=$request->b_Name;
          else if(isset($request->sch_otherboard) && $request->sch_otherboard!=Null)
          $person_secondaryEdu->board=$request->sch_otherboard;

          if(isset($request->s_subjects) && $request->s_subjects!=Null  && $request->s_subjects!='other')
          $person_secondaryEdu->secondarysubject_id=$request->s_subjects;
          else if(isset($request->subjectsschool_other) && $request->subjectsschool_other!=Null)
          {

            $secondary_subject= new SecondarySubject();
            $secondary_subject->subject_name = $request->subjectsschool_other;
            $secondary_subject->type= 'O-Level';
            $secondary_subject->save();
            $person_secondaryEdu->secondarysubject_id=$secondary_subject->id;
          }
          $person_secondaryEdu->distinction=$request->dist;
          $person_secondaryEdu->total_marks=$request->t_marks;
          $person_secondaryEdu->achieved_marks=$request->a_marks;
          $person_secondaryEdu->percentage=$request->sch_percentage;


          $person_secondaryEdu->division=$request->divi;
          $person_secondaryEdu->grades=$request->grades_olevel;
          $person_secondaryEdu->save();
         }


      //----->College Education//

       if($request->college_level=="Intermediate")
        {
          $person_secondaryEdu_college = new ApplicantSecondaryEducation();
          $person_secondaryEdu_college->applicant_id=$person->id;
          $person_secondaryEdu_college->name_of_school=$request->c_Name;
          $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;

          if(isset($request->c_b_Name) && $request->c_b_Name!=Null && $request->c_b_Name!='other')
           $person_secondaryEdu_college->board=$request->c_b_Name;
          else if(isset($request->college_otherboard) && $request->college_otherboard!=Null)
           $person_secondaryEdu_college->board=$request->college_otherboard;

          if(isset($request->c_subjects) && $request->c_subjects!=Null  && $request->c_subjects!='other')
           $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
          else if(isset($request->c_othersubjects)  && $request->c_othersubjects!=Null)
          {
            $secondary_subject= new SecondarySubject();
            $secondary_subject->subject_name = $request->c_othersubjects;
            $secondary_subject->type= $request->college_level;
            $secondary_subject->save();
            $person_secondaryEdu_college->secondarysubject_id=$secondary_subject->id;

          }
          $person_secondaryEdu_college->total_marks=$request->c_t_marks;
          $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
          $person_secondaryEdu_college->percentage=$request->c_percentage;


          $person_secondaryEdu_college->division=$request->c_div;
          $person_secondaryEdu_college->distinction=$request->c_dist;
          $person_secondaryEdu_college->save();

        }
       elseif($request->college_level=="A-Level")
        {
          $person_secondaryEdu_college = new ApplicantSecondaryEducation();

        $person_secondaryEdu_college->applicant_id=$person->id;
        $person_secondaryEdu_college->name_of_school=$request->c_Name;
        $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;

        if(isset($request->c_b_Name) && $request->c_b_Name!=Null && $request->c_b_Name!='other')
        $person_secondaryEdu_college->board=$request->c_b_Name;
        else if(isset($request->college_otherboard) && $request->college_otherboard!=Null)
        $person_secondaryEdu_college->board=$request->college_otherboard;

        if(isset($request->c_subjects) && $request->c_subjects!=Null && $request->c_subjects!='other')
        $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
        else if(isset($request->c_othersubjects)  && $request->c_othersubjects!=Null)
          {
            $secondary_subject= new SecondarySubject();
            $secondary_subject->subject_name = $request->c_othersubjects;
            $secondary_subject->type= $request->college_level;
            $secondary_subject->save();
            $person_secondaryEdu_college->secondarysubject_id=$secondary_subject->id;

          }
        $person_secondaryEdu_college->total_marks=$request->c_t_marks;
        $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
        $person_secondaryEdu_college->percentage=$request->c_percentage;
        $person_secondaryEdu_college->grades=$request->c_grades;
        $person_secondaryEdu_college->division=$request->c_div;
        $person_secondaryEdu_college->distinction=$request->c_dist;
        $person_secondaryEdu_college->save();
      }

       //---------->Bachelors Education 2year and 4 year
       $i=0;$year4=0;$year2=0;
     if($request->bch_year!=null)
     {
      foreach($request->bch_year as $by)
       {
         if($by=="2 years")
          {

            $person_higherEdu_2yr = new ApplicantHigherEducation();
            $person_higherEdu_2yr->applicant_id=$person->id;

            if(isset($request->college_university_names[$year2]) && $request->college_university_names[$year2] !=Null && $request->college_university_names[$year2]!='other')
              $person_higherEdu_2yr->university_id=$request->college_university_names[$year2];
            else if(isset($request->other_collegebox[$year2]) && ($request->other_collegebox[$year2]!=Null))
             {
               // dd($reuest)
              $new_univ= new University();
              $new_univ->name =$request->other_collegebox[$year2];
              $new_univ->status= 'true';
              $new_univ->save();
              $person_higherEdu_2yr->university_id=$new_univ->id;

             }

            if(isset($request->qualification_univ[$year2]))
            $person_higherEdu_2yr->qualification_type=$request->qualification_univ[$i];

            $person_higherEdu_2yr->bach_year=$by;

            if(isset($request->u_collegesubjects[$year2]) && $request->u_collegesubjects[$year2]!=Null  && $request->u_collegesubjects[$year2]!='other' )
             $person_higherEdu_2yr->highersubject_id=$request->u_collegesubjects[$year2];
            else if(isset($request->other_univ_colsubjects[$year2]) && ($request->other_univ_colsubjects[$year2]!=Null))
             {
              $new_highersubject= new HigherSubject();
              $new_highersubject->subject_name =$request->other_univ_colsubjects[$year2];
              $new_highersubject->type= 'bachelor';
              $new_highersubject->save();
              $person_higherEdu_2yr->highersubject_id=$new_highersubject->id;
             }

            if(isset($request->twoyear_t_marks[$year2]))
            $person_higherEdu_2yr->total_marks=$request->twoyear_t_marks[$year2];

            if(isset($request->twoy_a_marks[$year2]))
            $person_higherEdu_2yr->achieved_marks=$request->twoyear_a_marks[$year2];

            if(isset($request->percentage[$year2]))
            $person_higherEdu_2yr->percentage=$request->percentage[$year2];

            if(isset($request->division[$i]))
            $person_higherEdu_2yr->division=$request->division[$i];

            if(isset($request->distinction[$i]))
            $person_higherEdu_2yr->distinction=$request->distinction[$i];

            $person_higherEdu_2yr->save();
            $year2++;

          }
        else if($by=="4 years")
         {

          $person_higherEdu_univ = new ApplicantHigherEducation();
          $person_higherEdu_univ->applicant_id=$person->id;
          if(isset($request->university_names[$year4]) && $request->university_names[$year4]!=Null && $request->university_names[$year4]!='other')
          {
            $person_higherEdu_univ->university_id=$request->university_names[$year4];
          }
          else if(isset($request->other_univbox[$year4]) && $request->other_univbox[$year4]!=Null)
          {
            $new_univ= new University();
            $new_univ->name = $request->other_univbox[$year4];
            $new_univ->status= 'true';
            $new_univ->save();
            $person_higherEdu_univ->university_id=$new_univ->id;

          }
          // dd($request->all());
          if(isset($request->qualification_univ[$year4]))
          $person_higherEdu_univ->qualification_type=$request->qualification_univ[$i];

          $person_higherEdu_univ->bach_year=$by;


          if(isset($request->u_subjects[$year4]) && $request->u_subjects[$year4]!=Null && $request->u_subjects[$year4]!='other' )
          $person_higherEdu_univ->highersubject_id=$request->u_subjects[$year4];
          else if(isset($request->other_univsubjects[$year4]) && ($request->other_univsubjects[$year4]!=Null))
          {
            $new_highersubject= new HigherSubject();
            $new_highersubject->subject_name =$request->other_univsubjects[$year4];
            $new_highersubject->type= 'bachelor';
            $new_highersubject->save();
            $person_higherEdu_univ->highersubject_id=$new_highersubject->id;
          }

          if(isset($request->cgpa[$year4]))
          $person_higherEdu_univ->cgpa=$request->cgpa[$year4];

          if(isset($request->foury_t_marks[$year4]))
          $person_higherEdu_univ->total_marks=$request->foury_t_marks[$year4];

          if(isset($request->foury_a_marks[$year4]))
          $person_higherEdu_univ->achieved_marks=$request->foury_a_marks[$year4];

          if(isset($request->univ_per[$year4]))
          $person_higherEdu_univ->percentage=$request->univ_per[$year4];

          if(isset($request->dmc_date[$year4]))
          $person_higherEdu_univ->final_dmc_date=$request->dmc_date[$year4];

          if(isset($request->division[$i]))
          $person_higherEdu_univ->division=$request->division[$i];

          if(isset($request->distinction[$i]))
          $person_higherEdu_univ->distinction=$request->distinction[$i];

          $person_higherEdu_univ->save();
          $year4++;
          // dd('saved'.$person_higherEdu_univ);
        }
        $i++;
        }

     }
     //------------>postgraduation

       $i=0;
      //  dump($request->all());
      if($request->qualification_postuniv[$i]!=null)
       {
        foreach($request->qualification_postuniv as $qualification_postuniv)
        {
          $person_higherEdu_grad = new ApplicantHigherEducation();
          $person_higherEdu_grad->applicant_id=$person->id;

          if(isset($request->pg_Name[$i]) && $request->pg_Name[$i]!=Null && $request->pg_Name[$i]!='other')
          $person_higherEdu_grad->university_id=$request->pg_Name[$i];
          else if(isset($request->otherpost_univ[$i]) && $request->otherpost_univ[$i]!=Null)
          {
            $new_univ= new University();
            $new_univ->name =$request->otherpost_univ[$i];
            $new_univ->status='true';
            $new_univ->save();
            $person_higherEdu_grad->university_id=$new_univ->id;

          }

          if(isset($request->qualification_postuniv[$i]))
          $person_higherEdu_grad->qualification_type=$qualification_postuniv;

          if(isset($request->post_grad_subject[$i]) && $request->post_grad_subject[$i]!=null && $request->post_grad_subject[$i]!="other")
          $person_higherEdu_grad->highersubject_id=$request->post_grad_subject[$i];
          else if(isset($request->other_postgradsubjects[$i]) && ($request->other_postgradsubjects[$i]!=Null))
          {
            $new_highersubject= new HigherSubject();
            $new_highersubject->subject_name =$request->other_postgradsubjects[$i];
            $new_highersubject->type= 'masters';
            $new_highersubject->save();
            $person_higherEdu_grad->highersubject_id=$new_highersubject->id;
          }
          if(isset($request->postgrad_marks[$i]))
            $person_higherEdu_grad->total_marks=$request->postgrad_marks[$i];

          if(isset($request->postgrad_achievedmarks[$i]))
          $person_higherEdu_grad->achieved_marks=$request->postgrad_achievedmarks[$i];

          if(isset($request->pg_cgpa[$i]))
          $person_higherEdu_grad->cgpa=$request->pg_cgpa[$i];

         if(isset($request->pg_prcentage[$i]))
          $person_higherEdu_grad->percentage=$request->pg_percentage[$i];

          if(isset($request->postgrad_division[$i]))
          $person_higherEdu_grad->division=$request->postgrad_division[$i];

          if(isset($request->pg_dmc_date[$i]))
            $person_higherEdu_grad->final_dmc_date=$request->pg_dmc_date[$i];

          if(isset($request->pg_distinction[$i]))
            $person_higherEdu_grad->distinction=$request->pg_distinction[$i];
            // dd($person_higherEdu_grad);
           $person_higherEdu_grad->save();
          $i++;
       }
      }
       //--------------->phd education

       $i=0;
       if($request->phd_Name!=null)
      foreach($request->phd_Name as $phd_name)
       {
        $person_higherEdu_phd = new ApplicantHigherEducation();
        $person_higherEdu_phd->applicant_id=$person->id;

        if(isset($request->qualification_phduniv[$i]))
        $person_higherEdu_phd->qualification_type=$request->qualification_phduniv[$i];

        if(isset($request->$request->phd_Name[$i]) && $request->$request->phd_Name[$i]!=Null && $request->$request->phd_Name[$i]!="other")
          $person_higherEdu_phd->unversity_id=$request->phd_name;
          elseif(isset($request->otherphd_univ[$i]) && $request->otherphd_univ[$i]!=Null)
          {
            $new_univ= new University();
            $new_univ->name =$request->otherphd_univ[$i];
            $new_univ->status='true';
            $new_univ->save();
            $person_higherEdu_phd->university_id=$new_univ->id;

          }

        if(isset($request->phd_SubjectName[$i]) &&$request->phd_SubjectName[$i]!=Null &&$request->phd_SubjectName[$i]!="other")
        $person_higherEdu_phd->highersubject_id=$request->phd_SubjectName[$i];
        else if(isset($request->phd_other_SubjectName[$i]) && $request->phd_other_SubjectName!=Null)
        {
          $higher_subject= new HigherSubject();
          $higher_subject->subject_name = $request->phd_other_SubjectName[$i];
          $higher_subject->type= 'PHD';
          $higher_subject->save();
          $person_higherEdu_phd->highersubject_id=$higher_subject->id;
        }

        if(isset($request->phd_thesis[$i]))
        $person_higherEdu_phd->thesis_topic=$request->phd_thesis[$i];

        if(isset($request->phd_date[$i]))
        $person_higherEdu_phd->final_dmc_date=$request->phd_date[$i];

        $person_higherEdu_phd->save();

        $i++;
      }

       //---------------->postdoc education
        $i=0;
       if($request->pd_Name!=null)
     foreach($request->pd_Name as $pd_name)
       {
        $person_higherEdu_postdoc = new ApplicantHigherEducation();
        $person_higherEdu_postdoc->applicant_id=$person->id;

        if(isset($request->$request->pd_Name[$i]) && $request->$request->pd_Name[$i]!=Null && $request->$request->pd_Name[$i]!="other")
        $person_higherEdu_postdoc->university_id=$pd_name;
        elseif(isset($request->otherpostdoc_univ[$i]) && $request->otherpostdoc_univ[$i]!=Null)
        {
          $new_univ= new University();
          $new_univ->name =$request->otherpostdoc_univ[$i];
          $new_univ->status='true';
          $new_univ->save();
          $person_higherEdu_postdoc->university_id=$new_univ->id;

        }
        if(isset($request->qualification_postdocuniv[$i]))
        $person_higherEdu_postdoc->qualification_type=$request->qualification_postdocuniv[$i];

        if(isset($request->pd_thesis[$i]))
        $person_higherEdu_postdoc->thesis_topic=$request->pd_thesis[$i];

        if(isset($request->pd_date[$i]))
        $person_higherEdu_postdoc->date_of_grad=$request->pd_date[$i];

        $person_higherEdu_postdoc->save();
        $i++;
    }

       //------------------>certification

       $i=0;
       if($request->app_cer!=null)
      foreach($request->app_cer as $app_cer)
        {
        $person_certificate= new ApplicantCertification();
        $person_certificate->applicant_id=$person->id;

        $person_certificate->name_certifictaion=$app_cer;

        if(isset($request->cer_num[$i]))
        $person_certificate->certification_number=$request->cer_num[$i];
        if(isset($request->certificate_i[$i]))
        $person_certificate->issued_by=$request->certificate_i[$i];
        if(isset($request->i_date[$i]))
        $person_certificate->date_of_issuance=$request->i_date[$i];
        $person_certificate->save();
        $i++;
      }

    //-------------------->trainings

       $i=0;
       if($request->app_tr!=null)
     foreach($request->app_tr as $app_tr)
       {
       $person_training= new ApplicantTraining();
       $person_training->applicant_id=$person->id;
       $person_training->training_name=$app_tr;
       if(isset($request->tr_by[$i]))
       $person_training->by_name=$request->tr_by[$i];
       if(isset($request->tr_duration[$i]))
       $person_training->duration=$request->tr_duration[$i];
       $person_training->save();
       $i++;
     }

     //--------------------->researchwork
    //  dd($request->all());
       $i=0;$jrCounter=0;$ConCounter=0;
       if($request->researchType!=null)
     foreach($request->researchType as $rp)
      {
        $person_researchwork= new ApplicantResearchWork();
        $person_researchwork->applicant_id=$person->id;

          if($request->researchType[$i]=="Journal")
          { $person_researchwork->researchtype=$rp;
              if(isset($request->app_jr[$jrCounter]))
            $person_researchwork->name=$request->app_jr[$jrCounter];
            if(isset($request->journal_yr[$jrCounter]))
            $person_researchwork->published_year=$request->journal_yr[$jrCounter];
            if(isset($request->journal_dt[$jrCounter]))
            $person_researchwork->date_published=$request->journal_dt[$jrCounter];
            $jrCounter++;
          }
          else if($request->researchType[$i]=="Conference")
          {
            $person_researchwork->researchtype=$rp;
            if(isset($request->app_conf[$ConCounter]))
            $person_researchwork->conference=$request->app_conf[$ConCounter];
            if(isset($request->conf_yr[$ConCounter]))
            $person_researchwork->published_year=$request->conf_yr[$ConCounter];
            if(isset($request->rp_dt[$ConCounter]))
            $person_researchwork->date_published=$request->rp_dt[$ConCounter];
            if(isset($request->app_rp[$ConCounter]))
            $person_researchwork->name=$request->app_rp[$ConCounter];
            $ConCounter++;
          }
          $person_researchwork->save();
          $i++;
    }

    //---------------------->professional trainings

       $i=0;
       if($request->app_pmname!=null)
       foreach($request->app_pmname as $app_pmname)
        {
          $person_pm= new ProfessionalCertificationMember();
          $person_pm->applicant_id=$person->id;

          if(isset($request->app_pmname))
          $person_pm->name=$app_pmname;

          if(isset($request->m_level[$i]))
          $person_pm->membership_level=$request->m_level[$i];

          if(isset($request->issued_name[$i]))
          $person_pm->issued_by=$request->issued_name[$i];

          if(isset($request->pm_doi[$i]))
          $person_pm->issuance_date=$request->pm_doi[$i];

          if(isset($request->pm_reg[$i]))
          $person_pm->registeration=$request->pm_reg[$i];
          $person_pm->save();

          $i++;
      }

     //---------------------->experience
      // }
    // else if($request->data_type=='experience'){
        $i=0;
        if($request->org_Name!=null)
       foreach($request->org_Name as $org)
         {
            $person_exp= new ApplicantExperience();
            $person_exp->applicant_id=$person->id;

            if(isset($request->org_Name[$i]))
            $person_exp->org_name=$org;

            if(isset($request->org_type[$i]))
            $person_exp->org_type=$request->org_type[$i];

            if(isset($request->start_date[$i]))
            $person_exp->start_date=$request->start_date[$i];

            if(isset($request->end_date[$i]))
            $person_exp->end_date=$request->end_date[$i];

            if(isset($request->role_name[$i]))
            $person_exp->role=$request->role_name[$i];

            $person_exp->save();
            $i++;
        }
      // }


      //---------------------->position applied for
      // else if($request->data_type=='designation'){
        $i=0;
         if($request->app_designation!=null)
       foreach($request->app_designation as $app_designation)
        {
          if($request->app_designation!=null){
                $person_designation= new ApplicantAppliedFor();
                $person_designation->applicant_id=$person->id;
                $person_designation->position_name=$app_designation;
            }
            $person_designation->save();
            $i++;
      }


      //------------------------>documents

       $i=0;
       if($request->cv!=null)
      foreach($request->cv as $cv){
            $person_document= new ApplicantDocument();
            $person_document->applicant_id=$person->id;
            if(isset($request->picture[$i]))
            $person_document->applicant_picture=$request->picture[$i];
            $person_document->cv=$cv;
            $person_document->save();
            $i++;
      }

      // }


       // Stored so Change Pending status to 0
        $cnicLog=CnicLog::where('applicant_id',$request->person_id)
        ->where('user_id',Auth::id())->first();
        $cnicLog->status=0;
        $cnicLog->save();


      //  return redirect()->back()->with('success','New Recuritment Has Been Added!!');
    return redirect()->route('createCnic')->with('success','New Recuritment Has Been Added!!');
}

    public function showsummary(JobForm $jobForm)
    {

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $applicant= Applicant::find($id);

    //  dd( $applicant_secondaryEdu);
      //calculating age

      $dateofbirth=date('Y-m-d',strtotime($applicant->dob));
      $today_date = date('Y-m-d');
      $age=date_diff(date_create($dateofbirth), date_create($today_date));
      $age=$age->format('%y');

      //experience duration

      return view('recuritment.show',['applicant'=>$applicant,'age'=>$age]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function edit(Applicant $applicant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
