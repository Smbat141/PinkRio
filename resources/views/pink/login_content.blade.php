<div id="content-page" class="content group">
    <div class="hentry group">
        <form id="contact-form-contact-us" class="contact-form" method="post" action="{{ url('login') }}">
            {{ csrf_field() }}
            <div class="usermessagea"></div>
            <fieldset>
                <ul>
                    <li class="text-field">
                        <label for="name-contact-us">
                            <span class="label">Name</span>
                            <br />
                            <span class="sublabel">Login</span><br />
                        </label>
            <div class="input-prepend"><span class="add-on"><i class="icon-user"></i></span><input id="login" type="text" class="form-control" name="login" value="{{ old('login') }}" >
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </li>
                    <li class="text-field">
                        <label for="email-contact-us">
                            <span class="label">Password</span>
                            <br />
                            <span class="sublabel">This is a field email</span><br />
                        </label>
                        <div class="input-prepend"><span class="add-on"><i class="icon-envelope"></i></span><input id="password" type="password" class="form-control" name="password"></div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </li>
                    <li class="submit-button">
                        <input type="submit"  value="Send Message" class="sendmail alignright" />
                    </li>
                </ul>
            </fieldset>
        </form>

    </div>
</div>