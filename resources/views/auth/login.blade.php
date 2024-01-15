@extends('layouts.auth')

@section('page.title', 'Страница входа')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Вход') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('authenticate') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" class="form-control" autofocus />
                    @error('email')
                        {{ $message }}
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Пароль') }}</x-label>
                    <x-input type="password" name="password" class="form-control" />
                    @error('password')
                        {{ $message }}
                    @enderror
                </x-form-item>

                <x-button type="submit" color="success">
                    {{ __('Войти') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection