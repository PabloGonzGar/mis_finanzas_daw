<x-layouts.index :title="$title">
    <x-form.update-form :route="$route" :inputs="$inputs" :update="$spending" :categories="$categories" >
        <x-button name='submit'>Actualizar</x-button>
    </x-form.update-form>
</x-layouts.index>