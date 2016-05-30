<form action="{{url('search')}}" method="GET">
    <input type="text" name="q" class="search-box form-control" placeholder="{{trans('partials.search_placeholder')}}" value="{!! isset($term) ?$term :''!!}">
    <input type="submit" value="search" style="display: none;">
</form>