<div>
    @forelse($posts as $post)
    <livewire:post.single :post="$post" :key="$post->id" />
    @empty
    No Data
    @endforelse
</div>
