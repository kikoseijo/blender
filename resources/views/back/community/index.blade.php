@component('back._layouts.master', [
    'title' => 'Community',
])
    <section>
        <div class="grid">
            <h1>Community</h1>

            <a href="{{ action('Back\CommunityController@create') }}" class="button">
                New article
            </a>

            <table data-datatable data-order='[[ 1, "desc" ]]'>
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Publish date</th>
                    <th data-orderable="false"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($models as $communities)
                    <tr data-row-id="{{ $communities->id }}">
                        <td>
                            {{ html()->onlineIndicator($communities->online) }}
                            <a href="{{ action('Back\CommunityController@edit', [$communities->id]) }}">
                                {{ $communities->name }}
                            </a>
                        </td>
                        <td data-order="{{ $communities->publish_date }}">
                            {{ $communities->publish_date->format('d/m/Y') }}
                        </td>
                        <td class="-right">
                            {{ html()->deleteButton(action('Back\CommunityController@destroy', $communities->id)) }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endcomponent
