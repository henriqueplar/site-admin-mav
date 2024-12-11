<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <div class="pb-4">
                <h2 class="dark:text-white text-black text-xl font-bold">Editar Imóvel</h2>
            </div>
            <form action="{{ route('properties.update', $property) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x-label for="address" value="{{ __('Endereço') }}" />
                    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $property->address)" required />
                </div>

                <div class="mt-4">
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Disponível" {{ $property->status === 'Disponível' ? 'selected' : '' }}>Disponível</option>
                        {{-- <option value="Vendido" {{ $property->status === 'Vendido' ? 'selected' : '' }}>Vendido</option> --}}   
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