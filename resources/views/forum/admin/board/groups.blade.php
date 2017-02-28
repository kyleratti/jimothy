@extends('layouts.admin')

@section('title', 'Configure Groups')

@section('content')
    @include('forum.admin.board.groups.add')

    <table class="groups-list">
        <thead>
            <tr>
                <th>Name</th>
                <th>Inherits From</th>
                <th>Enabled</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($objGroups as $objGroup)
                @php
                    $bIsEnabled = $objGroup->enabled == 1
                @endphp

                <tr>
                    <td>{{ $objGroup->name }}</td>
                    <td>
                        <select id="changeInheritance"> {{-- TODO: add logic to change inheritance --}}
                            @if(!isset($objGroup->inherits_from))
                                <option value="">(none)</option>
                                <option disabled>---</option>
                            @endif

                            @foreach($objGroups as $objThis)
                                @if($objGroup !== $objThis)
                                    <option {{ $objGroup->inherits_from === $objThis->name ? 'selected' : '' }} value="{{ $objThis->id }}">{{ $objThis->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="switch tiny">
                            <input class="switch-input" id="switch-{{ $objGroup->id }}" type="checkbox" onclick="window.location.assign('{{ route('forum.admin.board.groups.toggleEnabled', ['iGroupID' => $objGroup->id]) }}')" {{ $bIsEnabled ? 'checked' : '' }}>
                            <label class="switch-paddle" for="switch-{{ $objGroup->id }}">
                                <span class="show-for-sr">{{ $bIsEnabled ? 'Disable' : 'Enable' }}</span>
                            </label>
                        </div>
                    </td>
                    <td><a href="{{ route('forum.admin.board.groups.remove', ['iGroupID' => $objGroup->id]) }}" class="alert button">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
