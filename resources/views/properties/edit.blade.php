<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('properties.update', $property) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="mt-4">
                    <x-label for="zip_code" value="{{ __('CEP') }}" />
                    <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code" :value="old('zip_code', $property->zip_code)" required maxlength="9" {{-- oninput="formatCEP(this)" --}} />
                </div>

                <div class="mt-4">
                    <x-label for="street" value="{{ __('Rua') }}" />
                    <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street', $property->street)" required />
                </div>

                <div class="mt-4">
                    <x-label for="number" value="{{ __('Número') }}" />
                    <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number', $property->number)" required />
                </div>

                <div class="mt-4">
                    <x-label for="complement" value="{{ __('Complemento') }}" />
                    <x-input id="complement" class="block mt-1 w-full" type="text" name="complement" :value="old('complement', $property->complement)" />
                </div>

                <div class="mt-4">
                    <x-label for="neighborhood" value="{{ __('Bairro') }}" />
                    <x-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood" :value="old('neighborhood', $property->neighborhood)" required />
                </div>

                <div class="mt-4">
                    <x-label for="city" value="{{ __('Cidade') }}" />
                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city', $property->city)" required />
                </div>

                <div class="mt-4">
                    <x-label for="state" value="{{ __('Estado') }}" />
                    <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state', $property->state)" required />
                </div>

                <div class="mt-4">
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Disponível" {{ $property->status === 'Disponível' ? 'selected' : '' }}>Disponível</option>
                        <option value="Alugado" {{ $property->status === 'Alugado' ? 'selected' : '' }}>Alugado</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="customer_id" value="{{ __('Cliente') }}" />
                    <select name="customer_id" id="customer_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $property->customer_id === $customer->id ? 'selected' : '' }}>{{ $customer->name }}</option>
                        @endforeach
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

{{-- <script src="{{ asset('js/format-cep.js') }}"></script> --}}