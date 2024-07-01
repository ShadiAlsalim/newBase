<?php
namespace App\Services\company;

use Storage;
use App\Models\company;
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
            $company['approved'] = false;
            $logo = $request->file('logo');
            $banner = $request->file('banner');
            $logo_path = "";
            $banner_path = "";
            if ($logo) {
                $company['logo'] = $request->file('logo');
                $logo_name = time() . '.' . $logo->getClientOriginalExtension();
                $logo_path = Storage::disk('public')->put($logo_name, $logo); // Save in public disk
                $company['logo'] = $logo_path;
            }
            if ($banner) {
                $company['banner'] = $request->file('banner');
                $banner_name = time() . '.' . $logo->getClientOriginalExtension();
                $banner_path = Storage::disk('public')->put($banner_name, $banner); // Save in public disk
                $company['banner'] = $banner_path;
            }

            $company->save();

            return [
                'message' => 'created',
                'data' => $company
            ];
        } catch (Throwable $error) {
            return [
                'message' => $error->getMessage(),
                'data' => [],
            ];
        }
    }
}