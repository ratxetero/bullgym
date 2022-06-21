<?php
// src/Model/Entity/Article.php
namespace App\Model\Entity;
use Cake\ORM\Entity;
class Noticia extends Entity
{
protected $_accessible = [
'*' => true,
'id_noticia' => false,
];
}
