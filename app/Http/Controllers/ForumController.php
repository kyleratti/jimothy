<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Board;
use App\BoardCategory;

class ForumController extends Controller
{
    public function showFrontPage() {
        $objCategories = BoardCategory::all();
        $objBoards = Board::all();
        $objCatBoards = array();

        foreach($objCategories as $objCategory)
            if(!array_key_exists($objCategory->id, $objCatBoards))
                $objCatBoards[$objCategory->id] = [];

        foreach($objBoards as $objBoard)
            array_push($objCatBoards[$objBoard->category], $objBoard);

        $iNumMembers = User::count();
        $iNumPosts = 0;
        $iNumThreads = 0;

        return view('forum.front-page', [
            'objCategories' => BoardCategory::all(),
            'objBoards' => Board::all(),
            'objCatBoards' => $objCatBoards,

            'iNumMembers' => $iNumMembers,
            'iNumPosts' => $iNumPosts,
            'iNumThreads' => $iNumThreads
        ]);
    }
}
