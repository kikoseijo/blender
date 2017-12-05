<?php

namespace App\Repositories;

use App\Models\Communities;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Collection;

class CommunitiesRepository
{
    public static function getAll(): Collection
    {
        return Communities::orderBy('publish_date', 'desc')->get();
    }

    public static function getLatest(int $amount): Collection
    {
        return Communities::orderBy('publish_date', 'desc')
            ->take($amount)
            ->get();
    }

    public static function findById(int $id): Communities
    {
        return Communities::findOrFail($id);
    }

    public static function findBySlug(string $slug): Communities
    {
        return Communities::where('slug->'.content_locale(), $slug)->firstOrFail();
    }

    /**
     * @return \App\Models\Communities|null
     */
    public static function findNext(Communities $communities)
    {
        return Communities::online()
            ->where('publish_date', '>', $communities->publish_date)
            ->orderBy('publish_date', 'desc')
            ->first();
    }

    /**
     * @return \App\Models\Communities|null
     */
    public static function findPrevious(Communities $communities)
    {
        return Communities::online()
            ->where('publish_date', '<', $communities->publish_date)
            ->orderBy('publish_date', 'desc')
            ->first();
    }

    public static function paginate(int $perPage): Paginator
    {
        return Communities::online()->paginate($perPage);
    }
}
