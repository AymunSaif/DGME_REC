<?php

namespace App\Exports;

use App\Applicant;
use Maatwebsite\Excel\Concerns\FromCollection;

class ApplicantsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Applicant::select('applicants.name','applicants.diary_num','applicants.cnic','applicant_details.father_name','applicants.email','applicant_details.cell_num','applicant_details.cellnum_2')
          ->leftJoin('applicant_details','applicants.id','applicant_details.applicant_id')
          ->rightJoin('applicant_higher_education','applicant_higher_education.applicant_id','applicants.id')
          ->whereNull('applicant_higher_education.final_dmc_date')
          ->get();
    }
}
