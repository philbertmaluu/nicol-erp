  <!-- start the model -->
  <form action="{{ route('event.store') }}" method="post" id="editmodal">
      @csrf

      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Create new event</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="formGroupExampleInput" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Enter Event name">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput" class="form-label">Event Date</label>
                          <input type="date" name="date" class="form-control" id="formGroupExampleInput" placeholder="Enter Event Date">
                      </div>
                      <div class="mb-3">
                          <label for="formGroupExampleInput2" class="form-label">Start Time</label>
                          <input type="time" name="time" class="form-control" id="formGroupExampleInput2" placeholder="Enter Start Time">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-danger" style="color: red;" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-success" style="color: green;">Create</button>
                  </div>
              </div>
          </div>
      </div>
  </form>
  <!-- end the model -->


  <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

  <!-- data table cdn link -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">