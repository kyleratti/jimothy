<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use App\Board;
use App\Category;

class BoardController extends Controller
{
    public function showBoards() {
        $objCategories = Category::all();
        $objBoards = Board::all();
        $objCatBoards = array();

        foreach($objCategories as $objCategory)
            if(!array_key_exists($objCategory->id, $objCatBoards))
                $objCatBoards[$objCategory->id] = [];

        foreach($objBoards as $objBoard)
            array_push($objCatBoards[$objBoard->category], $objBoard);

        return view('forum.admin.board.boards', [
            'objCategories' => Category::all(),
            'objBoards' => Board::all(),
            'objCatBoards' => $objCatBoards,
        ]);
    }

    public function showBoard(Board $objBoard) {
        //$objBoard = Board::where('slug', $strBoardSlug)->first();

        if($objBoard) {
            $iBoardID = $objBoard->id;
            $objStickyThreads = Thread::where([
                ['board', $iBoardID],
                ['sticky', true],
                ['deleted', false]
            ])->get();

            $objThreads = Thread::where([
                ['board', $iBoardID],
                ['deleted', false]
            ])->get();

            return view('forum.board.show', [
                'objBoard' => $objBoard,
                'objStickyThreads' => $objStickyThreads,
                'objThreads' => $objThreads
            ]);
        }

        return view('forum.board.show-all');
    }

    public function createCategory(Request $objRequest) {
        $strCategoryName = $objRequest->input('category_name');
        $iCategoryWeight = intval($objRequest->input('category_weight'));
        $bIsCollapsible = true;

        BoardCategory::create([
            'name' => $strCategoryName,
            'weight' => $iCategoryWeight,
            'collapsible' => $bIsCollapsible
        ]);

        return redirect()->back();
    }
}
