<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\VolunteerRequestController;
use App\Http\Controllers\PartnerRequestController;
use App\Http\Controllers\VoyagerSiteController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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

Route::post('/re', function (Request $request) {
    return $request->all();
})->name('re');

Route::get('set-locale/{locale}', function($locale) {
    app()->setLocale($locale);
    return redirect(app()->getLocale());
})->name('set-locale');

Route::get('/', function () {
    return redirect(app()->getLocale());
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group([
  'prefix' => '{locale}',
  'where' => ['locale' => '[a-zA-Z]{2}'],
  'middleware' => 'setlocale'], function() {
    Route::get('/', function () {
        $locale = app()->getLocale();

        $projects = DB::table('projects')
            ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
            ->limit(3)
            ->get();

        $first_hot_news = DB::table('news')
            ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
            ->where('id', '=', 1)
            ->limit(1)
            ->first();

        $second_hot_news = DB::table('news')
            ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
            ->where('id', '=', 2)
            ->limit(1)
            ->first();

        $hot_story = DB::table('stories')
            ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
            ->where('id', '=', 2)
            ->limit(1)
            ->first();

        $hot_project = DB::table('projects')
            ->select('id', 'name_'.$locale.' as name', 'description_'.$locale.' as description','video','image')
            ->where('id', '=', 2)
            ->limit(1)
            ->first();

        return view('welcome', [
            'projects' => $projects,
            'first_hot_news' => $first_hot_news,
            'second_hot_news' => $second_hot_news,
            'hot_story' => $hot_story,
            'hot_project' => $hot_project
        ]);
    })->name('home');
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
          Route::post("/project/{project}/comment/{comment}",[CommentController::class,'storeProjectReply'])->name("storeProjectReply");


          Route::post("/news/{news}/comment",[CommentController::class,'storeNews'])->name("saveNewsComment");
          Route::post("/news/{news}/comment/{comment}",[CommentController::class,'storeNewsReply'])->name("storeNewsReply");


          Route::post("/story/{story}/comment",[CommentController::class,'storeStory'])->name("saveStoryComment");
          Route::post("/story/{story}/comment/{comment}",[CommentController::class,'storeStoryReply'])->name("storeStoryReply");

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
      Route::get("/projects",
      [ProjectController::class,'index'])->name("projects");
      Route::get("/projects/{project}/show",
      [ProjectController::class,'show'])->name("project.show");
      Route::get("/stories",
      [StoryController::class,'index'])->name("story");
      Route::get("/stories/{story}/show",
      [StoryController::class,'show'])->name("story.show");
      Route::get("/news",
      [NewsController::class,'index'])->name("news");
      Route::get("/news/{news}/show",
      [NewsController::class,'show'])->name("news.show");
      Route::get("/files",
      [FileController::class,'index'])->name("files");
      Route::get("/contacts",
      [ContactController::class,'index'])->name("contacts");
      Route::get("/partners",
      [PartnerController::class,'index'])->name("partners");
      Route::get("/volunteers",
      [VolunteerController::class,'index'])->name("volunteers");

      Route::get('/volunteers/{volunteer}', [VolunteerController::class, 'show'])->name('volunteer.show');

      /*
      |--------------------------------------------------------------------------
      | like routes
      |--------------------------------------------------------------------------
      |
      */
      Route::post("/project/{project}/like",[LikeController::class,'storeProject'])->name("saveProjectLike");
      Route::post("/news/{news}/like",      [LikeController::class,'storeNews'])->name("saveNewsLike");
      Route::post("/story/{story}/like",    [LikeController::class,'storeStory'])->name("saveStoryLike");

      /*
      |--------------------------------------------------------------------------
      | share routes
      |--------------------------------------------------------------------------
      |
      */
      Route::post("/project/{project}/share",[ShareController::class,'storeProject'])->name("saveProjectSahre");
      Route::post("/news/{news}/share",      [ShareController::class,'storeNews'])->name("saveNewsSahre");
      Route::post("/story/{story}/share",    [ShareController::class,'storeStory'])->name("saveStorySahre");

      /*
      |--------------------------------------------------------------------------
      | requests  routes
      |--------------------------------------------------------------------------
      |
      */
      Route::post("/volunteers/{volunteer}/request",[VolunteerRequestController::class,'store'])->name("volunteer");
      Route::post("/partner/request",               [PartnerRequestController::class,'store'])->name("partner");



    });

  });//locale







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
    Route::get("/reports/projects",[VoyagerSiteController::class,'projects'])->name("voyager.projects");
    Route::get("/reports/news",    [VoyagerSiteController::class,'news'])->name("voyager.news");
    Route::get("/reports/stories", [VoyagerSiteController::class,'stories'])->name("voyager.stories");
    Route::get("/message/create",  [VoyagerSiteController::class,'createUserEmail'])->name("voyager.createUserEmail");
    Route::post("/message",        [VoyagerSiteController::class,'sendUserEmail'])->name("voyager.sendUserEmail");
    Route::get("/message/users/create",[VoyagerSiteController::class,'createUsersEmail'])->name("voyager.createUsersEmail");
    Route::post("/message/users",  [VoyagerSiteController::class,'sendUsersEmail'])->name("voyager.sendUsersEmail");
    Route::get("/requests/partners",[VoyagerSiteController::class,'partnersRequests'])->name("voyager.partnersRequests");
    Route::get("/requests/partners/view/{partnerRequest}",[VoyagerSiteController::class,'partnerRequestView'])->name("voyager.partnerRequestView");
    Route::get("/requests/volunteers",[VoyagerSiteController::class,'volunteersRequests'])->name("voyager.volunteersRequests");
    Route::get("/requests/volunteer/view/{volunteerRequest}",[VoyagerSiteController::class,'volunteerRequestView'])->name("voyager.volunteerRequestView");
    Route::get("/projects/volunteers",[VoyagerSiteController::class,'volunteersRequests'])->name("voyager.volunteersRequests");


});
