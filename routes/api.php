<?php

use App\Http\Controllers\admin\ApproveCompanyController;
use App\Http\Controllers\auth\DeleteAccountControllers;
use App\Http\Controllers\auth\ForgetPasswordControllers;
use App\Http\Controllers\auth\loginControllers;
use App\Http\Controllers\auth\LogoutControllers;
use App\Http\Controllers\auth\RegisterControllers;
use App\Http\Controllers\auth\ResendCodeControllers;
use App\Http\Controllers\auth\ResetPasswordControllers;
use App\Http\Controllers\auth\VerificationControllers;
use App\Http\Controllers\company\ShowCompanyController;
use App\Http\Controllers\company\ShowCompanyJobOppsController;
use App\Http\Controllers\dataControllers;
use App\Http\Controllers\employee\AddCertificatesControllers;
use App\Http\Controllers\employee\AddExperienceControllers;
use App\Http\Controllers\employee\AddInterestsControllers;
use App\Http\Controllers\employee\AddLanguagesControllers;
use App\Http\Controllers\employee\AddSkillsController;
use App\Http\Controllers\employee\AddSkillsControllers;
use App\Http\Controllers\employee\CreateCVControllers;
use App\Http\Controllers\employee\JobApplayControllers;
use App\Http\Controllers\employee\ProfileRatingControllers;
use App\Http\Controllers\employee\UpdateCertificatesControllers;
use App\Http\Controllers\employee\UpdateExperienceControllers;
use App\Http\Controllers\employee\UpdateLanguageControllers;
use App\Http\Controllers\jobOpp\DeleteJobOppController;
use App\Http\Controllers\TestingControllers;

use App\Http\Controllers\company\CompanyCreateController;
use App\Http\Controllers\jobOpp\CreateJobOppController;
use App\Http\Controllers\jobOpp\ShowJobOppController;

use Illuminate\Http\Request;
use App\Models\Role;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


///////////// testing
// Route::post('test',[TestingControllers::class,'test']);
// Route::post('check',[TestingControllers::class,'employeeInCity']);
// Route::post('add',[TestingControllers::class,'add']);
// Route::post('resetPassword/{email}',[TestingControllers::class,'resetPassword']);
// Route::post('array',[TestingControllers::class,'array']);
// Route::post('json',[TestingControllers::class,'json']);
// Route::put('update',[TestingControllers::class,'update'])->middleware('auth:sanctum');
// Route::get('jsony',[TestingControllers::class,'jsony'])->middleware('auth:sanctum');
// Route::post('/addImage',[TestingControllers::class,'addImage'])->middleware('auth:sanctum');
// Route::post('/update1',[TestingControllers::class,'update1'])->middleware('auth:sanctum');
Route::post('/search', [TestingControllers::class, 'search']);


///////////////// Auth ///////////////////////////////
Route::post('/register', [RegisterControllers::class, 'register']);
Route::post('/login', [loginControllers::class, 'login']);
Route::post('/verification', [VerificationControllers::class, 'verification']);
Route::post('/forget-password', [ForgetPasswordControllers::class, 'forgetPassword']);
Route::post('/reset-password/{email}', [ResetPasswordControllers::class, 'resetPassword']);
Route::get('/resend-code/{email}', [ResendCodeControllers::class, 'resendCode']);
Route::post('/logout', [LogoutControllers::class, 'logout'])->middleware('auth:sanctum');
Route::post('/delete-account', [DeleteAccountControllers::class, 'delete'])->middleware('auth:sanctum');


//////////////////// employee //////////////////////
Route::post('/create-profile', [CreateCVControllers::class, 'createProfle'])->middleware('auth:sanctum');
Route::post('/update-profile', [CreateCVControllers::class, 'createProfle'])->middleware('auth:sanctum');
Route::post('/add-skills', [AddSkillsControllers::class, 'AddSkills'])->middleware('auth:sanctum');
Route::post('/add-experience', [AddExperienceControllers::class, 'AddExperience'])->middleware('auth:sanctum');
Route::post('/update-experience/{id}', [UpdateExperienceControllers::class, 'UpdateExperience'])->middleware('auth:sanctum');
Route::post('/add-certificates', [AddCertificatesControllers::class, 'AddCertificates'])->middleware('auth:sanctum');
Route::post('/update-certificates/{id}', [UpdateCertificatesControllers::class, 'UpdateCertificates'])->middleware('auth:sanctum');
Route::post('/add-languages', [AddLanguagesControllers::class, 'AddLanguages'])->middleware('auth:sanctum');
// Route::post('/update-languages/{id}',[UpdateLanguageControllers::class,'UpdateLanguage'])->middleware('auth:sanctum');
Route::post('/add-interests', [AddInterestsControllers::class, 'AddInterests'])->middleware('auth:sanctum');
Route::get('/profile-rating', [ProfileRatingControllers::class, 'profileRating'])->middleware('auth:sanctum');
Route::get('/job-apply/{id}', [JobApplayControllers::class, 'JobApplay'])->middleware('auth:sanctum');

/////////////////\\company//\\\\\\\\\\\\\\\\\\\\\    SHADI:
Route::post('/CreateCompany', [CompanyCreateController::class, 'create']); // done
Route::get('/ShowCompany/{id}', [ShowCompanyController::class, 'show']);//done
Route::get('/ShowAllCompanies', [ShowCompanyController::class, 'show_all']);//done
Route::post('/PostJob', [CreateJobOppController::class, 'create']);//done
Route::delete('/DeleteJob/{id}', [DeleteJobOppController::class, 'delete']);//done
Route::get('/ShowAllJobs', [ShowJobOppController::class, 'show_all']);//done
Route::get('/ShowJob/{id}', [ShowJobOppController::class, 'show']);//done
Route::get('/ShowCompanyJobs/{id}', [ShowCompanyJobOppsController::class, 'show']);//done
/////////////////\\ADMIN//\\\\\\\\\\\\\\\\\\\
Route::post('/ApproveCompany/{id}', [ApproveCompanyController::class, 'approve']);//done
////// END SHADI

//////// return data 
Route::get('/return-interests', [dataControllers::class, 'interests']);
Route::get('/return-city', [dataControllers::class, 'city']);
Route::get('/return-jobTitle', [dataControllers::class, 'jobTitle']);
Route::get('/return-language', [dataControllers::class, 'language']);
Route::get('/return-language-level', [dataControllers::class, 'languageLevel']);
Route::get('/return-job-time-type', [dataControllers::class, 'JobTimeType']);
Route::get('/return-education-level', [dataControllers::class, 'EducationLevel']);
Route::get('/return-job-industry', [dataControllers::class, 'JobIndustry']);