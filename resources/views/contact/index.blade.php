@extends('layouts.auth')

@section('page.title', 'Contact message')

@section('auth.content')
    <x-card>
        <x-card-header>
            <x-card-title>
                {{ __('Contact message') }}
            </x-card-title>
        </x-card-header>
        <x-card-body>
        @error('common_error')
            {{ $message }}
        @enderror
            <x-form action="{{ route('contact_process') }}" method="POST">
                <x-form-item>
                    <x-label required>{{ __('Email') }}</x-label>
                    <x-input type="email" name="email" class="form-control" autofocus />
                    @error('email')
                        {{ $message }}
                    @enderror
                </x-form-item>
                <x-form-item>
                    <x-label required>{{ __('Сообщение') }}</x-label>
                    <textarea type="text" name="text" class="form-control"></textarea>
                    @error('message')
                        {{ $message }}
                    @enderror
                </x-form-item>
                <x-button type="submit" color="success">
                    {{ __('Отправить') }}
                </x-button>
            </x-form>
        </x-card-body>
    </x-card>
@endsection