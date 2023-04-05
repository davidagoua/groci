<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Marque;
use Illuminate\Auth\Access\HandlesAuthorization;

class MarquePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view_any_marque');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Marque $marque)
    {
        return $user->can('view_marque');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create_marque');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Marque $marque)
    {
        return $user->can('update_marque');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Marque $marque)
    {
        return $user->can('delete_marque');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function deleteAny(User $user)
    {
        return $user->can('delete_any_marque');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Marque $marque)
    {
        return $user->can('force_delete_marque');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDeleteAny(User $user)
    {
        return $user->can('force_delete_any_marque');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Marque $marque)
    {
        return $user->can('restore_marque');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restoreAny(User $user)
    {
        return $user->can('restore_any_marque');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function replicate(User $user, Marque $marque)
    {
        return $user->can('replicate_marque');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function reorder(User $user)
    {
        return $user->can('reorder_marque');
    }

}
