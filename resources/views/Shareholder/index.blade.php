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
                <button type="button" class="btn btn-success mt-3" style="color: white; background-color: #3A9340;" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create Shareholder
                </button>

                <!-- <button type="button" class="btn btn-success mt-3" style="color: white; background-color: green;" data-bs-toggle="modal" data-bs-target="#addProxy">
                    Add Proxy
                </button> -->
            </div>

            <!-- start model for adding proxy -->
            <!-- <form action="{{ route('proxy.store')}}" method="POST">

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
                                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter proxy name">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Phone</label>
                                    <input type="phone" name="phone" class="form-control" id="formGroupExampleInput" placeholder="Enter proxy phone">
                                </div>

                                <div>
                                    <label>Share holder</label><br>
                                    <select id="multi_option" multiple name="shareholders[]" placeholder="Select shareholders to represent" style="width: 400px;" data-silent-initial-value-set="false">
                                        <option value="1">HTML</option>
                                        <option value="2">CSS</option>
                                        <option value="3">JavaScript</option>
                                        <option value="4">Python</option>
                                        <option value="5">JAVA</option>
                                        <option value="6">PHP</option>
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
            </form> -->
            <!-- end the modal for adding proxy-->




            <div class="container m-4">

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

                <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 1500px;">

                    <table id="example" class="display nowrap" style="width:100%">
                        <thead>
                            <tr>

                                <th>CSD</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Shares</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shareholders as $shareholder)
                            <tr data-shareholder-id="{{ $shareholder->id }}">
                                <td>{{ $shareholder->CSD }}</td>
                                <td>{{ $shareholder->Name }}</td>
                                <td>{{ $shareholder->Email }}</td>
                                <td>
                                    @if($shareholder->phone)
                                    +255 {{ $shareholder->phone }}
                                    @endif
                                </td>
                                <td>{{ $shareholder->shares }}</td>
                                <td><button class="btn btn-success edit" style="background-color: #3A9340; color: #fff;">Edit</button>
                                    <button class="btn btn-danger delete" style="background-color: #DC3545; color: #fff;">Delete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        </tbody>

                    </table>
                    {{ $shareholders->links() }}
                </div>
            </div>


            <!-- start model for adding data  -->
            <form action="{{ route('shareholder.store') }}" method="POST">
                @csrf
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Create new shareholder</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">CSD Number</label>
                                    <input type="text" name="CSD" class="form-control" id="formGroupExampleInput" placeholder="Enter shareholder CSD number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter shareholder name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="formGroupExampleInput" placeholder="Enter shareholder email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" id="formGroupExampleInput2" placeholder="Enter shareholder  phone">
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Shares</label>
                                    <input type="number" name="shares" class="form-control" id="formGroupExampleInput2" placeholder="Enter shareholder's shares">
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

            <!-- start model for editing data  -->
            <form action="{{ route('shareholder.update', ['shareholder' => $shareholder->CSD]) }}" method="POST" id="editform">
                @csrf
                @method('put')
                <div class="modal fade" id="editModel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Edit Shareholder Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3" hidden>
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="number" name="CSD" id="CDS" class="form-control" id="formGroupExampleInput" value="{{$shareholder->CSD}}">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" id="formGroupExampleInput" value="{{$shareholder->Name}}">
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" id="formGroupExampleInput" value="{{$shareholder->Email}}">
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Phone</label>
                                    <input type="phone" name="phone" id="phone" class="form-control" id="formGroupExampleInput2" value="{{$shareholder->phone}}">
                                </div>

                                <div class="mb-3">
                                    <label for="formGroupExampleInput2" class="form-label">Shares</label>
                                    <input type="number" name="shares" id="shares" class="form-control" id="formGroupExampleInput2" value="{{$shareholder->shares}}">
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
            <form action="{{ route('shareholder.destroy', ['shareholder' => $shareholder->CSD]) }}" method="POST" id="deleteform">
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
                                <h5>Sure you want to delete shareholder?</h5>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

@include('includes.dataTable',['dataTableUrl' => 'shareholder'])

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
            // var data = table.row($tr).data();
            // console.log(data);
            var id = $tr.data('shareholder-id'); // Accessing the custom data attribute
            var data = table.row($tr).data();
            console.log(data);

            $('#CSD').val(data[0]);
            $('#name').val(data[1]); // Assuming name is in the first column
            $('#email').val(data[2]);
            $('#phone').val(data[3]);
            $('#shares').val(data[4]);

            $('#editform').attr('action', '/shareholder/' + id);
            $('#editModel').modal('show');
        });
        // start of the delete script
        table.on('click', '.delete', function() {
            $tr = $(this).closest('tr');
            var shareholderId = $tr.data('shareholder-id');
            $('#deleteform').attr('action', '/shareholder/' + shareholderId);
            $('#deleteModel').modal('show');
        });
        VirtualSelect.init({
            ele: '#multi_option'
        });
    });
</script>



</html>
