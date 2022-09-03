<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class NewsSourceQueryBuilder
{
    private Builder $model;
    public function __construct()
    {
        $this->model = NewsSource::query();
    }

    public function getNews(): LengthAwarePaginator
    {
        return $this->model
            ->paginate();
    }

    public function create(array $data): NewsSource|bool
    {
        return NewsSource::create($data);
    }

    public function update(NewsSource $newsSource, array $data): bool
    {
        return $newsSource->fill($data)->save();
    }
}
