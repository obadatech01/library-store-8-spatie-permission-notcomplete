<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\InstructionController;

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
});

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

###########Start Category Controller###########
Route::prefix('/categories')->group(function() {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
});
###########End Category Controller###########

###########Start Book Controller###########
Route::prefix('/books')->group(function() {
    Route::get('/', [BookController::class, 'index'])->name('books.index');
    Route::get('/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/store', [BookController::class, 'store'])->name('books.store');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::post('/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::get('/delete/{id}', [BookController::class, 'delete'])->name('books.delete');
    Route::get('/actives', [BookController::class, 'activeBooks'])->name('books.active');
    Route::get('/inactives', [BookController::class, 'inactiveBooks'])->name('books.inactive');
    Route::get('/borrowing/{id}', [BookController::class, 'addBorrowing'])->name('books.addBorrowing');
    Route::post('/borrowing/store', [BookController::class, 'storeBorrowing'])->name('books.storeBorrowing');

    //Export file book pdf
    Route::get('/export-pdf', [BookController::class, 'exportPdf'])->name('export.books.pdf');

    //Export file book excel
    Route::get('/export-excel', [BookController::class, 'exportExcel'])->name('export.books.excel');

    // Import file book excel
    Route::get('/import', function () {
        return view('books.import_xlsx');
    })->name('import.books.excel.view');

    Route::post('/import-xlsx', [BookController::class, 'importExcel'])->name('import.books.excel');

});
###########End Book Controller###########

###########Start Archive Controller###########
Route::prefix('/archive')->group(function() {

    ###########Start Archive Book###########
    Route::get('/books', [ArchiveController::class, 'indexBook'])->name('archive.books.index');
    Route::get('/books/restore/{id}', [ArchiveController::class, 'restoreBook'])->name('archive.books.restore');
    Route::get('/books/force-delete/{id}', [ArchiveController::class, 'forceDeleteBook'])->name('archive.books.force.delete');
    ###########Start Archive Book###########

    ###########Start Archive Category###########
    Route::get('/categories', [ArchiveController::class, 'indexCategory'])->name('archive.categories.index');
    Route::get('/categories/restore/{id}', [ArchiveController::class, 'restoreCategory'])->name('archive.categories.restore');
    Route::get('/categories/force-delete/{id}', [ArchiveController::class, 'forceDeleteCategory'])->name('archive.categories.force.delete');
    ###########Start Archive Category###########

    ###########Start Archive User###########
    Route::get('/users', [ArchiveController::class, 'indexUser'])->name('archive.users.index');
    Route::get('/users/restore/{id}', [ArchiveController::class, 'restoreUser'])->name('archive.users.restore');
    Route::get('/users/force-delete/{id}', [ArchiveController::class, 'forceDeleteUser'])->name('archive.users.force.delete');
    ###########Start Archive User###########

});
###########End Archive Controller###########

###########Start User Controller###########
Route::prefix('/users')->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    ###########Start Profile User###########
    Route::get('/profile/{id}', [ProfileController::class, 'index'])->name('users.profile.index');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('users.profile.edit');
    Route::post('/profile/update/{id}', [ProfileController::class, 'update'])->name('users.profile.update');
    Route::get('/logout', [ProfileController::class, 'logout'])->name('user.logout');

    // Password Update Routes
    Route::get('/password/edit', [ProfileController::class, 'passwordEdit'])->name('users.password.edit');
    Route::post('/password/update', [ProfileController::class, 'passwordUpdate'])->name('users.password.update');
    ###########Start Profile User###########
});
###########End User Controller###########

###########Start Instruction Controller###########
Route::prefix('/instructions')->group(function() {
    Route::get('/', [InstructionController::class, 'index'])->name('instructions.index');
    Route::get('/create', [InstructionController::class, 'create'])->name('instructions.create');
    Route::post('/store', [InstructionController::class, 'store'])->name('instructions.store');
    Route::get('/edit/{id}', [InstructionController::class, 'edit'])->name('instructions.edit');
    Route::post('/update/{id}', [InstructionController::class, 'update'])->name('instructions.update');
    Route::get('/delete/{id}', [InstructionController::class, 'delete'])->name('instructions.delete');
});
###########End Instruction Controller###########

###########Start Role Controller###########
Route::prefix('/roles')->group(function() {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::get('/show/{id}', [RoleController::class, 'show'])->name('roles.show');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
});
###########End Role Controller###########

###########Start Borrowing Controller###########
Route::prefix('/borrowings')->group(function() {
    Route::get('/', [BorrowingController::class, 'index'])->name('borrowings.index');
    Route::get('/create', [BorrowingController::class, 'create'])->name('borrowings.create');
    Route::post('/store', [BorrowingController::class, 'store'])->name('borrowings.store');
    Route::get('/edit/{id}', [BorrowingController::class, 'edit'])->name('borrowings.edit');
    Route::post('/update/{id}', [BorrowingController::class, 'update'])->name('borrowings.update');
    Route::get('/delete/{id}', [BorrowingController::class, 'delete'])->name('borrowings.delete');
});
###########End Borrowing Controller###########
