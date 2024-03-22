<?php

namespace App\Providers;

use App\Repositories\EloquentSeriesRepository;
use App\Repositories\SeriesRepository;
use Illuminate\Support\ServiceProvider;

class SeriesRepositoryProvider extends ServiceProvider
{

    # Leitura: https://laravel.com/docs/11.x/container#:~:text=The%20Laravel%20service%20container%20is,cases%2C%20%22setter%22%20methods.
    
    /*
    # Dessa forma é como se fosse um atalho para a declaração do register
    public array $bindings = [
        SeriesRepository::class => EloquentSeriesRepository::class
    ];
    */

    /**
     * Register services.
     * Ensina o que o serviceContainer tem que fazer ao receber a solicitação dessa classe. Ligando uma interface à uma classe concreta
     */
    public function register(): void
    {
        //Passa pelo nosso app ( aplicação|laravel em si)
        $this->app->bind( SeriesRepository::class, EloquentSeriesRepository::class);
    }
    
}
