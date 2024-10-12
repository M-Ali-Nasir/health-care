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