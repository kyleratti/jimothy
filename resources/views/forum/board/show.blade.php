@extends('layouts.forum')

@section('title', $objBoard->name)

@section('main')
    <div class="board-name">
        <h5>{{ $objBoard->name }} <small>{{ $objBoard->description }}</small></h5>
    </div>

    @if($objStickyThreads->count() > 0)
        <div class="threads sticky">
            //
        </div>
    @endif

    <div class="threads">
        @if(count($objThreads) <= 0)
            No threads found
        @else
            <div class="threads-list">
                @foreach($objThreads as $objThread)
                    <div class="row thread">
                        <div class="small-8 columns thread-title">
                            <div style="width: 100%;display: block;">
                                    <a href="{{ route('forum.thread.show', ['objBoard' => $objBoard, 'objThread' => $objThread['thread']]) }}">{{ $objThread['thread']->title }}</a>
                            </div>
                            <div style="width: 100%;display: block;">
                            </div>
                        </div>

                        @if(isset($objThread['last_reply']))
                            <div class="small-4 columns thread-last-reply">
                                <a href="#">{{ $objThread['last_reply']->created_at->diffForHumans() }}</a> by <a href="{{ route('forum.user.show', ['iUserID' => $objThread['last_reply']->id]) }}">{{ $objThread['last_reply']->owner->steam_name }}</a>
                            </div>
                        @else
                            <div class="small-4 columns thread-last-reply">

                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@stop
