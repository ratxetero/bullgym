<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_usuario' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'apellidos' => 'Lorem ipsum dolor sit amet',
                'fecha_nac' => '2022-05-05',
                'telefono' => 'Lorem i',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'abonado' => 1,
                'fecha_registro' => '2022-05-05 22:36:47',
                'fecha_fin_abono' => '2022-05-05 22:36:47',
                'rol' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
