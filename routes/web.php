<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\OfficeController;
use App\Http\Controllers\Student\MainController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Student\ComplainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\ComplainController as AdminComplainController;

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

Route::get('/', function () {
    return view('auth.login');
});


require('auth.php');


//Students
Route::prefix('student')->name('student.')->middleware('auth', 'student')->group(function(){
    Route::controller(MainController::class)->group(function(){
        Route::get('/', 'overview')->name('overview');

        Route::get('/profile/{type}', 'profile')->name('profile');
        Route::post('/profile/save/{id}', 'profileSave')->name('profile.save');

        Route::get('/account', 'account')->name('account');
        Route::post('/account/save/{id}', 'accountSave')->name('account.save');
    });

    Route::controller(ComplainController::class)->prefix('complain')->name('complain.')->group(function(){
        Route::get('/v/{type}', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create/save', 'store')->name('create.save');

        Route::post('/update/save/{id}', 'update')->name('edit.save');

        Route::get('/delete/{id}', 'destroy')->name('delete');
    });
});

//Admins
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function(){

    Route::controller(AdminMainController::class)->name('main.')->prefix('main')->group(function(){
        Route::get('/', 'overview')->name('overview');

        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile/save', 'profileSave')->name('profile.save');
    });

    Route::controller(AdminComplainController::class)->prefix('complain')->name('complain.')->group(function(){
        Route::get('/v/{type}', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create/save', 'store')->name('create.save');

        Route::get('/attend/{id}', 'attend')->name('attend');
        Route::post('/attend/{id}/save', 'store')->name('attend.save');

        Route::post('/update/save/{id}', 'update')->name('update.save');

        Route::get('/delete/{id}', 'destroy')->name('delete');
    });


    Route::controller(StudentController::class)->name('student.')->prefix('student')->group(function(){
        Route::get('/', 'all')->name('all');

        Route::get('/add', 'add')->name('add');
        Route::post('/add/save', 'addSave')->name('add.save');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/save/{id}', 'editSave')->name('edit.save');

        Route::get('/delete/{id}', 'delete')->name('delete');
    });


    Route::controller(OfficeController::class)->name('office.')->prefix('office')->group(function(){
        Route::get('/', 'index')->name('index');

        Route::get('/add', 'add')->name('add');
        Route::post('/add/save', 'addSave')->name('add.save');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

        Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
    });

    //Department Routes
    Route::controller(DepartmentController::class)->name('department.')->prefix('department')->group(function(){
        Route::get('/', 'index')->name('index');

        Route::get('/add', 'add')->name('add');
        Route::post('/add/save', 'addSave')->name('add.save');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

        Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
    });

    //Faculty Routes
    Route::controller(FacultyController::class)->name('faculty.')->prefix('faculty')->group(function(){
        Route::get('/', 'index')->name('index');

        Route::get('/add', 'add')->name('add');
        Route::post('/add/save', 'addSave')->name('add.save');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/edit/{id}/save', 'editSave')->name('edit.save');

        Route::get('/delete/{id}/{soft}', 'delete')->name('delete');
    });
});

//Artisan
Route::get('/artisan/{command}', function($command){
    if($command == 'migrate'){
        $output = ['--force' => true];
    }else{
        $output = [];
    }
    Artisan::call($command, $output);
    dd(Artisan::output());
});
