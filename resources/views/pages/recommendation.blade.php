@extends('layouts.main')
@section('content')

    <div class="flex justify-center px-8 py-2 m-2">

        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
            <img class="object-contain h-auto w-full" src="{{asset($wardrobes->pictureId)}}">
            <div class="w-2/3 p-4">
                <h1 class="text-gray-900 font-bold text-2xl">{{ $wardrobes->clothingName }}</h1>
                <p class="mt-2 text-gray-600 text-sm">{{ $wardrobes->clothingType }}</p>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-8" for="inline-full-name">
                            Rating*
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        {{ Form::select('rating', array(1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 =>'5'), null, ['class' => 'form-select block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500']) }}
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-2/3">
                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-8" for="inline-full-name">
                            Clothing feel*
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        {{ Form::select('feel', array('Hot' => 'Hot', 'Cold' => 'Cold', 'Comfortable' => 'Comfortable','Tight' => 'Tight', 'Loose'=>'Loose', 'Uncomfortable'=>'Uncomfortable'), null, ['class' => 'form-select block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500']) }}
                    </div>
                </div>
                <div class="flex justify-between mt-3">
                    {{ Form::model($wardrobes,array('route' => array('suggest',$wardrobes->id),'method' => 'POST')) }}
                    {{ Form::submit('Ok!', array('class' => 'bg-blue-500 text-white font-bold py-2 px-8 rounded-full float-right')) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
@endsection
