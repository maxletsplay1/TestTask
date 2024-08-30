<x-app-layout>
    <div class="grow flex items-center">
        <div class="w-full max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-2xl">
            <div class="px-6 py-4">
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600">Редактирование заявки №{{$lead->id}}</h3>
                <form method="POST" enctype="multipart/form-data" action="{{route('leads.update', $lead->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Имя" aria-label="Имя" name="name" value="{{$lead->name}}"/>
                    </div>
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Фамилия" aria-label="Фамилия" name="surname" value="{{$lead->surname}}"/>
                    </div>
                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Email" aria-label="Email" name="email" type="email" value="{{$lead->email}}"/>
                    </div>

                    <div class="w-full mt-4 ">
                        <input
                            required class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                            placeholder="Телефон" aria-label="Телефон" name="phone"
                            value="{{$lead->phone}}"/>
                    </div>
                    <div class="w-full mt-4 ">
                    <textarea
                        class="w-full px-4 py-2 mt-2 rounded-md border-gray-300"
                        placeholder="Ваше сообщение" name="description">{{$lead->description}}</textarea>
                    </div>
                    <button id="submit-button" disabled
                            class="px-6 mt-4 w-full py-2 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 disabled:bg-blue-200 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                        Отправить
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll('input, textarea');
        const submitButton = document.getElementById('submit-button');

        inputs.forEach(input => {
            input.addEventListener('input', () => {
                let allFilled = true;

                inputs.forEach(input => {
                    if (input.value === '') {
                        allFilled = false;
                    }
                });

                submitButton.disabled = !allFilled;
            });
        });
    </script>
</x-app-layout>
