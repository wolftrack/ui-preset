@extends('layouts.auth')

@section('content')
    <div class="w-full max-w-xs">
        <form method="POST" action="{{ route('password.update') }}" class="bg-white shadow-lg rounded px-8 pt-8 pb-8 mb-4">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('email'){{ $message }}@enderror
            </div>

            <div class="mb-4">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
                @error('password'){{ $message }}@enderror
            </div>

            <div class="mb-4">
                <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection
