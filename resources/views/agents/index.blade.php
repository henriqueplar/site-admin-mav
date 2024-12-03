@php
    $headers = ['Nome', 'E-mail', 'CRECI', 'Status'];
@endphp




<x-app-layout>
    <x-slot name="header">
        <nav aria-label="Breadcrumb">
            <ol class="flex items-center gap-1 text-sm text-gray-600">
                <li>
                    <a href="{{ route('dashboard') }}" class="block transition hover:text-gray-700">
                        <span class="sr-only"> Home </span>

                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="{{ route('agents.index') }}" class="block transition hover:text-gray-700"> Corretores </a>
                </li>
            </ol>
        </nav>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 shadow flex w-full p-3 justify-between bg -z-10">
        <div></div>


        <x-button data-modal-toggle="addAgentModal">
            + Adicionar Corretor
        </x-button>


        <div id="addAgentModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">


            <div class="relative p-4 w-full max-w-xl h-full md:h-auto">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex justify-between items-center p-4 rounded-t border-b dark:border-gray-600">
                            <h2 class="dark:text-white text-black text-xl font-bold">Novo Corretor</h2>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addAgentModal">

                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="">
                        @include('agents.create')
                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-table :headers="$headers">
        @if (count($agents) != 0)
            @foreach ($agents as $agent)
                <tr>
                    <td class="font-bold text-black">{{ $agent->name }}</td>
                    <td class="text-black">{{ $agent->email }}</td>
                    <td class="text-black">{{ $agent->CRECI }}</td>
                    <td class="text-black">{{ $agent->status }}</td>
                    <td class="text-black">
                        <a href="{{ route('agents.show', $agent) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 m-auto">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <span class="sr-only">Botão Detalhes</span>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="10" class="">Sem resultados disponíveis.</td>
            </tr>
        @endif
    </x-table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</x-app-layout>
