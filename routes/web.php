<?php

use App\Http\Controllers\AmankcController;
use App\Http\Controllers\MailController;
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

// Route::get('/', function () {
//     return view('aman.index');
// });


// Route::get('/admin', function () {
//     return view('admin.index');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/alam24.php';



