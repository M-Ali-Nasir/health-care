@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>User Appointment Alerts:</h4>
  @php
  use Carbon\Carbon;
  @endphp

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">User Name</th>
        <th class="fw-bold">Appointment Time</th>
        <th class="fw-bold">Appointment Date</th>
        <th class="fw-bold">Doctor Name</th>
        <th class="fw-bold">Actions</th>


      </tr>
    </thead>
    <tbody>

      @if (isset($appointments))
      @php
      $sr=0;
      @endphp
      @foreach ($appointments as $appoitment)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $appoitment->user->name }}</td>
        <td>{{ Carbon::parse($appoitment->appointment_time)->format('h:i A') }}</td>
        <td>{{ Carbon::parse($appoitment->appointment_date)->format('d-m-Y') }}</td>
        <td>{{ $appoitment->doctor_name }}</td>
        <td>

          <button class="btn btn-primary m-1"
            onclick="showEditAppointmentModal({{ $appoitment->id }}, '{{ $appoitment->doctor_name }}', '{{ $appoitment->appointment_date }}', '{{ $appoitment->appointment_time }}')">Edit</button>

          <!-- Edit Appointment Modal -->
          <div class="modal fade" id="editAppointmentModal" tabindex="-1" aria-labelledby="editAppointmentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form id="editAppointmentForm" method="POST" action="">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="editAppointmentModalLabel">Edit Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="appointment_id" id="appointmentId">
                    <div class="mb-3">
                      <label for="doctor_name" class="form-label">Doctor Name</label>
                      <input type="text" class="form-control" id="doctor_name" name="doctor_name" required>
                      @error('doctor_name')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="appointment_date" class="form-label">Appointment Date</label>
                      <input type="date" class="form-control" id="appointment_date" name="appointment_date" required>
                      @error('appointment_date')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="appointment_time" class="form-label">Appointment Time</label>
                      <input type="time" class="form-control" id="appointment_time" name="appointment_time" required>
                      @error('appointment_time')
                      {{ $message }}
                      @enderror
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




          <a href="{{ route('delete-appointment', ['id' => $appoitment->id]) }}" class="btn btn-danger m-1">Delete</a>
        </td>
      </tr>
      @endforeach

      @endif





    </tbody>

  </table>



  <!-- Similar modals for Medicine, Seizure, and Story can follow the same structure -->



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


function showEditAppointmentModal(id, doctor_name, date, time) {
    const form = document.getElementById('editAppointmentForm');
    form.action = `/appointment/update/${id}`; // Set form action to update route

    document.getElementById('doctor_name').value = doctor_name;
    document.getElementById('appointment_date').value = date;
    document.getElementById('appointment_time').value = time;

    const modal = new bootstrap.Modal(document.getElementById('editAppointmentModal'));
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