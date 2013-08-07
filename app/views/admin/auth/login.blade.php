@section("title")
Login | BeardCMS ACP
@endsection

@section("content")
<div class="col-lg-offset-3 col-lg-6 well">
    <fieldset>
        <legend>Please Sign In</legend>
        {{ Form::open(array('url' => '/admin/login', 'class' => 'form-horizontal')) }}
            <div class="form-group">
                <label class="col-lg-3 control-label" for="email">Email</label>
                <div class="col-lg-9">
                    <input class="form-control" placeholder="admin@example.com" id="email" name="email" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label" for="password">Password</label>
                <div class="col-lg-9">
                    <input class="form-control" placeholder="*********" id="password" name="password" type="password"> <br>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-offset-3 col-lg-9">
                    <label class="checkbox">
                        <input type="checkbox" name="rememberme" value="1"> Remember Me
                    </label>
                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-info btn-block btn-large">Sign in</button>
        {{ Form::close(); }}
    </fieldset>
</div>
@endsection