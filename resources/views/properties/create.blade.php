<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('properties.store') }}" method="POST">
                @csrf

                <div class="mt-4">
                    <x-label for="zip_code" value="{{ __('CEP') }}" />
                    <x-input id="zip_code" class="block mt-1 w-full" type="text" name="zip_code"  :value="old('zip_code')" required maxlength='9' oninput="formatCEP(this)"/>
                    
                </div>

                <div class="mt-4">
                    <x-label for="street" value="{{ __('Rua') }}" />
                    <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />
                </div>

                <div class="mt-4">
                    <x-label for="number" value="{{ __('Número') }}" />
                    <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
                </div>

                <div class="mt-4">
                    <x-label for="complement" value="{{ __('Complemento') }}" />
                    <x-input id="complement" class="block mt-1 w-full" type="text" name="complement" :value="old('complement')" />
                </div>

                <div class="mt-4">
                    <x-label for="neighborhood" value="{{ __('Bairro') }}" />
                    <x-input id="neighborhood" class="block mt-1 w-full" type="text" name="neighborhood" :value="old('neighborhood')" required />
                </div>

                <div class="mt-4">
                    <x-label for="city" value="{{ __('Cidade') }}" />
                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
                </div>

                <div class="mt-4">
                    <x-label for="state" value="{{ __('Estado') }}" />
                    <x-input id="state" class="block mt-1 w-full" type="text" name="state" :value="old('state')" required />
                </div>

                <div class="mt-4">
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" >
                        <option value="Disponível">Disponível</option>
                        <option value="Alugado">Alugado</option>
                    </select>
                </div>

                <div class="mt-4">
                    <x-label for="customer_id" value="{{ __('Cliente') }}" />
                    <select name="customer_id" id="customer_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
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

{{-- <script>
    document.addEventListener('livewire:load', function () {
        let zip_codeInput = document.getElementById('zip_code');

        zip_codeInput.addEventListener('input', function() {
            let zip_code = this.value.replace(/\D/g, '');

            if (zip_code.length === 8) {
                fetch(`https://viacep.com.br/ws/${zip_code}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            @this.set('street', data.logradouro);
                            @this.set('neighborhood', data.bairro);
                            @this.set('city', data.localidade);
                            @this.set('state', data.uf);
                        } 
                    })
                    .catch(error => console.error('Erro ao buscar CEP:', error));
            }
        });
    });
</script> --}}

{{-- <script src="{{ asset('js/format-cep.js') }}"></script> --}}