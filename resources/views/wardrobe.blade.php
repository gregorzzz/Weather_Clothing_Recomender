@extends('layouts.main')

@section('content')
    @forelse($wardrobes as $wardrobe)
        @include('pages.layout', ['wardrobe'=>$wardrobe])
    @empty
        <p>No products</p>

    @endforelse
@endsection
