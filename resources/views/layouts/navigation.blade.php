<nav x-data="{ open: false }" class="flex bg-white border-b border-gray-100 h-16 justify-between items-center px-8">

    <div class="flex w-48">

        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <x-application-logo/>
        </a>

    </div>
    @if (Route::has('login'))
        @auth
            <a href="/leads" class="font-semibold text-gray-600 hover:text-gray-400 w-48">Лиды</a>
        @endauth
    @endif
    @if (Route::has('login'))

        @auth
            <a href="{{ url('/profile') }}"
               class="font-semibold text-gray-600 hover:text-gray-400 ">{{ Auth::user()->name }}</a>
        @else
            <div class="">
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-400">Вход</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-400">Регистрация</a>
                @endif
            </div>
        @endauth
    @endif
</nav>

@if (\Session::has('success'))
    <div id="successMessage"
         class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md absolute bottom-4 right-6">
        <div class="flex items-center justify-center w-12 bg-emerald-500">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"/>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-emerald-500">Успех!</span>
                <p class="text-sm text-gray-600">{!! \Session::get('success') !!}</p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function () {
            var successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.transition = 'opacity 0.5s ease';
                successMessage.style.opacity = '0';
                setTimeout(function () {
                    successMessage.remove();
                }, 500);
            }
        }, 3000);
    </script>
@endif
@if (\Session::has('error'))
    <div id="errorMessage"
         class="flex w-full max-w-sm overflow-hidden bg-white rounded-lg shadow-md absolute bottom-4 right-6">
        <div class="flex items-center justify-center w-12 bg-yellow-400">
            <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"/>
            </svg>
        </div>

        <div class="px-4 py-2 -mx-3">
            <div class="mx-3">
                <span class="font-semibold text-yellow-400">Ошибка</span>
                <p class="text-sm text-gray-600 ">
                    {!! \Session::get('error') !!}
                </p>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function () {
            var errorMessage = document.getElementById('errorMessage');
            if (errorMessage) {
                errorMessage.style.transition = 'opacity 0.5s ease';
                errorMessage.style.opacity = '0';
                setTimeout(function () {
                    errorMessage.remove();
                }, 500);
            }
        }, 3000);
    </script>
@endif
