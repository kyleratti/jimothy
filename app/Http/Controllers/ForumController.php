<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Board;
use App\Category;
use App\Thread;

class ForumController extends Controller
{
    public function showFrontPage() {
        $objCategories = Category::all();
        $objBoards = Board::all();
        $objCatBoards = array();

        foreach($objCategories as $objCategory)
            if(!array_key_exists($objCategory->id, $objCatBoards))
                $objCatBoards[$objCategory->id] = [];

        foreach($objBoards as $objBoard) {
            $objTotalReplies = DB::select('SELECT COUNT(replies.id) AS replies FROM threads, replies WHERE threads.id = ? AND replies.thread = threads.id AND replies.deleted = ?', [$objBoard->id, false]);
            $iTotalReplies = 0;

            if(count($objTotalReplies) > 0)
                $iTotalReplies = $objTotalReplies[0]->replies;

            $iTotalThreads = Thread::where([
                ['board', $objBoard->id],
                ['deleted', false]
            ])->count();

            $iBoardID = $objBoard->id;

            // FIXME: This query gets fucked up when you try to parse the response. No clue why.
            $objLastReply = DB::select('SELECT replies.updated_at AS updated_at, replies.owner AS owner, threads.title AS thread_title FROM replies, threads, boards WHERE replies.deleted = 0 AND replies.thread = threads.id AND threads.board = boards.id AND boards.category = ? ORDER BY replies.created_at DESC LIMIT 1', [$iBoardID]);

            $arrLastReply = [
                'updated_at' => null,
                'owner' => null,
                'thread_title' => null
            ];

            $arrData = [
                'objBoard' => $objBoard,
                'iTotalReplies' => $iTotalReplies,
                'iTotalThreads' => $iTotalThreads,
                'arrLastReply' => $arrLastReply
            ];

            array_push($objCatBoards[$objBoard->category], $arrData);
        }

        $iNumMembers = User::count();
        $iNumPosts = 0;
        $iNumThreads = 0;

        return view('forum.front-page', [
            'objCategories' => Category::all(),
            'objBoards' => Board::all(),
            'objCatBoards' => $objCatBoards,

            'iNumMembers' => $iNumMembers,
            'iNumPosts' => $iNumPosts,
            'iNumThreads' => $iNumThreads
        ]);
    }
}
