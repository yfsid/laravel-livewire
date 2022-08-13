<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## About Laravel

-   Install Laravel v9.24.0 in PHP v8.1.9
-   Install Breezes

    ```php
    composer require laravel/breeze --dev

    php artisan breeze:install

    php artisan migrate
    npm install
    npm run dev
    ```

-   Install Livewire
    ```php
    composer require livewire/livewire
    ```

## Livewire Post Index

-   Make model Post
    ```php
    php artisan make:model Post -m
    ```
-   Open Post model

    ```php

    protected $fillable = [
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    ```

-   Open User model

    ```php

    public function avatar()
    {
        return 'https://www.gravatar.com/avatar/' . md5($this->email) . '?d=mp';
    }
    ```

-   Make livewire Post/Index and Post/Single

    ```php
    php artisan livewire:make Post/Index

    php artisan livewire:make Post/Single
    ```

-   Open file blade post/index
    ```php
    <div>
        @forelse($posts as $post)
            <livewire:post.single :post="$post" :key="$post->id" />
        @empty
            No Data
        @endforelse
    </div>
    ```
-   Open file blade post/single

    ```php
    <div class="flex mb-3">
        <img src="{{ $post->user->avatar() }}" alt="avatar" class="w-12 mr-3 rounded-full">

        <div class="">
            <h5 class="mt-0 text-slate-900 text-md">{{ $post->user->name }}</h5>
            <span class="text-sm text-slate-500">{{ $post->content }}</span>
        </div>
    </div>

    ```

-   Open file blade dashboard, insert livewire post/index
    ```php
    <livewire:post.index />
    ```

## Livewire Post Create

-   Make livewire Post/Create
    ```php
    php artisan livewire:make Post/Create
    ```
-   Open class Post Create

    ```php
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
    ```

-   Open file blade Post Create

    ```php
    <div class="mb-4">
        <form wire:submit.prevent="store" class="space-y-6">
            <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                    <div class="mt-1">
                        <input wire:model="title" type="text" name="title" id="title" class="flex-1 block w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Title...">
                    </div>
                </div>
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700"> Content </label>
                    <div class="mt-1">
                        <textarea wire:model="content" id="content" name="content" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Content here..."></textarea>
                    </div>
                </div>

                <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create New Post</button>
            </div>
        </form>
    </div>
    ```

-   Open file blade Post Index, add livewire Post Create

    ```php
    <livewire:post.create />
    ```

-   Create method relation posts on User model
    ```php
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    ```

## Firing and Listening for Events

change method store in class post create

-   before
    ```php
    auth()->user()->posts()->create([
        ...
    ]);
    ```
-   after

    ```php
    $post = auth()->user()->posts()->create([
        ...
    ]);

    $this->emit('postStore', $post->id);
    ```

add new method listener in class post index

```php
...
protected $listeners = [
    'postStore'
];

public function postStore()
{
    //
}
...
```

## Use Pagination

Open class post index, add pagination

```php
...
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    ...

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->paginate(3)
        ]);
    }
}

```

add pagination links in file blade post index, after forelse block

```php
...
{{ $posts->links() }}
...
```

## Timezone

Set timezone,
change file config app

-   before
    ```php
    'timezone' => 'UTC',
    ```
-   after
    ```php
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    ```

add new key in .env file

```php
APP_TIMEZONE='Asia/Jakarta'
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
