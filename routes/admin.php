 <?php

 use App\Http\Controllers\Admin\AdminController;
 use App\Http\Controllers\Admin\CategoryController;
 use App\Http\Controllers\Admin\FastNewsController;
 use App\Http\Controllers\Admin\NewsController;
 use App\Http\Controllers\Admin\PosterAdressController;
 use App\Http\Controllers\Admin\PosterController;
use App\Http\Controllers\Admin\VideoImageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\LiveController;
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


//dashpord routes
Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function () {

    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/news', NewsController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/posterAdress', PosterAdressController::class);
    Route::resource('/poster', PosterController::class);
    Route::resource('/fastNews', FastNewsController::class);
    Route::resource('/video', VideoImageController::class);
    Route::resource('/image', ImageController::class);
    Route::resource('/live', LiveController::class);
    Route::put('news_push/{id}', [NewsController::class, 'news_push'])->name('news_push');

});

