<div class="max-w-md mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form 
                @isset($contractLine)
                    action="{{ route('contract-lines.update', $contractLine) }}" 
                @else
                    action="{{ route('contract-lines.store') }}" 
                @endisset
                method="POST">
                @csrf
                @isset($contractLine)
                    @method('PUT')
                @endisset

                <input type="hidden" name="contract_id" value="{{ $contract->id }}">

                <div class="mt-4">
                    <x-label for="type" value="{{ __('Tipo') }}" />
                    <select name="type" id="type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" onchange="toggleLineFields()">
                        <option value="Aluguel" @if(isset($contractLine) && $contractLine->type == 'Aluguel') selected @endif>Aluguel</option>
                        <option value="Taxa de Incêndio" @if(isset($contractLine) && $contractLine->type == 'Taxa de Incêndio') selected @endif>Taxa de Incêndio</option>
                        <option value="Condomínio" @if(isset($contractLine) && $contractLine->type == 'Condomínio') selected @endif>Condomínio</option>
                        <option value="IPTU" @if(isset($contractLine) && $contractLine->type == 'IPTU') selected @endif>IPTU</option>
                        <option value="Comissão" @if(isset($contractLine) && $contractLine->type == 'Comissão') selected @endif>Comissão</option>
                        <option value="Taxa Administrativa" @if(isset($contractLine) && $contractLine->type == 'Taxa Administrativa') selected @endif>Taxa Administrativa</option>
                        
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="value_type" value="{{ __('Tipo de Valor') }}" />
                    <select name="value_type" id="value_type" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" onchange="toggleLineFields()">
                        <option value="Valor Cheio" @if(isset($contractLine) && $contractLine->value_type == 'Valor Cheio') selected @endif>Valor Cheio</option>
                        <option value="Percentual" @if(isset($contractLine) && $contractLine->value_type == 'Percentual') selected @endif>Percentual</option>
                    </select>
                </div>

                <div class="mt-4" id="valueField" @if(isset($contractLine) && $contractLine->value_type == 'percentual') style="display: none;" @endif>
                    <x-label for="value" value="{{ __('Valor') }}" />
                    <x-input id="value" class="block mt-1 w-full" type="number" step="0.01" name="value" :value="old('value', $contractLine->value ?? '')" />
                </div>

                <div class="mt-4" id="percentageField" @if(isset($contractLine) && $contractLine->value_type == 'valor cheio') style="display: none;" @endif>
                    <x-label for="percentage" value="{{ __('Percentual') }}" />
                    <x-input id="percentage" class="block mt-1 w-full" type="number" step="0.01" name="percentage" :value="old('percentage', $contractLine->percentage ?? '')" />
                </div>

                <div class="mt-4" id="frequencyField">
                    <x-label for="payment_frequency" value="{{ __('Frequência') }}" />
                    <select name="payment_frequency" id="payment_frequency" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Mensal" @if(isset($contractLine) && $contractLine->payment_frequency == 'Mensal') selected @endif>Mensal</option>
                        <option value="Anual" @if(isset($contractLine) && $contractLine->payment_frequency == 'Anual') selected @endif>Anual</option>
                        
                    </select>
                </div>

                <div class="mt-4" id="installmentsField" @if(isset($contractLine) && $contractLine->type != 'IPTU') style="display: none;" @endif>
                    <x-label for="installments" value="{{ __('Parcelas (IPTU)') }}" />
                    <x-input id="installments" class="block mt-1 w-full" type="number" name="installments" :value="old('installments', $contractLine->installments ?? '1')" min="1" max="10"/>
                </div>

                <div class="flex items-center justify-end mt-4 text-center">
                    <x-button class="w-full">
                        @isset($contractLine)
                            {{ __('Atualizar') }}
                        @else
                            {{ __('Criar') }}
                        @endisset
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleLineFields() {
        const lineType = document.getElementById('type').value;
        const valueType = document.getElementById('value_type').value;

        const valueField = document.getElementById('valueField');
        const percentageField = document.getElementById('percentageField');
        const installmentsField = document.getElementById('installmentsField');
        const frequencyField = document.getElementById('frequencyField');

        valueField.style.display = valueType === 'Valor Cheio' ? 'block' : 'none';
        percentageField.style.display = valueType === 'Percentual' ? 'block' : 'none';
        installmentsField.style.display = lineType === 'IPTU' ? 'block' : 'none';
        frequencyField.style.display = valueType === 'Percentual' ? 'none' : 'block';
    }

    toggleLineFields(); 
</script>