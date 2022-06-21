<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\NoticiasTable;
use Authorization\IdentityInterface;

/**
 * Peticiones policy
 */
class NoticiasTablePolicy
{
    public function canAdmin(IdentityInterface $user)
    {

        if ($user['rol'] == 'admin') return true;
        return false;
    }
}
