<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\CurationNature;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurationNaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:CurationNature');
    }

    public function view(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('View:CurationNature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:CurationNature');
    }

    public function update(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('Update:CurationNature');
    }

    public function delete(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('Delete:CurationNature');
    }

    public function restore(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('Restore:CurationNature');
    }

    public function forceDelete(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('ForceDelete:CurationNature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:CurationNature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:CurationNature');
    }

    public function replicate(AuthUser $authUser, CurationNature $curationNature): bool
    {
        return $authUser->can('Replicate:CurationNature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:CurationNature');
    }

}