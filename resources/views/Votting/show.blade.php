@php
use App\Models\User;
use Illuminate\Support\Facades\Auth;
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png">
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- --------- tiny slider css ------ -->
    <link rel="stylesheet" href="assets/css/tiny-slider.css">
    <!-- --------- font awsome css ------ -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- -------- venobox css ------- -->
    <link rel="stylesheet" href="assets/css/venobox.css" type="text/css" media="screen" />
    <!-- ---------- default css --------- -->
    <link rel="stylesheet" href="assets/css/default.css">
    <!-- --- style css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- datatable cdn link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <!-- fontWesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- model bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- search box link -->
    <link rel="stylesheet" type="text/css" href="assets/css/virtual-select.min.css">
    <!----------for polling station------------->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> -->

</head>

<body>

    @include('includes.navmenu')

    <div class=" container-fluid">
        <div class="row">
            @include('includes.sidebar')
            <div class="col-md-9">

                <div class="container ml-5">
                    @if(\Auth::user()->type == 0)
                    <button type="button" class="btn btn-success mt-3" style="color: white; background-color: #3A9340;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        <a href="{{ route('votting.create') }}">Create poll</a>
                    </button>
                    @endif
                </div>


                <div class="container m-4">
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                    </div>
                    @endif
                </div>
                <div class="container m-4">
                    <div class="row">
                        <div class="col-md-12">
                            <!--------- everything to be set here------------->
                            <div class="container">

                                <h1 class="center">
                                    <span style="color: #3A9340;">{{$poll->title}}</span>
                                </h1>


                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 shadow-lg">
                                            <div class="container m-4">
                                                <div class="alert alert-success alert-dismissible mt-2 fade show">
                                                    <h6>
                                                        The voting process ends <span style="color: #3A9340;">{{$poll->EndDateFormat}}</span>
                                                    </h6>
                                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> -->
                                                </div>
                                            </div>

                                            <div class="card m-5 shadow-lg">
                                                <form action="{{ route('poll.vote', [$poll]) }}" method="post">
                                                    <div class="card p-4">
                                                        <div class="row justify-content-center">
                                                            <div class="col-sm-4 p-4">
                                                                @csrf
                                                                @foreach($poll->options as $option)
                                                                <div class="container p-2 shadow-sm">
                                                                    <p>
                                                                        <label>
                                                                            <input style="color: #3A9340;" name="option_id" type="radio" value="{{ $option->id }}" @if ($selectedOption==$option->id) checked @endif />
                                                                            <span>{{ $option->content }} {{ $option->votes_count }}</span>
                                                                        </label>
                                                                    </p>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>

                                                        <div class="row justify-content-center">
                                                            <button class="btn btn-success" style="background: #3A9340; margin-top: 10px; width: 300px;" type="submit">
                                                                Vote
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--------- for polling-------->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
</body>
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@include('includes.dataTable')
<script type="text/javascript" src="assets/js/virtual-select.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable();
        // start editing
        table.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            if ($tr.hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);


            $('#Title').val(data[0]); // Assuming name is in the first column
            $('#Start Time').val(data[1]);
            $('#End Time').val(data[2]);


            $('#editform').attr('action', '/event/' + data[0]);
            $('#editModel').modal('show');
        });

        table.on('click', '.delete', function() {
            $tr = $(this).closest('tr');
            if ($tr.hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var eventId = $tr.data('event-id');
            console.log(eventId);

            $('#deleteform').attr('action', '/event/' + eventId);
            $('#deleteModel').modal('show');
        });

        //start of marking attendant script
        table.on('click', '.attend', function() {
            $tr = $(this).closest('tr');
            if ($tr.hasClass('child')) {
                $tr = $tr.prev('.parent');
            }
            var data = table.row($tr).data();
            console.log(data);
            $('#attendance').attr('href', '/attendant/' + data[0]);
        });
        VirtualSelect.init({
            ele: '#multi_option'
        });
    });
</script>



</html>