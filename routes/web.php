<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Country_state_cityController;
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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');
Route::get('sign_out', 'Auth\AuthController@logout')->name('sign_out');
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 
    ], function()
    {
            Route::group(
                [
                    'prefix' => 'admin',
                    'middleware' => [ 'auth:sanctum', 'verified' ],
                ], function()
                {
                        Route::get('dashboard', function () {
                            return view('admin.dashboard');
                        })->name('dashboard');
	                Route::resource('admin', 'AdminController');
                    Route::resource('news', 'NewController');
                    Route::post('/pages/uploadImage','NewController@uploadImage')->name('upload.image');
                    Route::post('news_change_satus','NewController@news_change_satus')->name('news_change_satus');
        
                });  
});
    Auth::routes();
            
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
