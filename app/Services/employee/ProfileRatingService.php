<?php
namespace App\Services\employee;

use App\Models\EducationalCertificates;
use App\Models\employee;
use App\Models\JobTitle;
use App\Models\LanguageAndLevel;
use App\Models\WorkExperiences;
use Illuminate\Support\Facades\Auth;

class ProfileRatingService
{
    public function ProfileRating (){

        $user = Auth::user();
        $employee = Employee::with('WorkExperiences', 'EducationalCertificates' )
        ->where('user_id', $user->id)
        ->first();
        $Language_Level = LanguageAndLevel::where('employee_id',$employee->id)->first();

        $rate = 20;

        if($Language_Level)
            $rate+=10;

            $rate += $employee->github_link ? 5 : 0;
            $rate += $employee->portfolio_link ? 5 : 0;
            $rate += $employee->linkedin_link ? 5 : 0;
            $rate += $employee->facebook_link ? 5 : 0;
            $rate += $employee->image ? 10 : 0;
            $rate += $employee->WorkExperiences ? 10 : 0; 
            $rate += $employee->educationalCertificate ? 10 : 0; 
            $rate += $employee->skills ? 10 : 0; 
    
          return [ 'massage'=>'rate updated', 'data'=>$rate];
    }
}