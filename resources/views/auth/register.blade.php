@extends('layouts.auth')

@section('page.title', 'Регистрация')

@section('auth.content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Регистрация') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
            <x-form action="{{ route('register.store') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Имя') }}</x-label>
                    <x-input type="name" name="name" class="form-control" autofocus />
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" class="form-control" autofocus />
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Пароль') }}</x-label>
                    <x-input type="password" name="password" class="form-control" />
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Пароль ещё раз') }}</x-label>
                    <x-input type="password" name="password_confirmation" class="form-control" />
                </x-form-item>

                <x-button type="submit" color="success">
                    {{ __('Войти') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection