<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Actividade Entity
 *
 * @property int $id
 * @property int $nombre
 * @property int $user_id
 * @property \Cake\I18n\FrozenDate $fecha
 * @property \Cake\I18n\Time $hora_inicio
 * @property \Cake\I18n\Time $hora_fin
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\User[] $users
 */
class Actividade extends Entity
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
        'nombre' => true,
        'user_id' => true,
        'fecha' => true,
        'hora_inicio' => true,
        'hora_fin' => true,
        'created' => true,
        'updated' => true,
        'users' => true,
    ];
}
