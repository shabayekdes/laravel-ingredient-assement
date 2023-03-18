<!-- Title -->
<div>
    <x-input-label for="title" :value="__('Title')"/>
    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $product->title)"
                  required
                  autofocus/>
    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
</div>
<!-- Description -->
<div class="mt-4">
    <x-input-label for="description" :value="__('Description')"/>
    <x-textarea id="description" rows="3" class="block mt-1 w-full"
                name="description">{{ old('description', $product->description) }}</x-textarea>
    <x-input-error :messages="$errors->get('description')" class="mt-2"/>
</div>
<!-- Price -->
<div>
    <x-input-label for="price" :value="__('Quantity')"/>
    <x-number-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price', $product->price)"
                    required
                    autofocus/>
    <x-input-error :messages="$errors->get('price')" class="mt-2"/>
</div>
<!-- Image -->
<div class="mt-5">
    <label class="block text-sm font-medium text-gray-700">Image</label>
    <div class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-300 px-6 pt-5 pb-6">
        <div class="space-y-1 text-center">
            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                 aria-hidden="true">
                <path
                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <div class="text-sm text-gray-600">
                <label for="image"
                       class="relative cursor-pointer rounded-md bg-white font-medium text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-500 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload a file</span>
                    <input id="image" name="image" type="file" class="sr-only">
                </label>
            </div>
            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
        </div>
    </div>
</div>
@csrf
