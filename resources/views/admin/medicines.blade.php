@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>Users Medicine Alerts:</h4>

  @php
  use Carbon\Carbon;
  @endphp

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">User Name</th>
        <th class="fw-bold">Medicine Type</th>
        <th class="fw-bold">Medicine Name</th>
        <th class="fw-bold">Start Date</th>
        <th class="fw-bold">End Date</th>
        <th class="fw-bold">Time</th>
        <th class="fw-bold">Frequency</th>
        <th class="fw-bold">Action</th>
      </tr>
    </thead>
    <tbody>

      @if (isset($medicines))
      @php
      $sr=0;
      @endphp
      @foreach ($medicines as $medicine)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $medicine->user->name }}</td>
        <td>{{ $medicine->medication_type }}</td>
        <td>{{ $medicine->medicine_name }}</td>
        <td>{{ $medicine->start_date }}</td>
        <td>{{ $medicine->end_date }}</td>
        <td>{{ $medicine->alarm_time }}</td>
        <td>{{ $medicine->alarm_frequency }}</td>
        <td>

          <button class="btn btn-primary"
            onclick="showEditMedicineModal({{ $medicine->id }}, '{{ $medicine->medication_type }}', '{{ $medicine->medicine_name }}', '{{ $medicine->start_date }}', '{{ $medicine->end_date }}', '{{ $medicine->alarm_time }}', '{{ $medicine->alarm_frequency }}')">Edit</button>





          <div class="modal fade" id="editMedicineModal" tabindex="-1" aria-labelledby="editMedicineModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form id="editMedicineForm" method="POST" action="">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="editMedicineModalLabel">Edit Medicine Alert</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="medicine_id" id="medicineId">
                    <div class="mb-3">
                      <label for="medication_type" class="form-label">Medication Type</label>
                      <input type="text" class="form-control" id="medication_type" name="medication_type" required>
                      @error('medication_type')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="medicine_name" class="form-label">Medicine Name</label>
                      <input type="text" class="form-control" id="medicine_name" name="medicine_name" required>
                      @error('medicine_name')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="start_date" class="form-label">Start Date</label>
                      <input type="date" class="form-control" id="start_date" name="start_date" required>
                      @error('start_date')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="end_date" class="form-label">End Date</label>
                      <input type="date" class="form-control" id="end_date" name="end_date">
                      @error('end_date')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="alarm_time" class="form-label">Alarm Time</label>
                      <input type="time" class="form-control" id="alarm_time" name="alarm_time" required>
                      @error('alarm_time')
                      {{ $message }}
                      @enderror
                    </div>
                    <div class="mb-3">
                      <label for="alarm_frequency" class="form-label">Frequency</label>
                      <select class="form-control" id="alarm_frequency" name="alarm_frequency" required>
                        <option value="daily">Daily</option>
                        <option value="weekly">Weekly</option>
                      </select>
                      @error('alarm_frequency')
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



          <a href="{{ route('delete-medicine', ['id' => $medicine->id]) }}" class="btn btn-danger m-1">Delete</a>
        </td>
      </tr>
      @endforeach

      @endif





    </tbody>

  </table>


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

  function showEditMedicineModal(id, medication_type, medicine_name, start_date, end_date, alarm_time, alarm_frequency) {
    const form = document.getElementById('editMedicineForm');
    form.action = `/medicine/update/${id}`; // Update with appropriate route

    document.getElementById('medication_type').value = medication_type;
    document.getElementById('medicine_name').value = medicine_name;
    document.getElementById('start_date').value = start_date;
    document.getElementById('end_date').value = end_date;
    document.getElementById('alarm_time').value = alarm_time;
    document.getElementById('alarm_frequency').value = alarm_frequency;

    const modal = new bootstrap.Modal(document.getElementById('editMedicineModal'));
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