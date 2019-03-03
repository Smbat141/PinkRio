<div class="sidebar group">
    <div class="widget-first widget recent-posts">
        <h3>From our blog</h3>
        <div class="recent-post group">
            @foreach($articles as $article)
                <div class="hentry-post group">
                    <div class="thumb-img"><img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->mini}}" alt="001" title="001" /></div>
                    <div class="text">
                        <a href="{{ route('articles.show',['article' => $article->alias]) }}" title="Section shortcodes &amp; sticky posts!" class="title">{{ $article->desc }}</a>
                        <p class="post-date">{{$article->created_at->format('F d,Y')}}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

    <div class="widget-last widget text-image">
        <h3>Customer support</h3>
        <div class="text-image" style="text-align:left"><img src="{{asset(env('THEME'))}}/images/callus.gif" alt="Customer support" /></div>
        <p>Proin porttitor dolor eu nibh lacinia at ultrices lorem venenatis. Sed volutpat scelerisque vulputate. </p>
    </div>
</div>