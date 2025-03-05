<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\CourseBillingController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\CourseMaterialsController;
use App\Http\Controllers\CourseModularController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsitePageController;
use Illuminate\Http\Request;
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

Route::group(['middleware' => 'auth:api'], function () {

    // user 
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/update-profile', [UserController::class, 'updateUser']);
    Route::post('/update-profile-password', [UserController::class, 'updatePasswordUser']);

    // category 
    Route::post('create-category', [categoryController::class, 'createCategory']);
    Route::post('update-category/{id}', [categoryController::class, 'updateCategory']);
    Route::post('category-search', [categoryController::class, 'categorySearch']);
    Route::get('categorys', [categoryController::class, 'index']);
    Route::get('show-categorys', [categoryController::class, 'showAllCategory']);
    Route::get('edit-category/{id}', [categoryController::class, 'editCategory']);
    Route::delete('delete-category/{id}', [categoryController::class, 'deleteCategory']);
    // subCatgeory 
    Route::post('update-subcategory/{id}', [categoryController::class, 'updateSubCategory']);
    Route::post('create-subcategory', [categoryController::class, 'createSubCategory']);
    Route::post('search-subcategory', [categoryController::class, 'subCategorySearch']);
    Route::get('subcategory', [categoryController::class, 'subcategoryIndex']);
    Route::get('show-subcategory', [categoryController::class, 'subcategoryShowAll']);
    Route::get('edit-subcategory/{id}', [categoryController::class, 'editSubCategory']);
    Route::get('subcategory-id/{id}', [categoryController::class, 'subcategoryById']);
    Route::delete('delete-subcategory/{id}', [categoryController::class, 'DeleteSubCategory']);
    // childCategory
    Route::post('update-childcategory/{id}', [categoryController::class, 'updateChildCategory']);
    Route::post('create-childcategory', [categoryController::class, 'createChildCategory']);
    Route::post('search-childcategory', [categoryController::class, 'childCategorySearch']);
    Route::get('childcategory', [categoryController::class, 'childCategoryIndex']);
    Route::get('show-childcategory', [categoryController::class, 'AllChildCategory']);
    Route::get('edit-childcategory/{id}', [categoryController::class, 'editChildCategory']);
    Route::get('childcategory-id/{id}', [categoryController::class, 'childCategoryById']);
    Route::delete('delete-childcategory/{id}', [categoryController::class, 'deleteChildCategory']);

    // user Teacher
    Route::post('create-teacher', [TeacherController::class, 'createteacher']);
    Route::post('update-teacher/{id}', [TeacherController::class, 'updateTeacher']);
    Route::post('teacher-search', [TeacherController::class, 'teacherSearch']);
    Route::get('edit-teacher/{id}', [TeacherController::class, 'editUser']);
    Route::get('show-teacher', [TeacherController::class, 'showTeacher']);
    Route::delete('delete-teacher', [TeacherController::class, 'deleteUser']);
    // user 
    Route::get('show-user', [TeacherController::class, 'showUser']);

    // cousre 
    Route::post('create-cousre', [CourseController::class, 'createCousre']);
    Route::post('update-cousre/{id}', [CourseController::class, 'updateCousre']);
    Route::post('cousre-search', [CourseController::class, 'CouseSearch']);
    Route::get('show-cousre-by-own', [CourseController::class, 'showCousreByOwe']);
    Route::get('show-cousre', [CourseController::class, 'showCousre']);
    Route::get('show-all-cousre', [CourseController::class, 'showAllCousre']);
    Route::get('edit-cousre/{id}', [CourseController::class, 'editCousre']);
    Route::delete('delete-cousre/{id}', [CourseController::class, 'DeleteCousre']);

    // course Materials
    Route::post('create-cousre-material', [CourseMaterialsController::class, 'createCourseMaterial']);
    Route::post('update-cousre-material/{id}', [CourseMaterialsController::class, 'updateCourseMaterial']);
    Route::get('show-cousre-material', [CourseMaterialsController::class, 'showCourseMaterial']);
    Route::get('edit-cousre-material/{id}', [CourseMaterialsController::class, 'EditCourseMaterial']);
    Route::delete('delete-cousre-material/{id}', [CourseMaterialsController::class, 'DeleteCourseMaterial']);

    // course Modular
    Route::post('create-cousre-modular', [CourseModularController::class, 'createModular']);
    Route::post('update-cousre-modular/{id}', [CourseModularController::class, 'createModular']);
    Route::post('update-cousre-modular-search', [CourseModularController::class, 'CouseModularSearch']);
    Route::get('show-cousre-modular', [CourseModularController::class, 'showModular']);
    Route::get('edit-cousre-modular/{id}', [CourseModularController::class, 'editModular']);
    Route::delete('delete-cousre-modular/{id}', [CourseModularController::class, 'deleteModular']);
    
    // course lesson
    Route::post('create-cousre-modular-lesson', [CourseLessonController::class, 'createLesson']);
    Route::post('update-cousre-modular-lesson/{id}', [CourseLessonController::class, 'updateLesson']);
    Route::get('cousre-modular-by-id/{id}', [CourseLessonController::class, 'CourseModularById']);
    Route::get('show-cousre-modular-lesson', [CourseLessonController::class, 'showLesson']);
    Route::get('edit-cousre-modular-lesson/{id}', [CourseLessonController::class, 'editLesson']);
    Route::delete('delete-cousre-modular-lesson/{id}', [CourseLessonController::class, 'deleteLessonVideo']);
    // course billing
    Route::post('create-cousre-modular-billing', [CourseBillingController::class, 'createCourseBilling']);
    Route::post('update-cousre-modular-billing/{id}', [CourseBillingController::class, 'updateCourseBilling']);
    Route::get('cousre-billing-filter/{id}', [CourseBillingController::class, 'filterByCourse']);
    Route::get('show-cousre-modular-billing', [CourseBillingController::class, 'showCourseBilling']);
    Route::get('edit-cousre-modular-billing/{id}', [CourseBillingController::class, 'EditCourseBilling']);
    Route::delete('delete-cousre-modular-billing/{id}', [CourseBillingController::class, 'deletCourseBilling']);


    // Setting
    Route::post('update-setting', [SettingController::class, 'updateSetting']);
    Route::get('setting', [SettingController::class, 'showSetting']);
    // website pages
    Route::post('update-website-pages', [WebsitePageController::class, 'updateWebsitepages']);
    Route::get('website-pages', [WebsitePageController::class, 'webSitePage']);
});
Route::post('login', [UserController::class, 'login']);
