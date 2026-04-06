<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\BrandTag;
use Illuminate\Auth\Access\HandlesAuthorization;

class BrandTagPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:BrandTag');
    }

    public function view(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('View:BrandTag');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:BrandTag');
    }

    public function update(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('Update:BrandTag');
    }

    public function delete(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('Delete:BrandTag');
    }

    public function restore(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('Restore:BrandTag');
    }

    public function forceDelete(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('ForceDelete:BrandTag');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:BrandTag');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:BrandTag');
    }

    public function replicate(AuthUser $authUser, BrandTag $brandTag): bool
    {
        return $authUser->can('Replicate:BrandTag');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:BrandTag');
    }

}