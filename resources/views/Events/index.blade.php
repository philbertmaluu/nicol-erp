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

</head>

<body ">

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

                <button type="button" class="btn btn-success mt-3" style="color: white; background-color: #3A9340;" data-bs-toggle="modal" data-bs-target="#addProxy">
                    Add Proxy
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
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible mt-2 fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button>
                </div>
                @endif
            </div>


            <!-- start model for adding proxy -->
            <form action="{{ route('proxy.store')}}" method="POST">

                @csrf
                <div class="modal fade" id="addProxy" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Add new proxy</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter proxy name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Phone</label>
                                    <input type="phone" name="phone" class="form-control" placeholder="Enter proxy phone" required>
                                </div>

                                <div>
                                    <label>Share holder</label><br>
                                    <select id="multi_option" multiple name="shareholders[]" placeholder="Select shareholders to represent" style="width: 400px;" data-silent-initial-value-set="false" required>
                                        @foreach($shareholders as $shareholder)
                                        <option value="{{$shareholder->id}}">{{ $shareholder->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="color: white; background-color: red;" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" style="color: white; background-color: green;">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end the modal for adding proxy-->

            <!-- start model for adding data  -->
            <form action="{{ route('event.store') }}" method="POST">
                @csrf
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create new event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter Event name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Location</label>
                                    <select type="number" name="location" class="form-select" aria-label="Default select example" required>
                                        <option selected>Select the location of the event</option>
                                        <option value="Dar es salaam">Dar es salaam</option>
                                        <option value="Arusha">Arusha</option>
                                        <option value="Dodoma">Dodoma</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Event Date</label>
                                    <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="Enter Event Date" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Start Time</label>
                                    <input type="time" name="time" class="form-control" id="formGroupExampleInput2" placeholder="Enter Start Time" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">End Time</label>
                                    <input type="time" name="endtime" class="form-control" id="formGroupExampleInput2" placeholder="Enter End Time" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="color: white; background-color: red;" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" style="color: white; background-color: green;">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end the modal for adding data-->


            <div class="container m-4">
                <div class="card shadow p-3 mb-5 bg-body rounded ">

                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Location</th>
                                <th>EventDate</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $events)
                            <tr data-event-id="{{ $events->id }}">

                                <td>{{$events->name}} </td>
                                <td>{{$events->Location}} </td>
                                <td>{{ $events->eventDate}}</td>
                                <td>{{ $events->startTime}}</td>
                                <td>{{ $events->endTime}}</td>

                                <td>
                                    @if(\Auth::user()->type == 0)
                                    <button class="btn btn-success edit" style="background-color: green; color: #fff;">Edit</button>
                                    <button class="btn btn-danger delete" style=" color: #fff;">Delete</button>
                                    <button id="attendance" class="btn btn-secondary attend" style=" height:38px; color: #fff;">
                                        <a href="{{ route('records.eventRecord', ['eventId' => $events->id, 'eventName' => $events->name]) }}" style="  margin-top: -10px;">View</a>
                                    </button>
                                    @else
                                    @if($events->is_active == 1)
                                    <button id="attendance" class="btn btn-success attend" style="background-color: #3A9340; color: #fff;">
                                        <a href="{{ route('attendant.markAttendance', ['eventId' => $events->id, 'eventName' => $events->name]) }}">Mark Attendance</a>
                                    </button>
                                    @endif
                                    @endif
                                </td>



                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            <!-- start model for editing data  -->
            <form action="{{ route('event.update', ['event' => $events->id]) }}" method="POST" id="editform">
                @csrf
                @method('put')
                <div class="modal fade" id="editModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" id="formGroupExampleInput" value="{{$events->name}}">
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Location</label>
                                    <select type="number" name="location" id="location" class="form-select" aria-label="Default select example" value="{{$events->name}}">
                                        <option selected>Select the location of the event</option>
                                        <option value="Dar es salaam">Dar es salaam</option>
                                        <option value="Arusha">Arusha</option>
                                        <option value="Dodoma">Dodoma</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Event Date</label>
                                    <input type="date" name="date" id="date" class="form-control" id="formGroupExampleInput" value="{{$events->eventDate}}">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Start Time</label>
                                    <input type="time" name="starttime" id="time" class="form-control" id="formGroupExampleInput2" value="{{$events->startDate}}">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">End Time</label>
                                    <input type="time" name="endtime" id="endtime" class="form-control" id="formGroupExampleInput2" value="{{$events->endDate}}">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="color: white; background-color: red;" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" style="color: white; background-color: green;">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end the modal for editing data-->

            <!-- start model for delete data  -->
            <form action="{{ route('event.destroy', ['event' => $events->id]) }}" method="POST" id="deleteform">
                @csrf
                @method('DELETE')
                <div class="modal fade" id="deleteModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Delete event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <h5>Sure you want to delete this event?</h5>
                                <input type="hidden" name="_method" value="DELETE">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" style="color: white; background-color: red;" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-success" style="color: white; background-color: green;">Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- end the modal for delete data-->
        </div>
    </div>
    </div>
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


@include('includes.dataTable',['dataTableUrl' => 'event'])


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
            var eventid = $tr.data('event-id');
            var data = table.row($tr).data();
            console.log(data);


            $('#name').val(data[0]); // Assuming name is in the first column
            $('#location').val(data[1]);
            $('#date').val(data[2]);
            $('#time').val(data[3]);
            $('#endtime').val(data[4]);

            $('#editform').attr('action', '/event/' + eventid);
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
