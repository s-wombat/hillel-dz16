<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav me-auto">
                <a class="nav-link {{ active_link('welcome') }}" aria-current="page" href="{{ route('welcome') }}">{{ __('Home') }}</a>
                @auth('web')
                <a class="nav-link {{ active_link('users.index') }}" href="{{ route('users.index') }}">{{ __('Users') }}</a>
                <a class="nav-link {{ active_link('events.index') }}" href="{{ route('events.index') }}">{{ __('Events') }}</a>
                <a class="nav-link {{ active_link('categories.index') }}" href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                @endauth
            </div>
            <div class="navbar-nav ms-auto">
                @guest('web')
                <a class="nav-link {{ active_link('login') }}" href="{{ route('login.index') }}">{{ __('Login') }}</a>
                <a class="nav-link {{ active_link('register') }}" href="{{ route('register.index') }}">{{ __('Register') }}</a>
                @endguest
                @auth('web')
                <a class="nav-link {{ active_link('logout') }}" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                @endauth
            </div>
        </div>
    </div>
</nav>