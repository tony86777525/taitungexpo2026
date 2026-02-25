<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ProjectNature;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectNaturePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ProjectNature');
    }

    public function view(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('View:ProjectNature');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ProjectNature');
    }

    public function update(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('Update:ProjectNature');
    }

    public function delete(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('Delete:ProjectNature');
    }

    public function restore(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('Restore:ProjectNature');
    }

    public function forceDelete(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('ForceDelete:ProjectNature');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ProjectNature');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ProjectNature');
    }

    public function replicate(AuthUser $authUser, ProjectNature $projectNature): bool
    {
        return $authUser->can('Replicate:ProjectNature');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ProjectNature');
    }

}