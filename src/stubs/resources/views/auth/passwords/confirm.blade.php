@extends('layouts.auth')

@section('content')
    <div class="w-full max-w-xs">
        <form method="POST" action="{{ route('password.confirm') }}" class="bg-white shadow-lg rounded px-8 pt-8 pb-8 mb-4">
            @csrf

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('password'){{ $message }}@enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-sm py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Confirm Password') }}
                </button>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </form>
    </div>
@endsection
