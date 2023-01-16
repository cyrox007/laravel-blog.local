<header>
    <div class="container header">
        <a id="logo" href="{{ route('index') }}">TestApp</a>
        <nav>
            @if ($user == null)
                <a href="{{ route('login') }}">Sign In</a>
                <a href="http://">Sign Up</a>
            @else
                <a href="{{ route('login') }}">{{ $user }}</a>
                <a href="{{ route('logout') }}">Exit</a>
            @endif
        </nav>
    </div>
</header>