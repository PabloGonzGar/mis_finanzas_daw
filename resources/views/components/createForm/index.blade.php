<form class="max-w-md mx-auto" method="post" action="{{$route}}">

@foreach ($inputs as $input)
  @php
    $type = match ($input) {
        'date' => 'date',
        'amount', 'price' => 'number',
        default => 'text',
    };
  @endphp

  @if (isset($update))
  <div class="relative z-0 w-full mb-5 group">
    <input type="{{ $type }}" 
           name="{{ $input }}" 
           id="{{ $input }}" 
           value="{{ $update[$input]}}" 
           class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                  dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
           placeholder="{{ $update[$input] }}" required />

    @else

    <div class="relative z-0 w-full mb-5 group">
    <input type="{{ $type }}" 
           name="{{ $input }}" 
           id="{{ $input }}" 
           value="{{ old($input) }}" 
           class="block py-2.5 px-0 w-full text-sm text-black bg-transparent border-0 border-b-2 border-gray-300 appearance-none 
                  dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
           placeholder="" required />

    @endif
    <label for="{{ $input }}" 
           class="peer-focus:font-medium absolute text-sm text-black-500 dark:text-black-400 duration-300 transform 
                  -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto 
                  peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
                  peer-focus:scale-75 peer-focus:-translate-y-6">
        {{ $input }}
    </label>
  </div>
@endforeach

<input type="hidden" name="_token" value="{{ csrf_token() }}" />
  
  {{$slot}}
  <form>