
<div id="content-single" class="content group">
    <div class="hentry hentry-post blog-big group ">
        @foreach($articles as $article)
            @if($article->alias == $alias)
                <div class="thumbnail">
                    <!-- post title -->
                    <h1 class="post-title"><a href="article.html">{{$article->title}}</a></h1>
                    <!-- post featured -->
                    <div class="image-wrap">
                        <img src="{{asset(env('THEME'))}}/images/articles/{{$article->img->max}}" alt="00212" title="00212" />
                    </div>
                    <p class="date">
                        <span class="month">{{ $article->created_at->format('M') }}</span>
                        <span class="day">{{ $article->created_at->format('d') }}</span>
                    </p>
                </div>
                <!-- post meta -->
                <div class="meta group">
                    <p class="author"><span>by <a  title="Posts by Nicola Mustone" rel="author">{{ $article->user->name }}</a></span></p>
                    <p class="categories"><span>In: <a href="{{ route('articlesCat',$article->category->alias) }}" title="View all posts in Design" rel="category tag">{{ $article->category->alias }}</a>
                    <p class="comments"><span><a href="#comments" title="Comment on This is the title of the first article. Enjoy it.">{{ count($article->comment) ? count($article->comment) : '0'  }} Comment</a></span></p>
                </div>
                <!-- post content -->
                <div class="the-content single group">
                    {{$article->text}}
                    <div class="socials">
                        <h2>love it, share it!</h2>
                        <a href="https://www.facebook.com/sharer.html?u=http%3A%2F%2Fyourinspirationtheme.com%2Fdemo%2Fpinkrio%2F2012%2F09%2F24%2Fthis-is-the-title-of-the-first-article-enjoy-it%2F&amp;t=This+is+the+title+of+the+first+article.+Enjoy+it." class="socials-small facebook-small" title="Facebook">facebook</a>
                        <a href="https://twitter.com/share?url=http%3A%2F%2Fyourinspirationtheme.com%2Fdemo%2Fpinkrio%2F2012%2F09%2F24%2Fthis-is-the-title-of-the-first-article-enjoy-it%2F&amp;text=This+is+the+title+of+the+first+article.+Enjoy+it." class="socials-small twitter-small" title="Twitter">twitter</a>
                        <a href="https://plusone.google.com/_/+1/confirm?hl=en&amp;url=http%3A%2F%2Fyourinspirationtheme.com%2Fdemo%2Fpinkrio%2F2012%2F09%2F24%2Fthis-is-the-title-of-the-first-article-enjoy-it%2F&amp;title=This+is+the+title+of+the+first+article.+Enjoy+it." class="socials-small google-small" title="Google">google</a>
                        <a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fyourinspirationtheme.com%2Fdemo%2Fpinkrio%2F2012%2F09%2F24%2Fthis-is-the-title-of-the-first-article-enjoy-it%2F&amp;media=http://yourinspirationtheme.com/demo/pinkrio/files/2012/09/00212.jpg&amp;description=Fusce+nec+accumsan+eros.+Aenean+ac+orci+a+magna+vestibulum+posuere+quis+nec+nisi.+Maecenas+rutrum+vehicula+condimentum.+Donec+volutpat+nisl+ac+mauris+consectetur+gravida.+Lorem+ipsum+dolor+sit+amet%2C+consectetur+adipiscing+elit.+Donec+vel+vulputate+nibh.+Pellentesque%5B...%5D" class="socials-small pinterest-small" title="Pinterest">pinterest</a>
                        <a href="http://yourinspirationtheme.com/demo/pinkrio/2012/09/24/this-is-the-title-of-the-first-article-enjoy-it/" class="socials-small bookmark-small" title="This is the title of the first article. Enjoy it.">bookmark</a>
                    </div>
                </div>
                <p class="tags">Tags: <a href="#" rel="tag">book</a>, <a href="#" rel="tag">css</a>, <a href="#" rel="tag">design</a>, <a href="#" rel="tag">inspiration</a></p>
                <div class="clear"></div>
            @endif
        @endforeach
        <!-- post featured & title -->

    </div>
    <!-- START COMMENTS -->

        <div id="comments">
            <h3 id="comments-title">
                <span>{{ count($comments) }}</span> comments
            </h3>
            @if(Auth::check())
                <div id="respond">
                    <h3 id="reply-title">Leave a <span>Reply</span> <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Cancel reply</a></small></h3>
                    <form action="{{ route('comment.store') }}" method="post" id="commentform">
                        {{ csrf_field() }}
                        <p class="comment-form-comment"><label for="comment">Your comment</label><textarea id="text" name="text" cols="45" rows="8"></textarea></p>
                        <div class="clear"></div>
                        <p class="form-submit">
                            <input name="article_id" type="hidden" id="article_id" value="{{ $id_alias }}" />
                            <input name="submit" type="submit" id="submit" value="Post Comment" />
                        </p>
                    </form>
                </div>
            @endif

            <ol class="commentlist group">
                @foreach($comments->reverse() as $index=>$comment)

                    <li class="comment">
                    <div class="comment-container">
                        <div class="comment-author vcard">
                            <img alt="" src="https://www.gravatar.com/avatar/{{$hash}}?d=mm&s=55" class="avatar" height="75" width="75" />
                            <cite class="fn">{{ $comment->user->name }}</cite>
                        </div>
                        <!-- .comment-author .vcard -->
                        <div class="comment-meta commentmetadata">
                            <div class="intro">
                                <div class="commentDate">
                                    <a href="#comment-2">
                                        {{ $comment->created_at->format('F d, Y \a\t H:i') }} pm</a>
                                </div>
                            </div>
                            <div class="comment-body">
                                <p>{{ $comment->text }}</p>
                            </div>
                        </div>
                        <!-- .comment-meta .commentmetadata -->
                    </div>
                    <!-- #comment-##  -->
                </li>
                @endforeach
            </ol>
        </div>
        <!-- START TRACKBACK & PINGBACK -->
        <h2 id="trackbacks">Trackbacks and pingbacks</h2>
        <ol class="trackbacklist"></ol>
        <p><em>No trackback or pingback available for this article.</em></p>

        <!-- END TRACKBACK & PINGBACK -->

        <!-- #respond -->
    </div>


