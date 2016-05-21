<div class="footer">
    <div class="container">
        <div class="text-muted row credit">
            <div class="col-md-7 links">
                <label>{{trans('footer.partner')}}</label>
                @foreach(trans('footer.friends_links') as $label=>$url)
                    <a href="{{$url}}" target="_blank" title="{{$label}}">{{$label}}</a>
                @endforeach
            </div>
            <div class="col-md-5 about">
                {{trans('footer.credits')}}
                <a href="{{url('about')}}">{{trans('footer.about')}}</a>
                {{trans('footer.footer_links')}}
            </div>
        </div>
    </div>
</div>