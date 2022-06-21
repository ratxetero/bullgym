<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Foto;
use Authorization\IdentityInterface;

/**
 * Foto policy
 */
class FotoPolicy
{
    /**
     * Check if $user can add Foto
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Foto $foto
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Foto $foto)
    {
        //Solo los admins pueden anadir
        if ($user['rol'] == 'admin') return true;
        return false;
    }

    /**
     * Check if $user can edit Foto
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Foto $foto
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Foto $foto)
    {
        if ($user['rol'] == 'admin') return true;
        return false;
    }

    /**
     * Check if $user can delete Foto
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Foto $foto
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Foto $foto)
    {
        if ($user['rol'] == 'admin') return true;
        return false;   
    }

    /**
     * Check if $user can view Foto
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Foto $foto
     * @return bool
     */
    public function canView(IdentityInterface $user, Foto $foto)
    {
    }


    public function canAdmin(IdentityInterface $user)
    {
        if ($user['rol'] == 'admin') return true;
        return false;
    }
}
