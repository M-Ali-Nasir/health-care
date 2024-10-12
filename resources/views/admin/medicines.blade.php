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