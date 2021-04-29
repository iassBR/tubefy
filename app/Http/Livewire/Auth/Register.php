<?php

namespace App\Http\Livewire\Auth;

use App\Rules\CPF;
use Livewire\Component;

class Register extends Component
{

    public $tipo_pessoa = true;
    //pessoa física
    public $nome, $sobrenome, $data_nascimento, $sexo, $cpf, $rg;

    function rules()
    {
        return [
            'nome' => ['required', 'min:4', 'max:30'],
            'sobrenome' => ['required', 'min:4', 'max:30'],
            'data_nascimento' => ['required'],
            'sexo' => ['required', 'in:masculino,feminino,outros'],
            'cpf' => ['required', new CPF(), 'unique:pessoa_fisicas,cpf'],
            'rg' => ['nullable'],
        ];
    }

    public function store()
    {
        $this->validate();

        dd("ok");
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
