<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\VolunteerRequestController;
use App\Http\Controllers\PartnerRequestController;
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

Route::get('/', function () {
    $projects = [
        ['id' => 1, 'title' => 'Project 1', 'description' => 'project description'],
        ['id' => 2, 'title' => 'Project 2', 'description' => 'project description'],
        ['id' => 3, 'title' => 'Project 3', 'description' => 'project description']
    ];
    return view('welcome', [
        'projects' => $projects
    ]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





/*
|--------------------------------------------------------------------------
| comments Routes
|--------------------------------------------------------------------------
|
| Here is where users can interact with the website adding comments and
| replaying to others comments route
| using middleware auth
|
*/
Route::group(['middleware' => 'auth:web', 'prefix' => 'users'], function () {

      Route::post("/project/{project}/comment",[CommentController::class,'storeProject'])->name("saveProjectComment");
      Route::post("/news/{news}/comment",[CommentController::class,'storeNews'])->name("saveNewsComment");
      Route::post("/story/{story}/comment",[CommentController::class,'storeStory'])->name("saveStoryComment");
});

/*
|--------------------------------------------------------------------------
| website basic Routes
|--------------------------------------------------------------------------
|
| Here is where users can interact with the website adding comments and
| replaying to others comments route
| using middleware auth
|
*/

Route::prefix('users')->group(function () {
  Route::get("/projects",[ProjectController::class,'index'])->name("projects");
  Route::get("/stories",[StoryController::class,'index'])->name("story");
  Route::get("/news",[NewsController::class,'index'])->name("news");
  Route::get("/files",[FileController::class,'index'])->name("files");
  Route::get('/files/{file}/download', [FileController::class,'getDownload'])->name('download');
  Route::get("/partners",[PartnerController::class,'index'])->name("partners");
  Route::get("/volunteers",[VolunteerController::class,'index'])->name("volunteers");
  /*
  |--------------------------------------------------------------------------
  | like routes
  |--------------------------------------------------------------------------
  |
  */
  Route::post("/project/{project}/like",[LikeController::class,'storeProject'])->name("saveProjectLike");
  Route::post("/news/{news}/like",[LikeController::class,'storeNews'])->name("saveNewsLike");
  Route::post("/story/{story}/like",[LikeController::class,'storeStory'])->name("saveStoryLike");
  /*
  |--------------------------------------------------------------------------
  | requests  routes
  |--------------------------------------------------------------------------
  |
  */
  Route::get("/volunteers/{volunteer}",[VolunteerRequestController::class,'create'])->name("create");
  Route::post("/volunteers/{volunteer}/request",[VolunteerRequestController::class,'store'])->name("volunteer");
  Route::get("/partners/{partner}/create",[PartnerRequestController::class,'create'])->name("partner.create");
  Route::post("/partners/{partner}/request",[partnerRequestController::class,'store'])->name("partner");




});


/*
|--------------------------------------------------------------------------
| admin panel
|--------------------------------------------------------------------------
|
| Here is where admin can interact with the website adding 
|
*/
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
