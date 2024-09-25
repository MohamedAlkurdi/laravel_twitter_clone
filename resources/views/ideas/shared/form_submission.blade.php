@auth()
<h4> Share your ideas </h4>
<div class="row">
    <form action="{{ route('store') }}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
            <span>{{$message}}</span>
            @enderror
        </div>
        <div class="">
            <button type="submit" class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest
<h4>Login to be able to share your ideas.</h4>
@endguest
