<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ActivityReservation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityReservationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ActivityReservation');
    }

    public function view(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('View:ActivityReservation');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ActivityReservation');
    }

    public function update(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('Update:ActivityReservation');
    }

    public function delete(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('Delete:ActivityReservation');
    }

    public function restore(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('Restore:ActivityReservation');
    }

    public function forceDelete(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('ForceDelete:ActivityReservation');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ActivityReservation');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ActivityReservation');
    }

    public function replicate(AuthUser $authUser, ActivityReservation $activityReservation): bool
    {
        return $authUser->can('Replicate:ActivityReservation');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ActivityReservation');
    }

}