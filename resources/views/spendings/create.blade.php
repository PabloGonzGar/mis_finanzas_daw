
<x-layouts.index :title="$title">
    <x-form.form-create :route="$route" :inputs="$inputs" :categories="$categories">
        <x-button name='submit'>Crear</x-button>
    </x-form.form-create>
</x-layouts.index>