@section("title")
Edit Page | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-12 well">
            <fieldset>
                <legend>Editing {{ $page->title }}</legend>
                {{ Form::model($page, array('method' => 'put', 'route' => ['admin.page.update', $page->id], 'class' => 'form-horizontal')) }}
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="title">Title</label>
                    <div class="col-lg-10">
                        {{ Form::text('title', $page->title, ['class' => 'form-control', 'placeholder' => 'E.G: Home...']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="slug">Slug</label>
                    <div class="col-lg-10">
                        {{ Form::text('slug', $page->slug, ['class' => 'form-control', 'placeholder' => 'home.html']) }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" for="page_content">Content</label>
                    <div class="col-lg-10">
                        {{ Form::textarea('page_content', $page->content, ['class' => 'form-control']) }}
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-info btn-block btn-large">Edit Page</button>
                {{ Form::close(); }}
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