<x-app-layout>
    <div class="grow flex items-center">
        <div class="w-full max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-2xl">
            <div class="px-6 py-4">
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600">Добрый день!</h3>
                <div class="mt-1  flex items-center justify-center text-gray-500 gap-1">
                    <p class="text-center  flex ">Оставьте свою заявку

                    </p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"/>
                    </svg>
                </div>

                <form method="POST" enctype="multipart/form-data" action="{{route('leads.store')}}">
                    @csrf
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Имя" aria-label="Имя" name="name"/>
                    </div>
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Фамилия" aria-label="Фамилия" name="surname"/>
                    </div>
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Email" aria-label="Email" name="email" type="email"/>
                    </div>

                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Телефон" aria-label="Телефон" type="number" name="phone"/>
                    </div>
                    <div class="w-full mt-4 ">
                    <textarea
                        class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                        placeholder="Ваше сообщение" name="description"></textarea>
                    </div>
                    <button
                        class="px-6 mt-4 w-full py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
