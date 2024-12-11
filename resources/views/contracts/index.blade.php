@php
    $headers = ['ID','Imóvel', 'Cliente', 'Agente', 'Valor'];
@endphp

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
            </ol>
        </nav>


        {{-- NEW CUSTOMER BUTTON --}}
        <div>
            <x-button onclick="addcontractModal.showModal()">+ Adicionar Contrato</x-button>


            {{-- MODAL --}}
            <dialog id="addcontractModal" class="modal">
                <div class="modal-box bg-white">
                    <div class="flex justify-between items-center">
                        <h1 class="text-lg text-black">Adicionar Contrato</h1>
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost">✕</button>
                        </form>
                    </div>
                    @include('contracts.create')
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
            </dialog>
        </div>
    </div>

    {{-- DATA --}}
    <div class="card bg-white shadow-xl mx-6 mb-7">
        <div class="card-body overflow-x-auto">
            <table class="table overflow-clip">
                <thead class="">
                    <tr>
                        @foreach ($headers as $header)
                            <th class="">{{ $header }}</th>
                        @endforeach
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbod>
                    @if (count($contracts) != 0)
                        @foreach ($contracts as $contract)
                            <tr>
                                <td class="font-bold text-black">{{ $contract->id }}</td>
                                <td class="font-bold text-black">{{ $contract->property->address }}</td>
                                <td class="text-gray-500">{{ $contract->customer->name }}</td>
                                <td class="text-gray-500">{{ $contract->agent->name }}</td>
                                <td class="text-gray-500">R${{ number_format($contract->amount, 2, ',', '.') }}</td>
                                <td class="text-gray-500">
                                    <a href="{{ route('contracts.show', $contract) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="size-6 m-auto hover:bg-gray-300 rounded-lg">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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
                    </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
