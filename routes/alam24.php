 <?php

use App\Http\Controllers\alam24\Alam24Controller;
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


//site routes
Route::get('/', function(){
    return view('alam24.index');
} );

Route::get('/{page}', [Alam24Controller::class, 'index'])->name('alam24.index');




