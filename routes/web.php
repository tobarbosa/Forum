<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopicCommentController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/teste-1/{id}', function ($id) {
    return $id . " teste";
    // return view('welcome');
});

Route::get('/teste-2/{id?}/{something?}', function ($id = null, $something = null) {
    return $id . " - " . $something;
    // return view('welcome');
});

Route::get('request', function (Request $request) {
    // return "Pal a pal heim!";
    $r = $request->all();
    dd($r);
    return $r;
});

//=============================================================================================================//

// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('users');

    Route::get('{user}', [UserController::class, 'show']);
});

Route::prefix('topics')->group(function () {
    Route::get('{id}', [TopicController::class, 'index'])->name('topic.index');
    Route::post('store', [TopicController::class, 'store'])->middleware(['auth', 'verified'])->name('topic.store');
    Route::post('edit/{topic}', [TopicController::class, 'edit'])->middleware(['auth', 'verified'])->name('topic.edit');
    Route::delete('delete/{topic}', [TopicController::class, 'delete'])->middleware(['auth', 'verified'])->name('topic.delete');
});

Route::prefix('comment')->group(function () {
    Route::post('topic/{topic}/user/{user}/comment', [TopicCommentController::class, 'comment'])->middleware(['auth'])->name('comment');
    Route::delete('{comment}/delete', [TopicCommentController::class, 'delete'])->middleware(['auth'])->name('comment.delete');
});

Route::prefix('list-items')->group(function () {
    Route::get('/', [ListItemController::class, 'index'])->name('list.items');

    Route::get('new', [ListItemController::class, 'createNewItem'])->name('item.new');

    Route::get('{item}', [ListItemController::class, 'show'])->name('item');

    Route::post('store', [ListItemController::class, 'store'])->name('item.store');
});

//=============================================================================================================//
// Breeze: dashboard protegido + perfil + rotas de autenticação
//=============================================================================================================//

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('newTopic', [TopicController::class, 'newTopic'])->middleware(['auth', 'verified'])->name('newTopic');

    Route::get('editTopic/{topic}', [TopicController::class, 'editTopic'])->middleware(['auth', 'verified'])->name('editTopic');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
