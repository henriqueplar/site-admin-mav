<table class="table overflow-clip">
    <thead class="">
        <tr>
            <th>ID</th>
            <th>Imóvel</th>
            <th>Cliente</th>
            <th>Início</th>
            <th>Final</th>
            <th>Valor</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbod>
        @if (count($contracts) != 0)
            @foreach ($contracts as $contract)
                <tr>
                    <td class="font-bold text-black">{{ $contract->id }}</td>
                    <td class="font-bold text-black">{{ $contract->property->street }}, {{ $contract->property->number }}</td>
                    <td class="text-gray-500">{{ $contract->customer->name }}</td>
                    <td class="text-gray-500 no">{{ strftime('%d/%m/%Y', strtotime($contract->start_date)) }}</td>
                    <td class="text-gray-500">{{ strftime('%d/%m/%Y', strtotime($contract->end_date)) }}</td>
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