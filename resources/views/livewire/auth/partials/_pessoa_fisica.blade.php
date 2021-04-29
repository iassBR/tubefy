



<!-- Sobrenome -->
<div class="col-span-12 mt-4 ">
    <x-label for="sobrenome" class="font-semibold" :value="__('* Sobrenome')" />

    <x-input wire:model="sobrenome" id="sobrenome" class="block  mt-1 w-full {{ $errors->has('sobrenome') ? 'border-red-700' : '' }}" type="text" name="sobrenome"
        :value="old('sobrenome')" autofocus />
    @error('sobrenome') <span class="text-red-700">{{ $message }}</span> @enderror
</div>

<!-- DataNascimento -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="data_nascimento" class="font-semibold" :value="__('* Data Nascimento')" />


    <x-masked-input mask="'99/99/9999'" wire:model="pessoaFisica.data_nascimento" name="data_nascimento" type="text"
        class="{{ $errors->has('pessoaFisica.data_nascimento') ? 'border-red-700' : '' }} w-full mt-1 block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
    @error('pessoaFisica.data_nascimento') <span class="text-red-700">{{ $message }}</span> @enderror
</div>

<!-- Sexo -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="sexo" :value="__('Sexo')" />
    <select wire:model="pessoaFisica.sexo" name="sexo" id="sexo"
        class="{{ $errors->has('pessoaFisica.sexo') ? 'border-red-700' : '' }} block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        <option value="">Selecione</option>
        <option value="feminino">Feminino</option>
        <option value="masculino">Masculino</option>
        <option value="outro">Outros</option>
    </select>
    @error('pessoaFisica.sexo') <span class="text-red-700">{{ $message }}</span> @enderror
</div>

<!-- CPF -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="cpf" class="font-semibold" :value="__('* CPF')" />

    <x-masked-input mask="'999.999.999-99'" wire:model="pessoaFisica.cpf" name="cpf" type="text"
        class="{{ $errors->has('pessoaFisica.cpf') ? 'border-red-700' : '' }} w-full mt-1 block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
    @error('pessoaFisica.cpf') <span class="text-red-700">{{ $message }}</span> @enderror
</div>

<!-- RG -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="rg" class="font-semibold" :value="__('RG')" />

    <x-input wire:model="pessoaFisica.rg" id="rg" class="block  mt-1 w-full {{ $errors->has('pessoaFisica.rg') ? 'border-red-700' : '' }}" type="text" name="rg" :value="old('rg')"
        autofocus />
    @error('pessoaFisica.rg') <span class="text-red-700">{{ $message }}</span> @enderror
</div>
