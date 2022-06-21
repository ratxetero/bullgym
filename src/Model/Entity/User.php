<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher; // Add this line
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id_usuario
 * @property string $nombre
 * @property string $apellidos
 * @property \Cake\I18n\FrozenDate $fecha_nac
 * @property string $telefono
 * @property string $email
 * @property string $password
 * @property bool $abonado
 * @property \Cake\I18n\FrozenTime $fecha_registro
 * @property \Cake\I18n\FrozenTime|null $fecha_fin_abono
 * @property string $rol
 */
class User extends Entity
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
        'apellidos' => true,
        'fecha_nac' => true,
        'telefono' => true,
        'email' => true,
        'password' => true,
        'abonado' => true,
        'fecha_registro' => true,
        'fecha_fin_abono' => true,
        'rol' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword(string $password) : ?string{
    if (strlen($password) > 0) {
    return (new DefaultPasswordHasher())->hash($password);
    }
    }

    
}
