<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('agents.update', $agent) }}" method="POST"> 
                @csrf
                @method('PUT')

                <div class="mt-4">
                    <x-label for="name" value="{{ __('Nome') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $agent->name)" required />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $agent->email)" required />
                </div>

                <div class="mt-4">
                    <x-label for="creci" value="{{ __('CRECI') }}" />
                    <x-input id="creci" class="block mt-1 w-full" type="text" name="creci" :value="old('creci', $agent->CRECI)" />
                </div>

                <div class="mt-4">
                    <x-label for="status" value="{{ __('Status') }}" />
                    <select name="status" id="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                        <option value="Ativo" {{ $agent->status === 'ativo' ? 'selected' : '' }}>Ativo</option>
                        <option value="Inativo" {{ $agent->status === 'inativo' ? 'selected' : '' }}>Inativo</option>
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