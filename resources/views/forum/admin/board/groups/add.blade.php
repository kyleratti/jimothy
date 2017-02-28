<form method="POST" action="{{ route('forum.admin.board.groups.add') }}">
    <div class="input-group">
        <input name="group_name" type="text" class="input-group-field" maxlength="16" placeholder="Special Group #{{ rand(2, 1500) }}">
        <select name="group_inherits_from" class="input-group-field">
            <option value="">(none)</option>
            <option disabled>---</option>
            @foreach($objGroups as $objGroup)
                <option value="{{ $objGroup->id }}">{{ $objGroup->name }}</option>
            @endforeach
        </select>
        <div class="input-group-button">
            <button type="submit" class="success button">Add</button>
        </div>

        {{ csrf_field() }}
    </div>
</form>
