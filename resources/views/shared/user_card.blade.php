<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageUrl()}}" alt="{{$user->name}}">
                <div>
                    <h3 class="card-title mb-0"><a href="#"> {{$user->name}}
                        </a></h3>
                    <span class="fs-6 text-muted">{{$user->email}}</span>
                </div>
            </div>
            @if(auth()->id() === $user->id)
            <div>
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-sm">Edit</a>
            </div>
            @endif
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <p class="fs-6 fw-light">
                {{$user->bio}}
            </p>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{$user->ideas()->count()}} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{$user->comments()->count()}} </a>
            </div>
            @if(auth()->id() !== $user->id)
            <div class="mt-3">
                @if(Auth::user()->follows($user->id))
                <form method="post" action="{{route('users.unfollow', $user->id)}}">
                    @csrf
                <button type="submit" class="btn btn-danger btn-sm"> Unfollow </button>
                </form>
                @else
                <form method="post" action="{{route('users.follow', $user->id)}}">
                    @csrf
                <button type="submit" class="btn btn-primary btn-sm"> Follow </button>
                </form>
                @endif
            </div>
            @endif
        </div>
    </div>
</div>

