<div>
    
    @if($attributes->has('href'))
    <a {{ $attributes->has('class')? $attributes: $attributes->merge(['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'])}} >
        {{ $slot }}
    </a>
    @elseif($attributes->has('name'))
    <button type="submit" {{ $attributes->has('class')? $attributes: $attributes->merge(['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'])}}>
        {{ $slot }}
    </button>
    @else
    <button type="button" {{ $attributes->has('class')? $attributes: $attributes->merge(['class'=>'bg-blue-500 hover:bg-blue-700 text-white font-bold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded'])}}>
        {{ $slot }}
    </button>
    @endif
</div>