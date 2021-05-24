@extends('layouts.main')
@section('content')

    <div class="flex justify-center px-8 py-2 m-2">

        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
            <img class="object-contain h-auto w-full" src="{{asset($wardrobes->pictureId)}}">
            <div class="w-2/3 p-4">
                <h1 class="text-gray-900 font-bold text-2xl">{{ $wardrobes->clothingName }}</h1>
                <p class="mt-2 text-gray-600 text-sm">{{ $wardrobes->clothingType }}</p>
                <div class="flex justify-between mt-3">
                    {{ Form::model($wardrobes,array('route' => array('suggest',$wardrobes->id),'method' => 'POST')) }}
                    {{ Form::submit('Ok!', array('class' => 'bg-teal-400 text-white font-bold py-2 px-8 rounded-full float-right')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection
