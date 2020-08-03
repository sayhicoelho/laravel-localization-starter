<select class="form-control" onchange="location.href = this.value">
    @foreach (config('app.available_locales') as $locale => $data)
        <option {{ app()->getLocale() == $locale ? 'selected' : '' }} value="{{ route(Route::currentRouteName(), Route::current()->parameters(), true, $locale) }}">
            {{ $data['name'] }}
        </option>
    @endforeach
</select>
