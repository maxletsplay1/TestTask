<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
        <div>
            <p class="text-md mt-2 text-gray-800">
                {{ __('Your email address is unverified.') }}

                <button form="send-verification"
                        class="underline text-md text-gray-600 hover:text-gray-900">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if (session('status') === 'verification-link-sent')
                <p class="mt-2 font-medium text-md text-green-600">
                    {{ __('A new verification link has been sent to your email address.') }}
                </p>
            @endif
        </div>
    @else
        <p class="text-md mt-2 text-green-600">
            Ваш адрес электронной почты подтверждён.
        </p>
    @endif
</section>
