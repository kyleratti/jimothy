@extends('layouts.master')

@section('title', 'Home')

@if(Auth::check())
    @include('layouts.forum')
@endif
