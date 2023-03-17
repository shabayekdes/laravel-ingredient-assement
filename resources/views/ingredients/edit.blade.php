<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('ingredients.update', $ingredient) }}">
            @csrf
            @method('PATCH')
            <!-- Title -->
            <div>
                <x-input-label for="name" :value="__('Name')"/>
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $ingredient->name)" required
                              autofocus/>
                <x-input-error :messages="$errors->get('name')" class="mt-2"/>
            </div>
            <!-- Quantity -->
            <div>
                <x-input-label for="quantity" :value="__('Quantity')"/>
                <x-number-input id="quantity" class="block mt-1 w-full" type="text" name="quantity" :value="old('quantity', $ingredient->quantity)" required
                              autofocus/>
                <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
            </div>
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Update') }}</x-primary-button>
                <a href="{{ route('ingredients.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
