<table class="table boards-list">
    <thead>
        <tr>
            <th>Name</th>
            <th>Weight</th>
            <th>Collapsible</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    @foreach($objCategories as $objCategory)
        @php
            $bIsCollapsible = $objCategory->collapsible == 1
        @endphp

        <tr>
            <td contenteditable="true">{{ $objCategory->name }}</td>
            <td>
                <input type="number" value="{{ $objCategory->weight }}">
            </td>
            <td>
                <div class="switch tiny">
                    <input class="switch-input" id="switch-{{ $objCategory->id }}" type="checkbox" disabled {{ $bIsCollapsible ? 'checked' : '' }}>
                    <label class="switch-paddle" for="switch-{{ $objCategory->id }}">
                        <span class="show-for-sr">{{ $bIsCollapsible ? 'No' : 'Yes' }}</span>
                    </label>
                </div>
            </td>
            <td><a href="{{ route('forum.admin.board.groups.remove', ['iGroupID' => $objCategory->id]) }}" class="alert button">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
