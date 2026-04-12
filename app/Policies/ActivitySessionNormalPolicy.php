<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivitySessionNormal;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitySessionNormalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivitySessionNormal');
    }

    public function view(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('View:ActivitySessionNormal');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivitySessionNormal');
    }

    public function update(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('Update:ActivitySessionNormal');
    }

    public function delete(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('Delete:ActivitySessionNormal');
    }

    public function restore(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('Restore:ActivitySessionNormal');
    }

    public function forceDelete(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('ForceDelete:ActivitySessionNormal');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivitySessionNormal');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivitySessionNormal');
    }

    public function replicate(AuthUser $authUser, ActivitySessionNormal $activitySessionNormal): bool
    {
        return $authUser->can('Replicate:ActivitySessionNormal');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivitySessionNormal');
    }

}