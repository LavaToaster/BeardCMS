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
            <a href="{{ URL::to('admin/page/create') }}" class="btn btn-large btn-primary pull-right">Create Page</a>
        </div>
    </div>
    <hr >
    <div class="row">
        <div class="col-12">
            <div id="alerts"></div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Page Title</th>
                        <th>Slug</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr id="page-{{ $page->id }}">
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <a href="{{ URL::to('admin/page/'.$page->id.'/edit') }}" class="btn btn-default"><i class="icon-edit"></i> Edit</a>
                                <a href="#" id="delete-{{ $page->id }}" class="btn btn-danger"><i class="icon-remove"></i> Delete</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("js")
<script>
    var alertPresent = false;

    $("a[id^=delete-]").on('click',function(){
        var id = $(this).attr('id').split("-")[1];

        var del = $.post( "{{ URL::to('admin/page/' . $page->id) }}", {
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
                        console.log("Supposed to be fading out now");
                        $('#alerts').fadeOut("fast", function () {
                            $('#alerts').remove();
                        });
                    }, 2000);
                });

                console.log("Supposed to be fading out the row now");
                $("#page-" + id).fadeOut(1000, function () {
                    console.log("Supposed to be removing row out now");
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