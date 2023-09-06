<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ExcuseController;
use App\Http\Controllers\ResetPasswordController;



//Rutas generales para el usuario
Route::get('/', function () {return redirect()->route('login.form');});
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');



//Rutas para el aprendiz

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/attendance/check-in', [AttendanceController::class, 'checkIn'])->name('attendance.check-in');
    Route::post('/attendance/check-out', [AttendanceController::class, 'checkOut'])->name('attendance.check-out');
    Route::get('/excuse/create', [ExcuseController::class, 'create'])->name('excuse.create');
    Route::post('/excuse', [ExcuseController::class, 'store'])->name('excuse.store');
    Route::get('/excuses', [DashboardController::class, 'viewExcuses'])->name('excuses');

});


//Rutas para el instructor

Route::middleware(['auth', 'role:instructor'])->group(function () {
    Route::get('/instructor-dashboard', [InstructorController::class, 'listGroups'])->name('instructor.groups');
    Route::get('/instructor-dashboard/group/{group_id}', [InstructorController::class, 'index'])->name('instructor.group');
    Route::get('/instructor-dashboard/group/{group_id}/excuses', [InstructorController::class, 'listExcuses'])->name('instructor.excuses');
    Route::get('/instructor-dashboard/excuse/{id}/approve', [InstructorController::class, 'approveExcuse'])->name('excuse.approve');
    Route::get('/instructor-dashboard/excuse/{id}/reject', [InstructorController::class, 'rejectExcuse'])->name('excuse.reject');
    Route::get('/instructor/create-program', [InstructorController::class, 'showCreateProgramForm'])->name('instructor.create-program.form');
    Route::post('/instructor/create-program', [InstructorController::class, 'createProgram'])->name('instructor.create-program');
    Route::get('/instructor/create-group', [InstructorController::class, 'showCreateGroupForm'])->name('instructor.create-group.form');
    Route::post('/instructor/create-group', [InstructorController::class, 'createGroup'])->name('instructor.create-group');
    Route::get('/instructor/descargar-pdf/{filename}', [ExcuseController::class, 'download'])->name('descargar');


});


//Rutas del administrador

Route::middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/create-user', [AdminController::class, 'createUser'])->name('create-user');
    Route::post('/store-user', [AdminController::class, 'storeUser'])->name('store-user');
    Route::get('/create-users', [AdminController::class, 'createUsers'])->name('create-users');
    Route::post('/store-users', [AdminController::class, 'manyUsers'])->name('store-users');
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('users');
    Route::get('/edit-user/{id}', [AdminController::class, 'editUser'])->name('edit-user');
    Route::post('/update-user/{id}', [AdminController::class, 'updateUser'])->name('update-user');
    Route::get('/admin/create-program', [AdminController::class, 'showCreateProgramForm'])->name('create-program.form');
    Route::post('/admin/create-program', [AdminController::class, 'createProgram'])->name('create-program');
    Route::get('/admin/create-group', [AdminController::class, 'showCreateGroupForm'])->name('create-group.form');
    Route::post('/admin/create-group', [AdminController::class, 'createGroup'])->name('create-group');
    Route::get('/admin/list-groups', [AdminController::class, 'listGroups'])->name('list-groups');
    Route::get('/admin/list-groups/{group_id}', [AdminController::class, 'listUsersFichas'])->name('group-admin');

});


Route::get('/select-role', [RoleController::class, 'selectRole'])->name('select-role')->middleware('auth');
Route::post('/set-selected-role', [RoleController::class, 'setSelectedRole'])->name('set-selected-role')->middleware('auth');
