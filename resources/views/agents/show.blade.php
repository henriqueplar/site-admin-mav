<x-app-layout>
    {{-- HEADER --}}
    <div class="flex w-full px-6 py-4 justify-between -z-10 items-center">

        {{-- BREADCRUMB --}}
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

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <a href="#" class="block transition hover:text-gray-700"> {{ $agent->name }} </a>
                </li>
            </ol>
        </nav>


        {{-- OPTIONS --}}
        <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">

            {{-- UPDATE --}}
            <div>
                <button onclick="updateAgentModal.showModal()"
                    class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>

                <x-modal2 id="updateAgentModal" title="Editar Corretor">
                    @include('agents.edit')
                </x-modal2>
            </div>


            {{-- DELETE --}}
            <form action="{{ route('agents.destroy', $agent) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir este Corretor?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                    title="Excluir Cliente">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="red" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </form>
        </span>
    </div>

    {{-- CARD --}}
    <x-card type='show'>
        <div class="flex justify-between">
            <h2 class="card-title">{{ $agent->name }}</h2>
            <span class="whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm {{ $agent->status == 'Ativo' ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }}">
                {{ $agent->status }}
            </span>
        </div>

        <table class="table text-sm">
            <tr>
                <td class="font-bold flex gap-2 items-center">CRECI</td>
                <td>{{ $agent->CRECI }}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3">
                        <path
                            d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                        <path
                            d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                    </svg>
                    <span>E-mail</span>
                </td>
                <td>{{ $agent->email }}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-3">
                        <path fill-rule="evenodd"
                            d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>Contato</span>
                </td>
                <td>{{ $agent->phone }}</td>
            </tr>
        </table>
    </x-card>

    {{-- CONTRACTS --}}
    @if (count($agent->contracts) > 0)
        <x-card type="show">
            <h2 class="card-title">Contratos Ativos</h2>
            
            @include('contracts.table', ['contracts' => $agent->contracts])
        </x-card>
    @endif

</x-app-layout>
