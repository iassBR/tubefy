<div class=" sm:px-0 mb-2">
    <h3 class="text-lg font-extrabold leading-6 text-gray-900">DADOS CADASTRAIS</h3>

</div>

<form method="POST" action="#">
    @csrf


    {{-- Dados Pessoais --}}
    <div class="grid grid-cols-12 gap-4">

        <div class=" sm:px-0 mt-2 -mb-4 col-span-12">
            <h3 class="text-lg font-bold leading-6 text-gray-900">Dados Pessoais</h3>

        </div>

        {{-- Tipo Pessoa --}}
        <div class="col-span-12 sm:col-span-6 mt-2 sm:mt-0 md:mt-0 lg:mt-0">
            <fieldset class="col-span-12 sm:col-span-12 ">

                <div class=" space-y-4 ">
                    <div class="inline-flex items-center mr-2">
                        <input id="participa_programa_socialS" name="tipo_pessoa" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="1">
                        <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                            Pessoa Física
                        </label>
                    </div>
                    <div class="inline-flex items-center">
                        <input id="participa_programa_socialN" name="tipo_pessoa" type="radio"
                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="0">
                        <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                            Pessoa Jurídica
                        </label>
                    </div>
                    @error('') <span class="text-red-700">{{ $message }}</span>
                    @enderror
                </div>
            </fieldset>
        </div>

        <!-- Nome -->
        <div class="col-span-12 mt-2 ">
            <x-label for="nome" class="font-semibold" :value="__('* Nome')" />

            <x-input id="nome" class="block  mt-1 w-full" type="text" name="nome" :value="old('nome')" autofocus />
        </div>

        <!-- Sobrenome -->
        <div class="col-span-12 mt-4 ">
            <x-label for="sobrenome" class="font-semibold" :value="__('* Sobrenome')" />

            <x-input id="sobrenome" class="block  mt-1 w-full" type="text" name="sobrenome" :value="old('sobrenome')"
                autofocus />
        </div>

        <!-- DataNascimento -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="data_nascimento" class="font-semibold" :value="__('* Data Nascimento')" />

            <x-input id="data_nascimento" class="block  mt-1 w-full" type="text" name="data_nascimento"
                :value="old('nome')" autofocus />
        </div>

        <!-- Sexo -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="sexo" class="font-semibold" :value="__('Sexo')" />

            <x-input id="sexo" class="block  mt-1 w-full" type="text" name="sexo" :value="old('sexo')" autofocus />
        </div>

        <!-- CPF -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="cpf" class="font-semibold" :value="__('* CPF')" />

            <x-input id="cpf" class="block  mt-1 w-full" type="text" name="cpf" :value="old('cpf')" autofocus />
        </div>

        <!-- RG -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="rg" class="font-semibold" :value="__('RG')" />

            <x-input id="rg" class="block  mt-1 w-full" type="text" name="rg" :value="old('rg')" autofocus />
        </div>


    </div>

    {{-- Endereço --}}
    <div class="grid grid-cols-12 gap-4">
        <div class=" sm:px-0 mt-2 -mb-4 col-span-12">
            <h3 class="text-lg font-bold leading-6 text-gray-900">Endereço</h3>

        </div>

        <!-- Identificação -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="indentificacao" class="font-semibold" :value="__('* Identificação')" />

            <x-input id="indentificacao" class="block  mt-1 w-full" type="text" name="indentificacao"
                :value="old('identificacao')" autofocus />
            <p class="mt-1 text-xs text-gray-600">
                ex: Escritório, Casa, etc.
            </p>
        </div>

        <!-- Destinatario -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="destinario" class="font-semibold" :value="__('Destinatário')" />

            <x-input id="destinario" class="block  mt-1 w-full" type="text" name="destinario" :value="old('destinario')"
                autofocus />
            <p class="mt-1 text-xs text-gray-600">
                Informar o nome e o sobrenome do destinatário.
            </p>
        </div>

        <!-- CEP -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="cep" class="font-semibold" :value="__('* CEP')" />

            <x-input id="cep" class="block  mt-1 w-full" type="text" name="cep" :value="old('cep')" autofocus />
        </div>

        <!-- Endereço -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="endereco" class="font-semibold" :value="__('* Endereço')" />

            <x-input id="endereco" class="block  mt-1 w-full" type="text" name="endereco" :value="old('endereco')"
                autofocus />
        </div>

        <!-- Número -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="numero" class="font-semibold" :value="__('* Número')" />

            <x-input id="numero" class="block  mt-1 w-full" type="text" name="data_nascimento" :value="old('numero')"
                autofocus />
        </div>

        <!-- Complemento -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="complemento" class="font-semibold" :value="__('* Complemento')" />

            <x-input id="complemento" class="block  mt-1 w-full" type="text" name="complemento" :value="old('complemento')"
                autofocus />
        </div>

        <!-- Bairro -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="bairro" class="font-semibold" :value="__('* Bairro')" />

            <x-input id="bairro" class="block  mt-1 w-full" type="text" name="bairro" :value="old('bairro')" autofocus />
        </div>

        <!-- Cidade -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="cidade" class="font-semibold" :value="__('* Cidade')" />

            <x-input id="cidade" class="block  mt-1 w-full" type="text" name="cidade" :value="old('cidade')" autofocus />
        </div>

        <!-- Estado -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="estado" class="font-semibold" :value="__('* Estado')" />

            <x-input id="estado" class="block  mt-1 w-full" type="text" name="estado" :value="old('estado')" autofocus />
        </div>

        <!-- Referência -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="referencia" class="font-semibold" :value="__('* Referência')" />

            <x-input id="referencia" class="block  mt-1 w-full" type="text" name="referencia" :value="old('referencia')"
                autofocus />
        </div>

    </div>
    {{-- Contato --}}

    <div class="grid grid-cols-12 gap-4 mt-6">
        <div class=" sm:px-0 mt-2 -mb-4 col-span-12">
            <h3 class="text-lg font-bold leading-6 text-gray-900">Contatos</h3>

        </div>

        <!-- Celular -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="celular" class="font-semibold" :value="__('* Celular')" />

            <x-input id="celular" class="block  mt-1 w-full" type="text" name="celular"
                :value="old('celular')" autofocus />
            <p class="mt-1 text-xs text-gray-600">
                ex: Escritório, Casa, etc.
            </p>
        </div>

        <!-- Telefone Fixo -->
        <div class="col-span-12 mt-4 sm:col-span-6">
            <x-label for="telefone" class="font-semibold" :value="__('Telefone')" />

            <x-input id="telefone" class="block  mt-1 w-full" type="text" name="telefone" :value="old('telefone')"
                autofocus />
            <p class="mt-1 text-xs text-gray-600">
                Informar o nome e o sobrenome do destinatário.
            </p>
        </div>
    </div>

    {{-- Dados da conta --}}
    <div class="grid grid-cols-12 gap-4 mt-6">
        <div class=" sm:px-0 -mb-4 col-span-12">
            <h3 class="text-lg font-semibold leading-6 text-gray-900">Dados da conta</h3>

        </div>
        <!-- Email Address -->
        <div class="mt-4 col-span-12 ">
            <x-label for="email" class="font-semibold" :value="__('* Email')" />

            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
        </div>

        <!-- Password -->
        <div class="mt-4 col-span-12 sm:col-span-6">
            <x-label for="password" class="font-semibold" :value="__('* Senha')" />

            <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 col-span-12 sm:col-span-6">
            <x-label for="password_confirmation" class="font-semibold" :value="__('* Confirme a Senha')" />

            <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                 />
        </div>
    </div>



    <div class="flex items-center justify-end mt-6">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Já possui cadastro?') }}
        </a>

        <x-button class="ml-4">
            {{ __('Cadastrar') }}
        </x-button>
    </div>
</form>