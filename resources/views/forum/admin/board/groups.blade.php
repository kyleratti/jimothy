@extends('layouts.admin')

@section('title', 'Configure Roles &amp; Permissions')

@section('content')
    <div class="callout">
        <h4>Roles</h4>

        <a href="#" class="button primary"><span class="fi-plus"></span> Add a role</a>

        <table class="groups-list">
            <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            @foreach($objRoles as $objRole)
                <tr>
                    <td>{{ $objRole->name }}</td>
                    <td><a href="{{ route('forum.admin.board.groups.remove', ['iGroupID' => $objRole->id]) }}" class="button alert">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="callout">
        <h4>Permissions</h4>
    </div>
@stop
