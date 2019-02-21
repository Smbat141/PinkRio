<div id="content-blog" class="content group">
    @foreach($articles as $article)
    <div class="sticky hentry hentry-post blog-big group">
        <!-- post featured & title -->
        <div class="thumbnail">
            <!-- post title -->
            <h2 class="post-title"><a href="{{ route('articles.show',$article->alias) }}">{{ $article->title }}</a></h2>
            <!-- post featured -->
            <div class="image-wrap">
                <img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->max }}" alt="001" title="001" />
            </div>
            <p class="date">
                <span class="month">{{ $article->created_at->format('M') }}</span>
                <span class="day">{{ $article->created_at->format('d') }}</span>
            </p>
        </div>

        <div class="meta group">
            <p class="author"><span>by <a href="#" title="Posts by {{$article->user->name}}" rel="author">{{$article->user->name}}</a></span></p>
            <p class="categories"><span>In: <a href="" title="View all posts in Design" rel="category tag">{{$article->category->alias}}</a></span></p>
            <p class="comments"><span><a href="article.html#respond" title="Comment on Nice &amp; Clean. The best for your blog!">{{(count($article->comment)) ? (count($article->comment)) : 0}} Comments</a></span></p>
        </div>
        <!-- post content -->
        <div class="the-content group">
            <p>{{ str_limit($article->text,300) }}</p>
            <p><a href="{{ route('articles.show',$article->alias) }}" class="btn   btn-beetle-bus-goes-jamba-juice-4 btn-more-link">→ Read more</a></p>
        </div>
        <div class="clear"></div>
    </div>
@endforeach
    <div class="general-pagination group">
        @if($articles->lastPage() > 1)
            @if($articles->currentPage() !== 1)
                <a href="{{ $articles->url($articles->currentPage() - 1) }}">{{ Lang::get('pagination.previous')  }}</a>
            @endif

            @for($i=1; $i<=$articles->lastPage(); $i++)
                @if($articles->currentPage() == $i)
                    <a href="#" class="selected disabled">{{$i}}</a>
                @else
                    <a href="{{ $articles->url($i) }}" >{{$i}}</a>
                @endif
            @endfor
                {{--<a href="{{ $articles->url($articles->currentPage() + 1) }}" >{{$i}}</a>--}}

                <a href="{{ $articles->url($articles->currentPage() + 1) }}">{{ Lang::get('pagination.next')  }}</a>

        @endif
    </div>

</div>