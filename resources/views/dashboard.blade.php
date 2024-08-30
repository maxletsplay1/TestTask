<x-app-layout>
    <div class="w-full">
        <div class="flex flex-row gap-2 -mb-4 mx-6 mt-4 justify-between items-center">
            <p class="text-gray-800 text-xl font-medium">Лиды</p>
            <div class="">
                <span
                    class="bg-gray-700 text-gray-200 text-md font-medium me-2 px-2.5 py-0.5 rounded-full">Всего: {{$leads->count()}}</span>
                <span
                    class="bg-blue-100 text-blue-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full">Новых: {{$leads->where('status.id', 1)->count()}}</span>
                <span
                    class="bg-yellow-100 text-yellow-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full">В работе: {{$leads->where('status.id', 2)->count()}}</span>
                <span
                    class="bg-green-100 text-green-800 text-md font-medium me-2 px-2.5 py-0.5 rounded-full">Завершенных: {{$leads->where('status.id', 3)->count()}}</span>
            </div>
        </div>
        <section class="px-6 w-full">
            <div class="flex flex-col mt-6">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                        <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="py-3.5 pl-4 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        <div class="flex items-center gap-x-3">
                                            <span>Id</span>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Имя, фамилия
                                    </th>
                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Email
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Номер телефона
                                    </th>


                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Статус
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Дата создания
                                    </th>
                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500">
                                        Действия
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($leads as $lead)
                                    <tr>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap flex gap-1">
                                            <h2 class="font-normal text-gray-800">{{$lead->id}}</h2>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{$lead->name}}
                                            {{$lead->surname}}
                                        </td>
                                        <td class="px-12 py-4 text-sm font-normal text-gray-700 whitespace-nowrap">
                                            {{$lead->email}}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">{{$lead->phone}}
                                        </td>
                                        @if($lead->status->id === 1)
                                            <td class="px-4 py-4 text-sm text-blue-400 whitespace-nowrap flex items-center "
                                                @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}">
                                                <div x-data="{ isOpen{{$lead->id}}: false }"
                                                     class="relative inline-block">
                                                    <!-- Dropdown toggle button -->
                                                    <button @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}"
                                                    >
                                                        {{$lead->status->name}}
                                                    </button>
                                                    <div x-show="isOpen{{$lead->id}}"
                                                         @click.away="isOpen{{$lead->id}} = false"
                                                         x-transition:enter="transition ease-out duration-100"
                                                         x-transition:enter-start="opacity-0 scale-90"
                                                         x-transition:enter-end="opacity-100 scale-100"
                                                         x-transition:leave="transition ease-in duration-100"
                                                         x-transition:leave-start="opacity-100 scale-100"
                                                         x-transition:leave-end="opacity-0 scale-90"
                                                         class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl">

                                                        <form method="POST" class="px-2 flex flex-col gap-2"
                                                              action="/updateLeadStatus/{{$lead->id}}">
                                                            @csrf
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="1">
                                                                <p class="text-blue-400">Новый</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="2">
                                                                <p class="text-yellow-400">В работе</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="3">
                                                                <p class="text-green-500">Завершен</p>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @elseif($lead->status->id === 2)
                                            <td class="px-4 py-4 text-sm text-yellow-400 whitespace-nowrap flex items-center "
                                                @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}">
                                                <div x-data="{ isOpen{{$lead->id}}: false }"
                                                     class="relative inline-block">
                                                    <!-- Dropdown toggle button -->
                                                    <button @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}"
                                                    >
                                                        {{$lead->status->name}}
                                                    </button>
                                                    <div x-show="isOpen{{$lead->id}}"
                                                         @click.away="isOpen{{$lead->id}} = false"
                                                         x-transition:enter="transition ease-out duration-100"
                                                         x-transition:enter-start="opacity-0 scale-90"
                                                         x-transition:enter-end="opacity-100 scale-100"
                                                         x-transition:leave="transition ease-in duration-100"
                                                         x-transition:leave-start="opacity-100 scale-100"
                                                         x-transition:leave-end="opacity-0 scale-90"
                                                         class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl">

                                                        <form method="POST" class="px-2 flex flex-col gap-2"
                                                              action="/updateLeadStatus/{{$lead->id}}">
                                                            @csrf
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="1">
                                                                <p class="text-blue-400">Новый</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="2">
                                                                <p class="text-yellow-400">В работе</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="3">
                                                                <p class="text-green-500">Завершен</p>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @else
                                            <td class="px-4 py-4 text-sm text-green-500 whitespace-nowrap flex items-center "
                                                @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}">
                                                <div x-data="{ isOpen{{$lead->id}}: false }"
                                                     class="relative inline-block">
                                                    <!-- Dropdown toggle button -->
                                                    <button @click="isOpen{{$lead->id}} = !isOpen{{$lead->id}}"
                                                    >
                                                        {{$lead->status->name}}
                                                    </button>
                                                    <div x-show="isOpen{{$lead->id}}"
                                                         @click.away="isOpen{{$lead->id}} = false"
                                                         x-transition:enter="transition ease-out duration-100"
                                                         x-transition:enter-start="opacity-0 scale-90"
                                                         x-transition:enter-end="opacity-100 scale-100"
                                                         x-transition:leave="transition ease-in duration-100"
                                                         x-transition:leave-start="opacity-100 scale-100"
                                                         x-transition:leave-end="opacity-0 scale-90"
                                                         class="absolute right-0 z-20 w-48 py-2 mt-2 origin-top-right bg-white rounded-md shadow-xl">

                                                        <form method="POST" class="px-2 flex flex-col gap-2"
                                                              action="/updateLeadStatus/{{$lead->id}}">
                                                            @csrf
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="1">
                                                                <p class="text-blue-400">Новый</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="2">
                                                                <p class="text-yellow-400">В работе</p>
                                                            </button>
                                                            <button
                                                                class="w-full flex items-start bg-gray-100 hover:bg-gray-50 rounded pl-2"
                                                                type="submit" name="status" value="3">
                                                                <p class="text-green-500">Завершен</p>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">{{$lead->created_at}}
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap flex flex-row gap-4">
                                            <a href="{{route('leads.edit', $lead->id)}}">
                                                <button class="hover:text-blue-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
                                                    </svg>
                                                </button>
                                            </a>
                                            <form method="POST" action="{{ route('leads.destroy', $lead->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="hover:text-red-400">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke-width="1.5" stroke="currentColor" class="size-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
