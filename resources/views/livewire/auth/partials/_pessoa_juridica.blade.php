<!-- Razao Social -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="razao_social" class="font-semibold" :value="__('* Razão Social')" />

    <x-input wire:model="pessoaJuridica.razao_social" id="razao_social"
        class="block  mt-1 w-full {{ $errors->has('pessoaJuridica.razao_social') ? 'border-red-700' : '' }}" type="text"
        name="razao_social" :value="old('razao_social')" autofocus />
    @error('pessoaJuridica.razao_social') <span class="text-red-700">{{ $message }}</span> @enderror
</div>

<!-- CNPJ -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="cnpj" class="font-semibold" :value="__('* CNPJ')" />

    <x-masked-input  mask="'99.999.999/9999-99'" wire:model.ignore="pessoaJuridica.cnpj" id="cnpj" 
        class="{{ $errors->has('pessoaJuridica.cnpj') ? 'border-red-700' : '' }} block mt-1 w-full" type="text"
        name="cnpj" :value="old('cnpj')" />
    @error('pessoaJuridica.cnpj') <span class="text-red-700">{{ $message }}</span> @enderror
</div>


<!-- Inscrição Estadual -->
<div class="col-span-12 mt-4 sm:col-span-6">
    <x-label for="inscricao_estadual" class="font-semibold" :value="__('* Inscrição Estadual')" />

    <x-input wire:model="pessoaJuridica.inscricao_estadual" id="inscricao_estadual"
        class="block  mt-1 w-full {{ $errors->has('pessoaJuridica.inscricao_estadual') ? 'border-red-700' : '' }}"
        type="text" name="inscricao_estadual" :value="old('inscricao_estadual')" autofocus />
    @error('pessoaJuridica.inscricao_estadual') <span class="text-red-700">{{ $message }}</span> @enderror
</div>