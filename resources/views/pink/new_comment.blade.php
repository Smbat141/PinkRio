<li class="comment new_comment" id="li-comment-{{$data['id']}} ">
    <div class="comment-container" id="comment-{{$data['id']}}">
        <div class="comment-author vcard">
            <img alt="" src="https://www.gravatar.com/avatar/{{$data['hash']}}?d=mm&s=55" class="avatar" height="75" width="75" />
            <cite class="fn">{{$data['name']}}</cite>
        </div>
        <div class="comment-meta commentmetadata">
            <div class="intro">

            </div>
            <div class="comment-body">
                <p>{{$data['text']}}</p>
            </div>
        </div>
    </div>
</li>
