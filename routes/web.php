<?php

use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Frontend\EmailController;
use App\Http\Controllers\Frontend\FrontendAchievementController;
use App\Http\Controllers\Frontend\FrontendAgreementController;
use App\Http\Controllers\Frontend\FrontendArticleController;
use App\Http\Controllers\Frontend\FrontendGuidelineController;
use App\Http\Controllers\Frontend\FrontendHeadshipController;
use App\Http\Controllers\Frontend\FrontendImportantActivityController;
use App\Http\Controllers\Frontend\FrontendInstituteController;
use App\Http\Controllers\Frontend\FrontendMajorController;
use App\Http\Controllers\Frontend\FrontendNewsController;
use App\Http\Controllers\Frontend\FrontendProcedureController;
use App\Http\Controllers\Frontend\FrontendProcurementContractsController;
use App\Http\Controllers\Frontend\FrontendSpecialTeachingController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\InovationController;
use App\Http\Controllers\FrontendSchoolController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home_page');

//news routes
Route::get('all-news', [FrontendNewsController::class, 'all_news'])->name('frontend.all-news');
Route::get('single-news/{slug}', [FrontendNewsController::class, 'view_news'])->name('frontend.view-single-news');

//news routes
Route::get('all-inovations', [InovationController::class, 'all_inovations'])->name('frontend.all-inovation');
Route::get('single-inovation/{slug}', [InovationController::class, 'view_inovation'])->name('frontend.view-single-inovation');

// institute routes
Route::get('all-institutes', [FrontendInstituteController::class, 'all_institutes'])->name('frontend.all-institutes');
Route::get('single-institute/{slug}', [FrontendInstituteController::class, 'view_institute'])->name('frontend.view-single-institute');

// articles routes
Route::get('all-articles', [FrontendArticleController::class, 'all_articles'])->name('frontend.all-articles');
Route::get('single-article/{slug}', [FrontendArticleController::class, 'view_article'])->name('frontend.view-single-article');

// articles routes
Route::get('all-agreements', [FrontendAgreementController::class, 'all_agreements'])->name('frontend.all-agreements');
Route::get('single-agreement/{slug}', [FrontendAgreementController::class, 'view_agreement'])->name('frontend.view-single-agreement');

// procurement contract routes
Route::get('all-procurement-contracts', [FrontendProcurementContractsController::class, 'all_procurement_contracts'])->name('frontend.all-procurement-contracts');
Route::get('single-procurement-contract/{slug}', [FrontendProcurementContractsController::class, 'view_procurement_contract'])->name('frontend.view-single-procurement-contract');


// guidelines routes
Route::get('all-guidelines', [FrontendGuidelineController::class, 'all_guidelines'])->name('frontend.all-guidelines');
Route::get('single-guideline/{slug}', [FrontendGuidelineController::class, 'view_guidelines'])->name('frontend.view-single-guidelines');


// procedures routes
Route::get('all-procedures', [FrontendProcedureController::class, 'all_procedures'])->name('frontend.all-procedures');
Route::get('single-procedure/{slug}', [FrontendProcedureController::class, 'view_procedures'])->name('frontend.view-single-procedures');


// achievment routes
Route::get('all-achievements', [FrontendAchievementController::class, 'all_achievements'])->name('frontend.all-achievements');
Route::get('single-achievement/{slug}', [FrontendAchievementController::class, 'view_achievement'])->name('frontend.view-single-achievement');

// headships routes
Route::get('all-headships', [FrontendHeadshipController::class, 'all_headships'])->name('frontend.all-headships');
Route::get('single-headship/{slug}', [FrontendHeadshipController::class, 'view_headship'])->name('frontend.view-single-headship');


// schools routes
Route::get('all-schools', [FrontendSchoolController::class, 'all_schools'])->name('frontend.all-schools');
Route::get('single-school/{slug}', [FrontendSchoolController::class, 'view_school'])->name('frontend.view-single-school');

// special teaching routes
Route::get('all-special-teachings', [FrontendSpecialTeachingController::class, 'all_special_teachings'])->name('frontend.all-special-teachings');
Route::get('single-special-teaching/{slug}', [FrontendSpecialTeachingController::class, 'view_special_teaching'])->name('frontend.view-single-special-teaching');

//news routes
Route::get('all-important-activities', [FrontendImportantActivityController::class, 'all_important_activities'])->name('frontend.all-important-activities');

Route::get('single-important-activity/{slug}', [FrontendImportantActivityController::class, 'view_important_activity'])->name('frontend.view-single-important-activity');




  Route::get('all-majors', [FrontendMajorController::class, 'all_majors'])->name('frontend.all-majors');

  Route::get('all-special-teaching-list', [FrontendSpecialTeachingController::class, 'all_special_teachings_list'])->name('frontend.all-special-teaching-list');
  
  Route::get('institute-list', [FrontendInstituteController::class, 'institute_list'])->name('frontend.institute-list');

  Route::get('school-list', [FrontendSchoolController::class, 'school_list'])->name('frontend.school-list');




Route::post('/email', [EmailController::class, 'sendEmail'])->name('send.email');
Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', [BackendController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('backend.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
