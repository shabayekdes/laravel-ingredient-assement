<x-app-layout>
    <div class="container mx-auto px-4 sm:px-8 max-w-7xl">
        <div class="py-8">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">
                    Ingredients
                </h2>
                <div class="text-end">
                    <form method="GET" action="{{ route('ingredients.index') }}"
                          class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="search"
                                          :value="old('search', request()->get('search'))" autofocus/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                        </div>
                        <x-primary-button class="mt-4">{{ __('Search') }}</x-primary-button>
                    </form>
                </div>
            </div>
            <div>
                <a href="{{ route('ingredients.create') }}"
                   class="py-2 px-4 bg-gray-800 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    Add New
                </a>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4">
                <div class="inline-block min-w-full shadow rounded-lg">
                    <table class="min-w-full leading-normal">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                @lang('Name')
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                @lang('Quantity')
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                Created at
                            </th>
                            <th scope="col"
                                class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ingredients as $ingredient)
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $ingredient->name }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $ingredient->quantity }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $ingredient->created_at->format('j M Y, g:i a') }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                    <x-dropdown>
                                        <x-slot name="trigger">
                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                                     viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/>
                                                </svg>
                                            </button>
                                        </x-slot>
                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('ingredients.edit', $ingredient)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                                            <form method="POST"
                                                  action="{{ route('ingredients.destroy', $ingredient) }}">
                                                @csrf
                                                @method('delete')
                                                <x-dropdown-link :href="route('ingredients.destroy', $ingredient)"
                                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                                    {{ __('Delete') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {!! $ingredients->withQueryString()->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
