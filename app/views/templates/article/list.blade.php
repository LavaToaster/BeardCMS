@section("title")
Articles
@endsection

@section("content")
<div class="container">
    @foreach($articles as $article)
    <div class="panel">
        <div class="panel-heading"><h3>{{ $article['title'] }}</h3></div>
        {{ $article['content'] }}
    </div>
    @endforeach
</div>
@endsection