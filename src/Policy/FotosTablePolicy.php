<?php

declare(strict_types=1);

namespace App\Policy;

use App\Model\Table\FotosTable;
use Authorization\IdentityInterface;

/**
 * Peticiones policy
 */
class FotosTablePolicy
{
    public function canAdmin(IdentityInterface $user)
    {

        if ($user['rol'] == 'admin') return true;
        return false;
    }
}
