<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\BoardCategory;

class BoardController extends Controller
{
    public function showBoards() {
        $objCategories = BoardCategory::all();
        $objBoards = Board::all();
        $objCatBoards = array();

        foreach($objCategories as $objCategory)
            if(!array_key_exists($objCategory->id, $objCatBoards))
                $objCatBoards[$objCategory->id] = [];

        foreach($objBoards as $objBoard)
            array_push($objCatBoards[$objBoard->category], $objBoard);

        return view('forum.admin.board.boards', [
            'objCategories' => BoardCategory::all(),
            'objBoards' => Board::all(),
            'objCatBoards' => $objCatBoards,
        ]);
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
