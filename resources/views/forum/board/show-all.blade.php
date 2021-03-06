@foreach($objCategories as $objCategory)
    <div class="category">
        <div class="category-name">
            <div class="row">
                <div class="small-12 columns">
                    <h5>{!! $objCategory->icon ? '<span class="fi-'.$objCategory->icon.'"></span>' : '' !!} {{ $objCategory->name }}</h5>
                </div>
            </div>
        </div>

        @foreach($objCatBoards[$objCategory->id] as $objThisBoard)
            <div class="board">
                <div class="row">
                    <div class="small-6 columns board-title">
                        <a href="{{ route('forum.board.show', ['strBoardSlug' => $objThisBoard['objBoard']->slug]) }}" title="{{ $objThisBoard['objBoard']->description }}">{{ $objThisBoard['objBoard']->name }}</a> <span class="board-description show-for-medium">{{ $objThisBoard['objBoard']->description }}</span>
                    </div>

                    <div class="small-3 columns board-stats">
                        <b>{{ $objThisBoard['iTotalReplies'] }}</b> post{{ $objThisBoard['iTotalReplies'] == 1 ? '' : 's' }} / <b>{{ $objThisBoard['iTotalThreads'] }}</b> thread{{ $objThisBoard['iTotalThreads'] == 1 ? '' : 's' }}
                    </div>

                    <div class="small-3 columns board-activity">
                        @if($objThisBoard['iTotalReplies'] == 0)
                            --
                        @else
                            <a href="#">{{ $objThisBoard['arrLastReply']['thread_title'] }}</a> @ 7:14pm <a href="#"><span class="fi-arrow-right go-newest-post"></span></a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endforeach
