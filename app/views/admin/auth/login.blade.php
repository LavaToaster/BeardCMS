@section("title")
Login | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    <form method="POST" action="">
        <h2>Admin Panel</h2>
        <div id="loginMessages"></div>
        <div class="form-horizontal" id="loginArea">
            <div id="loginMessages">
                @if(count($errors))
                <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>There were errors processing your login request:</strong> <br />
                    <ul>
                    @foreach($errors as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="control-group">
                <label class="control-label" for="email">Email</label>
                <div class="controls">
                    <input type="email" name="email" id="email" placeholder="admin@example.com" required>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" name="password" id="password" placeholder="********" required>
                </div>
            </div>
        </div>
        <div class="form-inline">
            <button type="submit" id="login" class="btn btn-large btn-primary">Sign in</button>
        </div>
    </form>
</div>
@endsection