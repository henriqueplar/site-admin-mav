<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('contracts.update', $contract) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x-label for="property_id" value="{{ __('Imóvel') }}" />
                    <select name="property_id" id="property_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}" {{ $contract->property_id == $property->id ? 'selected' : '' }}>{{ "$property->street, $property->number" }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="customer_id" value="{{ __('Cliente') }}" />
                    <select name="customer_id" id="customer_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $contract->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="agent_id" value="{{ __('Agente') }}" />
                    <select name="agent_id" id="agent_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}" {{ $contract->agent_id == $agent->id ? 'selected' : '' }}>{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="start_date" value="{{ __('Data de Início') }}" />
                    <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date" :value="old('start_date', $contract->start_date)" required 
                        onchange="calcularDataTermino()"/>
                </div>

                <div class="mt-4">
                    <x-label for="end_date" value="{{ __('Data de Término') }}" />
                    <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date" :value="old('end_date', $contract->end_date)" required />
                </div>

                <script src="{{ asset('/js/calcularDataTermino.js') }}"></script>

                <div class="mt-4">
                    <x-label for="amount" value="{{ __('Valor') }}" />
                    <x-input id="amount" class="block mt-1 w-full" type="number" name="amount" :value="old('amount', $contract->amount)" required disabled/>
                </div>

                {{-- <div class="mt-4">
                    <x-label for="tipo" value="{{ __('Tipo') }}" />
                    <select name="tipo" id="tipo" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="venda" {{ $contract->tipo === 'venda' ? 'selected' : '' }}>Venda</option>
                        <option value="aluguel" {{ $contract->tipo === 'aluguel' ? 'selected' : '' }}>Aluguel</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="observacoes" value="{{ __('Observações') }}" />
                    <textarea id="observacoes" name="observacoes" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('observacoes', $contract->observacoes) }}</textarea>
                </div> --}}

                <div class="flex items-center justify-end mt-4 text-center">
                    <x-button class="w-full">
                        {{ __('Atualizar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>