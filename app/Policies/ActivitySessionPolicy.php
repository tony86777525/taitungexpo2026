<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivitySession;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitySessionPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivitySession');
    }

    public function view(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('View:ActivitySession');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivitySession');
    }

    public function update(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('Update:ActivitySession');
    }

    public function delete(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('Delete:ActivitySession');
    }

    public function restore(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('Restore:ActivitySession');
    }

    public function forceDelete(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('ForceDelete:ActivitySession');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivitySession');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivitySession');
    }

    public function replicate(AuthUser $authUser, ActivitySession $activitySession): bool
    {
        return $authUser->can('Replicate:ActivitySession');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivitySession');
    }

}