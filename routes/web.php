<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseQuestionController;
use App\Http\Controllers\CourseSectionController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\FeaturesController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\QuestionsCommentsController;
use App\Http\Controllers\SectionlessonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomePageController::class, 'index'])->name('default');

// Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
// Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('details');
Route::resource('course', CourseController::class);
Route::get('courses/manage', [CourseController::class, 'manage'])->name('course.manage');
Route::resource('teachers', TeacherController::class);
Route::get('all-teachers/manage', [TeacherController::class, 'manage'])->name('teachers.manage');
Route::resource('features', FeaturesController::class);
Route::post('features/{id}', [FeaturesController::class, 'store'])->name('feature.add');
Route::resource('course-section', CourseSectionController::class);
Route::post('course-section/{id}', [CourseSectionController::class, 'store'])->name('section.add');
Route::patch('course-section/{id}', [CourseSectionController::class, 'update'])->name('section.update');
Route::resource('quiz.section.question', CourseQuestionController::class );
Route::get('quiz/{section}/course/{course}', [CourseQuestionController::class, 'start' ])->name('quiz.start');
Route::resource('course-lesson', SectionlessonController::class);
Route::post('course-lesson/{id}', [SectionlessonController::class, 'store'])->name('lesson.add');
Route::resource('enrollment', EnrollmentController::class);
Route::resource('forum', ForumController::class);
Route::resource('comment.question', QuestionsCommentsController::class);
Route::post('enrollment/{id}', [EnrollmentController::class, 'store'])->name('enrollment.store');
Route::get('enrollment/{id}/lesson', [EnrollmentController::class, 'index'])->name('enrollment.lesson');
Route::get('enrollment-lesson/{id}', [SectionlessonController::class, 'index'])->name('lesson.start');
Route::get('export-excel',[UserController::class, 'export'])->name('export.excel');
Route::get('lang/{lang}',[LanguageController::class, 'switchLang'])->name('lang.switch');
// Route::resource('user', UserController::class, [ 
//     'only' => ['update', 'edit', 'destroy'],
//     'names' => ['update' => 'updateprofile', 'edit' => 'editprofile', 'destroy' => 'deleteprofile'],
// ])->parameters([]);
Route::get('/edit-profile', [HomeController::class, 'edit'])->name('editprofile');
Route::put('/edit-user-profile/edit', [UserController::class, 'update'])->name('updateprofile');
Route::get('/users', [UserController::class, 'index'])->name('userlist');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Auth::routes(['verify' => true]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
