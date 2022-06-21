<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rutina Entity
 *
 * @property int $id
 * @property int $id_usuario
 * @property string $descripcion
 * @property string $rutina
 * @property \Cake\I18n\FrozenTime $fecha_creacion
 * @property \Cake\I18n\FrozenTime $fecha_modificacion
 */
class Rutina extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'id_usuario' => true,
        'descripcion' => true,
        'rutina' => true,
        'fecha_creacion' => true,
        'fecha_modificacion' => true,
    ];
}
