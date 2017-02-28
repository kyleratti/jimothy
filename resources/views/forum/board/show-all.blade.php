@foreach($objCategories as $objCategory)
    <div class="category">
        <div class="category-name">
            <h5>{{ $objCategory->name }}</h5>
        </div>

        @foreach($objCatBoards[$objCategory->id] as $objThisBoard)
            <div class="board">
                <div class="row">
                    <div class="medium-6 columns">
                        <a href="{{ route('forum.board.show', ['iBoardID' => $objThisBoard->id]) }}">{{ $objThisBoard->name }}</a>
                    </div>

                    <div class="medium-3 columns board-stats">
                        no board stats
                    </div>

                    <div class="medium-3 columns board-activity">
                        no recent actitiy
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
