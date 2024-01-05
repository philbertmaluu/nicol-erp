<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <style>
        .nav-pills .nav-link {
            color: black;
            border-radius: 5px;
            /* Default background color for inactive tabs */
        }

        .nav-pills .nav-link.active,
        .nav-pills .nav-link:active {
            background-color: #3A9340;
            /* Background color for active tab */
        }

        .btn-check:checked+.btn {
            color: #fff;
            background-color: #3A9340;
            /* Set the background color to green */
            border-color: #3A9340;
        }
    </style>
</head>

<body>

    @include('includes.navmenu')

    <div class=" container-fluid">
        <div class="row">
            @include('includes.sidebar')
            <div class="col-md-9">

                <div class="container m-4">
                    <div class="p-3 mb-5 bg-body rounded">
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                        </div>
                        @endif
                        @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                            {{ Session::get('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-7">
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <form id="eventForm" method="POST" action="{{ route('events.updateStatus', ['id' => $event->id]) }}">
                                        @csrf
                                        @method('POST')

                                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                            <input type="radio" class="btn-check" name="is_active" id="btnradio1" value="1" autocomplete="off" {{ $event->is_active == 1 ? 'checked' : '' }}>
                                            <label class="btn btn-outline-success {{ $event->is_active == 1 ? 'active' : '' }}" for="btnradio1">ON</label>

                                            <input type="radio" class="btn-check" name="is_active" id="btnradio3" value="0" autocomplete="off" {{ $event->is_active == 0 ? 'checked' : '' }}>
                                            <label class="btn btn-outline-success {{ $event->is_active == 0 ? 'active' : '' }}" for="btnradio3">OFF</label>
                                        </div>
                                    </form>

                                    <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        <h1 style="margin-left: 100px; margin-top: 10px; font-weight: 500;">Records for <span>{{ $eventName }}</span> </h1>
                                    </a>
                                </div>
                            </div>

                            <div class="container mt-4  p-3">
                                <div class="row">

                                    <div class="col-md-3 ">
                                        <div class="card shadow-md rounded">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 p-4 mr-2">
                                                        <i class="fas fa-users mt-2" style="font-size: 49px; color: #4E9170; "></i>
                                                    </div>
                                                    <div class="col-md-9 p-4 ml-2">
                                                        <h6 class="text-muted mb-1">{{__('Shareholders')}}</h6>
                                                        <span class="h3 font-weight-bold mb-0">{{ $shareholderNumber  }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card shadow-md rounded">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 p-4 mr-2">
                                                        <i class="fas fa-user-secret mt-2" style="font-size: 49px; color: #7A7978;"></i>
                                                    </div>
                                                    <div class="col-md-9 p-4 ml-2">
                                                        <h6 class="text-muted mb-1">{{__('Total Proxy')}}</h6>
                                                        <span class="h3 font-weight-bold mb-0">{{ $proxiesNumber }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card shadow-md rounded">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 p-4 mr-2">
                                                        <i class="fas fa-chart-pie mt-2" style="font-size: 49px; color: #DF9054;"></i>
                                                    </div>
                                                    <div class="col-md-9 p-4 ml-2">
                                                        <h6 class="text-muted mb-1">{{__('Total Shares')}}</h6>
                                                        <span class="h3 font-weight-bold mb-0">{{ $totalShares }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card shadow-md rounded">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-3 p-4 mr-2">

                                                        <i class="fas fa-user-tie mt-2" style="font-size: 49px; color: #4DA6D5;"></i>

                                                    </div>
                                                    <div class="col-md-9 p-4 ml-2">
                                                        <h6 class="text-muted mb-1">{{__('Agents')}}</h6>
                                                        <span class="h3 font-weight-bold mb-0">{{ $proxiesNumber }}</span>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="container p-1 m-4 shadow-md">
                                <div class="row">
                                    <ul class="nav nav-pills my-4 justify-content-center">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#year">Attendance report</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#month">Shareholders </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#rep">Represented shareholders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#weekly">Proxy</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->

                                    <div class="tab-content">

                                        <div class="tab-pane container active" id="year">
                                            <div class="card shadow-sm p-3 mt-5 bg-body rounded">
                                                <table id="yearTable" class="display nowrap">
                                                    <thead>
                                                        <tr>

                                                            <th>CSD</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Share</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($AttendanceReport as $record)
                                                        <tr>
                                                            @if($record->CSD == 0)
                                                            <td style="color: green;">PROXY</td>
                                                            @else
                                                            <td>{{ $record->CSD}}</td>
                                                            @endif
                                                            <td>{{ $record->name}}</td>
                                                            <td>{{ $record->phone}}</td>
                                                            <td>{{ number_format( $record->shares)}}</td>

                                                        </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane container" id="month">
                                            <div class="card shadow-sm p-3 mt-5 bg-body rounded">
                                                <table id="monthTable" class="display nowrap">
                                                    <thead>
                                                        <tr>

                                                            <th>CSD</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Share</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($shareHolders as $record)
                                                        <tr>
                                                            <td>{{ $record->CSD}}</td>
                                                            <td>{{ $record->name}}</td>
                                                            <td>{{ $record->phone}}</td>
                                                            <td>{{number_format($record->shares) }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane container" id="rep">
                                            <div class="card shadow-sm p-3 mt-5 bg-body rounded">
                                                <table id="monthTable" class="display nowrap">
                                                    <thead>
                                                        <tr>

                                                            <th>CSD</th>
                                                            <th>Name</th>
                                                            <th>Phone</th>
                                                            <th>Shares</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($shareholderData as $proxyId => $shareholders)
                                                        @foreach($shareholders as $shareholder)
                                                        <tr>

                                                            <td>{{ $shareholder['CSD'] }}</td>
                                                            <td>{{ $shareholder['Name'] }}</td>
                                                            <td>{{ $shareholder['phone'] }}</td>
                                                            <td>{{ number_format($shareholder['shares']) }}</td>
                                                        </tr>
                                                        @endforeach
                                                        @endforeach

                                                    </tbody>

                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane container" id="weekly">
                                            <div class="card shadow-sm p-3 mt-5 bg-body rounded">
                                                <table id="monthTable" class="display nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Share</th>
                                                            <th>Shareholders</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($proxiesattendance as $record)
                                                        <tr>
                                                            <td>{{ $record->name }}</td>
                                                            <td>{{ number_format($record->shares) }}</td>
                                                            <td>
                                                                @if(isset($shareholderData[$record->proxy_id]))
                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>CSD</th>
                                                                            <th>Name</th>
                                                                            <th>Shares</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($shareholderData[$record->proxy_id] as $shareholder)
                                                                        <tr>
                                                                            <td>{{ $shareholder['CSD'] }}</td>
                                                                            <td>{{ $shareholder['Name'] }}</td>
                                                                            <td>{{ $shareholder['shares'] }}</td>
                                                                        </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                        <!-- start model for adding data  -->
                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Create New Agent</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <x-label for="name" value="{{ __('Name') }}" />
                                                                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                                            </div>
                                                            <div class="mt-4">
                                                                <x-label for="email" value="{{ __('Email') }}" />
                                                                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="phone" value="{{ __('Phone') }}" />
                                                                <x-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" required autocomplete="username" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="password" value="{{ __('Password') }}" />
                                                                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                                            </div>

                                                            <div class="mt-4">
                                                                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" style="color: white; background-color: red;" data-bs-dismiss="modal">Close</button>
                                                            <!-- <button type="submit" class="btn btn-success" style="color: white; background-color: green;">Create</button> -->
                                                            <x-button style="color: white; background-color: green;" class="ms-4">
                                                                {{ __('Register') }}
                                                            </x-button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end the modal for adding data-->

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
            // Initialize DataTables when the tab is shown
            $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function(e) {
                $.fn.dataTable.tables({
                    visible: true,
                    api: true
                }).columns.adjust();
            });

            $('#yearTable, #monthTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
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
    <script>
        $(document).ready(function() {
            // Handle radio button click event
            $('.btn-check').on('change', function() {
                // Trigger form submission when radio button changes
                $('#eventForm').submit();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle radio button click event
            $('.btn-check').on('change', function() {
                // Remove 'active' class from all buttons
                $('.btn-check').removeClass('active');

                // Add 'active' class to the checked button
                if ($(this).is(':checked')) {
                    $(this).next('label').addClass('active');
                }
            });
        });
    </script>


</body>

</html>