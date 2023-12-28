<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link {{ active_link('welcome') }}" aria-current="page" href="{{ route('welcome') }}">Home</a>
                <a class="nav-link {{ active_link('users.index') }}" href="{{ route('users.index') }}">Users</a>
                <a class="nav-link {{ active_link('events.index') }}" href="{{ route('events.index') }}">Events</a>
                <a class="nav-link {{ active_link('categories.index') }}" href="{{ route('categories.index') }}">Categories</a>
            </div>
        </div>
    </div>
</nav>