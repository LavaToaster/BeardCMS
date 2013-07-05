@section("title")
Pages | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    @foreach($pages as $page)
        {{ $page->slug }}
    @endforeach
</div>
@endsection