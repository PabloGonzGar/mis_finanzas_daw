<x-layouts.index :title="$title">
    <x-form.update-form :route="$route" :inputs="$inputs" :update="$income" :categories="$categories">
        <x-button name='update' type='submit'>Actualizar</x-button>
    </x-form.update-form>
</x-layouts.index>