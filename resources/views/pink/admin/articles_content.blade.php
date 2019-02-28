@if($articles)
    <div id="content-page" class="content-group">
        <div class="hentry group">
            <h2>Articles</h2>
            <div class="short-table white">
                <table style="width: 100%" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <td class="align-left">ID</td>
                            <td>Title</td>
                            <td>Text</td>
                            <td>Image</td>
                            <td>Category</td>
                            <td>Alias</td>
                            <td>Operatios</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article)
                            <tr>
                                <td class="align-left">{{ $article->id }}</td>
                                <td class="align-left"><a href="{{route('articles.edit',$article->alias)}}">{{$article->title}}</a></td>
                                <td class="align-left">{{ str_limit($article->text,200) }}</td>
                                <td><img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->mini }}"></td>
                                <td>{{ $article->category->title }}</td>
                                <td>{{ $article->alias }}</td>
                                <td>
                                    <form method="post" action="{{route('articles.destroy',$article->alias)}}" class="form-horizontal">
                                        <button type="submit" class="btn btn-french-5">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <form method="post" action="{{route('articles.create')}}" class="form-horizontal">
                    <button type="submit" class="btn btn-green">Add new article</button>

                </form>

            </div>
        </div>
    </div>
@endif
