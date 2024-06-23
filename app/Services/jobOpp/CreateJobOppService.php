<?php
namespace App\Services\jobOpp;

use App\Models\job_opp;
use App\Models\company;
use Laravel\Sanctum\PersonalAccessToken;
use App\Models\city;
use App\Models\EducationLevel;
use App\Models\JobIndustry;
use App\Models\JobLevel;
use App\Models\JobTimeType;
use App\Models\JobTitle;
use Throwable;

class CreateJobOppService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if ($user['role'] == 'employee') {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $company = company::where('user_id', $user['id'])->first();

        if (!$company['approved']) {
            return [
                'message' => 'your company is not approved yet.',
                'data' => []
            ];
        }

        $city = city::where('id', $request['city_id'])->first();
        if (!$city) {
            return [
                'message' => 'city not found',
                'data' => []
            ];
        }
        $job_level_id = JobLevel::where('id', $request['job_level_id'])->first();
        if (!$job_level_id) {
            return [
                'message' => 'job level not found',
                'data' => []
            ];
        }
        $job_title_id = JobTitle::where('id', $request['job_title_id'])->first();
        if (!$job_title_id) {
            return [
                'message' => 'job title not found',
                'data' => []
            ];
        }
        $job_industry_id = JobIndustry::where('id', $request['job_idustry_id'])->first();
        if (!$job_industry_id) {
            return [
                'message' => 'job industry not found',
                'data' => []
            ];
        }
        $education_level_id = EducationLevel::where('id', $request['education_level_id'])->first();
        if (!$education_level_id) {
            return [
                'message' => 'education level not found',
                'data' => []
            ];
        }
        $job_type_id = JobTimeType::where('id', $request['job_time_type_id'])->first();
        if (!$job_type_id) {
            return [
                'message' => 'job type not found',
                'data' => []
            ];
        }
        $new_job = job_opp::create([
            'job_description' => $request['job_description'],
            'job_requirements' => $request['job_requirements'],
            'responsibility' => $request['responsibility'],
            'number_of_vacancies' => $request['number_of_vacancies'],
            'years_of_experiences' => $request['years_of_experiences'],
            'address' => $request['address'],
            'gender' => $request['gender'],
            'job_type' => $request['job_type'],
            'portfolio_check' => $request['portfolio_check'],
            'company_id' => $company['id'],
            'city_id' => $city['id'],
            'job_level_id' => $job_level_id['id'],
            'job_title_id' => $job_title_id['id'],
            'job_idustry_id' => $job_industry_id['id'],
            'education_level_id' => $education_level_id['id'],
            'job_type_id' => $job_type_id['id']
        ]);
        return [
            'message' => 'created',
            'data' => $new_job
        ];
        //]);
    }
}