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

Route::get('/', function () {
    return view('index');
})->name('forum.index');

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

    // View boards
    Route::get('/board/{iBoardID}', 'BoardController@showBoard')
        ->name('forum.board.show');
    
    // Require owner
    Route::group(['middleware' => 'isowner'], function() {
        // Home pages for configs
        Route::get('/admin', function() {
           return redirect()->route('forum.admin.board');
        })->name('forum.admin');

        Route::Get('/admin/board', function() {
           return view('forum.admin.board');
        })->name('forum.admin.board');

        // Board config
        Route::get('/admin/board/boards', 'BoardController@showBoards')
            ->name('forum.admin.board.boards');

        Route::post('/admin/board/boards/add', 'BoardController@createCategory')
            ->name('forum.admin.board.boards.addCategory');

        // Group config
        Route::get('/admin/board/groups', 'GroupController@showGroups')
            ->name('forum.admin.board.groups');

        Route::post('/admin/board/groups/add', 'GroupController@addGroup')
            ->name('forum.admin.board.groups.add');

        Route::get('/admin/board/groups/remove/{iGroupID}', 'GroupController@removeGroup')
            ->name('forum.admin.board.groups.remove');

        Route::get('/admin/board/groups/toggleEnabled/{iGroupID}', 'GroupController@toggleEnabled')
            ->name('forum.admin.board.groups.toggleEnabled');

            // Permissions
            Route::get('/admin/board/permissions', function() {
                return view('layouts.soon');
            })->name('forum.admin.board.permissions');
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
