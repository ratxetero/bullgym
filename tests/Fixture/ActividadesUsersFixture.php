<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ActividadesUsersFixture
 */
class ActividadesUsersFixture extends TestFixture
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
                'id_actividad' => 1,
                'id_usuario' => 1,
                'created' => '2022-05-19 22:02:33',
                'updated' => '2022-05-19 22:02:33',
            ],
        ];
        parent::init();
    }
}
