<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png">

    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <!-- --------- tiny slider css ------ -->
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}">
    <!-- --------- font awsome css ------ -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.css')}}">
    <!-- -------- venobox css ------- -->
    <link rel="stylesheet" href="{{ asset('assets/css/venobox.css')}}" type="text/css" media="screen" />
    <!-- ---------- default css --------- -->
    <link rel="stylesheet" href="{{ asset('assets/css/default.css')}}">
    <!-- --- style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <!-- datatable cdn link -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
    <!-- fontWesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- model bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- search box link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/virtual-select.min.css')}}">

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
                        Create event
                    </button>
                    @endif
                </div>

                <div class="container m-4">
                    <div class="p-3 mb-5 bg-body rounded">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                        </div>
                        @endif
                        <h1>Hallo <span style="color: green;">{{$user->name}}</span> mark attendance for <span style="color: green;">{{$eventName}}</span></h1>
                        <div class="row">
                            <div class="container p-1 m-4">
                                <div class="row">
                                    <div class="col shadow-lg p-3  bg-body rounded">
                                        <lebel>Shareholder</lebel>
                                        <form action="{{ route('attendant.store', ['eventId' => $eventId]) }}" method="post">
                                            @csrf

                                            <select type="number" id="multi_option" name="shareholder_id" placeholder="Select a shareholder" data-search="true" data-silent-initial-value-set="true">
                                                @foreach($shareholders as $shareholder)
                                                <option style="color: green;" value="{{ $shareholder->id }}">{{ $shareholder->Name }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn mt-3" type="submit" style="background-color: #3A9340; color: #fff;">Mark shareholder</button>
                                        </form>
                                    </div>

                                    <div class="col shadow-lg ml-2 p-3  bg-body rounded">
                                        <lebel>Proxies</lebel>
                                        <form action="" method="post">
                                            <select type="name" id="multi_option" name="native-select" placeholder="Select a proxy" data-search="true" data-silent-initial-value-set="true">
                                                @foreach($proxies as $proxy)
                                                <option value="{{ $proxy->name}}">{{ $proxy->name  }}</option>
                                                @endforeach
                                            </select>
                                            <button class="btn mt-3" style="background-color: #3A9340; color: #fff;">Mark proxy</button>
                                        </form>
                                    </div>

                                    <div class="card shadow-sm p-3 mt-5 bg-body rounded">
                                        <table id="example" class="display nowrap">
                                            <thead>
                                                <tr>

                                                    <th>CSD</th>
                                                    <th>Name</th>
                                                    <th>Share</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($shareholderRecord as $record)
                                                <tr>
                                                    <td>{{ $record->CSD}}</td>
                                                    <td>{{ $record->name}}</td>
                                                    <td>{{ $record->shares}}</td>
                                                    <td><button class="btn " style="color: white; background-color: #3A9340;">Unmark</button></td>
                                                </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>



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
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    <script type="text/javascript" src="{{ asset('assets/js/virtual-select.min.js')}}"></script>
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

                $('#id').val(data[0]);
                $('#name').val(data[1]); // Assuming name is in the first column
                $('#date').val(data[2]);
                $('#time').val(data[3]);

                $('#editform').attr('action', '/event/' + data[0]);
                $('#editModel').modal('show');
            });
            // start of the delete script
            table.on('click', '.delete', function() {
                $tr = $(this).closest('tr');
                if ($tr.hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }
                var data = table.row($tr).data();
                console.log(data);

                $('#deleteform').attr('action', '/event/' + data[0]);
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

            // search and select 
            VirtualSelect.init({
                ele: '#multi_option'
            });
        });
    </script>
</body>

</html>