<?php
namespace App\Services\company;

use App\Models\JobIndustry;
use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class ShowCompanyService
{
    public function show($request, $id)
    {
        $company = company::find($id);
        if ($company) {
            return [
                'message' => 'found',
                'data' => $company
            ];
        } else {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
    }

    public function show_all($request)
    {
        $company = company::get();
        if ($company) {
            foreach ($company as $one) {
                $industry = JobIndustry::find($one['job_industry_id']);
                $one['job_industry_id'] = $industry['name'];
            }
            return [
                'message' => 'found',
                'data' => $company
            ];
        } else {
            return [
                'message' => 'not found',
                'data' => []
            ];
        }
    }
}