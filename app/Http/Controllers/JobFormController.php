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
use Illuminate\Http\Request;

class JobFormController extends Controller
{
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
    public function create()
    {
    $cities=City::all();
    $districts=District::all();
    $provinces=Province::all();
    $sec_edu=SecondarySubject::all();
    $high_edu=HigherSubject::all();
    $certifications=Certification::all();
    $appliedposition=ApplicantAppliedFor::all();
       return view('recuritment.create',['cities'=>$cities,'districts'=> $districts,'provinces'=>$provinces,
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
        
        dd($request->all());
       $person= new Applicant();
       $person->diary_num= '1';
       $person->name= $request->name;
       $person->cnic= $request->cnic;
       $person->gender= $request->gender;
       $person->dob= $request->dob;
       $person->email= $request->emailaddress;
       $person->save();

       $person_detail= new ApplicantDetail();
       $person_detail->applicant_id=$person->id;
       $person_detail->father_name=$request->f_name;
       $person_detail->province_id=$request->dom_province;
       $person_detail->district_id=$request->dom_district;
       $person_detail->city_id=$request->dom_city;
       $person_detail->postal_add=$request->address;
       $person_detail->phone_num=$request->phone_num;
       $person_detail->cell_num=$request->cell_num;
       $person_detail->applicant_appliedfor_id=$request->afor;
       $person_detail->save();

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
       $person_secondaryEdu->division=$request->divi;
       $person_secondaryEdu->distinction=$request->dist;
       }
       elseif($request->schooling_level=="O-Level"){
        $person_secondaryEdu->applicant_id=$person->id;
        $person_secondaryEdu->name_of_school=$request->s_Name;
        $person_secondaryEdu->qualification_type=$request->school;
        $person_secondaryEdu->board=$request->b_Name;
        $person_secondaryEdu->secondarysubject_id=$request->s_subjects;
        $person_secondaryEdu->olevel_grades=$request->grades_olevel;
        $person_secondaryEdu->division=$request->divi;
        $person_secondaryEdu->distinction=$request->dist;
       }
        $person_secondaryEdu->save();

        $person_secondaryEdu_college = new ApplicantSecondaryEducation();
    if($request->college_level=="Intermediate")
      {
       $person_secondaryEdu_college->applicant_id=$person->id;
       $person_secondaryEdu_college->name_of_school=$request->c_Name;
       $person_secondaryEdu_college->qualification_type=$request->college;
       $person_secondaryEdu_college->board=$request->c_b_Name;
       $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
       $person_secondaryEdu_college->total_marks=$request->c_t_marks;
       $person_secondaryEdu_college->achieved_marks=$request->c_a_marks;
       $person_secondaryEdu_college->division=$request->c_div;
       $person_secondaryEdu_college->distinction=$request->c_dist;
      }
      elseif($request->college_level=="A-Level")
      {

        $person_secondaryEdu_college->applicant_id=$person->id;
        $person_secondaryEdu_college->name_of_school=$request->c_Name;
        $person_secondaryEdu_college->qualification_type=$request->college;
        $person_secondaryEdu_college->board=$request->c_b_Name;
        $person_secondaryEdu_college->secondarysubject_id=$request->c_subjects;
        $person_secondaryEdu_college->alevel_grades=$request->c_grades;
        $person_secondaryEdu_college->division=$request->c_div;
        $person_secondaryEdu_college->distinction=$request->c_dist;
      }
       $person_secondaryEdu_college->save();

       if($request->bch_year=="2 years")
       {
       $person_higherEdu_2yr = new ApplicantHigherEducation();
       $person_higherEdu_2yr->applicant_id=$person->id;
       $person_higherEdu_2yr->name_of_institute=$request->u_Name;
       $person_higherEdu_2yr->qualification_type=$request->qualification_univ;
       $person_higherEdu_2yr->bach_year=$request->bch_year;
       $person_higherEdu_2yr->highersubject_id=$request->u_subjects;
       $person_higherEdu_2yr->total_marks=$request->twoy_totalmarks;
       $person_higherEdu_2yr->achieved_marks=$request->twoy_achievedmarks;
       $person_higherEdu_2yr->division=$request->twoy_div;
       $person_higherEdu_2yr->distinction=$request->u_position;
       $person_higherEdu_2yr->save();

       }
       elseif ($request->bch_year=="4 years") {
        $person_higherEdu_univ = new ApplicantHigherEducation();
        $person_higherEdu_univ->applicant_id=$person->id;
        $person_higherEdu_univ->name_of_institute=$request->u_Name;
        $person_higherEdu_univ->qualification_type=$request->qualification_univ;
        $person_higherEdu_univ->bach_year=$request->bch_year;
        $person_higherEdu_univ->highersubject_id=$request->u_subjects;
        $person_higherEdu_univ->cgpa=$request->cgpa;
        $person_higherEdu_univ->date_of_grad=$request->grad_date;
        $person_higherEdu_univ->final_dmc_date=$request->dmc_date;
        $person_higherEdu_univ->distinction=$request->u_position;
        $person_higherEdu_univ->save();
       }

       $person_higherEdu_grad = new ApplicantHigherEducation();
       $person_higherEdu_grad->applicant_id=$person->id;
       $person_higherEdu_grad->name_of_institute=$request->pg_Name;
       $person_higherEdu_grad->qualification_type=$request->qualification_postuniv;
       $person_higherEdu_grad->highersubject_id=$request->post_grad_degree;
       $person_higherEdu_grad->cgpa=$request->pg_cgpa;
       $person_higherEdu_grad->date_of_grad=$request->pg_date;
       $person_higherEdu_grad->final_dmc_date=$request->pg_dmc_date;
       $person_higherEdu_grad->distinction=$request->pg_dist;
       $person_higherEdu_grad->save();

       $person_higherEdu_postgrad = new ApplicantHigherEducation();
       $person_higherEdu_postgrad->applicant_id=$person->id;
       $person_higherEdu_postgrad->name_of_institute=$request->postgrad_Name;
       $person_higherEdu_postgrad->qualification_type=$request->qualification_postgraduniv;
       $person_higherEdu_postgrad->highersubject_id=$request->postgrad_degree;
       $person_higherEdu_postgrad->cgpa=$request->postgrad_cgpa;
       $person_higherEdu_postgrad->date_of_grad=$request->postgrad_date;
       $person_higherEdu_postgrad->final_dmc_date=$request->postgrad_dmc_date;
       $person_higherEdu_postgrad->save();

       $person_higherEdu_postdoc = new ApplicantHigherEducation();
       $person_higherEdu_postdoc->applicant_id=$person->id;
       $person_higherEdu_postdoc->name_of_institute=$request->postdoc_Name;
       $person_higherEdu_postdoc->qualification_type=$request->qualification_postdocuniv;
       $person_higherEdu_postdoc->highersubject_id=$request->postdoc_degree;
       $person_higherEdu_postdoc->cgpa=$request->postdoc_cgpa;
       $person_higherEdu_postdoc->date_of_grad=$request->postdoc_date;
       $person_higherEdu_postdoc->final_dmc_date=$request->postdoc_dmc_date;
       $person_higherEdu_postdoc->save();

       $person_certificate= new ApplicantCertification();
       $person_certificate->applicant_id=$person->id;
       $person_certificate->certification_id=$request->app_cer;
       $person_certificate->issued_by=$request->certificate_i;
       $person_certificate->date_of_issuance=$request->i_date;
       $person_certificate->save();


       $person_exp= new ApplicantExperience();
       $person_exp->applicant_id=$person->id;
       $person_exp->org_name=$request->org_Name;
       $person_exp->org_type=$request->org_type;
       $person_exp->start_date=$request->start_dob;
       $person_exp->end_date=$request->end_dob;
       $person_exp->role=$request->role_name;
       $person_exp->save();
       return redirect()->back()->with('success','New Recuritment Has Been Added!!');
    // return redirect()->route('job_form.index')->with('success','New Recuritment Has Been Added!!');
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
