<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SkillsController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
//FronEnd Panel
Route::get('/',[FrontEndController::class,'index'])->name('home');
Route::group(['prefix'=>'front'],function(){
    Route::post('/message',[MessagesController::class, 'store'])->name('message.store');
    Route::post('/promotional/message',[MessagesController::class, 'promotion'])->name('promotion.store');
    Route::get('/project/all',[MessagesController::class, 'allProject'])->name('all.project');
    Route::get('/project/single/{id}',[MessagesController::class, 'singleProject'])->name('single.project');
});




//Admin Panel Routes
Route::group(['prefix' => 'admin','middleware'=>'auth'] ,function(){
    Route::get('/access', [AdminController::class, 'index'])->name('admin.home');
    //Admin Dashboard
    Route::group(['prefix' => 'about'],function(){
        Route::get('/dashboard',[AdminDashboardController::class, 'dashboardLink'])->name('dashboard.link');
        Route::post('/dashboard/store',[AdminDashboardController::class, 'dashboardStore'])->name('dashboard.store');
        Route::post('/dashboard/update',[AdminDashboardController::class, 'dashboardUpdate'])->name('dashboard.update');
        Route::get('/dashboard/manage',[AdminDashboardController::class, 'dashboardManage'])->name('dashboard.manage');
        Route::get('/dashboard/edit/{id}',[AdminDashboardController::class, 'dashboardEdit'])->name('dashboard.edit');
        Route::get('/dashboard/delete/{id}',[AdminDashboardController::class, 'dashboardDelete'])->name('dashboard.delete');
    });
    Route::group(['prefix' => 'resume'],function(){
        Route::get('/about',[AboutController::class, 'aboutLink'])->name('about.link');
        Route::post('/about/store',[AboutController::class, 'aboutStore'])->name('about.store');
        Route::post('/about/update',[AboutController::class, 'aboutUpdate'])->name('about.update');
        Route::get('/about/manage',[AboutController::class, 'aboutManage'])->name('about.manage');
        Route::get('/about/edit/{id}',[AboutController::class, 'aboutEdit'])->name('about.edit');
        Route::get('/about/delete/{id}',[AboutController::class, 'aboutDelete'])->name('about.delete');
    });
    Route::group(['prefix' => 'skill'],function(){
        Route::get('/skillskills',[SkillsController::class, 'skillsLink'])->name('skills.link');
        Route::post('/skills/store',[SkillsController::class, 'skillsStore'])->name('skills.store');
        Route::post('/skills/update',[SkillsController::class, 'skillsUpdate'])->name('skills.update');
        Route::get('/skills/manage',[SkillsController::class, 'skillsManage'])->name('skills.manage');
        Route::get('/skills/edit/{id}',[SkillsController::class, 'skillsEdit'])->name('skills.edit');
        Route::get('/skills/delete/{id}',[SkillsController::class, 'skillsDelete'])->name('skills.delete');
    });
    Route::group(['prefix' => 'services'],function(){
        Route::get('/service',[ServiceController::class, 'serviceLink'])->name('service.link');
        Route::post('/service/store',[ServiceController::class, 'serviceStore'])->name('service.store');
        Route::post('/service/update',[ServiceController::class, 'serviceUpdate'])->name('service.update');
        Route::get('/service/manage',[ServiceController::class, 'serviceManage'])->name('service.manage');
        Route::get('/service/edit/{id}',[ServiceController::class, 'serviceEdit'])->name('service.edit');
        Route::get('/service/delete/{id}',[ServiceController::class, 'serviceDelete'])->name('service.delete');
    });
    Route::group(['prefix' => 'work'],function(){
        Route::get('/experience',[ExperienceController::class, 'experienceLink'])->name('experience.link');
        Route::post('/experience/store',[ExperienceController::class, 'experienceStore'])->name('experience.store');
        Route::post('/experience/update',[ExperienceController::class, 'experienceUpdate'])->name('experience.update');
        Route::get('/experience/manage',[ExperienceController::class, 'experienceManage'])->name('experience.manage');
        Route::get('/experience/edit/{id}',[ExperienceController::class, 'experienceEdit'])->name('experience.edit');
        Route::get('/experience/delete/{id}',[ExperienceController::class, 'experienceDelete'])->name('experience.delete');
    });
    Route::group(['prefix' => 'projects'],function(){
        Route::get('/category',[ProjectController::class, 'categoryLink'])->name('category.link');
        Route::post('/category/store',[ProjectController::class, 'categoryStore'])->name('category.store');
        Route::get('/category/delete/{id}',[ProjectController::class, 'categoryDelete'])->name('category.delete');

        Route::get('/project',[ProjectController::class, 'projectLink'])->name('project.link');
        Route::post('/project/store',[ProjectController::class, 'projectStore'])->name('project.store');
        Route::post('/project/update',[ProjectController::class, 'projectUpdate'])->name('project.update');
        Route::get('/project/manage',[ProjectController::class, 'projectManage'])->name('project.manage');
        Route::get('/project/edit/{id}',[ProjectController::class, 'projectEdit'])->name('project.edit');
        Route::get('/project/delete/{id}',[ProjectController::class, 'projectDelete'])->name('project.delete');
    });
    Route::group(['prefix' => 'contacts'],function(){
        Route::get('/contact',[ContactController::class, 'contactLink'])->name('contact.link');
        Route::post('/contact/store',[ContactController::class, 'contactStore'])->name('contact.store');
        Route::post('/contact/update',[ContactController::class, 'contactUpdate'])->name('contact.update');
        Route::get('/contact/manage',[ContactController::class, 'contactManage'])->name('contact.manage');
        Route::get('/contact/edit/{id}',[ContactController::class, 'contactEdit'])->name('contact.edit');
        Route::get('/contact/delete/{id}',[ContactController::class, 'contactDelete'])->name('contact.delete');
    });
    Route::group(['prefix' => 'notification'],function(){
        Route::get('/message/link',[NotificationController::class, 'messageLink'])->name('message.link');
        Route::get('/message/edit/{id}',[NotificationController::class, 'messageEdit'])->name('message.edit');
        // Subscribers
        Route::get('/subscribe/link',[NotificationController::class, 'subscribeLink'])->name('subscribe.link');
        // Check Notification
        Route::get('/check',[NotificationController::class, 'check'])->name('check');
    });
});
