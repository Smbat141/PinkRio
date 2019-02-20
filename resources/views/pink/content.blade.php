<div id="content-home" class="content group">
    <div class="hentry group">
        <div class="section portfolio">

            <h3 class="title">Latest projects</h3>
            @foreach($portfolios as $index=>$value)
                @if($index==0)
                <div class="hentry work group portfolio-sticky portfolio-full-description">
                    <div class="work-thumbnail">
                        <a class="thumb"><img src="{{asset(env('THEME'))}}/images/projects/{{$value->img}}" alt="0081" title="0081" /></a>
                        <div class="work-overlay">
                            <h3><a href="{{ route('portfolios.show',['portfolios' => $value->alias]) }}">{{$value->title}}</a></h3>
                            <p class="work-overlay-categories"><img src="{{asset(env('THEME'))}}/images/categories.png" alt="Categories" /> in: <a href="category.html">{{ $value->filter->alias }}</a></p>
                        </div>
                    </div>
                    <div class="work-description">
                        <h2><a href="{{ route('portfolios.show',['portfolios' => $value->alias]) }}">{{$value->title}}</a></h2>
                        <p class="work-categories">in: <a href="category.html">{{ $value->filter->alias }}</a></p>
                        <p>{{ str_limit($value->text,200) }}</p>
                            <a href="project.html" class="read-more">|| Read more</a>
                    </div>
                </div>
                    <div class="clear"></div>

                    @continue
                @endif

                @if($index > 0)
                    <div class="portfolio-projects">
                @endif
                        <div class="portfolio-projects">
                            <div class="related_project{{($index == 4)?'_last related_project' : ''}}">
                                <div class="overlay_a related_img">
                                    <div class="overlay_wrapper">
                                        <img src="{{asset(env('THEME'))}}/images/projects/{{$value->img}}" alt="0061" title="0061" />
                                        <div class="overlay">
                                            <a class="overlay_img" href="{{asset(env('THEME'))}}/images/projects/{{$value->img}}" rel="lightbox" title=""></a>
                                            <a class="overlay_project" href="{{ route('portfolios.show',['portfolios' => $value->alias]) }}"></a>
                                            <span class="overlay_title">{{$value->title}}</span>
                                        </div>
                                    </div>
                                </div>
                                <h4><a href="{{ route('portfolios.show',['portfolios' => $value->alias]) }}">{{$value->title}}</a></h4>
                                <p>{{ str_limit($value->text,200) }}</p>
                            </div>
                        </div>
                    </div>
            @endforeach


            <div class="clear"></div>
        </div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>