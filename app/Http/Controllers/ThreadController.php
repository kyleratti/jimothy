<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;
use App\Board;
use App\Reply;

class ThreadController extends Controller
{
    public function showThread(Board $objBoard, Thread $objThread, $iPageNum = 1) {
        //$objBoard = Board::where('slug', $strBoardSlug)->first();

        if($objThread) {
            $objReplyPaginator = Reply::where([
                ['thread', $objThread->id],
            ])->paginate(15);


            return view('forum.thread.show', [
                'objBoard' => $objBoard,
                'objThread' => $objThread,
                'objReplies' => $objReplyPaginator,
                'iPageNum' => $iPageNum
            ]);
        }

        return view('forum.thread.show');
    }
}
