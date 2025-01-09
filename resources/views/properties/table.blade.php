<table class="table overflow-clip">
    <thead class="">
        <tr>
            <th>Endereço</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbod>
        @if (count($properties) != 0)
            @foreach ($properties as $property)
                <tr>
                    <td class="font-bold text-black">{{ "$property->street, $property->number $property->complement - $property->neighborhood" }}</td>
                    <td class="text-gray-500">{{ $property->customer->name }}</td>
                    <td>
                        <span
                            class="whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm {{ $property->status == 'Disponível' ? 'text-green-700 bg-green-100' : ($property->status == 'Alugado' ? 'text-orange-700 bg-orange-100' : 'text-red-700 bg-red-100') }}">
                            {{ $property->status }}
                        </span>
                    </td>
                    <td class="text-gray-500">
                        <a href="{{ route('properties.show', $property) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="size-6 m-auto hover:bg-gray-300 rounded-lg">
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
