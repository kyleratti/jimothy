@extends('layouts.master')

@section('main')
    <div class="row">
        <div class="small-3 columns">
            <ul>
                <li><a href="{{ route('forum.admin.board.boards') }}">Categories &amp; Boards</a></li>
                <li><a href="{{ route('forum.admin.board.groups') }}">Groups</a></li>
                <li><a href="{{ route('forum.admin.board.permissions') }}">Permissions</a></li>
            </ul>
        </div>

        <div class="small-9 columns">
            @yield('content')
        </div>
    </div>
@stop
