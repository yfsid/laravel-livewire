<div class="flex mb-3">
    <img src="{{ $post->user->avatar() }}" alt="avatar" class="mr-3 rounded-full w-12">

    <div class="">
        <h5 class="mt-0 text-slate-900 text-md">{{ $post->user->name }}</h5>
        <span class="text-slate-500 text-sm">{{ $post->content }}</span>
    </div>
</div>
