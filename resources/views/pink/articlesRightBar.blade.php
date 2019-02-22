<div id="sidebar-blog-sidebar" class="sidebar group">

    <div class="widget-first widget recent-posts">
        <h3>Recent Posts</h3>
        <div class="recent-post group">
            @foreach($portfolios as  $index=>$portfolio)
                @if($index <= 2)
                <div class="hentry-post group">
                    <div class="thumb-img"><img style="width: 55px ;height: 55px" src="{{asset(env('THEME'))}}/images/articles/{{$portfolio->img->mini}}" alt="001" title="001" /></div>
                    <div class="text">
                        <a href="article.html" title="Section shortcodes &amp; sticky posts!" class="title">{{$portfolio->title}}</a>
                        <p>{{str_limit($portfolio->text,100)}}</p>
                        <a class="read-more" href="article.html">&rarr; Read More</a>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        @foreach($articles as $article)
           {{-- {{dd($article->user)}}--}}
        @endforeach

        <div class="widget-last widget recent-comments">
            <h3>Recent Comments</h3>
            <div class="recent-post recent-comments group">
                @if(!$comments->isEmpty())
                    @foreach($comments as $comment)
                        <div class="the-post group">
                            <div class="avatar">
                                <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" />
                            </div>
                            <span class="author"><strong><a href="#"></a>{{$comment->user->name}}</strong> in</span>
                            <a class="title" href="{{route('articles.show',$comment->article->alias)}}">{{$comment->article->title}}</a>
                            <p class="comment">
                                {{ $comment->text }} <a class="goto" href="{{route('articles.show',$comment->article->alias)}}">&#187;</a>
                            </p>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

    </div>
</div>