<fieldset class="fieldset">
    <legend>Add a category</legend>

    <form method="POST" action="{{ route('forum.admin.board.boards.addCategory') }}">
        <div class="row">
            <div class="medium-8 columns">
                <label>Name
                    <input name="category_name" type="text" class="input-group-field" maxlength="20">
                </label>
            </div>

            <div class="medium-2 columns">
                <label>Weight
                    <input name="category_weight" type="number" class="input-group-field" min="0" value="1">
                </label>
            </div>

            <div class="medium-2 columns">
                <div class="input-group-button">
                    <label>Done?
                        <button type="submit" class="success button">add</button>
                    </label>
                </div>
            </div>
        </div>

        {{ csrf_field() }}
    </form>
</fieldset>
