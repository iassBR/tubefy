<?php

namespace Database\Factories;

use App\Models\PessoaFisica;
use Illuminate\Database\Eloquent\Factories\Factory;

class PessoaFisicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PessoaFisica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_nascimento' => '16/03/1997',
            'sexo' => 'masculino',
            'rg' => '4480570',
            'cpf' => '03326283296',
        ];
    }
}
