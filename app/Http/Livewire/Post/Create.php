<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Create extends Component
{
    public $title;

    public $content;

    public function store()
    {
        $post = auth()->user()->posts()->create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->emit('postStore', $post->id);

        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
