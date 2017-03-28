@extends('layouts.forum')

@section('title', $objThread->title.' - '.$objBoard->name)

@section('main')
    @foreach($objReplies as $objReply)
        <div class="reply">
            {{ App\User::where(['id' => $objReply->owner])->first()->steam_name }} says: {{ $objReply->body }}
        </div>
    @endforeach
@stop
