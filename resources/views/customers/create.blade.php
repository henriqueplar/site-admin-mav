<div class="max-w-xl mx-auto">
    <div class="overflow-hidden">
        <div class="p-8">
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf

                <div>
                    <x-label for="document" value="{{ __('Tipo de Cliente') }}" />
                    <fieldset class="flex justify-between w-full mt-1">
                        <legend class="sr-only">Tipo de Cliente</legend>

                        <div class="w-[48%]">
                            <label for="pessoa-fisica"
                                class="flex cursor-pointer items-center justify-center rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 has-[:checked]:border-green-500 has-[:checked]:bg-green-700 has-[:checked]:text-white">
                                <input type="radio" name="type" value="Pessoa Física" class="sr-only"
                                    id="pessoa-fisica" required />
                                <p class="text-sm font-medium">Pessoa Física</p>
                            </label>
                        </div>

                        <div class="w-[48%]">
                            <label for="pessoa-juridica"
                                class="flex cursor-pointer items-center justify-center rounded-md border border-gray-300 bg-white px-3 py-2 text-gray-900 hover:border-gray-200 has-[:checked]:border-green-500 has-[:checked]:bg-green-700 has-[:checked]:text-white">
                                <input type="radio" name="type" value="Pessoa Jurídica" class="sr-only"
                                    id="pessoa-juridica" />
                                <p class="text-sm font-medium">Pessoa Jurídica</p>
                            </label>
                        </div>
                    </fieldset>
                </div>

                <div class="mt-4">
                    <x-label for="document" value="{{ __('Documento') }}" />
                    <x-input id="document" class="block mt-1 w-full" type="text" name="document" :value="old('document')"
                        required autofocus oninput="formatDocument(this)" maxlength="15" />
                    <script src="{{ asset('js/format-document.js') }}"></script>
                </div>



                <div class="mt-4">
                    <x-label for="name" value="{{ __('Nome') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required />
                </div>

                <div class="mt-4">
                    <x-label for="birth" value="{{ __('Data de Nascimento') }}" />
                    <x-input id="birth" class="block mt-1 w-full" type="date" name="birth" :value="old('birth')" required/>
                </div>

                <div class="mt-4">
                    <x-label for="phone" value="{{ __('Telefone') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')"
                        required maxlength="15" oninput="formatPhone(this)" />
                    <script src="{{ asset('js/format-phone.js') }}"></script>
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <div class="flex items-center justify-end mt-4 text-center">
                    <x-button class="w-full">
                        {{ __('Criar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/format-phone.js') }}"></script>
    <script src="{{ asset('/js/birthField.js') }}"></script>
</div>
