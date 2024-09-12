<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed={{ $user->name }}" alt="{{ $user->name }}">
                <div>
                    @if($editing ?? false)
                    <input value="{{ $user->name }}" type="text" name="name" class="form-control">
                    @error('name')
                    <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                    @else
                    <h3 class="card-title mb-0"><a href="#"> {{ $user->name }} </a></h3>
                    <span class="fs-6 text-muted">{{ $user->email }}</span>
                    @endif
                </div>
            </div>
            @if(auth()->id() === $user->id)
            <div>
                @if($editing ?? false)
                <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary btn-sm">View</a>
                @else
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                @endif
            </div>
            @endif
        </div>
        @if(auth()->id() === $user->id)
        <div class="mt-4">
            <label for="">Profile image:</label>
            <input name="image" class="form-control" type="file">
        </div>
        @endif
        <div class="px-2 mt-4">
            <h5 class="fs-5"> About : </h5>
            @if($editing ?? false)
            <div class="mb-3">
                <textarea name="bio" class="form-control" id="bio" rows="3"></textarea>
                @error('bio')
                <span class="text-danger fs-6">{{ $message }}</span>
                @enderror
            </div>
            <button class="btn btn-success btn-sm mb-3">Save</button>
            @else
            <p class="fs-6 fw-light">
                This book is a treatise on the theory of ethics, very popular during the
                Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
                from a line in section 1.10.32.
            </p>
            @endif
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1"> </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1"> </span> {{ $user->ideas()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1"> </span> {{ $user->comments()->count() }} </a>
            </div>
            @if(auth()->id() !== $user->id)
            <div class="mt-3">
                <button class="btn btn-primary btn-sm">Follow</button>
            </div>
            @endif
        </div>
    </div>
</div>
