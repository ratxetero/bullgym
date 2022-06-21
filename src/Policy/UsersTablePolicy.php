<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;

/**
 * Peticiones policy
 */
class UsersTablePolicy
{
    public function canAdmin(IdentityInterface $user)
    {

        if ($user['rol'] == 'admin') return true;
        return false;
    }
}
