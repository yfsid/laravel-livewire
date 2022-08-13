<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'postStore'
    ];

    public function postStore()
    {
        //
    }

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(3)
        ]);
    }
}
