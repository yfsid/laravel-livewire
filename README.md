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

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
