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
        @if($objThreads->count() <= 0)
            No threads found
        @else
            <div class="threads-heading">
                <div class="row">
                    <div class="small-8 columns">
                        Title
                    </div>

                    <div class="small-2 columns">
                        Last Post By
                    </div>

                    <div class="small-2 columns">
                        Views
                    </div>
                </div>
            </div>

            <div class="threads-list">
                @foreach($objThreads as $objThread)
                    @php
                        $objLastReply = App\Reply::where([
                            ['thread', $objThread->id]
                        ])->first();

                        $objLastResponder = App\User::where([
                            ['id', $objLastReply->user]
                        ])->first();
                    @endphp
                    <div class="row">
                        <div class="small-8 columns thread-title">
                            <a href="{{ route('forum.thread.show', ['objBoard' => $objBoard, 'objThread' => $objThread]) }}">{{ $objThread->title }}</a>
                        </div>

                        <div class="small-2 columns thread-last-reply">
                            <a href="{{ route('forum.user.show', ['iUserID' => $objLastResponder->id]) }}">{{ $objLastResponder->steam_name }}</a>
                        </div>

                        <div class="small-2 columns thread-views">
                            {{ random_int(0, 500) }}
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@stop
