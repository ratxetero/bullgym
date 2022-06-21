<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Rutina;
use Authorization\IdentityInterface;

/**
 * Rutina policy
 */
class RutinaPolicy
{
    /**
     * Check if $user can add Rutina
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rutina $rutina
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Rutina $rutina)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can edit Rutina
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rutina $rutina
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Rutina $rutina)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can delete Rutina
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rutina $rutina
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Rutina $rutina)
    {
        if ($user['rol'] == 'admin' || $user['rol'] == 'monitor') return true;
        return false;
    }

    /**
     * Check if $user can view Rutina
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Rutina $rutina
     * @return bool
     */
    public function canView(IdentityInterface $user, Rutina $rutina)
    {
    }
}
