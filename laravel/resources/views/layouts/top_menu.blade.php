<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right main-menu">
        @foreach($items as $item)
            <li class="dropdown"><a href="{{ url($item->url) }}" data-toggle="" class="dropdown-toggle">{{ $item->title }}</a>
                @if($item->children->count())
                    <ul role="menu" class="dropdown-menu">
                        @foreach($item->children as $subItem)
                            <li>
                                <a target="{{ $subItem->target }}" href="{{ url($subItem->url) }}">{{ $subItem->title }}</a></li>
                            @if(!$loop->last) @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        <li class="dropdown">
            <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <h5>Выйти</h5>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</div>
