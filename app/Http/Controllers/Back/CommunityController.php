<?php

namespace App\Http\Controllers\Back;

use App\Models\Communities;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    protected $modelName = 'Article';

    protected function make(): Communities
    {
        return Communities::create([
            'publish_date' => Carbon::now(),
        ]);
    }

    protected function updateFromRequest(Communities $model, Request $request)
    {
        $this->updateModel($model, $request);
        $this->updateTags($model, $request);
    }

    protected function validationRules(): array
    {
        $rules = [
            'publish_date' => 'date_format:d/m/Y',
        ];

        foreach (config('app.locales') as $locale) {
            $rules[translate_field_name('name', $locale)] = 'required';
            $rules[translate_field_name('text', $locale)] = 'required';
        }

        return $rules;
    }
}
