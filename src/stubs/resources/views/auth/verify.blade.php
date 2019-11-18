@extends('layouts.auth')

@section('content')
    <div class="w-full max-w-xs">
        <div class="bg-white shadow-lg rounded px-8 pt-8 pb-8 mb-4">
            <div class="mb-4">
                <p class="text-lg">{{ __('Verify Your Email Address') }}</p>
            </div>

            @if (session('resent'))
                <div role="alert" class="mb-4">
                    <p class="text-sm">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                </div>
            @endif

            <div class="mb-4">
                <p class="text-sm">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
            </div>

            <div>
                <p class="text-sm">{{ __('If you did not receive the email') }},
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="text-sm text-blue-500 hover:text-blue-700">{{ __('click here to request another') }}</button>.
                </form>
                </p>
            </div>
        </div>
    </div>
@endsection
