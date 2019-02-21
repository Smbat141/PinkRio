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


        <div class="widget-last widget recent-comments">
            <h3>Recent Comments</h3>
            <div class="recent-post recent-comments group">

                <div class="the-post group">
                    <div class="avatar">
                        <img alt="" src="images/avatar/unknow55.png" class="avatar" />
                    </div>
                    <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">eduard</a></strong> in</span>
                    <a class="title" href="article.html">Nice &amp; Clean. The best for your blog!</a>
                    <p class="comment">
                        hi <a class="goto" href="article.html">&#187;</a>
                    </p>
                </div>

                <div class="the-post group">
                    <div class="avatar">
                        <img alt="" src="images/avatar/nicola55.jpeg" class="avatar" />
                    </div>
                    <span class="author"><strong><a href="mailto:nicola@yopmail.com">nicola</a></strong> in</span>
                    <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                    <p class="comment">
                        While i’m the author of the post. My comment template is different,... <a class="goto" href="article.html">&#187;</a>
                    </p>
                </div>

                <div class="the-post group">
                    <div class="avatar">
                        <img alt="" src="images/avatar/unknow55.png" class="avatar" />
                    </div>
                    <span class="author"><strong><a href="mailto:no-email@i-am-anonymous.not">Anonymous</a></strong> in</span>
                    <a class="title" href="article.html">This is the title of the first article. Enjoy it.</a>
                    <p class="comment">
                        <a class="goto" href="article.html">&#187;</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>