<div class="mb-4">
    <form wire:submit.prevent="store" class="space-y-6">
        <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 @error('title') text-red-500 @enderror"> Title </label>
                <div class="mt-1">
                    <input wire:model="title" type="text" name="title" id="title" class="flex-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('title') border-red-500 @enderror" placeholder="Title...">
                    @error('title')
                    <span class="mt-4 text-red-500">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700 @error('content') text-red-500 @enderror"> Content </label>
                <div class="mt-1">
                    <textarea wire:model="content" id="content" name="content" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('content') border-red-500 @enderror" placeholder="Content here..."></textarea>
                    @error('content')
                    <span class="text-red-500">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create New Post</button>
        </div>
    </form>
</div>
