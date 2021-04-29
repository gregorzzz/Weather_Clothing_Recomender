
<div class="inline-flex px-8  py-2 m-2">

    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
        <img class="object-contain h-auto w-full" src="{{asset($wardrobe->pictureId)}}">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $wardrobe->clothingName }}</div>
            <p class="text-gray-700 text-base">
                {{ $wardrobe->clothingType }}
            </p>
        </div>
        <div class="px-6 pt-4 pb-2">
            @if(Route::current()->getName()=='product-index')
                @can('edit-product')
                    <button value="{{ $product->id }}" class=" mr-2 mb-2 inline-block select-product bg-teal-400 text-white font-bold py-2 px-4 rounded-full float-right">Edit</button>
                @endcan
            @endif
        </div>
    </div>
</div>

