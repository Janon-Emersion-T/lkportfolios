<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AdminController, SkillController, SocialController, CareerbreakController, EducationController, ExperienceController, HonorsController, LicenseController, OrganizationController, PatentController, ProjectController, PublicationController, RecommendationController, TestController, VolunteerController,
};

use App\Http\Middleware\RoleMiddleware;

Route::middleware(['auth', RoleMiddleware::class . ':superadmin,admin,candidate,company,staff,professionals'])
    ->group(function () {
        Route::get('/home', [AdminController::class, 'index'])->name('home');
    });

    Route::middleware(['auth'])->prefix('portal')->group(function () {
        $controllers = [
            'social'         => SocialController::class,
            'skills'         => SkillController::class,
            'careerbreak'    => CareerbreakController::class,
            'education'      => EducationController::class,
            'experience'     => ExperienceController::class,
            'honors'         => HonorsController::class,
            'license'        => LicenseController::class,
            'organization'   => OrganizationController::class,
            'patent'         => PatentController::class,
            'project'        => ProjectController::class,
            'publication'    => PublicationController::class,
            'recommendation' => RecommendationController::class,
            'test'           => TestController::class,
            'volunteer'      => VolunteerController::class,
        ];
    
        foreach ($controllers as $uri => $controller) {
            Route::resource($uri, $controller)->names([
                'index'   => "{$uri}.index",
                'create'  => "{$uri}.create",
                'store'   => "{$uri}.store",
                'show'    => "{$uri}.show",
                'edit'    => "{$uri}.edit",
                'update'  => "{$uri}.update",
                'destroy' => "{$uri}.destroy",
            ]);
        }
    }
);

Route::middleware(['auth', RoleMiddleware::class . ':candidate'])
->group(function () {
    Route::get('/wall', [AdminController::class, 'index'])->name('home');
});

/* Landing Pages */
Route::get('/', function () { return view('welcome');})->name('welcome');
Route::get('/about-us', function () { return view('landing.about');})->name('about');
Route::get('/services/candidates', function () { return view('landing.service_candidates');})->name('candidates');
Route::get('/services/companies', function () { return view('landing.service_companies');})->name('companies');
Route::get('/blogs', function () { return view('landing.blogs');})->name('blogs');
Route::get('/contact-us', function () { return view('landing.contact');})->name('contact');

Route::get('/resume-creator', function () { return view('landing.services.resume_creater');})->name('resume_creater');
Route::get('/portfolio-generator', function () { return view('landing.services.portfolio_generator');})->name('portfolio_generator');
Route::get('/cover-letter-generator', function () { return view('landing.services.cover_letter_generator');})->name('cover_letter_generator');
Route::get('/job-search', function () { return view('landing.services.job_search');})->name('job_search');

Route::get('/cookie-policy', function () { return view('landing.support.cookie_policy');})->name('cookie_policy');
Route::get('/disclaimer', function () { return view('landing.support.disclaimer');})->name('disclaimer');
Route::get('/privacy-policy', function () { return view('landing.support.privacy_policy');})->name('privacy_policy');
Route::get('/refund-and-cancellation-policy', function () { return view('landing.support.refund_and_cancellation_policy');})->name('refund_and_cancellation_policy');
Route::get('/terms-of-service', function () { return view('landing.support.terms_of_service');})->name('terms_of_service');