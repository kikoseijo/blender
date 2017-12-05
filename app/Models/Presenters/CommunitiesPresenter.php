<?php

namespace App\Models\Presenters;

trait CommunitiesPresenter
{
    public function getExcerptAttribute(): string
    {
        return str_tease($this->text);
    }
}
