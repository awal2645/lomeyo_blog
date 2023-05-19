@if(empty(Auth::user()->id))
@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <strong>{{ $comment->user_name }}</strong>
    <p>{{ $comment->comment }}</p>
    <a href="" id="reply"></a>
    
        <div class="form-group">
            <input type="text" name="comment" class="form-control" required />
        </div>
        <br>
        <div class="form-group">
            
            <form action="{{route('login')}}">
                <input type="submit" class="btn btn-default btn-default-sm" value="Reply" />
            </form>
        </div>
    
    @include('Backend.Post.commentsDisplay', ['comments' => $comment->replies])
</div>
@endforeach  
@else
    @foreach($comments as $comment)
        <div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
            <strong>{{ $comment->user_name }}</strong>
            <p>{{ $comment->comment }}</p>
            <a href="" id="reply"></a>
            <form method="post" action="{{ route('comments.store') }}">
                @csrf
                <div class="form-group">
                    <input type="text" name="comment" class="form-control" required />
                    <input type="hidden" name="post_id" value="{{ $post_id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
                    <input type="hidden" name="user_name" value="{{ Auth::user()->name}}">
                    @if ($errors->has('comment'))
                        <p class=" text-danger">{{ $errors->first('comment') }}</p>
                    @endif
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-default btn-default-sm" value="Reply" />
                </div>
            </form>
            @include('Backend.Post.commentsDisplay', ['comments' => $comment->replies])
        </div>
    @endforeach  
@endif
