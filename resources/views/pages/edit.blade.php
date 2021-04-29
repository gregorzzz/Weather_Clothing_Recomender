@extends('layouts.main')
@section('content')
    <section hidden="type">

    </section>

    <div class="flex justify-center px-8 py-2 m-2">
        <div class="w-full max-w-sm bg-white bg-white rounded-lg w-3/12 mt-10 ml-6 flex-wrap">
            {{ HTML::ul($errors->all()) }}
            {{ Form::model($wardrobe,array('route' => array('wardrobe.update',$wardrobe->id),'method' => 'PATCH','enctype'=>"multipart/form-data")) }}
            <h1 class="text-center text-3xl">Edit Product</h1>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Item Name*
                    </label>
                </div>
                <div class="md:w-2/3">
                    {{ Form::text('name', Request::old('name', $wardrobe->clothingName),array('class' => 'bg-gray-200 appearance-none border-2 border-gray-400 rounded py-2 px-6 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-teal-400'))}}
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Image
                    </label>
                </div>
                <div class="md:w-2/3">
                    {{Form::file('image', array('class' => 'form-control', 'type' => 'file'))}}
                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    {{ Form::submit('Save', array('class' => 'bg-teal-400 text-white font-bold py-2 px-4 rounded-full float-right')) }}
                    {{ Form::close() }}
                    {{ Form::open(array('url' => 'product/' . $wardrobe->id, 'class' => 'pull-right')) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'bg-teal-400 text-white font-bold py-2 px-4 rounded-full float-left')) }}
                    {{ Form::close() }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
