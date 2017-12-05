@component('back._layouts.master', [
    'title' => 'Community',
    'breadcrumbs' => html()->backToIndex('Back\CommunityController@index'),
])
    <section>
        <div class="grid">
            <h1>
                {{ html()->onlineIndicator($model->online) }}
                {{ $model->name ?: 'New article' }}
            </h1>

            {{ html()
                ->modelForm($model, 'PATCH', action('Back\CommunityController@update', $model->id))
                ->class('-stacked')
                ->open() }}

            {{ html()->formGroup()->submit('Save article') }}

            @include('back.community._partials.form')

            {{ html()->formGroup()->submit('Save article') }}

            {{ html()->closeModelForm() }}
        </div>
    </section>
@endcomponent
