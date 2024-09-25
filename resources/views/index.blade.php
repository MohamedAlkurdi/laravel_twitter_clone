@extends('layout.layout')
@section('content')
<div class="row">
    <div class="col-3">
        @include('shared.left_sidebar')
    </div>
    <div class="col-6">
        @include('shared.success_message')
        @include('ideas.shared.form_submission')
        <hr>
        @if(count($ideas) > 0)
        @foreach($ideas as $idea)
        <div class="mt-3">
            @include('ideas.shared.idea_card')
        </div>
        @endforeach
        @else
        Search query did not match any result.
        @endif
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
