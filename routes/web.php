<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Dashboard;
use App\Livewire\EditProfile;
use App\Livewire\Logout;
use App\Livewire\Institutions\InstitutionCreate;
use App\Livewire\Institutions\InstitutionEdit;
use App\Livewire\Institutions\InstitutionList;
use App\Livewire\Institutions\InstitutionShow;
use App\Livewire\Users\UserList;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserShow;
use App\Livewire\Questionnaires\QuestionnaireForm;
use App\Livewire\Reporting\ReportingList;
use App\Livewire\Reporting\ReportingShow;
use App\Livewire\PageNotFound;
use App\Http\Controllers\CacheController;

Route::get('/clear-cache', [CacheController::class, 'clearAllCache']);

if (App::environment('local')) {
    Livewire::setUpdateRoute(function($handle) {
        return Route::get('/questionnaire-hub/livewire/update', $handle);
    });
}

if (App::environment('production')) {
    Livewire::setUpdateRoute(function($handle) {
        return Route::get('/satts/livewire/update', $handle);
    });
}

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('forgot-password', ForgotPassword::class)->name('forgot-password');
    Route::get('reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', EditProfile::class)->name('profile.edit');
    Route::middleware('role:super_admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');

        Route::prefix('users')->name('user.')->group(function () {
            Route::get('/', UserList::class)->name('list'); 
            Route::get('/create', UserCreate::class)->name('create');
            Route::get('/{id}/edit', UserEdit::class)->name('edit');
            Route::get('/{id}/view', UserShow::class)->name('show');
            Route::delete('/{id}/delete', [UserList::class, 'deleteRecord'])->name('destroy');
            Route::get('/users-data', [UserList::class, 'getUsersData'])->name('data');
        });

        Route::prefix('institutions')->name('institution.')->group(function () {
            Route::get('/', InstitutionList::class)->name('list');
            Route::get('/create', InstitutionCreate::class)->name('create');
            Route::get('/{id}/edit', InstitutionEdit::class)->name('edit');
            Route::get('/{id}/view', InstitutionShow::class)->name('show');
            Route::delete('/{id}/delete', [InstitutionList::class, 'deleteRecord'])->name('destroy');
            Route::get('/institutions-data', [InstitutionList::class, 'getInstitutionsData'])->name('data');
            Route::get('/{id}/user-data', [InstitutionShow::class, 'getInstitutionsUserData'])->name('user.data');
        });

        Route::prefix('reporting')->name('reporting.')->group(function () {
            Route::get('/', ReportingList::class)->name('list');
            Route::get('/{id}/{section_id}/view', ReportingShow::class)->name('show');
            Route::get('/reporting-data', [ReportingList::class, 'getInstitutionsData'])->name('data');
        });
    });

    Route::middleware('role:user,submitter')->group(function () {
        Route::get('/questionnaire/{id}', QuestionnaireForm::class)->name('questionnaire');
        Route::delete('/deleteQueImg/{id}/{src}', [QuestionnaireForm::class,'deleteQueAnsImg'])->name('queAnsImg.destroy');
    });

    Route::get('/logout', Logout::class)->name('logout');
});

Route::get('404', PageNotFound::class)->name('errors.404');

Route::fallback(function () {
    if (auth()->check()) {
        // If the user is authenticated, show the 404 page with a 404 status code
        return response()->view('livewire.page-not-found', ['menu' => '404'], 404);
    } else {
        // If the user is not authenticated, redirect them to the login page
        return redirect()->route('login');
    }
});