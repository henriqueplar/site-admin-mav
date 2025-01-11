<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('installment-lines.store') }}" method="POST">
                @csrf

                <div class="mt-4" hidden>
                    <x-label for="installment_id" value="{{ __('Parcela') }}" />
                    <select name="installment_id" id="installment_id"
                        class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                            <option value="{{ $installment->id }}">{{ $installment->id }}
                            </option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="description" value="{{ __('Descrição') }}" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')"/>
                </div>

                <div class="mt-4">
                    <x-label for="value" value="{{ __('Valor') }}" />
                    <x-input id="value" class="block mt-1 w-full" type="number" step="0.01" name="value"
                        :value="old('value')" required />
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
