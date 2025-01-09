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
                    <a href="{{ route('properties.index') }}" class="block transition hover:text-gray-700"> Imóveis </a>
                </li>

                <li class="rtl:rotate-180">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </li>

                <li>
                    <span class="block transition"> {{ $property->address }} </span>
                </li>
            </ol>
        </nav>


        {{-- OPTIONS --}}
        <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">

            {{-- UPDATE --}}
            <div>
                <button onclick="updatePropertyModal.showModal()"
                    class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>

                <x-modal2 id="updatePropertyModal" title="Atualizar Imóvel">
                    @include('properties.edit')
                </x-modal2>
            </div>


            {{-- DELETE --}}
            <form action="{{ route('properties.destroy', $property) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir este imóvel?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                    title="Excluir Imóvel">
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
    <x-card type="show">
        <div class="flex justify-between">
            <h2 class="card-title">{{ "$property->street, $property->number $property->complement - $property->neighborhood" }}</h2>
            <span
                class="whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm {{ $property->status == 'Disponível' ? 'text-green-700 bg-green-100' : ($property->status == 'Alugado' ? 'text-orange-700 bg-orange-100' : 'text-red-700 bg-red-100') }}">
                {{ $property->status }}
            </span>
        </div>

        <table class="table text-sm">
            <tr>
                <td class="font-bold flex gap-2 items-center">Código</td>
                <td>{{$property->id}}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">Logradouro</td>
                <td>{{$property->street}}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">Número</td>
                <td>{{$property->number}}</td>
            </tr>

            @if ($property->complement)
            <tr>
                <td class="font-bold flex gap-2 items-center">Complemento</td>
                <td>{{$property->complement}}</td>
            </tr>
            @endif

            <tr>
                <td class="font-bold flex gap-2 items-center">Bairro</td>
                <td>{{$property->neighborhood}}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">Cidade/UF</td>
                <td>{{"$property->city/$property->state"}}</td>
            </tr>

            <tr>
                <td class="font-bold flex gap-2 items-center">Cliente</td>
                <td>
                    <a href="{{ route('customers.show', $property->customer) }}" class="flex gap-2 text-blue-700"
                        target="blank">
                        {{ $property->customer->name }}
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                </td>
            </tr>
        </table>
    </x-card>
 
    {{-- CONTRACTS --}}
    @if (count($property->contracts) > 0)
        <x-card type="show">
            <h2 class="card-title">Contratos Ativos</h2>
            
            @include('contracts.table', ['contracts' => $property->contracts])
        </x-card>
    @endif


</x-app-layout>
