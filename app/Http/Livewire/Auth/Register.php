<?php

namespace App\Http\Livewire\Auth;

use App\Models\Endereco;
use App\Models\PessoaFisica;
use App\Models\PessoaJuridica;
use App\Rules\CNPJ;
use App\Rules\CPF;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Register extends Component
{
    public  $nome, $password, $telefone, $celular, $email, $password_confirmation, $sobrenome;

    public PessoaFisica $pessoaFisica;
    public PessoaJuridica $pessoaJuridica;
    public Endereco $endereco;

    public $tipo_pessoa_fisica = true;


    function rules()
    {
        $rules = [];

        $rules['nome'] = ['required', 'string', 'max:255'];

        $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        $rules['password'] = ['required', 'confirmed', 'max:15', Password::min(6)->letters()->numbers()];
        $rules['celular'] = ['required', 'string'];
        $rules['telefone'] = ['required', 'string'];

        if ($this->tipo_pessoa_fisica == true) {
            $rules['sobrenome'] = ['required', 'min:4', 'max:30'];
            $rules['pessoaFisica.data_nascimento'] = ['required'];
            $rules['pessoaFisica.sexo'] = ['nullable', 'in:masculino,feminino,outros'];
            $rules['pessoaFisica.cpf'] = ['required', new CPF(), 'unique:pessoa_fisicas,cpf'];
            $rules['pessoaFisica.rg'] = ['nullable'];
        } else {
            $rules['pessoaJuridica.razao_social'] = ['required', 'min:4', 'max:30'];
            $rules['pessoaJuridica.cnpj'] = ['required', new CNPJ()];
            $rules['pessoaJuridica.inscricao_estadual'] = ['required', 'min:4', 'max:30'];
        }

        $rules['endereco.endereco'] = ['required'];
        $rules['endereco.complemento'] = ['nullable'];
        $rules['endereco.numero'] = ['required'];
        $rules['endereco.bairro'] = ['required'];
        $rules['endereco.cidade'] = ['required'];
        $rules['endereco.uf'] = ['required'];
        $rules['endereco.cep'] = ['required'];
        $rules['endereco.identificacao'] = ['required'];
        $rules['endereco.destinatario'] = ['nullable'];
        $rules['endereco.referencia'] = ['required'];

        return $rules;
    }

    public function mount()
    {
        $this->endereco = new Endereco();
        $this->endereco->cep = null;
        $this->pessoaFisica = new PessoaFisica();
        $this->pessoaJuridica = new PessoaJuridica();
    }

    public function store()
    {
        $this->validate();

        $user = DB::transaction(function () {

            if ($this->tipo_pessoa_fisica == true) {
                $this->pessoaFisica->save();
                $pessoa = $this->pessoaFisica;
            } else {
                $pessoa = $this->pessoaJuridica->save();
                $pessoa = $this->pessoaJuridica;
            }

            $user = $pessoa->user()->create([
                'nome' => $this->nome,
                'sobrenome' => $this->sobrenome,
                'email' => $this->email,
                'telefone' => $this->telefone,
                'celular' => $this->celular,
                'password' => Hash::make($this->password),
            ]);

            $this->endereco->save();

            $this->endereco->user()->associate($user);

            return $user;
        });

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function buscaCep()
    {
        $replace = ["-", "_"];
        $cep = str_replace($replace, "", $this->endereco->cep);

        if (strlen($cep) >= 7 ) {

            $response = Http::get('https://viacep.com.br/ws/' . $cep . '/json/');

            $data = $response->json();  
            if ($data) {
                $this->endereco->cep = $data['cep'];
                $this->endereco->endereco = $data['logradouro'];
                $this->endereco->bairro = $data['bairro'];
                $this->endereco->uf = $data['uf'];
                $this->endereco->cidade = $data['localidade'];
                $this->endereco->complemento = $data['complemento'];
            }

            if (!$data) {
                session()->flash('error', 'Ops! Nenhum endereço encontrado!');
            }
        }
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
