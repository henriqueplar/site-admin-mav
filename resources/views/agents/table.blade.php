<table class="table overflow-clip">
    <thead class="">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Contato</th>
            <th>CRECI</th>
            <th>Status</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        @if (count($agents) != 0)
            @foreach ($agents as $agent)
                <tr>
                    <td class="font-bold text-black">{{ $agent->name }}</td>
                    <td class="text-gray-500">{{ $agent->email }}</td>
                    <td class="text-gray-500">{{ $agent->phone }}</td>
                    <td class="text-gray-500">{{ $agent->CRECI }}</td>
                    <td>
                        <span class="whitespace-nowrap rounded-full  px-2.5 py-0.5 text-sm {{$agent->status == 'Ativo' ? 'text-green-700 bg-green-100' : 'text-gray-700 bg-gray-100';}}">
                            {{ $agent->status }}
                        </span>
                    </td>
                    <td class="text-gray-500">
                        <a href="{{ route('agents.show', $agent) }}">
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