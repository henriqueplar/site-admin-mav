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
                    <a href="{{ route('contracts.index') }}" class="block transition hover:text-gray-700"> Contratos
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
                    <a href="#" class="block transition hover:text-gray-700"> {{ $contract->id }} </a>
                </li>
            </ol>
        </nav>


        {{-- OPTIONS --}}
        <span class="inline-flex overflow-hidden rounded-md border bg-white shadow-sm">

            {{-- UPDATE --}}
            <div>
                <button onclick="updateContractModal.showModal()"
                    class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative" title="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                    </svg>
                </button>

                <dialog id="updateContractModal" class="modal">
                    <div class="modal-box bg-white">
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg text-black">Editar Contrato</h1>
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                            </form>
                        </div>
                        @include('contracts.edit')
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            </div>


            {{-- DELETE --}}
            <form action="{{ route('contracts.destroy', $contract) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja excluir este Corretor?');" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                    title="Excluir Contrato">
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
    <div class="card bg-white max-w-3xl shadow-xl mx-auto text-black mb-7">
        <div class="card-body">
            <div class="flex justify-between">
                <h2 class="card-title">{{ $contract->id }}</h2>
                {{-- <span class="whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm {{ $agent->status == 'Ativo' ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100' }}">
                    {{ $agent->status }}
                </span> --}}
            </div>

            <table class="table text-sm">
                <tr>
                    <td class="font-bold flex gap-2 items-center">Imóvel</td>
                    <td>
                        <a href="{{ route('properties.show', $contract->property) }}" class="flex gap-2 text-blue-700"
                            target="blank">
                            {{ $contract->property->street }}{{ ', ' }}
                            {{ $contract->property->number }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold flex gap-2 items-center">Corretor</td>
                    <td>
                        <a href="{{ route('agents.show', $contract->agent) }}" class="flex gap-2 text-blue-700"
                            target="blank">
                            {{ $contract->agent->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold flex gap-2 items-center">Cliente</td>
                    <td>
                        <a href="{{ route('customers.show', $contract->customer) }}" class="flex gap-2 text-blue-700"
                            target="blank">
                            {{ $contract->customer->name }}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                            </svg>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td class="font-bold flex gap-2 items-center">Data de Início</td>
                    <td>{{ strftime('%d/%m/%Y', strtotime($contract->start_date)) }}</td>
                </tr>

                <tr>
                    <td class="font-bold flex gap-2 items-center">Data de conclusão</td>
                    <td>{{ strftime('%d/%m/%Y', strtotime($contract->end_date)) }}</td>
                </tr>

                <tr>
                    <td class="font-bold flex gap-2 items-center">Valor Total</td>
                    <td>R${{ number_format($contract->amount, 2, ',', '.') }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- LINHAS DE CONTRATO --}}
    <div class="card bg-white max-w-3xl shadow-xl mx-auto text-black mb-7">
        <div class="card-body">
            {{-- TITLE --}}
            <div class="flex justify-between">
                <h2 class="font-bold flex gap-2 items-center">Linhas de Contrato</h2>

                {{-- MODAL --}}
                <div>
                    <x-button onclick="addLineModal.showModal()">+</x-button>

                    <dialog id="addLineModal" class="modal">
                        <div class="modal-box bg-white">
                            <div class="flex justify-between items-center">
                                <h1 class="text-lg text-black">Adicionar Linha</h1>
                                <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                                </form>
                            </div>
                            @include('contract-lines.create')
                        </div>
                        <form method="dialog" class="modal-backdrop">
                            <button>close</button>
                        </form>
                    </dialog>
                </div>

            </div>

            <table class="table">
                <thead>
                    <th>Tipo</th>
                    <th>Frequência</th>
                    <th>Valor</th>
                    <th class="text-right">Ações</th>
                </thead>
                <tbody>
                    @foreach ($contract->lines as $contractLine)
                        <tr>
                            <td>{{ $contractLine->type }}</td>
                            <td>{{ $contractLine->payment_frequency }}</td>
                            <td>
                                @if ($contractLine->value_type == 'Percentual')
                                    {{ $contractLine->percentage }}%
                                @else
                                    R${{ number_format($contractLine->value, 2, ',', '.') }}
                                @endif
                            </td>
                            <td class="flex justify-end w-clip">
                                {{-- UPDATE --}}
                                <div>
                                    <button onclick="updateLineModal{{ $contractLine->id }}.showModal()"
                                        class="inline-block border-e p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                        title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </button>

                                    <dialog id="updateLineModal{{ $contractLine->id }}" class="modal">
                                        <div class="modal-box bg-white">
                                            <div class="flex justify-between items-center">
                                                <h1 class="text-lg text-black">Editar Linha</h1>
                                                <form method="dialog">
                                                    <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                                                </form>
                                            </div>
                                            @include('contract-lines.create')
                                        </div>
                                        <form method="dialog" class="modal-backdrop">
                                            <button>close</button>
                                        </form>
                                    </dialog>
                                </div>


                                {{-- DELETE --}}
                                <form action="{{ route('contract-lines.destroy', $contractLine) }}" method="POST"
                                    onsubmit="return confirm('Tem certeza que deseja excluir esta Linha?');"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block p-3 text-gray-700 hover:bg-gray-50 focus:relative"
                                        title="Excluir Linha">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="red" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
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


    {{-- PARCELAS --}}
    <x-card type="show">
        <div class="flex justify-between">
            <h2 class="card-title">Parcelas</h2>

            <div>
                <x-button onclick="addInstallmentModal.showModal()">+</x-button>

                <dialog id="addInstallmentModal" class="modal">
                    <div class="modal-box bg-white">
                        <div class="flex justify-between items-center">
                            <h1 class="text-lg text-black">Adicionar Parcela</h1>
                            <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                            </form>
                        </div>
                        @include('Installments.create')
                    </div>
                    <form method="dialog" class="modal-backdrop">
                        <button>close</button>
                    </form>
                </dialog>
            </div>
        </div>

        @if (count($contract->installments) > 0)
            @include('installments.table', ['installments' => $contract->installments])
        @else
            <form action="{{ route('installments.generate', $contract) }}" method="POST">
                @csrf
                <x-button class="mt-4 w-full">Gerar Parcelas</x-button>
            </form>
        @endif
    </x-card>
</x-app-layout>
