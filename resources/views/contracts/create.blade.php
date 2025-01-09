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
                                <option value="{{ $property->id }}">{{ "$property->street, $property->number" }}</option>
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
                        <x-label for="start_date" value="{{ __('Data de Início') }}" />
                        <x-input id="start_date" class="block mt-1 w-full" type="date" name="start_date"
                            :value="old('start_date')" required onchange="calcularDataTermino()"/>
                    </div>

                    <div class="mt-4">
                        <x-label for="end_date" value="{{ __('Data de Término') }}" />
                        <x-input id="end_date" class="block mt-1 w-full" type="date" name="end_date"
                            :value="old('end_date')" required />
                    </div>

                    <script src="{{ asset('/js/calcularDataTermino.js') }}"></script>

                    <div class="mt-4">
                        <x-label for="valor" value="{{ __('Valor') }}" />
                        <x-input id="valor" class="block mt-1 w-full" type="number" step="0.01" name="valor"
                            :value="old('valor', 0.0)" required disabled/>
                    </div>

                    {{-- <div class="mt-4">
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
                    </div> --}}

                    <div class="flex items-center justify-end mt-4 text-center">
                        <x-button class="w-full">
                            {{ __('Criar') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
