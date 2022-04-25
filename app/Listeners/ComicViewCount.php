<?php

namespace App\Listeners;

use App\Events\ComicView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;

class ComicViewCount
{
    private $session;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Store $session)
    {
        $this->session = $session;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ComicView $event)
    {
        $comic = $event->comic;

        if (!$this->isComicViewed($comic))
	    {
	        $event->comic->increment('view_count');
	        $this->storeComic($comic);
	    }
    }

    private function isComicViewed($comic)
	{
	    $viewed = $this->session->get('viewed_comics', []);

	    return array_key_exists($comic->id, $viewed);
	}

    private function storeComic($comic)
	{
	    $key = 'viewed_comics.' . $comic->id;

	    $this->session->put($key, time());
	}
}
