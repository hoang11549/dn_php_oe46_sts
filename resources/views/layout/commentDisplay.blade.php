@foreach($comments as $comment)
<div class="comment-widgets">
    <!-- Comment Row -->
    <div class="d-flex flex-row comment-row p-3 mt-0" 
    @if($comment->comment_parent_id != null)id="commentReport" @endif >
        <div class="p-2">
            <img src="{{ asset($comment->user->image->url) }}" alt="user" width="50" class="rounded-circle">
        </div>
        <div class="comment-text ps-2 ps-md-3 w-100">
            <h4 class="font-medium">{{ $comment->user->name }}</h4>
            <strong class="mb-3 d-block">{{ $comment->content }}</strong>
            <span> {{$comment->created_at->diffForHumans($timeNow); }}</span>
                
               
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type=text name="content" class="form-control" />
                        <input type=hidden name="report_id" value="{{ $report_id }}" />
                        <input type=hidden name="comment_parent_id" value="{{ $comment->id }}" />
                    </div>
                    <div class="form-group">
                        <input type=submit class="btn btn-warning" value="Reply" />
                    </div>
                </form>
            </div>
    </div>
    @include('layout.commentDisplay', ['comments' => $comment->replies])
</div>     
@endforeach
