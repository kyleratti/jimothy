<ul class="header-subnav">
    <li><a href="{{ route('forum.index') }}">Forum</a></li>
    <li><a href="{{ route('game.servers') }}">Servers</a></li>
    @if(Auth::check())
        <li><a href="{{ route('game.bans') }}">Bans</a></li>
        <li><a href="{{ route('game.top-players') }}">Top Players</a></li>
        @if(Auth::user()->level <= 3)
            <li><a href="{{ route('game.admin.logs') }}">Logs</a></li>
        @endif
        @if(Auth::user()->level <= 1)
            <li><a href="{{ route('forum.admin') }}">Admin</a></li>
        @endif
        <li><a href="{{ route('forum.user.logout') }}">Logout</a></li>
    @else
        <li><a href="{{ route('forum.user.login') }}">Sign in</a></li>
    @endif
</ul>
