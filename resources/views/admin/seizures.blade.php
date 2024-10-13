@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>User Seizure Records:</h4>

  @php
  use Carbon\Carbon;
  @endphp
  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">User Name</th>
        <th class="fw-bold">Date</th>
        <th class="fw-bold">Time</th>
        <th class="fw-bold">Duration</th>
        <th class="fw-bold">Description</th>
        <th class="fw-bold">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if (count($seizures) > 0)
      @php
      $sr = 0;
      @endphp
      @foreach ($seizures as $seizure)
      @php
      $sr++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $seizure->user->name }}</td>
        <td>{{ Carbon::parse($seizure->date)->format('d-m-Y') }}</td>
        <td>{{ Carbon::parse($seizure->time)->format('h:i A') }}</td>
        <td>{{ $seizure->duration }} minutes</td>
        <td>{{ $seizure->description }}</td>
        <td>
          <!-- Seizure Edit Button -->
          <button class="btn btn-primary"
            onclick="showEditSeizureModal({{ $seizure->id }},'{{ $seizure->user->name }}', '{{ $seizure->date }}', '{{ $seizure->time }}', {{ $seizure->duration }}, '{{ $seizure->description }}')">
            Edit
          </button>







          <a href="{{ route('delete-seizure-record', ['id' => $seizure->id]) }}" class="btn btn-danger m-1">Delete</a>
        </td>
      </tr>

      @endforeach

      @endif


    </tbody>

  </table>

  <!-- Edit Seizure Modal -->
  <div class="modal fade" id="editSeizureModal" tabindex="-1" aria-labelledby="editSeizureModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="editSeizureForm" method="POST" action="">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="editSeizureModalLabel">Edit Seizure Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <input type="hidden" name="seizure_id" id="seizureId">
            <div class="mb-3">
              <label for="seizure_name" class="form-label">Name</label>
              <input type="text" class="form-control" id="seizure_name" name="name" required>
            </div>
            <div class="mb-3">
              <label for="seizure_date" class="form-label">Date</label>
              <input type="date" class="form-control" id="seizure_date" name="date" required>
            </div>
            <div class="mb-3">
              <label for="seizure_time" class="form-label">Time</label>
              <input type="time" class="form-control" id="seizure_time" name="time" required>
            </div>
            <div class="mb-3">
              <label for="seizure_duration" class="form-label">Duration (minutes)</label>
              <input type="number" class="form-control" id="seizure_duration" name="duration" required>
            </div>
            <div class="mb-3">
              <label for="seizure_description" class="form-label">Description</label>
              <textarea class="form-control" id="seizure_description" name="description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<script>
  $(document).ready(function() {
    $('#outofstockTable').DataTable();
  });
  $('#outofstockTable').DataTable({
  "paging": true,
  "pageLength": 10,
  "searching": true,
  "ordering": true,
});


function showEditSeizureModal(id,name, date, time, duration, description) {
    const form = document.getElementById('editSeizureForm');
    form.action = `/seizure-record/update/${id}`; // Update with appropriate route
    
    document.getElementById('seizure_name').value = name;
    document.getElementById('seizure_date').value = date;
    document.getElementById('seizure_time').value = time;
    document.getElementById('seizure_duration').value = duration;
    document.getElementById('seizure_description').value = description;

    const modal = new bootstrap.Modal(document.getElementById('editSeizureModal'));
    modal.show();
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}"
        });
    @endif

    @if (session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}"
        });
    @endif

    @if (session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: "{{ session('info') }}"
        });
    @endif

    @if (session('warning'))
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "{{ session('warning') }}"
        });
    @endif
</script>

@endsection