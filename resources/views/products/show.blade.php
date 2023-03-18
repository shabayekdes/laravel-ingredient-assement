<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product Details') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <div class="mb-3">
                <nav aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center gap-1 text-sm text-gray-600">
                        <li>
                            <a href="#" class="block transition hover:text-gray-700">
                                <span class="sr-only"> Home </span>

                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                    />
                                </svg>
                            </a>
                        </li>

                        <li>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </li>

                        <li>
                            <a href="#" class="block transition hover:text-gray-700"> Products </a>
                        </li>

                        <li>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </li>

                        <li>
                            <a href="#" class="block transition hover:text-gray-700">{{ $product->title }}</a>
                        </li>
                    </ol>
                </nav>

            </div>

            <div class="bg-white">
                <section>
                    <div class="relative mx-auto max-w-screen-xl px-4 py-8">
                        <div class="grid grid-cols-1 items-start gap-8 md:grid-cols-2">
                            <div class="grid grid-cols-2 gap-4 md:grid-cols-1">
                                <img
                                    alt="Les Paul"
                                    src="{{ url($product->image) }}"
                                    class="aspect-square w-full rounded-xl object-cover"
                                />
                            </div>

                            <div class="sticky top-0">
                                <div class="mt-8 flex justify-between">
                                    <div class="max-w-[35ch] space-y-2">
                                        <h1 class="text-xl font-bold sm:text-2xl">
                                            {{ $product->title }}
                                        </h1>
                                    </div>

                                    <p class="text-lg font-bold">${{ $product->price }}</p>
                                </div>

                                <div class="mt-4">
                                    <div class="prose max-w-none">
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-6">
            <h2 class="text-2xl leading-tight mb-3">
                Ingredients
            </h2>
            <div class="container px-5 py-10 mx-auto flex flex-wrap bg-white shadow-sm rounded-lg">
                <div class="lg:w-1/2 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
                    <form method="POST" action="{{ route('products.ingredients.store', $product) }}">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="ingredient" :value="__('Select Ingredient')"/>
                            <select id="ingredient" name="ingredient_id"
                                    class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                @foreach($ingredients as $ingredient)
                                    <option value="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Quantity -->
                        <div class="mt-4">
                            <x-input-label for="quantity" :value="__('Quantity')"/>
                            <x-number-input id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                                            :value="old('quantity')" required
                                            autofocus/>
                            <x-input-error :messages="$errors->get('quantity')" class="mt-2"/>
                        </div>
                        <div class="mt-4 space-x-2">
                            <x-primary-button>{{ __('Create') }}</x-primary-button>
                        </div>
                    </form>
                </div>
                <div
                    class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
                    @foreach ($product->ingredients as $ingredient)
                        <div class="flex flex-col lg:items-start items-center">
                            <div class="flex-grow">
                                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">-
                                    {{ $ingredient->pivot->quantity_label }} {{ ucfirst($ingredient->name) }}</h2>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    </div>
</x-app-layout>
