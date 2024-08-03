<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserIdeaController;
use App\Http\Controllers\VideoManPostController;
use App\Http\Controllers\VideoEditorController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Middleware\PublicAuth;
use App\Http\Middleware\CheckAdminPanel;
use App\Http\Middleware\CheckVideoEditorRole;
use App\Http\Middleware\CheckVideoManRole;


// Public routes for guest users
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

});
Route::get('/auth-sign-out', [AuthController::class, 'logout'])->name('auth.sign.out');

// Authenticated routes for public users
Route::middleware([PublicAuth::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [DashboardController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [DashboardController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [DashboardController::class, 'updateProfile'])->name('profile.update');
    Route::resource('user_ideas', UserIdeaController::class);

});
Route::group([CheckVideoManRole::class], function () {
//  Start  Routes for video man
    Route::get('/video-man-dashboard', [DashboardController::class, 'index'])->name('video_man.dashboard');
    Route::resource('video_man_posts', VideoManPostController::class);
    Route::get('public_user_posts', [VideoManPostController::class, 'publicUserPosts'])->name('video_man_posts.public_user_posts');
    Route::patch('public_user_posts/{userIdea}', [VideoManPostController::class, 'updateStatus'])->name('video_man_posts.update_status');
    Route::get('completed_videos', [VideoManPostController::class, 'completedVideos'])->name('video_man_posts.completed_videos');
    Route::post('/video-man-posts/remove-file', [VideoManPostController::class, 'removeFile'])->name('video_man_posts.removeFile');
    Route::post('/video-man-posts/{id}/change-status', [VideoManPostController::class, 'changeStatus'])->name('video_man_posts.change_status');
    Route::get('video-man/public-user-posts/{id}', [VideoManPostController::class, 'show'])->name('public_user_posts.show');
    Route::post('/video-man-posts/download-all', [VideoManPostController::class, 'downloadAll'])->name('video_man_posts.downloadAll');
    Route::post('/video-man-posts/download-all-photos', [VideoManPostController::class, 'downloadAllPhotos'])->name('video_man_posts.downloadAllPhotos');
    Route::get('/video-man-posts/{id}', [VideoManPostController::class, 'PostShow'])->name('video_man_posts.show1');

    //   End Routes for video man


});


Route::group([CheckVideoEditorRole::class],function (){
    //  Start Routes for video editor
    Route::get('/video-editor-dashboard',[DashboardController::class,'index'])->name('video_editor.dashboard');
    Route::resource('video_editor', VideoEditorController::class);

    Route::post('video_editor/downloadAllVideos', [VideoEditorController::class, 'downloadAll'])->name('video_editor.downloadAllVideos');
    Route::post('video_editor/downloadAllPhotos', [VideoEditorController::class, 'downloadAllPhotos'])->name('video_editor.downloadAllPhotos');
//  End Routes for video editor
});


Route::group([CheckAdminPanel::class],function (){
    Route::get('/admin-panel-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin_panel', AdminPanelController::class);


    Route::get('/admin-panel/public_user_posts', [AdminPanelController::class, 'publicUserPosts'])->name('admin_panel.public_user_posts');
    Route::patch('/admin-panel/public_user_posts/{userIdea}', [AdminPanelController::class, 'updateStatus'])->name('admin_panel.update_status');
    Route::get('admin-panel/completed_videos', [AdminPanelController::class, 'completedVideos'])->name('admin_panel.completed_videos');
    Route::post('/admin-panel/remove-file', [AdminPanelController::class, 'removeFile'])->name('admin_panel.removeFile');
    Route::post('/admin-panel/{id}/change-status', [AdminPanelController::class, 'changeStatus'])->name('admin_panel.change_status');
    Route::get('/public-user-posts/{id}', [AdminPanelController::class, 'show'])->name('admin_panel.public_user_posts.show');
    Route::post('/admin-panel/download-all', [AdminPanelController::class, 'downloadAll'])->name('admin_panel.downloadAll');
    Route::post('/admin-panel/download-all-photos', [AdminPanelController::class, 'downloadAllPhotos'])->name('admin_panel.downloadAllPhotos');
    Route::get('/admin-panel/{id}', [AdminPanelController::class, 'PostShow'])->name('admin_panel.show1');

});
