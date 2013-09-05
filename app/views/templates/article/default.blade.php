@section("title")
{{ $article['title'] }} | BeardCMS
@endsection

@section('content')
<div class="container">
    <div class="panel">
        <div class="panel-heading"><h3>{{ $article['title'] }}</h3></div>
        {{ $article['content'] }}
    </div>
</div>
@endsection