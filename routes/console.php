<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

/*Artisan::command('doctrine:orm:convert-mapping', function () {
    $doctrine = new \App\Services\Doctrine();

    return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($doctrine->em);
});
Artisan::command('doctrine:orm:generate-entities', function () {
    $doctrine = new \App\Services\Doctrine();

    return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($doctrine->em);
});*/

