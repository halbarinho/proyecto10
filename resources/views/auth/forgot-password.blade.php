@extends('layout.template-dashboard')

@section('title', 'Forgot Password')

@section('content')

    <x-guest-layout>
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Si olvidaste tu password? No te preocupes. Proporcionanos tu dirección de emalil y recibirás en tu correo un link para que puedas establecer uno nuevo.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                    autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Enviar Email Restablecimiento') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

@endsection
