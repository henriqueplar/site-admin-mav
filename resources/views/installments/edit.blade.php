<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('installments.update', $installment) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x-label for="contract_id" value="{{ __('Contrato') }}" />
                    <select name="contract_id" id="contract_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract->id }}" {{ $installment->contract_id == $contract->id ? 'selected' : '' }}>{{ $contract->id }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="number" value="{{ __('Número') }}" />
                    <x-input id="number" class="block mt-1 w-full" type="number" name="number" :value="old('number', $installment->number)" required />
                </div>

                <div class="mt-4">
                    <x-label for="dueDate" value="{{ __('Data de Vencimento') }}" />
                    <x-input id="dueDate" class="block mt-1 w-full" type="date" name="dueDate" :value="old('dueDate', $installment->dueDate)" required />
                </div>

                <div class="mt-4">
                    <x-label for="amount" value="{{ __('Valor') }}" />
                    <x-input id="amount" class="block mt-1 w-full" type="number" step="0.01" name="amount" :value="old('amount', $installment->amount)" required />
                </div>

                <div class="mt-4">
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Pago" {{ $installment->status === 'Pago' ? 'selected' : '' }}>Pago</option>
                        <option value="Pendente" {{ $installment->status === 'Pendente' ? 'selected' : '' }}>Pendente</option>
                        <option value="Atrasado" {{ $installment->status === 'Atrasado' ? 'selected' : '' }}>Atrasado</option>
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4 text-center">
                    <x-button class="w-full">
                        {{ __('Atualizar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
