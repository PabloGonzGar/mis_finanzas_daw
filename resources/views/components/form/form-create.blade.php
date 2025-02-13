<x-alert></x-alert>
<form class="max-w-md mx-auto p-10 shadow-lg rounded-lg bg-white gap-5" method="post" action="{{$route}}">

    @foreach ($inputs as $input)
    @php
    $type = match ($input) {
    'date' => 'date',
    'amount', 'price' => 'number',
    'category', 'item' => 'select',
    default => 'text',
    };
    @endphp

    @if ($type == 'select')
    <label for="{{ $input }}"
        class="block py-2.5 px-0 w-full text-sm text-black bg-transparent dark:text-black">
        {{ $input }}
    </label>
    <div class="relative z-0 w-full mb-5 group">
        <select
            name="{{ $input }}"
            id="{{ $input }}"
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
            <option value="Agua"> Agua </option>
            <option value="Luz"> Luz </option>
            <option value="Empresarios"> Empresarios </option>
        </select>


        @else
        <div class="relative z-0 w-full mb-5 group">
            <input type="{{ $type }}"
                name="{{ $input }}"
                id="{{ $input }}"
                value="{{ old($input) }}"
                class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                  dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder="" required />
                
                <label for="{{ $input }}"
                class="peer-focus:font-medium absolute text-sm text-black-500 dark:text-black-400 duration-300 transform 
                -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                peer-focus:scale-75 peer-focus:-translate-y-6">
                {{ $input }}
            </label>
            @endif
        </div>
        @endforeach

        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

        {{$slot}}
</form>