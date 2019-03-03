<div id="content-page" class="content group">
    <div class="hentry group">
        <div id="portfolio" class="portfolio-big-image">
            @if($portfolios)
                @foreach($portfolios as $portfolio)
                <div class="hentry work group">
                    <div class="work-thumbnail">
                        <div class="nozoom">
                            <img src="{{asset(env('THEME'))}}/images/projects/{{ $portfolio->img->max }}" alt="0061" title="0061" />
                            <div class="overlay">
                                <a class="overlay_img" href="{{asset(env('THEME'))}}/images/projects/{{ $portfolio->img->path }}" rel="lightbox" title="Love"></a>
                                <a class="overlay_project" href="project.html"></a>
                                <span class="overlay_title">{{ $portfolio->title }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="work-description">
                        <h3>{{ $portfolio->title }}</h3>
                        <p>{{ $portfolio->text }}</p>
                        <div class="clear"></div>
                        <div class="work-skillsdate">
                            <p class="skills"><span class="label">Filter:</span> {{ $portfolio->filter_alias }}</p>
                            <p class="skills"><span class="label">Year:</span>{{ $portfolio->created_at->format('Y') }}</p>
                        </div>
                        <a class="read-more" href="{{route('portfolios.show',$portfolio->alias)}}">View Project</a>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
                    <div class="general-pagination group">
                    @if($portfolios->lastPage() > 1)
                        @if($portfolios->currentPage() !== 1)
                            <a href="{{ $portfolios->url($portfolios->currentPage() - 1) }}">{{ Lang::get('pagination.previous')  }}</a>
                        @endif

                        @for($i=1; $i<=$portfolios->lastPage(); $i++)
                            @if($portfolios->currentPage() == $i)
                                <a href="#" class="selected disabled">{{$i}}</a>
                            @else
                                <a href="{{ $portfolios->url($i) }}" >{{$i}}</a>
                            @endif
                        @endfor
                        <a href="{{ $portfolios->url($portfolios->currentPage() + 1) }}">{{ Lang::get('pagination.next')  }}</a>
                    @endif
                    </div>
            @endif

        </div>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
    <!-- END COMMENTS -->
</div>