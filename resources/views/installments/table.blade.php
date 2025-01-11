<table class="table overflow-clip">
    <thead class="">
        <tr>
            <th>ID</th>
            <th>Contrato</th>
            <th>Valor</th>
            <th>Data de Vencimento</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbod>
        @if (count($installments) != 0)
            @foreach ($installments as $installment)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th class="font-bold text-black">
                        {{ $installment->id }}
                    </th>
                    <td class="text-gray-500">
                        <a
                            href="{{ route('contracts.show', $installment->contract) }}">{{ $installment->contract->id }}</a>
                    </td>
                    <td class="text-gray-500">
                        R$ {{ number_format($installment->amount, 2, ',', '.') }}
                    </td>
                    <td class="text-gray-500">
                        {{ strftime('%d/%m/%Y', strtotime($installment->dueDate)) }}
                    </td>
                    <td class="text-gray-500">
                        @php
                            $label = '';
                            $status = $installment->status;

                            if ($status == 'Pendente') {
                                $label =
                                    "<span class='whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm text-yellow-700 bg-yellow-100'>$status</span>";
                            } elseif ($status == 'Não Habilitada') {
                                $label =
                                    "<span class='whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm text-gray-700 bg-gray-100'>$status</span>";
                            } elseif ($status == 'Vencida') {
                                $label =
                                    "<span class='whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm text-red-700 bg-red-100'>$status</span>";
                            } elseif ($status == 'Paga') {
                                $label =
                                    "<span class='whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm text-green-700 bg-green-100'>$status</span>";
                            }

                            echo $label;
                        @endphp
                    </td>
                    <td class="text-gray-500">
                        <a href="{{ route('installments.show', $installment) }}">
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
