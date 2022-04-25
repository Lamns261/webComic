<?php

namespace App\Providers;

use App\Events\ChapterView;
use App\Events\ComicView;
use App\Listeners\ChapterViewCount;
use App\Listeners\ComicViewCount;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ComicView::class => [
            ComicViewCount::class
        ],
        ChapterView::class => [
            ChapterViewCount::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
