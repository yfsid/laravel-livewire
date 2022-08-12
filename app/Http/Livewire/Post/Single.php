<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;

class Single extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.post.single');
    }
}
