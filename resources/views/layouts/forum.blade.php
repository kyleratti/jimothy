@extends('layouts.master')

@section('main')
    @if(Route::currentRouteName() == 'forum.index')
        {{-- TODO: check if there are announcements before showing them --}}
        <div class="announcements callout">
            @include('announcements.show')
        </div>
    @endif

    <div class="forum">
        @yield('content')
    </div>
@stop
