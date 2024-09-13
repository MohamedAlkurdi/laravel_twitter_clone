@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_sidebar')
    </div>
    <div class="col-6">
        @include('shared.success_message')
        <div class="mt-3">
            @include('shared.user_edit_card')
        </div>
        <hr>
        @forelse($ideas as $idea)
            <div class="mt-3">
                @include('shared.idea_card')
            </div>
        @empty
            <p>Search query did not match any result.</p>
        @endforelse
        <div class="mt-3">
            {{$ideas->withQueryString()->links()}}
        </div>
    </div>
    <div class="col-3">
        @include('shared.search_bar')
        @include('shared.follow_box')
    </div>
</div>
@endsection
