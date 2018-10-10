<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Category;
use App\Board;

class ForumController extends Controller
{
    public function getAll(Request $objRequest) {
        $arrResult = [
            'categories' => [],
        ];

        $objCategories = Category::orderBy('weight', 'asc')->get();

        foreach($objCategories as $objCat) {
            $objBoards = Board::where('category', $objCat->id)->orderBy('weight', 'asc')->get();

            $arrData = [
                'id' => $objCat->id,
                'name' => $objCat->name,
                'slug' => $objCat->slug,
                'icon' => $objCat->icon,
                'collapsible' => $objCat->collapsible,

                'boards' => [
                    //
                ],
            ];

            $arrBoards = [];

            foreach($objBoards as $objBoard) {
                $arrBoards[] = [
                    'name' => $objBoard->name,
                    'slug' => $objBoard->slug,
                    'description' => $objBoard->description,
                    'weight' => $objBoard->weight,
                ];
            }

            $arrData['boards'] = $arrBoards;
            $arrResult['categories'][$objCat->name] = $arrData;
        }

        return response()->json($arrResult);
    }
}
