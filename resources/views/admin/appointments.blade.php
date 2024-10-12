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
</script>
@endsection