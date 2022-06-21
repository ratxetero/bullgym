<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
use Cake\ORM\Entity;
class Foto extends Entity
{
protected $_accessible = [
'*' => true,
'id_imagen' => false,
'photo' => false,
];
}
