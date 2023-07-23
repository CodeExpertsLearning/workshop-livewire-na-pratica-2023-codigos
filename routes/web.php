<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('App\Http\Livewire\Admin\Products')
    ->group(function() {

    Route::get('/products', ProductList::class)->name('product.index');
    Route::get('/products/create', Form\ProductForm::class)->name('product.create');
    Route::get('/products/{product}/edit', Form\ProductForm::class)->name('product.edit');
});

//Breeze Routes...
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
