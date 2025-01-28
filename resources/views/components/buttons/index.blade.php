
@if($type == 'src')
<a href="" {{$attributes}}>
    
        {{ $message }}
        
    </a>
@else($type == 'name')
<button type="submit" name="buttonIncomes" {{$attributes}}>
    {{ $message }}
</button>

@endif
