<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('installments.store') }}" method="POST">
                @csrf

                <div class="mt-4">
                    <x-label for="contract_id" value="{{ __('Contrato') }}" />
                    <select name="contract_id" id="contract_id"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @if (request()->routeIs('contracts.show'))
                            <option value="{{ $contract->id }}">{{ $contract->id }} - {{ $contract->customer->name }}
                            </option>
                        @else
                            @foreach ($contracts as $contract)
                                <option value="{{ $contract->id }}">{{ $contract->id }} -
                                    {{ $contract->customer->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                {{-- <div class="mt-4">
                    <x-label for="number" value="{{ __('Número') }}" />
                    <x-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number')" required />
                </div> --}}

                <div class="mt-4">
                    <x-label for="dueDate" value="{{ __('Data de Vencimento') }}" />
                    <x-input id="dueDate" class="block mt-1 w-full" type="date" name="dueDate" :value="old('dueDate')"
                        required />
                </div>

                <div class="mt-4">
                    <x-label for="amount" value="{{ __('Valor') }}" />
                    <x-input id="amount" class="block mt-1 w-full" type="number" step="0.01" name="amount"
                        :value="old('amount')" required />
                </div>

                <div class="mt-4" hidden>
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Não Habilitada" selected>Não Habilitada</option>
                        <option value="Pago">Pago</option>
                        <option value="Pendente">Pendente</option>
                    </select>
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
