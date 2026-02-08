<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * Get paginated users
     */
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return User::with('creator')
            ->latest()
            ->paginate($perPage);
    }

    /**
     * Store new user
     */
    public function create(array $data): User
    {
        $data['password'] = Hash::make($data['password']);

        return User::create($data);
    }

    /**
     * Update existing user
     */
    public function update(User $user, array $data): User
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return $user->load('creator');
    }

    /**
     * Delete user
     */
    public function delete(User $user): void
    {
        $user->delete();
    }

    /**
     * Find user with relations
     */
    public function find(int $id): User
    {
        return User::with(['creator', 'createdUsers'])
            ->findOrFail($id);
    }
}
