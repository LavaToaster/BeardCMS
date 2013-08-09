@section("title")
Edit Page | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12 well">
            <fieldset>
                <legend>Create a new page</legend>
                @if(Session::has('errors'))
                @foreach(Session::get('errors') as $error)
                <div class="alert alert-error">
                    <strong>Error!</strong> <button type="button" class="close" data-dismiss="alert">&times;</button>
                    @foreach($error as $message)
                        {{ $message }} <br />
                    @endforeach
                </div>
                @endforeach
                @endif
                {{ Form::open(array('method' => 'post', 'route' => ['admin.page.store'], 'class' => 'form-horizontal')) }}
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="title">Title</label>
                    <div class="col-lg-10">
                        {{ Form::text('title', Input::old('title'), ['class' => 'form-control', 'placeholder' => 'E.G: Home...']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="slug">Slug</label>
                    <div class="col-lg-10">
                        {{ Form::text('slug', Input::old('slug'), ['class' => 'form-control', 'placeholder' => 'home.html']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="template">Template</label>
                    <div class="col-lg-10">
                        {{ Form::select('template', $templates, Input::old('template'),['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="page_content">Content</label>
                    <div class="col-lg-10">
                        {{ Form::textarea('page_content', Input::old('content'), ['class' => 'form-control']) }}
                    </div>
                </div>
                <button type="submit" name="submit"class="ladda-button btn btn-info btn-block btn-large" data-style="slide-up">Create Page</button>
                {{ Form::close() }}
            </fieldset>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendor/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('page_content',  {
        toolbar: [],
        startupMode : 'source'
    });
</script>
@endsection