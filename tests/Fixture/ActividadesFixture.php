<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesFixture
 */
class ActividadesFixture extends TestFixture
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
                'id' => 1,
                'nombre' => 1,
                'user_id' => 1,
                'fecha' => '2022-05-19',
                'hora_inicio' => '22:02:23',
                'hora_fin' => '22:02:23',
                'created' => '2022-05-19 22:02:23',
                'updated' => '2022-05-19 22:02:23',
            ],
        ];
        parent::init();
    }
}
