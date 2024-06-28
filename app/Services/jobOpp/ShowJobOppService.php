<?php
namespace App\Services\jobOpp;

use App\Models\job_opp;
use Laravel\Sanctum\PersonalAccessToken;

class ShowJobOppService
{
    public function show($request, $id)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if (!$user) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $job = job_opp::find($id);
        if ($job) {
            return [
                'message' => 'found',
                'data' => $job
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
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;
        if (!$user) {
            return [
                'message' => 'not authorized',
                'data' => []
            ];
        }
        $jobs = job_opp::get();
        return [
            'message' => 'found',
            'data' => $jobs
        ];
    }
}