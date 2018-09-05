<?php

namespace App\Http\Controllers;

use App\JobForm;
use App\Applicant;
use App\ApplicantDetail;
use App\ApplicantAppliedFor;
use App\ApplicantCertification;
use App\City;
use App\District;
use Auth;
use App\ApplicantExperience;
use App\ApplicantHigherEducation;
use App\ApplicantSecondaryEducation;
use App\Certification;
use App\HigherSubject;
use App\SecondarySubject;
use App\Province;
use App\User;
use App\CnicLog;
use Illuminate\Http\Request;
use App\ApplicantTraining;
use App\ApplicantResearchWork;
use App\ProfessionalCertificationMember;
class JobFormController extends Controller
{
    public function createCnic(){
      return view('recuritment.storeCnic');
    }
    public function storeCnic(Request $request){
      // dd($request->all());
      $person=Applicant::where('cnic',$request->person_cnic)->first();
      if($person){ //if entry stored in Applicant Table
        $cniclog=CnicLog::where('applicant_id',$person->id)->first();
        if($cniclog->status==1){ //Check Status if some-one working
          return redirect()->back()->with('error',ucfirst($cniclog->User->name).' is working on it.');
        }else{
            $cnicLog= new CnicLog();
            // $cnicLog->cnic=$person->cnic;
            $cnicLog->applicant_id=$person->id;
            $cnicLog->user_id=Auth::id();
            $cnicLog->save();
            return redirect()->route('job_form.create');
        }
      }else{ //If applicant doesn't exist
        $person= new Applicant();
        $person->cnic=$request->person_cnic;
        $person->created_by=Auth::id();
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
      if(Auth::user()->email == "admin@dgme.gov.pk"){
        $person=Applicant::all();
        $person_detail= ApplicantDetail::all();
        $person_secondaryEdu = ApplicantSecondaryEducation::all();
        $person_higherEdu =ApplicantHigherEducation::all();
        $person_certificate=ApplicantCertification::all();
        $person_exp=ApplicantExperience::all();
        return view('recuritment.index');
      }
      else{
        return redirect("/");
      }

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
      } }
      else{
      return redirect()->route('createCnic')->with('error',$id.' Not Found!');}
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
  public function store(Request $request)
    {

        //   dd($request->all());
        $person=Applicant::where('cnic',$request->person_cnic)->first();
        if($person){
          $cniclog=CnicLog::where('applicant_id',$person->id)->first();
          if($cniclog->status==1 && $cniclog->user_id!=Auth::id()){ //Check Status if some-one working
            return redirect()->back()->withMessage($cnicLog->User->first_name.' is working on it.');
          }
        }else{
          return redirect()->route('createCnic')->with('error',$request->person_cnic.' Not Found!');

        }

    // Applicant Details
       // $person= new Applicant();
       $person->diary_num=$request->d_num;
    //    $person->uniqueNumber="HIS_2018_0001";
       $person->name= $request->name;
       // $person->cnic= $request->person_cnic;
       $person->gender= $request->gender;
       $person->dob= $request->dob;
       $person->religion=$request->religion;
       $person->email= $request->emailaddress;
       $person->created_by=Auth::id();
       $person->save();

       $person_detail= new ApplicantDetail();
       $person_detail->applicant_id=$person->id;
       $person_detail->father_name=$request->f_name;
       $person_detail->province_id=$request->dom_province;
       $person_detail->district_id=$request->dom_district;
       $person_detail->city_id=$request->city;
       $person_detail->postal_add=$request->address;
       $person_detail->phone_num=$request->full_phone;
       $person_detail->cell_num=$request->full_mobilenumber1;
       $person_detail->cellnum_2=$request->full_mobilenumber2;
       $person_detail->save();

       //School Education

       $person_secondaryEdu = new ApplicantSecondaryEducation();
       if($request->schooling_level=="Matric")
       {
       $person_secondaryEdu->applicant_id=$person->id;
       $person_secondaryEdu->name_of_school=$request->s_Name;
       $person_secondaryEdu->qualification_type=$request->school;
       $person_secondaryEdu->board=$request->b_Name;
       $person_secondaryEdu->secondarysubject_id=$request->s_subjects;

       $person_secondaryEdu->total_marks=$request->t_marks;
       $person_secondaryEdu->achieved_marks=$request->a_marks;
       $person_secondaryEdu->percentage=$request->sch_percentage;
       $person_secondaryEdu->division=$request->divi;
       $person_secondaryEdu->distinction=$request->dist;
       }
       elseif($request->schooling_level=="O-Level"){
        $person_secondaryEdu->applicant_id=$person->id;
        $person_secondaryEdu->name_of_school=$request->s_Name;
        $person_secondaryEdu->qualification_type=$request->qualification;;
        $person_secondaryEdu->board=$request->b_Name;
        $person_secondaryEdu->secondarysubject_id=$request->s_subjects;
        $person_secondaryEdu->distinction=$request->dist;
        $person_secondaryEdu->total_marks=$request->t_marks;
        $person_secondaryEdu->achieved_marks=$request->a_marks;
        $person_secondaryEdu->percentage=$request->sch_percentage;
        $person_secondaryEdu->division=$request->divi;
        $person_secondaryEdu->grades=$request->grades_olevel;

       }
        $person_secondaryEdu->save();

        //College Education

        $person_secondaryEdu_college = new ApplicantSecondaryEducation();
        if($request->college_level=="Intermediate")
      {
       $person_secondaryEdu_college->applicant_id=$person->id;
       $person_secondaryEdu_college->name_of_school=$request->c_Name;
       $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;
       $person_secondaryEdu_college->board=$request->c_b_Name;
       $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
       $person_secondaryEdu_college->total_marks=$request->c_t_marks;
       $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
       $person_secondaryEdu_college->percentage=$request->c_percentage;
       $person_secondaryEdu_college->division=$request->c_div;
       $person_secondaryEdu_college->distinction=$request->c_dist;
      }
      elseif($request->college_level=="A-Level")
      {

        $person_secondaryEdu_college->applicant_id=$person->id;
        $person_secondaryEdu_college->name_of_school=$request->c_Name;
        $person_secondaryEdu_college->qualification_type=$request->college_qualification_type;
        $person_secondaryEdu_college->board=$request->c_b_Name;
        $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
        $person_secondaryEdu_college->total_marks=$request->c_t_marks;
        $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
        $person_secondaryEdu_college->percentage=$request->c_percentage;
        $person_secondaryEdu_college->grades=$request->c_grades;
        $person_secondaryEdu_college->division=$request->c_div;
        $person_secondaryEdu_college->distinction=$request->c_dist;
      }
       $person_secondaryEdu_college->save();

       //Bachelors Education
       $i=0;
      if($request->bch_year!=null)
     foreach($request->bch_year as $by){
         if($by=="2 years"){
            $person_higherEdu_2yr = new ApplicantHigherEducation();
            $person_higherEdu_2yr->applicant_id=$person->id;

            if(isset($request->college_university_names[$i]))
            $person_higherEdu_2yr->institute_name=$request->college_university_names[$i];
            elseif(isset($request->other_collegebox[$i]))
            $person_higherEdu_2yr->institute_name=$request->other_collegebox[$i];

            if(isset($request->qualification_univ[$i]))
            $person_higherEdu_2yr->qualification_type=$request->qualification_univ[$i];

            $person_higherEdu_2yr->bach_year=$by;

            if(isset($request->u_subjects[$i]))
            $person_higherEdu_2yr->highersubject_id=$request->u_subjects[$i];

            if(isset($request->twoy_t_marks[$i]))
            $person_higherEdu_2yr->total_marks=$request->twoyear_t_marks[$i];

            if(isset($request->twoy_a_marks[$i]))
            $person_higherEdu_2yr->achieved_marks=$request->twoyear_a_marks[$i];

            if(isset($request->percentage[$i]))
            $person_higherEdu_2yr->percentage=$request->percentage[$i];

            if(isset($request->division[$i]))
            $person_higherEdu_2yr->division=$request->division[$i];

            if(isset($request->distinction[$i]))
            $person_higherEdu_2yr->distinction=$request->distinction[$i];

            $person_higherEdu_2yr->save();
        }
         elseif ($by=="4 years"){

                $person_higherEdu_univ = new ApplicantHigherEducation();
                $person_higherEdu_univ->applicant_id=$person->id;

                if(isset($request->university_names[$i]))
                $person_higherEdu_univ->institute_name=$request->university_names[$i];
                elseif(isset($request->other_univbox[$i]))
                $person_higherEdu_univ->institute_name=$request->other_univbox[$i];

                if(isset($request->qualification_univ[$i]))
                $person_higherEdu_univ->qualification_type=$request->qualification_univ[$i];

                $person_higherEdu_univ->bach_year=$by;


                if(isset($request->u_subjects[$i]))
                $person_higherEdu_univ->highersubject_id=$request->u_subjects[$i];

                if(isset($request->cgpa[$i]))
                $person_higherEdu_univ->cgpa=$request->cgpa[$i];

                if(isset($request->foury_t_marks[$i]))
                $person_higherEdu_univ->total_marks=$request->foury_t_marks[$i];

                if(isset($request->cgpa[$i]))
                $person_higherEdu_univ->achieved_marks=$request->foury_a_marks[$i];

                if(isset($request->univ_per[$i]))
                $person_higherEdu_univ->percentage=$request->univ_per[$i];

                if(isset($request->dmc_date[$i]))
                $person_higherEdu_univ->final_dmc_date=$request->dmc_date[$i];

                if(isset($request->distinction[$i]))
                $person_higherEdu_univ->distinction=$request->distinction[$i];

                $person_higherEdu_univ->save();
            }
            $i++;
      }

      //postgraduation

       $i=0;
      if($request->qualification_postuniv!=null)
       foreach($request->qualification_postuniv as $qualification_postuniv){
        $person_higherEdu_grad = new ApplicantHigherEducation();
        $person_higherEdu_grad->applicant_id=$person->id;

        if(isset($request->pg_Name[$i])) 
        $person_higherEdu_grad->institute_name=$pg_Name[$i];
        elseif(isset($request->otherpost_univ[$i]))
        $person_higherEdu_grad->institute_name=$otherpost_univ[$i];

        if(isset($request->qualification_postuniv[$i]))
        $person_higherEdu_grad->qualification_type=$qualification_postuniv;

        if(isset($request->post_grad_degree[$i]))
        $person_higherEdu_grad->highersubject_id=$request->post_grad_degree[$i];

        if(isset($request->pg_cgpa[$i]))
        $person_higherEdu_grad->cgpa=$request->pg_cgpa[$i];

        if(isset($request->pg_dmc_date[$i]))
        $person_higherEdu_grad->final_dmc_date=$request->pg_dmc_date[$i];

        if(isset($request->pg_distinction[$i]))
        $person_higherEdu_grad->distinction=$request->pg_distinction[$i];
        $person_higherEdu_grad->save();
        $i++;
       }

       //phd education

       $i=0;
       if($request->cv!=null)
      foreach($request->phd_Name as $phd_name)
       {
        $person_higherEdu_phd = new ApplicantHigherEducation();
        $person_higherEdu_phd->applicant_id=$person->id;
        if(isset($request->qualification_phduniv[$i]))
        $person_higherEdu_phd->qualification_type=$request->qualification_phduniv[$i];
        $person_higherEdu_phd->institute_name=$request->phd_name;
        if(isset($request->phd_thesis[$i]))
        $person_higherEdu_phd->thesis_topic=$request->phd_thesis[$i];
        if(isset($request->phd_date[$i]))
        $person_higherEdu_phd->date_of_grad=$request->phd_date[$i];
        $person_higherEdu_phd->save();

        $i++;
      }

        //postdoc education
      $i=0;
      if($request->pd_Name!=null)
      foreach($request->pd_Name as $pd_name){
        $person_higherEdu_postgrad = new ApplicantHigherEducation();
        $person_higherEdu_postgrad->applicant_id=$person->id;

        $person_higherEdu_postgrad->institute_name=$pd_name;

        if(isset($request->qualification_postdocuniv[$i]))
        $person_higherEdu_postgrad->qualification_type=$request->qualification_postdocuniv[$i];

        if(isset($request->pd_thesis[$i]))
        $person_higherEdu_postgrad->thesis_topic=$request->pd_thesis[$i];

        if(isset($request->pd_date[$i]))
        $person_higherEdu_postgrad->date_of_grad=$request->pd_date[$i];

        $person_higherEdu_postgrad->save();
        $i++;
    }

       //certification

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

    //trainings

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

     //researchwork

       $i=0;
       if($request->app_rp!=null)
     foreach($request->app_rp as $app_rp){

        $person_researchwork= new ApplicantResearchWork();
        $person_researchwork->applicant_id=$person->id;
        if(isset($request->researchType[$i]))
        $person_researchwork->researchwork=$request->researchType[$i];

            if($request->researchType[$i]=="Journal")
            {
                $person_researchwork->researchwork=$app_rp;
                if(isset($request->journal_yr[$i]))
                $person_researchwork->published_year=$request->journal_yr[$i];
                if(isset($request->journal_dt[$i]))
                $person_researchwork->date_published=$request->journal_dt[$i];
                $person_researchwork->save();
            }
            else if($request->researchType[$i]=="Conference")
            {
                $person_researchwork->researchwork=$app_rp;
                if(isset($request->conf_yr[$i]))
                $person_researchwork->published_year=$request->conf_yr[$i];
                if(isset($request->app_conf[$i]))
                $person_researchwork->conference=$request->app_conf[$i];
                $person_researchwork->save();
            }
                $i++;
        }


     //master education

       $i=0;
       if($request->app_pmname!=null)
     foreach($request->app_pmname as $app_pmname)
      {
       $person_pcm= new ProfessionalCertificationMember();
       $person_pcm->applicant_id=$person->id;

        $person_pcm->name=$app_pmname;

        if(isset($request->m_level[$i]))
        $person_pcm->membership_level=$request->m_level[$i];

        if(isset($request->issued_name[$i]))
        $person_pcm->issued_by=$request->issued_name[$i];

        if(isset($request->pm_doi[$i]))
        $person_pcm->registeration=$request->pm_doi[$i];

        if(isset($request->pm_reg[$i]))
        $person_pcm->issuance_date=$request->pm_reg[$i];
        $person_pcm->save();

        $i++;
    }

    //org

       $i=0;
       if($request->org_Name!=null)
       foreach($request->org_Name as $org)
       {
            $person_exp= new ApplicantExperience();
            $person_exp->applicant_id=$person->id;
            if(isset($request->org_name[$i]))
            $person_exp->org_name=$org;

            if(isset($request->org_type[$i]))
            $person_exp->org_type=$request->org_type[$i];

            if(isset($request->start_dob[$i]))
            $person_exp->start_date=$request->start_date[$i];

            if(isset($request->end_dob[$i]))
            $person_exp->end_date=$request->end_date[$i];

            if(isset($request->role_name[$i]))
            $person_exp->role=$request->role_name[$i];

            $person_exp->save();
            $i++;
        }

        //designation

       $i=0;
       if($request->app_designation!=null)
       foreach($request->app_designation as $app_designation)
     {
            $person_designation= new ApplicantAppliedFor();
            $person_designation->applicant_id=$person->id;
            $person_designation->position_name=$request->app_designation;
            $person_designation->save();
            $i++;
        }

       //documents

       $i=0;
       if($request->cv!=null)
       foreach($request->cv as $cv){
            $person_document= new ApplicantDocument();
            $person_designation->applicant_id=$person->id;
            if(isset($request->picture[$i]))
            $person_designation->applicant_picture=$request->picture[$i];
            $person_designation->cv=$cv;
            $person_designation->save();
            $i++;
       }
       // Stored so Change Pending status to 1
           $cnicLog=CnicLog::where('cnic',$request->person_cnic)
            ->where('user_id',Auth::id())->first();
           $cnicLog->status=1;
           $cnicLog->save();
       return redirect()->back()->with('success','New Recuritment Has Been Added!!');
    // return redirect()->route('job_form.index')->with('success','New Recuritment Has Been Added!!');
}

public function showsummary(JobForm $jobForm)
{
    return view('recuritment.summary');

}
    /**
     * Display the specified resource.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function show(JobForm $jobForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function edit(JobForm $jobForm)
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
    public function update(Request $request, JobForm $jobForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobForm  $jobForm
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobForm $jobForm)
    {
        //
    }
}
