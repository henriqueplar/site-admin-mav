@php
    $headers = ['Nome', 'E-mail', 'CRECI', 'Status'];

    $open = 'https://google.com';
    $edit = 'https://google.com';
    $delete = 'https://google.com';
@endphp


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Corretores') }}
        </h2>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 shadow flex w-full p-3 justify-between bg -z-10">
        <div></div>
        <x-button>
            + Adicionar Corretor
        </x-button>
    </div>

    <x-table :headers="$headers">
        @if (count($agents) != 0)
            @foreach ($agents as $agent)
                <tr>
                    <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $agent->name }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $agent->email }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $agent->CRECI }}</td>
                    <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $agent->status }}</td>
                    <td class="flex gap-4 justify-center max-w-24">
                        <a href="{{ $edit }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#CA6924" class="size-5">
                                <path
                                    d="M13.488 2.513a1.75 1.75 0 0 0-2.475 0L6.75 6.774a2.75 2.75 0 0 0-.596.892l-.848 2.047a.75.75 0 0 0 .98.98l2.047-.848a2.75 2.75 0 0 0 .892-.596l4.261-4.262a1.75 1.75 0 0 0 0-2.474Z" />
                                <path
                                    d="M4.75 3.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h6.5c.69 0 1.25-.56 1.25-1.25V9A.75.75 0 0 1 14 9v2.25A2.75 2.75 0 0 1 11.25 14h-6.5A2.75 2.75 0 0 1 2 11.25v-6.5A2.75 2.75 0 0 1 4.75 2H7a.75.75 0 0 1 0 1.5H4.75Z" />
                            </svg>
                        </a>
                        <a href="{{ $delete }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="#F32013" class="size-5">
                                <path fill-rule="evenodd"
                                    d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z"
                                    clip-rule="evenodd" />
                            </svg>
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

</x-app-layout>
