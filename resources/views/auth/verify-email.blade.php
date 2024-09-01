<x-app-layout>
      @slot('title', 'Verification Email')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Verification Email') }}
            (<span class="text-gray-500" {{ auth()->user()->email}}>
            </span>)
        </h2>
    </x-slot>
   <x-container>
    <div class="max-w-2xl bg-white shadow-sm rounded-lg p-6">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

       .
    </div>
    </div>
   </x-container>
</x-app-layout>
