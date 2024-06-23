<?php
namespace App\Services\employee;

use App\Models\city;
use App\Models\employee;
use Illuminate\Support\Facades\Auth;


class CreateProfileService
{
    public function createProfile ($request){

        $user = Auth::user();
        $data=$request->all();
        $employee = employee::where('user_id',$user->id)->first();
        $employee->update($data);

        //////city 
        if($request['city']){
        $city =city::where('name',$request['city'] )->first();
        $employee->city_id = $city->id;
        $employee->save();
        $employee['city']= $city->name;
        }else{
        $city =city::where('id',$employee->city_id)->first();
        $employee['city']= $city->name;
        }
        
        //////////image 
        if($request['image']) {
        $file =  $request->file('image'); 
        $exten = $file->getClientOriginalExtension();
        $filename = time().'.'.$exten;
        $filepath = 'photos/employee/';
        $file->move($filepath  , $filename);
        $image_url = asset($filepath . $filename); 
        $employee->image = $image_url;
        $employee['image']= $image_url;
        }


        //////////return massage 
        unset($employee->id , $employee->city_id, $employee->skills , $employee->user_id , $employee->updated_at , $employee->created_at ); 
        return [ 'massage'=>'profile created', 'data'=>$employee];
        
  

    }
}