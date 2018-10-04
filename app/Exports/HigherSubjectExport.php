<?php

namespace App\Exports;

use App\HigherSubject;
use App\ApplicantHigherEducation;
use Maatwebsite\Excel\Concerns\FromCollection;

class HigherSubjectExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
      $ApplicantHigherSubject=ApplicantHigherEducation::all();
      $collection=collect();
      foreach ($ApplicantHigherSubject as $applicant_higher) {
        // dd($applicant_higher->HigherSubject);
        if(isset($applicant_higher->HigherSubject->subject_name) && $applicant_higher->HigherSubject->subject_name){
        $ah=HigherSubject::where('subject_name',$applicant_higher->HigherSubject->subject_name)->get();
        if($ah->count()>1)
          {
            foreach ($ah as $a) {
              // code...
              $collection->push($a);
            }
          }
        }
        // ->where('type',$higher_sub->type)
        // ->
      }
      return $collection;
        // return Applicant::select('applicants.name','applicants.diary_num','applicants.cnic','applicant_details.father_name','applicants.email','applicant_details.cell_num','applicant_details.cellnum_2')
        //   ->leftJoin('applicant_details','applicants.id','applicant_details.applicant_id')
        //   ->rightJoin('applicant_higher_education','applicant_higher_education.applicant_id','applicants.id')
        //   ->whereNull('applicant_higher_education.final_dmc_date')
        //   ->get();
    }
}
