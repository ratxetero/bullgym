<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Actividade;
use Authorization\IdentityInterface;

/**
 * Actividade policy
 */
class ActividadePolicy
{
    /**
     * Check if $user can add Actividade
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Actividade $actividade
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Actividade $actividade)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can edit Actividade
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Actividade $actividade
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Actividade $actividade)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can delete Actividade
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Actividade $actividade
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Actividade $actividade)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can view Actividade
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Actividade $actividade
     * @return bool
     */
    public function canView(IdentityInterface $user, Actividade $actividade)
    {
    }

    public function canAdmin(IdentityInterface $user, Actividade $actividade)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }
}
