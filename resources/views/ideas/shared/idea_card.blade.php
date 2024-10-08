<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{$idea->user->getImageUrl()}}" alt="{{$idea->user->name}}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show', $idea->user->id) }}"> {{$idea->user->name}}
                        </a></h5>
                </div>
            </div>
            <div class="d-flex align-items-center justify-content-between" style="width: 120px;">
                <form action="{{ route('idea.destroy', $idea->id) }}" method="POST" style="margin: 0;">
                    @csrf
                    @method('DELETE')
                    @if(auth()->id() == $idea->user_id)
                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    @endif
                </form>
                @if(auth()->id() == $idea->user_id)
                <a href="{{ route('idea.show', $idea->id) }}" class="btn btn-primary btn-sm">View</a>
                <a href="{{ route('idea.edit', $idea->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                @endif
            </div>

        </div>
    </div>
    <div class="card-body">
        @if($editing ?? false)
        <div class="row">
            <form action="{{ route('idea.update', ['id' => $idea->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="idea" rows="3">{{ $idea->content }}</textarea>
                    @error('content')
                    <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button type="submit" class="btn btn-dark"> Edit </button>
                </div>
            </form>
        </div>
        @else
        <p class="fs-6 fw-light text-muted">
            {{ $idea->content }}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like_button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $idea->created_at }} </span>
            </div>
        </div>
        @include('shared.comment_box')
    </div>
</div>
