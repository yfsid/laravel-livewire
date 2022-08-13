<div>
    @if (session()->has('message'))
    <div class="px-4 py-2 text-green-900 bg-green-200 rounded-md">
        {{ session('message') }}
    </div>
    @endif
    <livewire:post.create />

    @forelse($posts as $post)
    <livewire:post.single :post="$post" :key="$post->id" />
    @empty
    No Data
    @endforelse

    {{ $posts->links() }}
</div>
