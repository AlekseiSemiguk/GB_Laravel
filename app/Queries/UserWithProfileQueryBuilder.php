<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class UserWithProfileQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = User::query();
    }

    public function update(User $user, array $data): bool
    {
        $user->fill($data);
        $user->profile->fill($data);
        return $user->push();
    }
}
