<?php

namespace App\Http\Controllers\employee;

use App\Http\Controllers\Controller;
use App\Http\Requests\employee\createProfileRequest;
use App\Http\Responses\ResponseService;
use App\Services\employee\AddSkillsService;
use Throwable;

class AddSkillsControllers extends Controller
{
    private AddSkillsService $AddSkills;
    public function __construct(AddSkillsService $AddSkills)
    {
      $this->AddSkills = $AddSkills;
    }
  
    public function AddSkills (createProfileRequest $request)
    {
        try {
          $data = $this->AddSkills->AddSkills($request);
          return ResponseService::success($data['massage'] , $data['data']);
        }
      
        catch (Throwable $error) {
          return ResponseService::error( 'An error occurred' , $error->getMessage() );
        }
   }

}
