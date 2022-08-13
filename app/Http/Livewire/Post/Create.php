<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Create extends Component
{
    public $title;

    public $content;

    public function store()
    {
        auth()->user()->posts()->create([
            'title' => $this->title,
            'content' => $this->content
        ]);

        $this->title = '';
        $this->content = '';
    }

    public function render()
    {
        return view('livewire.post.create');
    }
}
