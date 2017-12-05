<?php

use App\Models\Communities;

class CommunitiesSeeder extends DatabaseSeeder
{
    public function run()
    {
        $this->truncate((new Communities())->getTable());

        collect()->range(0, 5)->each(function () {
            $this->createCommunities();
        });
    }

    public function createCommunities(array $attributes = []): Communities
    {
        $communities = Communities::create($attributes + [
            'name' => faker()->translate(faker()->title()),
            'text' => faker()->translate(faker()->text()),
            'meta_values' => collect([]),
            'publish_date' => faker()->futureDate(),
            'online' => faker()->mostly(),
            'draft' => false,
        ]);

        $this->addImages($communities, 1, 1);

        return $communities;
    }
}
