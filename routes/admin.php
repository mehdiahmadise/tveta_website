<?php

use App\Http\Controllers\Backend\AboutusController;
use App\Http\Controllers\Backend\AchievementController;
use App\Http\Controllers\Backend\AdminAuthenticationController;
use App\Http\Controllers\Backend\AgreementController;
use App\Http\Controllers\Backend\ArticleController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CenterTypeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\GallaryController;
use App\Http\Controllers\Backend\GuidelineController;
use App\Http\Controllers\Backend\HeadshipController;
use App\Http\Controllers\Backend\HeadshipFormController;
use App\Http\Controllers\Backend\ImportantActivityController;
use App\Http\Controllers\Backend\InovationController;
use App\Http\Controllers\Backend\InstituteController;
use App\Http\Controllers\Backend\LanguageController;
use App\Http\Controllers\Backend\MajorController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\ProcedureController;
use App\Http\Controllers\Backend\ProcurementContractController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\ProvinceController;
use App\Http\Controllers\Backend\SchoolController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SpecialTeachingController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {

    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login'); // admin.login
    Route::post('login', [AdminAuthenticationController::class, 'handle_login'])->name('handle-login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');

    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forget-password', [AdminAuthenticationController::class, 'sendRestLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');
    
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function() { 

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('languages', LanguageController::class);
    Route::resource('profile', ProfileController::class);
    Route::put('profile-password-update/{id}', [ ProfileController::class, 'passwordUpdate'])->name('profile-password.update');

    Route::resource('categories', CategoryController::class);
    Route::resource('province', ProvinceController::class);
    Route::resource('gallaries', GallaryController::class);
    Route::resource('major', MajorController::class);

    //district
    Route::resource('district', DistrictController::class);
    Route::get('fetch-district-province', [DistrictController::class, 'fetchProvince'])->name('fetch-district-province');


    /** News Route */
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');
    Route::get('news-copy/{id}', [NewsController::class, 'copyNews'])->name('news-copy');
    Route::get('pending-news', [NewsController::class, 'pendingNews'])->name('pending.news');
    Route::put('approve-news', [NewsController::class, 'approveNews'])->name('approve.news');
    Route::resource('news', NewsController::class);

    
    /** Important Activity Route */
    Route::get('fetch-important-activity-category', [ImportantActivityController::class, 'fetchCategory'])->name('fetch-important-activity-category');
    Route::get('toggle-important-activity-status', [ImportantActivityController::class, 'toggleImportantActivityStatus'])->name('toggle-important-activity-status');
    Route::get('important-activity-copy/{id}', [ImportantActivityController::class, 'copyImportantActivity'])->name('important-activity-copy');
    // Route::get('pending-important-activity', [ImportantActivityController::class, 'pendingImportantActivity'])->name('pending.important-activity');
    Route::put('approve-important-activity', [ImportantActivityController::class, 'approveImportantActivity'])->name('approve.important-activity');
    Route::resource('important-activity', ImportantActivityController::class);
    Route::resource('center-type', CenterTypeController::class);


    /** Institutes Route */
    Route::get('toggle-institute-status', [InstituteController::class, 'toggleInstituteStatus'])->name('toggle-institute-status');
    Route::get('institute-copy/{id}', [InstituteController::class, 'copyInstitute'])->name('institute-copy');
    Route::get('pending-institute', [InstituteController::class, 'pendingInstitute'])->name('pending.institute');
    Route::put('approve-institute', [InstituteController::class, 'approveInstitute'])->name('approve.institute');

    Route::resource('institute', InstituteController::class);
    Route::get('fetch-institute-province', [InstituteController::class, 'fetchProvince'])->name('fetch-institute-province');
    Route::get('fetch-institute-district', [InstituteController::class, 'fetchDistrict'])->name('fetch-institute-district');

    /** school Routes */
    Route::get('toggle-school-status', [SchoolController::class, 'toggleSchoolStatus'])->name('toggle-school-status');
    Route::get('school-copy/{id}', [SchoolController::class, 'copySchool'])->name('school-copy');
    Route::get('pending-school', [SchoolController::class, 'pendingSchool'])->name('pending.school');
    Route::put('approve-school', [SchoolController::class, 'approveSchool'])->name('approve.school');

    Route::get('fetch-school-province', [SchoolController::class, 'fetchProvince'])->name('fetch-school-province');
    Route::get('fetch-school-district', [SchoolController::class, 'fetchDistrict'])->name('fetch-school-district');
    Route::resource('school', SchoolController::class);

    /** Special Teaching Routes */
    Route::get('toggle-special-teaching-status', [SpecialTeachingController::class, 'toggleSpecialTeachingStatus'])->name('toggle-special-teaching-status');
    Route::get('special-teaching-copy/{id}', [SpecialTeachingController::class, 'copySpecialTeaching'])->name('special-teaching-copy');
    Route::get('pending-special-teaching', [SpecialTeachingController::class, 'pendingSpecialTeaching'])->name('pending.special-teaching');
    Route::put('approve-special-teaching', [SpecialTeachingController::class, 'approveSpecialTeaching'])->name('approve.special-teaching');

    Route::get('fetch-special-teaching-province', [SpecialTeachingController::class, 'fetchProvince'])->name('fetch-special-teaching-province');
    Route::get('fetch-special-teaching-district', [SpecialTeachingController::class, 'fetchDistrict'])->name('fetch-special-teaching-district');
    Route::resource('special-teaching', SpecialTeachingController::class);


    /** inovation Routes */
    Route::get('toggle-inovation-status', [InovationController::class, 'toggleInovationStatus'])->name('toggle-inovation-status');
    Route::get('inovation-copy/{id}', [InovationController::class, 'copyInovation'])->name('inovation-copy');
    Route::get('pending-inovation', [InovationController::class, 'pendingInovation'])->name('pending.inovation');
    Route::put('approve-inovation', [InovationController::class, 'approveInovation'])->name('approve.inovation');
    Route::get('fetch-inovation-province', [InovationController::class, 'fetchProvince'])->name('fetch-inovation-province');
    Route::get('fetch-inovation-district', [InovationController::class, 'fetchDistrict'])->name('fetch-inovation-district');
    Route::resource('inovation', InovationController::class);


    /** Article Routes */
    Route::get('toggle-article-status', [ArticleController::class, 'toggleArticleStatus'])->name('toggle-article-status');
    Route::get('article-copy/{id}', [ArticleController::class, 'copyArticle'])->name('article-copy');
    Route::get('pending-article', [ArticleController::class, 'pendingArticle'])->name('pending.article');
    Route::put('approve-article', [ArticleController::class, 'approveArticle'])->name('approve.article');
    Route::get('fetch-article-province', [ArticleController::class, 'fetchProvince'])->name('fetch-article-province');
    Route::get('fetch-article-district', [ArticleController::class, 'fetchDistrict'])->name('fetch-article-district');
    Route::get('fetch-article-category', [ArticleController::class, 'fetchCategory'])->name('fetch-article-category');
    Route::resource('article', ArticleController::class);


    /** agreement Routes */
    Route::get('toggle-agreement-status', [AgreementController::class, 'toggleAgreementStatus'])->name('toggle-agreement-status');
    Route::get('agreement-copy/{id}', [AgreementController::class, 'copyAgreement'])->name('agreement-copy');
    Route::resource('agreement', AgreementController::class);

    /** achievements Routes */
    Route::get('toggle-achievement-status', [AchievementController::class, 'toggleAchievementStatus'])->name('toggle-achievement-status');
    Route::get('achievement-copy/{id}', [AchievementController::class, 'copyAchievement'])->name('achievement-copy');
    Route::resource('achievement', AchievementController::class);

    /** procurement contract Routes */
    Route::get('toggle-procurement-contract-status', [ProcurementContractController::class, 'toggleProcurementContractStatus'])->name('toggle-procurement-contract-status');
    Route::get('procurement-contract-copy/{id}', [ProcurementContractController::class, 'copyProcurementContract'])->name('procurement-contracts-copy');
    Route::resource('procurement-contracts', ProcurementContractController::class);


    /** guideline Routes */
    Route::get('toggle-guideline-status', [GuidelineController::class, 'toggleGuidelineStatus'])->name('toggle-guideline-status');
    Route::get('guideline-copy/{id}', [GuidelineController::class, 'copyGuideline'])->name('guideline-copy');
    Route::resource('guidelines', GuidelineController::class);

    /** procedures Routes */
    Route::get('toggle-procedure-status', [ProcedureController::class, 'toggleProcedureStatus'])->name('toggle-procedure-status');
    Route::get('procedure-copy/{id}', [ProcedureController::class, 'copyProcedure'])->name('procedure-copy');
    Route::resource('procedures', ProcedureController::class);



    /** headships Routes */
    Route::get('toggle-headship-status', [HeadshipController::class, 'toggleHeadshipStatus'])->name('toggle-headship-status');
    Route::get('headship-copy/{id}', [HeadshipController::class, 'copyHeadship'])->name('headship-copy');
    Route::resource('headships', HeadshipController::class);

    /** headships Routes */
    Route::get('toggle-headship-form-status', [HeadshipFormController::class, 'toggleHeadshipFormStatus'])->name('toggle-headship-form-status');
    Route::get('headship-form-copy/{id}', [HeadshipFormController::class, 'copyHeadshipForm'])->name('headship-form-copy');
    Route::resource('headship-forms', HeadshipFormController::class);




    Route::resource('brands', BrandController::class);
    Route::get('site-setting', [SettingController::class, 'index'])->name('site-setting.index');
    Route::post('site-setting/update', [SettingController::class, 'update'])->name('site-setting.update');
    Route::get('aboutus', [AboutusController::class, 'index'])->name('aboutus.index');
    Route::post('aboutus/update', [AboutusController::class, 'update'])->name('aboutus.update');
    Route::resource('sliders', SliderController::class);
    

});