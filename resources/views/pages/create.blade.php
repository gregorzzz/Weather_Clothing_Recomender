@extends('layouts.main')
@section('content')

    <div class="w-full max-w-sm bg-white bg-white rounded-lg w-3/12 mt-10 ml-6 flex-wrap">
        {{ HTML::ul($errors->all()) }}

        {{ Form::open(array('url' => 'product', 'enctype'=>"multipart/form-data")) }}
        <h1 class="text-center text-3xl">Add new product</h1>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Product Type*
                </label>
            </div>
            <div class="md:w-2/3">
                {{ Form::select('type', array('T-shirt' => 'T-shirt', 'Sweatshirt' => 'Sweatshirt', 'Shirt' => 'Shirt','Trousers' => 'Trousers', 'Shorts'=>'Shorts', 'Dress'=>'Dress', 'Skirt' => 'Skirt', 'Coat'=>'Coat'), null, ['class' => 'form-select block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500']) }}
            </div>
        </div>
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    Image
                </label>
            </div>
            <div class="md:w-2/3">
                {{Form::file('imagename', array('class' => 'form-control', 'type' => 'file'))}}
            </div>
        </div>
        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
                {{ Form::submit('Add', array('class' => ' bg-teal-400 text-white font-bold py-2 px-4 rounded-full float-right ')) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>



@endsection
