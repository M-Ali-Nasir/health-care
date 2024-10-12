@extends('admin.layout.adminLayout')

@section('main')
<div class="container">

  <h4>User Stories:</h4>

  <table class="table" id="outofstockTable">
    <thead>
      <tr>
        <th class="fw-bold">Sr.</th>
        <th class="fw-bold">User Name</th>
        <th class="fw-bold">Title</th>
        <th class="fw-bold">Story</th>

      </tr>
    </thead>
    <tbody>
      @if (count($stories) > 0)
      @php
      $sr = 0;
      @endphp
      @foreach ($stories as $story)
      @php
      $sr++;
      @endphp
      <tr>
        <td>{{ $sr }}</td>
        <td>{{ $story->user->name }}</td>
        <td>{{ $story->title }}</td>

        <td>{{ $story->story }}</td>

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