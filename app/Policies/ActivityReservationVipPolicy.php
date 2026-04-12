<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivityReservationVip;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityReservationVipPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivityReservationVip');
    }

    public function view(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('View:ActivityReservationVip');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivityReservationVip');
    }

    public function update(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('Update:ActivityReservationVip');
    }

    public function delete(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('Delete:ActivityReservationVip');
    }

    public function restore(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('Restore:ActivityReservationVip');
    }

    public function forceDelete(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('ForceDelete:ActivityReservationVip');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivityReservationVip');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivityReservationVip');
    }

    public function replicate(AuthUser $authUser, ActivityReservationVip $activityReservationVip): bool
    {
        return $authUser->can('Replicate:ActivityReservationVip');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivityReservationVip');
    }

}