<div class="trick-card col-lg-4 col-md-6 col-sm-6 col-xs-12">
    <div class="trick-card_inner js-goto-trick" data-slug="{{$trick->slug}}">
        <a class="trick-card-title" href="{{route('tricks.show', [$trick->slug])}}">{!! $trick->title !!}</a>
        <div class="trick-card-stats trick-card-by">by
            <a href="{{route('user.profile', $trick->user->username)}}">
                {{$trick->user->username}}
            </a>
        </div>
        <div class="trick-card-stats clearfix">
            <div class="trick-card-timeago">{!! trans('tricks.submitted', ['timeago'=>$trick->timeago, 'categories'=>$trick->categories]) !!}</div>
            <div class="trick-card-stat-block"><span class="fa fa-eye"></span>{{$trick->view_cache}}</div>
            <div class="trick-card-stat-block text-center">
                <span class="fa fa-comment"></span>
                <a href="{{url('tricks/'.$trick->slug)}}" data-disqus-identifier="{{$trick->id}}" style="color: #777;">0</a>
            </div>
            <div class="trick-card-stat-block text-right">
                <span class="fa fa-heart"></span>{{$trick->vote_cache}}
            </div>
            <div class="trick-card-tags clearfix">
                @foreach($trick->tags as $tag)
                    <a href="{{url('tags/'.$tag->slug)}}" class="tag" title="{{$tag->name}}">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>

    </div>
</div>