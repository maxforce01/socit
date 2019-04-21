<div class="col-md-2 static">
    @include('partials.findPost')
    <br>
    <div class="suggestions" id="sticky-sidebar">
       <h4 class="grey">Popular tags</h4>
            <ul>
                @foreach(\App\Tag::all() as $tag)
                    <li><a class="post-tag" href="{{route('post.tag',$tag->id)}}">{{$tag->name}}</a><i class="fa fa-times" aria-hidden="true"></i>{{$tag->posts->count()}}</li>
                @endforeach
            </ul>
    </div>
</div>
