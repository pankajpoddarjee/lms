# lms

1 . composer create-project laravel/laravel jharkhand (create project)

2 . php artisan serve(for testing is project running or not)

3 . create database in mysql (jharkhand)

4 . config the database in .env file

5 . composer require laravel/breeze

6 . php artisan breeze:install

7 . php artisan migrate

8 . Create Controller for  

php artisan make:controller AdminPanel/AdminController    
php artisan make:controller TeacherPanel/TeacherController
php artisan make:controller StudentPanel/StudentController

9 . Creatre Middleware

php artisan make:middleware RoleMiddleware

and register it to kernel.php
'role' => \App\Http\Middleware\RoleMiddleware::class,

10 . Add this routes in web.php
Route::get('dashboard', [StudentController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth','role:teacher'])->group(function () {
    Route::get('teacher/dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
});

11 . create dashboard view for every role inside view folder

php artisan make:view admin/dashboard  
php artisan make:view teacher/dashboard  

12 . Some code changes under store fumction in E:\xampp\htdocs\lms\app\Http\Controllers\Auth\AuthenticatedSessionController.php



