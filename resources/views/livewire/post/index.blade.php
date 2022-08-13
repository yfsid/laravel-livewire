<div>
    <livewire:post.create />

    @forelse($posts as $post)
    <livewire:post.single :post="$post" :key="$post->id" />
    @empty
    No Data
    @endforelse

    {{ $posts->links() }}
</div>
