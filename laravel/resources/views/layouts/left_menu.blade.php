<ul class="nav-news-feed" >
    @foreach($items as $menu_item)
            <li><i class="icon ion-images"></i><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>
