@extends('layouts.forum')

@section('title', 'Home')

@section('content')
    @include('forum.board.show-all')

    @include('forum.board.stats')
@stop
