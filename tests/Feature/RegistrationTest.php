<?php

namespace Tests\Feature;

use App\Http\Livewire\Auth\Register;
use App\Models\PessoaFisica;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        // $this->withoutExceptionHandling();

       $response =  Livewire::test(Register::class)
            ->set([
                'nome' => 'Test User',
                'sobrenome' => 'Test User',
                'email' => 'test@example.com',
                'tipo_pessoa_fisica' => false,
                'sobrenome' => 'sobrenome',
                'telefone' => '999999999',
                'celular' => '999999999',
                'password' => 'password',
                'password_confirmation' => 'password',


                'pessoaJuridica.razao_social' => 'igor',
                'pessoaJuridica.cnpj' => '17.208.221/0001-52',
                'pessoaJuridica.inscricao_estadual' => '123213231231',


                'endereco.endereco' => 'rua odeir viana',
                'endereco.complemento' => 'muro azul',
                'endereco.numero' => '555',
                'endereco.bairro' => 'centenário',
                'endereco.cidade' => 'Boa Vista',
                'endereco.uf' => 'RR',
                'endereco.cep' => '69312-633',
                'endereco.identificacao' => 'teste',
                'endereco.destinatario' => 'teste',
                'endereco.referencia' => 'teste',
            ])
            ->call('store');

    }
}
