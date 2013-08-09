@section("title")
Edit Page | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Editing {{ $page->title }}</h1>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <fieldset>
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
                {{ Form::model($page, ['method' => 'put', 'route' => ['admin.page.update', $page->id]]) }}
                <div class="row">
                    <div class="col-lg-8 form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="title">Title</label>
                            <div class="col-lg-10">
                                {{ Form::text('title', Input::old('title') ?: $page->title, ['class' => 'form-control', 'placeholder' => 'E.G: Home...']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="page_content">Content</label>
                            <div class="col-lg-10">
                                {{ Form::textarea('page_content', Input::old('content') ?: $page->content, ['id' => 'page_content','class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel">
                            <div class="panel-heading">
                                <i class="icon-wrench"></i> Page Settings
                            </div>
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="slug">Slug</label>
                                    <div class="col-lg-9">
                                        {{ Form::text('slug', Input::old('slug') ?: $page->slug, ['class' => 'form-control', 'placeholder' => 'home.html']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="template">Template</label>
                                    <div class="col-lg-9">
                                        {{ Form::select('template', $templates, Input::old('template') ?: $page->template, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label" for="template">Visibility</label>
                                    <div class="col-lg-9">
                                        {{ Form::select('visibility', [
                                            'public'  => 'Public',
                                            'private' => 'Private'
                                        ], Input::old('visibility') ?: null, ['class' => 'form-control']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button type="submit" name="submit" class="ladda-button btn btn-info btn-block btn-large" data-style="slide-up">Save and close</button>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                {{ Form::close(); }}
            </fieldset>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ URL::asset('js/vendor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('js/vendor/ckeditor/adapters/jquery.js') }}"></script>
<script>
    $('#page_content').ckeditor({
        toolbar: [{ name: 'sourceTools', items: ['searchCode','autoFormat','CommentSelectedRange','UncommentSelectedRange','AutoComplete']}, { name: 'maximize', items: [ 'Maximize' ] },],
        startupMode : 'source'
    });
</script>
@endsection