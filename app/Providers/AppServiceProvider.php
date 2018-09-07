<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*$this->app->bind(\Symfony\Component\Console\Helper\HelperSet::class, function ($app) {
            $doctrine = new \Config\Doctrine();

            return [
                'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($doctrine->em->getConnection()),
                'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($doctrine->em),
            ];
        });*/
    }
}
