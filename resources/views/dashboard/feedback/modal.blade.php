<!-- Modal -->
<div class="modal fade" id="exampleModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Feedback</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-3">
                    Name <br />
                    Email <br />
                    Type <br />
                    Created at<br />
                    Message <br />
                </div>
                <div class="col-sm-8">
                    : {{ $feedback->name }} <br />
                    : {{ $feedback->email }} <br />
                    : {{ $feedback->type }} <br />
                    : {{ $feedback->created_at->diffForHumans() }} <br />
                    : {{ $feedback->body }} <br />
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <form action="/dashboard/feedbacks/{{ $feedback->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are You Sure?')">Delete</button>
        </form>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>