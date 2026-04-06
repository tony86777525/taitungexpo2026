<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ParticipationType;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParticipationTypePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ParticipationType');
    }

    public function view(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('View:ParticipationType');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ParticipationType');
    }

    public function update(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('Update:ParticipationType');
    }

    public function delete(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('Delete:ParticipationType');
    }

    public function restore(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('Restore:ParticipationType');
    }

    public function forceDelete(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('ForceDelete:ParticipationType');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ParticipationType');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ParticipationType');
    }

    public function replicate(AuthUser $authUser, ParticipationType $participationType): bool
    {
        return $authUser->can('Replicate:ParticipationType');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ParticipationType');
    }

}