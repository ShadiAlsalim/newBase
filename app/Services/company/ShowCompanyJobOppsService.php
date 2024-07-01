<?php
namespace App\Services\company;

use App\Models\company;
use App\Models\job_opp;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class ShowCompanyJobOppsService
{
    public function Show($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        $jobs = job_opp::where('company_id', $id)->get();
        if (!$jobs) {
            $jobs = [];
        }
        return [
            'message' => 'found',
            'data' => $jobs
        ];
    }
}