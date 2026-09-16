<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('photos:publish', function () {
    $count = \App\Support\Photo::publish();
    $this->info("Copied {$count} photos to public/photos");
})->purpose('Copy stored student/teacher photos into public/photos');
