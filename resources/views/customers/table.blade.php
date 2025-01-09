<table class="table overflow-clip">
    <thead class="">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Contato</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbod>
        @if (count($customers) != 0)
            @foreach ($customers as $customer)
                <tr>
                    <td class="font-bold text-black">{{ $customer->name }}</td>
                    <td class="text-gray-500">{{ $customer->email }}</td>
                    <td class="text-gray-500">{{ $customer->phone }}</td>
                    <td class="text-gray-500">
                        <a href="{{ route('customers.show', $customer) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 m-auto hover:bg-gray-300 rounded-lg">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
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