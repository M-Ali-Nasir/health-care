@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>All Users:</h4>


  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">User Name</th>
        <th class="fw-bold">User Email</th>


      </tr>
    </thead>
    <tbody>

      @if (isset($users))
      @php
      $sr=0;
      @endphp
      @foreach ($users as $user)
      @php
      $sr ++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>

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