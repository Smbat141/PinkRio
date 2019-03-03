@if(count($errors) > 0)
    <div class="box error-box">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

@if(session('message'))
    <div class="box success-box">
        <p> {{session('message')}}</p>
    </div>
@endif
<div id="content-page" class="content group">
    <div class="hentry group">
        <form action="{{isset($article->id) ? route('articles.update',$article->alias) : route('articles.store')}}" id="contact-form-contact-us" class="contact-form" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="usermessagea"></div>
            <fieldset>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Name</span>
                            <br /><span class="sublabel">Article title</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span>
                            <input type="text" value="{{isset($article->title) ? $article->title : old('title')}}" name="title" placeholder="Enter article name">
                        </div>
                        <div class="msg-error"></div>
                    </li>

                    <li class="text-field">
                        <label for="email-contact-us">
                            <span class="label">Alias</span>
                            <br /><span class="sublabel">Article alias</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" value="{{isset($article->alias) ? $article->alias : old('title')}}" name="alias" placeholder="Enter article alias">
                        </div>
                        <div class="msg-error"></div>
                    </li>

                    <li class="text-field">
                        <label for="email-contact-us">
                            <span class="label">Description</span>
                            <br /><span class="sublabel">Article Description</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span>
                            <input type="text" value="{{isset($article->desc) ? $article->desc : old('title')}}" name="desc" placeholder="Enter article desc">
                        </div>
                        <div class="msg-error"></div>
                    </li>

                    <li class="textarea-field">
                        <label for="message-contact-us">
                            <span class="label">Text</span>
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            <textarea  id="message-contact-us" rows="8" cols="30" class="required" name="text">
                                {{isset($article->text) ? $article->text : ''}}
                            </textarea>
                        </div>
                        <div class="msg-error"></div>
                    </li>

                    @if(isset($article->img->path))
                        <li class="textarea-field">
                            <label for="message-contact-us">
                                <span class="label">Article image</span>
                            </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                               <input type="file" name="article_image" class="filestyle">
                                <input type="hidden" name="article_imgage" value="{{$article->img->mini}}">
                                <img src="{{ asset(env('THEME')) }}/images/articles/{{ $article->img->mini }}">
                            </div>
                            <div class="msg-error"></div>
                        </li>
                        @else
                        <li class="textarea-field">
                            <label for="message-contact-us">
                                <span class="label">Article image</span>
                            </label>
                            <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                                <input type="file" name="article_image" class="filestyle">
                            </div>
                            <div class="msg-error"></div>
                        </li>
                    @endif
                    <li class="textarea-field">
                        <label for="message-contact-us">
                            <span class="label">Article image</span>
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-pencil"></i></span>
                            <div class="form-group">
                                <label for="sel1">Select list:</label>
                                    @foreach($categories as $index=>$category)
                                        @if($index == 0)
                                        <select class="form-control" id="sel1" name="category_id">
                                        @endif
                                        <option>{{isset($article->category_id) ? $article->category_id : $category->id}}</option>
                                    @endforeach

                                     </select>
                            </div>
                        </div>
                        <div class="msg-error"></div>
                    </li>
                    @if(isset($article->id))
                        <input type="hidden" name="_method" value="PUT">
                    @endif
                    <li class="submit-button">
                        <button type="submit" class="btn btn-green">Save</button>
                    </li>

                </ul>
            </fieldset>
        </form>
    </div>
</div>