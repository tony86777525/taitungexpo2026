<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivitySessionVip;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivitySessionVipPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivitySessionVip');
    }

    public function view(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('View:ActivitySessionVip');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivitySessionVip');
    }

    public function update(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('Update:ActivitySessionVip');
    }

    public function delete(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('Delete:ActivitySessionVip');
    }

    public function restore(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('Restore:ActivitySessionVip');
    }

    public function forceDelete(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('ForceDelete:ActivitySessionVip');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivitySessionVip');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivitySessionVip');
    }

    public function replicate(AuthUser $authUser, ActivitySessionVip $activitySessionVip): bool
    {
        return $authUser->can('Replicate:ActivitySessionVip');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivitySessionVip');
    }

}