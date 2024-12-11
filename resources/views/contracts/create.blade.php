    <div class="max-w-xl mx-auto">
        <div class="overflow-hidden">
            <div class="p-8">
                <form action="{{ route('contracts.store') }}" method="POST">
                    @csrf

                    <div class="mt-4">
                        <x-label for="property_id" value="{{ __('Imóvel') }}" />
                        <select name="property_id" id="property_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->address }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="customer_id" value="{{ __('Cliente') }}" />
                        <select name="customer_id" id="customer_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="agent_id" value="{{ __('Agente') }}" />
                        <select name="agent_id" id="agent_id"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            @foreach ($agents as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="data_inicio" value="{{ __('Data de Início') }}" />
                        <x-input id="data_inicio" class="block mt-1 w-full" type="date" name="data_inicio"
                            :value="old('data_inicio')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="data_termino" value="{{ __('Data de Término') }}" />
                        <x-input id="data_termino" class="block mt-1 w-full" type="date" name="data_termino"
                            :value="old('data_termino')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="valor" value="{{ __('Valor') }}" />
                        <x-input id="valor" class="block mt-1 w-full" type="number" step="0.01" name="valor"
                            :value="old('valor')" required />
                    </div>

                    <div class="mt-4">
                        <x-label for="tipo" value="{{ __('Tipo') }}" />
                        <select name="tipo" id="tipo"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="venda">Venda</option>
                            <option value="aluguel">Aluguel</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <x-label for="observacoes" value="{{ __('Observações') }}" />
                        <textarea id="observacoes" name="observacoes"
                            class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">{{ old('observacoes') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4 text-center">
                        <x-button class="w-full">
                            {{ __('Criar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
