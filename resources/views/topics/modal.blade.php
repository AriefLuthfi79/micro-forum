<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('topic.store') }}" method="POST">
      {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModal">New Topic</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="form-group">
                <label>Categories</label>
                <select id="categories" class="form-control" name="category_id">
                </select>
              </div>

              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
              </div>

              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="summary-ckeditor" name="description"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>