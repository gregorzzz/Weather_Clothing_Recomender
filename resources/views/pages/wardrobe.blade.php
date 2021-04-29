@extends('layouts.main')

@section('content')
    @forelse($wardrobes as $wardrobe)
        @include('pages.layout', ['wardrobe'=>$wardrobe])
        @empty
            <p>No Items in Wardrobe</p>
    @endforelse

@endsection
