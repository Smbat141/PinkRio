<div class="menu classic">
    <ul id="nav" class="menu">
        @foreach($menus as $menu)
            @if($menu->parent == 0)
                <li>
                    <a href="{{ $menu->path }}">{{ $menu->title }}</a>
                   @if($menu->title == 'Blog')
                        <ul class="sub-menu">
                           @foreach($menus as $m)
                               @if($m->parent == 3)
                                        <li><a href="{{ $m->path }}">{{ $m->title }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</div>

<ul class="sub-menu">
    <li><a href="home-ii.html"></a></li>
</ul>