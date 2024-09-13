<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" method="POST" action="{{route('users.update', $user->id )}}">
            @csrf
            @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageUrl()}}" alt="{{$user->name}}">
                <div>
                    <input value="{{$user->name}}" type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger fs-6" >{{$message}}</span>
                    @enderror
                </div>
            </div>
            @if(auth()->id() === $user->id)
            <div>
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary btn-sm">View</a>
            </div>
            @endif
        </div>
        <div class="mt-4">
            <label for="">Profile image:</label>
            <input name="image" class="form-control" type="file">
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            <div class="mb-3">
                    <textarea name="bio" class="form-control" id="bio" rows="3">{{$user->bio}}</textarea>
                    @error('bio')
                    <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>
                <button class="btn btn-success btn-sm mb-3">save</button>

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
                <button class="btn btn-primary btn-sm"> Follow </button>
            </div>
            @endif
        </div>
        </form>
    </div>
</div>

