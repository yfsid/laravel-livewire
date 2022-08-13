<div class="mb-4">
    <form wire:submit.prevent="store" class="space-y-6">
        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                <div class="mt-1">
                    <input wire:model="title" type="text" name="title" id="title" class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-md sm:text-sm border-gray-300" placeholder="Title...">
                </div>
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700"> Content </label>
                <div class="mt-1">
                    <textarea wire:model="content" id="content" name="content" rows="3" class="shadow-sm focus:ring-blue-500 focus:border-blue-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md" placeholder="Content here..."></textarea>
                </div>
            </div>

            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create New Post</button>
        </div>
    </form>
</div>
