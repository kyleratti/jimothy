<?php

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

// Forum routes

Route::get('/', 'ForumController@showFrontPage')
    ->name('forum.index');

Route::get('/user/login', function() {
    return view('forum.user.login');
})->name('forum.user.login');

Route::get('/user/login/go', 'AuthController@login')
    ->name('forum.user.login.go');

Route::get('/user/login/auth', 'AuthController@login')
    ->name('forum.user.auth');

// Require login
Route::group(['middleware' => 'auth'], function() {
    Route::get('/user/all', function () {
        return view('layouts.soon');
    })->name('forum.user.list');

    Route::get('/user/logout', 'AuthController@logout')
        ->name('forum.user.logout');

    // View board
    Route::get('/board/{objBoard}', 'BoardController@showBoard')
        ->name('forum.board.show');

    // View thread
    Route::get('/board/{objBoard}/{objThread}/{iPageNum?}', 'ThreadController@showThread')
        ->name('forum.thread.show');

    // View users
    Route::get('/user/show/{$iUserID}', 'ForumController@showFrontPage')
        ->name('forum.user.show');
    
    // Require owner
    Route::group(['middleware' => 'isowner'], function() {
        // Home pages for configs
        Route::get('/admin', function() {
           return redirect()->route('forum.admin.boards');
        })->name('forum.admin');

        // Board config
        Route::get('/admin/boards', 'BoardController@showBoards')
            ->name('forum.admin.boards');

        Route::post('/admin/boards/add', 'BoardController@createCategory')
            ->name('forum.admin.boards.addCategory');

        // Group config
        Route::get('/admin/groups', 'GroupController@showGroups')
            ->name('forum.admin.groups');

        Route::post('/admin/groups/add', 'GroupController@addGroup')
            ->name('forum.admin.groups.add');

        Route::get('/admin/groups/remove/{iGroupID}', 'GroupController@removeGroup')
            ->name('forum.admin.groups.remove');

        Route::get('/admin/groups/toggleEnabled/{iGroupID}', 'GroupController@toggleEnabled')
            ->name('forum.admin.groups.toggleEnabled');

            // Permissions
            Route::get('/admin/permissions', function() {
                return view('layouts.soon');
            })->name('forum.admin.permissions');
    });
});

// Game routes
Route::get('/servers/all', function() {
    return view('layouts.soon');
})->name('game.servers');

// Require login
Route::group(['middleware' => 'auth'], function() {
    Route::get('/servers/bans', function () {
        return view('layouts.soon');
    })->name('game.bans');

    Route::get('/servers/top-players', function () {
        return view('layouts.soon');
    })->name('game.top-players');

    // Require isadmin
    Route::group(['middleware' => 'isadmin'], function() {
        Route::get('/servers/logs', function() {
            return view('layouts.soon');
        })->name('game.admin.logs');
    });

    // Require owner
    Route::group(['middleware' => 'isowner'], function() {
       Route::get('/admin/game', function() {
           return view('layouts.soon');
       })->name('forum.admin.game');
    });
});
