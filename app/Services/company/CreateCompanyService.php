<?php
namespace App\Services\company;

use App\Models\User;
use App\Models\company;
use App\Models\employee;
use Laravel\Sanctum\PersonalAccessToken;
use Throwable;

class CreateCompanyService
{
    public function Create($request)
    {
        $token = PersonalAccessToken::findToken($request->bearerToken());
        $user = $token->tokenable;

        $company = Company::where('user_id', $user->id)->first();
        try {

            $company['name'] = $request['name'];
            $company['mobile_number'] = $request['mobile_number'];
            $company['website'] = $request['website'];
            $company['description'] = $request['description'];
            $company['address'] = $request['address'];
            $company['job_idustry_id'] = $request['job_industry_id'];
            $company['approvrd'] = false;
            $company->save();

            return [
                'message' => 'created',
                'data' => $company
            ];
        } catch (Throwable $error) {
            return [
                'message' => $error->getMessage(),
                'data' => []
            ];
        }
    }
}