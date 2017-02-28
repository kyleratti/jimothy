@extends('layouts.admin')

@section('title', 'Configure Categories &amp; Boards')

@section('content')
    <div class="callout">
        <h4>Categories &amp; Boards</h4>

        @include('forum.admin.board.boards.add-category')

        @include('forum.board.show-all')
    </div>
@stop
