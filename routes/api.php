<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// change language
Route::get('locale/{locale?}', array('en'=>'set-locale', 'uses'=>'App\Http\Controllers\Languages\LanguageController@changeLang'));

Route::group([
    'middleware' => ['Localization']
],function(){
    // api layout side front 
    Route::get('/home', [FrontController::class, 'home'])->name('homepage');
    Route::post('/home/subscribe', [FrontController::class, 'subscribe'])->name('subscribe');
    Route::get('/about-us', [FrontController::class, 'about'])->name('about');
    Route::get('/testimonials', [FrontController::class, 'testi'])->name('testi');
    Route::get('/services', [FrontController::class, 'service'])->name('service');
    Route::get('/services/{slug}', [FrontController::class, 'serviceshow'])->name('serviceshow');
    Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
    Route::get('/portfolio/{slug}', [FrontController::class, 'portfolioshow'])->name('portfolioshow');
    Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
    Route::get('/blog/search',[FrontController::class, 'search'])->name('search');
    Route::get('/blog/{slug}', [FrontController::class, 'blogshow'])->name('blogshow');
    Route::get('/categories/{category:slug}',[FrontController::class, 'category'])->name('category');
    Route::get('/tags/{tag:slug}',[FrontController::class, 'tag'])->name('tag');
    Route::get('/pages/{slug}', [FrontController::class, 'page'])->name('page');
});
