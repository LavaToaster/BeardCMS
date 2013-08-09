@section("title")
Pages | BeardCMS ACP
@endsection

@section("content")
<div class="container">
    <div class="row">
        <div class="col-6">
            <h1>Pages</h1>
        </div>
        <div class="col-6">
            <h2><a href="{{ URL::to('admin/page/create') }}" class="ladda-button btn btn-large btn-primary pull-right" data-style="expand-right">Create Page</a></h2>
        </div>
    </div>
    <hr >
    <div class="row">
        <div class="col-12">
            <div id="alerts"></div>
            @if(count($pages))
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>Slug</th>
                        <th>Controls</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr id="page-{{ $page->id }}">
                        <td><strong>{{ $page->title }}</strong></td>
                        <td><em>{{ $page->slug }}</em></td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="{{ URL::to('admin/page/'.$page->id.'/edit') }}" class="ladda-button btn btn-default" data-style="slide-up"><i class="icon-edit"></i> Edit</a>
                                <a href="#" id="delete-{{ $page->id }}" class="ladda-button btn btn-danger" data-style="slide-up"><i class="icon-remove"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="jumbotron">
                <h1><i class="icon-bullhorn"></i> It's lonely in here</h1>
                <p>You should create a page.</p>
                <a href="{{ URL::to('admin/page/create') }}" class="ladda-button btn btn-primary btn-large" data-style="expand-right">Create Page</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section("js")
<script>
    var alertPresent = false;

    $("a[id^=delete-]").on('click',function(){
        var id = $(this).attr('id').split("-")[1];

        var del = $.post( "{{ URL::to('admin/page/') }}" + id, {
            _method: "DELETE",
            _token: "{{ csrf_token() }}"
        });

        del.done(function( result ) {

            if (result.success) {
                if (alertPresent) {
                    alertError('hide', "");
                }

                $('#alerts').prepend("<div id=\"loginSuccess\" class=\"alert alert-success\"> " + result.message + " </div>").hide().fadeIn('slow', function () {
                    window.setTimeout(function () {
                        $('#alerts').fadeOut("fast", function () {
                            $('#alerts').remove();
                        });
                    }, 2000);
                });

                $("#page-" + id).fadeOut(1000, function () {
                    $("#page-" + id).remove();
                });
            } else {
                if (alertPresent) {
                    alertError('reload', result.message);
                } else {
                    alertError('display', result.message);
                }
            }
        });

    });

    function alertError(action, message) {
        if (action == 'display') {
            $('#alerts').prepend( "<div id=\"alert\" class=\"alert alert-error\">" + message + "</div>" ).hide().fadeIn('slow');
            alertPresent = true;
        }
        if (action == 'hide') {
            $("#alerts:first-child").fadeOut("slow", function () {
                $("#alerts:first-child").remove();
                alertPresent = false;
            });
        }
        if(action == 'reload') {
            $("#alerts:first-child").fadeOut("fast", function () {
                $("#alerts:first-child").remove();
                alertError('display', message);
            });
        }
    }
</script>
@endsection