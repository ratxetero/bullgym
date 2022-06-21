<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Noticia;
use Authorization\IdentityInterface;

/**
 * Noticia policy
 */
class NoticiaPolicy
{
    /**
     * Check if $user can add Noticia
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Noticia $noticia
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Noticia $noticia)
    {
        if ($user['rol'] == 'admin') return true;
        return false;
    }

    /**
     * Check if $user can edit Noticia
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Noticia $noticia
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Noticia $noticia)
    {
        if ($user['rol'] == 'admin') return true;
        return false;
    }

    /**
     * Check if $user can delete Noticia
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Noticia $noticia
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Noticia $noticia)
    {
        if ($user['rol'] == 'admin') return true;
        return false;
    }

    /**
     * Check if $user can view Noticia
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Noticia $noticia
     * @return bool
     */
    public function canView(IdentityInterface $user, Noticia $noticia)
    {
        return true;
    }

    public function canAdmin(IdentityInterface $user, Noticia $noticia){

        if ($user['rol'] == 'admin') return true;
        return false;
    }
}
