@extends('layouts.master')

@section('main')
    <div class="row">
        <div class="small-3 columns">
            <ul>
                <li><a href="{{ route('forum.admin.board.boards') }}">Categories & Boards</a></li>
                <li><a href="{{ route('forum.admin.board.groups') }}">Roles & Permissions</a></li>
            </ul>
        </div>

        <div class="small-9 columns">
            @yield('content')
        </div>
    </div>
@stop
