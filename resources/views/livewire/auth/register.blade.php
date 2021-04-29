<div>
    {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class=" sm:px-0 mb-2">
        <h3 class="text-lg font-extrabold leading-6 text-gray-900">DADOS CADASTRAIS</h3>

    </div>

    <form wire:submit.prevent="store" method="POST">
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
                            <input wire:model="tipo_pessoa" id="participa_programa_socialS" name="tipo_pessoa"
                                type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                value="1">
                            <label for="push_everything" class="ml-3 block text-sm font-medium text-gray-700">
                                Pessoa Física
                            </label>
                        </div>
                        <div class="inline-flex items-center">
                            <input wire:model="tipo_pessoa" id="participa_programa_socialN" name="tipo_pessoa"
                                type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300"
                                value="0">
                            <label for="push_email" class="ml-3 block text-sm font-medium text-gray-700">
                                Pessoa Jurídica
                            </label>
                        </div>
                        @error('endereco.') <span class="text-red-700">{{ $message }}</span>
                        @enderror
                    </div>
                </fieldset>
            </div>


            <!-- Nome -->
            <div class="col-span-12 mt-2 ">
                <x-label for="nome" class="font-semibold" :value="__('* Nome')" />

                <x-input wire:model="nome" id="nome"
                    class="block  mt-1 w-full {{ $errors->has('nome') ? 'border-red-700' : '' }}" type="text"
                    name="nome" :value="old('nome')" autofocus />
                @error('nome') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            {{-- Form dinâmico --}}
            @if ($this->tipo_pessoa_fisica == true)
                @include('livewire.auth.partials._pessoa_fisica')
            @else
                @include('livewire.auth.partials._pessoa_juridica')
            @endif

        </div>

        {{-- Endereço --}}
        <div class="grid grid-cols-12 gap-4">
            <div class=" sm:px-0 mt-2 -mb-4 col-span-12">
                <h3 class="text-lg font-bold leading-6 text-gray-900">Endereço</h3>
            </div>

            <!-- Identificação -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="identificacao" class="font-semibold" :value="__('* Identificação')" />

                <x-input wire:model="endereco.identificacao" id="identificacao"
                    class="block  mt-1 w-full {{ $errors->has('endereco.identificacao') ? 'border-red-700' : '' }}"
                    type="text" name="identificacao" :value="old('identificacao')" autofocus />
                @error('endereco.identificacao') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    ex: Escritório, Casa, etc.
                </p>
            </div>

            <!-- Destinatario -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="destinario" class="font-semibold" :value="__('Destinatário')" />

                <x-input wire:model="endereco.destinatario" id="destinario"
                    class="block  mt-1 w-full {{ $errors->has('endereco.destinario') ? 'border-red-700' : '' }}"
                    type="text" name="destinario" :value="old('destinario')" autofocus />
                @error('endereco.destinario') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Informar o nome e o sobrenome do destinatário.
                </p>

            </div>

            <!-- CEP -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="cep" class="font-semibold" :value="__('* CEP')" />

                <x-input wire:model="endereco.cep" id="cep"
                    class="block  mt-1 w-full {{ $errors->has('endereco.cep') ? 'border-red-700' : '' }}" type="text"
                    name="cep" :value="old('cep')" autofocus />
                @error('endereco.cep') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Endereço -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="endereco" class="font-semibold" :value="__('* Endereço')" />

                <x-input wire:model="endereco.endereco" id="endereco"
                    class="block  mt-1 w-full {{ $errors->has('endereco.endereco') ? 'border-red-700' : '' }}"
                    type="text" name="endereco" :value="old('endereco')" autofocus />
                @error('endereco.endereco') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Número -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="numero" class="font-semibold" :value="__('* Número')" />

                <x-input wire:model="endereco.numero" id="numero"
                    class="block  mt-1 w-full {{ $errors->has('endereco.numero') ? 'border-red-700' : '' }}" type="text"
                    name="data_nascimento" :value="old('numero')" autofocus />
                @error('endereco.numero') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Complemento -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="complemento" class="font-semibold" :value="__('* Complemento')" />

                <x-input wire:model="endereco.complemento" id="complemento"
                    class="block  mt-1 w-full {{ $errors->has('endereco.complemento') ? 'border-red-700' : '' }}"
                    type="text" name="complemento" :value="old('complemento')" autofocus />
                @error('endereco.complemento') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Informar, por exemplo, o número do apto, bloco, sítio, etc. Deve ser algo que informe exatamente
                    onde mora.
                </p>
            </div>

            <!-- Bairro -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="bairro" class="font-semibold" :value="__('* Bairro')" />

                <x-input wire:model="endereco.bairro" id="bairro"
                    class="block  mt-1 w-full {{ $errors->has('endereco.bairro') ? 'border-red-700' : '' }}" type="text"
                    name="bairro" :value="old('bairro')" autofocus />
                @error('endereco.bairro') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Cidade -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="cidade" class="font-semibold" :value="__('* Cidade')" />

                <x-input wire:model="endereco.cidade" id="cidade"
                    class="block  mt-1 w-full {{ $errors->has('endereco.cidade') ? 'border-red-700' : '' }}" type="text"
                    name="cidade" :value="old('cidade')" autofocus />
                @error('endereco.cidade') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Estado -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="uf" class="font-semibold" :value="__('* Estado')" />

                <x-input wire:model="endereco.uf" id="uf"
                    class="block  mt-1 w-full {{ $errors->has('endereco.uf') ? 'border-red-700' : '' }}" type="text"
                    name="uf" :value="old('uf')" autofocus />
                @error('endereco.uf') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Referência -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="referencia" class="font-semibold" :value="__('* Referência')" />

                <x-input wire:model="endereco.referencia" id="referencia"
                    class="block  mt-1 w-full {{ $errors->has('endereco.referencia') ? 'border-red-700' : '' }}"
                    type="text" name="referencia" :value="old('referencia')" autofocus />
                @error('endereco.referencia') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Informar local próximo, por exemplo, um mercadinho, igreja, rua principal, etc. Um local conhecido
                    na área onde mora.
                </p>
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

                <x-input wire:model="celular" id="celular"
                    class="block  mt-1 w-full {{ $errors->has('celular') ? 'border-red-700' : '' }}" type="text"
                    name="celular" :value="old('celular')" autofocus />
                @error('celular') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Ex: DDD + Telefone
            </div>

            <!-- Telefone Fixo -->
            <div class="col-span-12 mt-4 sm:col-span-6">
                <x-label for="telefone" class="font-semibold" :value="__('Telefone')" />

                <x-input wire:model="telefone" id="telefone"
                    class="block  mt-1 w-full {{ $errors->has('telefone') ? 'border-red-700' : '' }}" type="text"
                    name="telefone" :value="old('telefone')" autofocus />
                @error('telefone') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Ex: DDD + Telefone
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

                <x-input wire:model="email" id="email" class="block mt-1 w-full {{ $errors->has('email') ? 'border-red-700' : '' }}"
                    type="email" name="email" :value="old('email')" />
                @error('email') <span class="text-red-700">{{ $message }}</span> @enderror
            </div>

            <!-- Password -->
            <div class="mt-4 col-span-12 sm:col-span-6">
                <x-label for="password" class="font-semibold" :value="__('* Senha')" />

                <x-input wire:model="password" id="password"
                    class="block mt-1 w-full {{ $errors->has('password') ? 'border-red-700' : '' }}"
                    type="password" name="password" autocomplete="new-password" />
                @error('password') <span class="text-red-700">{{ $message }}</span> @enderror
                <p class="mt-1 text-xs text-gray-600">
                    Digite sua senha com 6 a 15 caracteres.
                    Lembre-se: sua senha deve conter ao menos uma letra e um dígito.
                </p>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4 col-span-12 sm:col-span-6">
                <x-label for="password_confirmation" class="font-semibold" :value="__('* Confirme a Senha')" />

                <x-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" />
            </div>
        </div>



        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Já possui cadastro?') }}
            </a>

            <x-button wire:click.prevent="store" type="submit" class="ml-4">
                {{ __('Cadastrar') }}
            </x-button>
        </div>
    </form>

</div>