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

        <th class="fw-bold">Actions</th>

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
        <td>
          <button type="button" class="btn btn-primary"
            onclick="showEditStoryModal({{ $story->id }}, '{{ $story->title }}', '{{ $story->story }}')">
            Edit
          </button>
          <!-- Edit Story Modal -->
          <div class="modal fade" id="editStoryModal" tabindex="-1" aria-labelledby="editStoryModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form id="editStoryForm" method="POST" action="">
                  @csrf
                  <div class="modal-header">
                    <h5 class="modal-title" id="editStoryModalLabel">Edit Story</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <input type="hidden" name="story_id" id="storyId">
                    <div class="mb-3">
                      <label for="story_title" class="form-label">Title</label>
                      <input type="text" class="form-control" id="story_title" name="title" required>
                    </div>
                    <div class="mb-3">
                      <label for="story_content" class="form-label">Story</label>
                      <textarea class="form-control" id="story_content" name="story" required></textarea>
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




          <a href="{{ route('delete-story', ['id' => $story->id]) }}" class="btn btn-danger m-1">Delete</a>
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


function showEditStoryModal(id, title, content) {
    const form = document.getElementById('editStoryForm');
    form.action = `/story/update/${id}`; // Update with appropriate route

    document.getElementById('story_title').value = title;
    document.getElementById('story_content').value = content;

    const modal = new bootstrap.Modal(document.getElementById('editStoryModal'));
    modal.show();
}
</script>
@endsection