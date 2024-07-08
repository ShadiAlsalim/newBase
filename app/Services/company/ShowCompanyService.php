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
        $industry = JobIndustry::find($company['job_idustry_id']);
        $company['job_idustry_id'] = $industry['name'];
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
                $industry = JobIndustry::find($one['job_idustry_id']);
                $one['job_idustry_id'] = $industry['name'];
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
    public function showFromToken($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;

        if (!$user->hasRole('company')) {
            return [
                'message' => 'not a company',
                'data' => []
            ];
        }

        $company = company::where('user_id', $user['id'])->first();
        $industry = JobIndustry::find($company['job_idustry_id']);
        $company['job_idustry_id'] = $industry['name'];
        return [
            'message' => 'found',
            'data' => $company
        ];
    }
}