# lms

1 . composer create-project laravel/laravel jharkhand (create project)
2 . php artisan serve(for testing is project running or not)
3 . create database in mysql (jharkhand)
4 . config the database in .env file
5 . composer require laravel/breeze
6 . php artisan breeze:install
7 . php artisan make:model Webusers -mc
8 . php artisan migrate

9 . Create Controller for  

php artisan make:controller AdminPanel/AdminController    
php artisan make:controller TeacherPanel/TeacherController
php artisan make:controller StudentPanel/StudentController

10 . Creatre Middleware

php artisan make:middleware RoleMiddleware

and register it to kernel.php
'role' => \App\Http\Middleware\RoleMiddleware::class,

11 . Add this routes in web.php
Route::get('dashboard', [StudentController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth','role:teacher'])->group(function () {
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

12 . create dashboard view for every role inside view folder

php artisan make:view admin/dashboard  
php artisan make:view teacher/dashboard  

13 . Some code changes under store fumction in E:\xampp\htdocs\lms\app\Http\Controllers\Auth\AuthenticatedSessionController.php



