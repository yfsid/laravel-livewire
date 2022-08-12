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
        <img src="{{ $post->user->avatar() }}" alt="avatar" class="mr-3 rounded-full w-12">

        <div class="">
            <h5 class="mt-0 text-slate-900 text-md">{{ $post->user->name }}</h5>
            <span class="text-slate-500 text-sm">{{ $post->content }}</span>
        </div>
    </div>

    ```

-   Open file blade dashboard, insert livewire post/index
    ```php
    <livewire:post.index />
    ```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
