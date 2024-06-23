<?php

namespace App\Http\Controllers;
use App\Models\city;
use App\Models\User;
use App\Models\company;
use App\Models\employee;
use App\Models\Interests;
use App\Models\JobTitle;
use App\Models\EducationLevel;
use App\Models\Language;
use App\Models\JobIndustry;
use App\Models\JobTimeType;
use App\Models\LanguageLevel;
use Illuminate\Http\Request;

class dataControllers extends Controller
{
    public function city (){
        $city = city::pluck('name'); 
        return $city ;
    }

    public function jobTitle (){
        $jobTitle = JobTitle::pluck('name'); 
        return $jobTitle ;
    }

    public function language (){
        $language = Language::pluck('name'); 
        return $language ;
    }

    public function languageLevel (){
        $LanguageLevel = LanguageLevel::pluck('level'); 
        return $LanguageLevel ;
    }

    public function Interests (){
        $LanguageLevel = Interests::pluck('name'); 
        return $LanguageLevel ;
    }

    public function JobTimeType (){
        $JobTimeType = JobTimeType::pluck('name'); 
        return $JobTimeType ;
    }

    public function EducationLevel (){
        $EducationLevel = EducationLevel::pluck('name'); 
        return $EducationLevel ;
    }

    public function JobIndustry (){
        $JobIndustry = JobIndustry::pluck('name'); 
        return $JobIndustry ;
    }
}
