<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivityReservationNormal;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityReservationNormalPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivityReservationNormal');
    }

    public function view(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('View:ActivityReservationNormal');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivityReservationNormal');
    }

    public function update(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('Update:ActivityReservationNormal');
    }

    public function delete(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('Delete:ActivityReservationNormal');
    }

    public function restore(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('Restore:ActivityReservationNormal');
    }

    public function forceDelete(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('ForceDelete:ActivityReservationNormal');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivityReservationNormal');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivityReservationNormal');
    }

    public function replicate(AuthUser $authUser, ActivityReservationNormal $activityReservationNormal): bool
    {
        return $authUser->can('Replicate:ActivityReservationNormal');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivityReservationNormal');
    }

}