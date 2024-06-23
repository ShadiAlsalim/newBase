<?php
namespace App\Services\employee;

use App\Models\employee;
use App\Models\Employee_jobOpp;
use App\Models\job_opp;
use Illuminate\Support\Facades\Auth;

class JobApplayService
{
    public function JobApplay ($id){
        $user = Auth::user();
        $employee = employee::where('user_id',$user->id)->first(); 
        $job_opp=job_opp::where('id',$id)->first();
        $Employee_jobOpp = Employee_jobOpp::create([ 
            'employee_id'=>$employee->id,
            'job_opportunity_id' => $job_opp->id,
          ]);
        return [ 'massage'=>'rate updated', 'data'=>$Employee_jobOpp];
    }
}