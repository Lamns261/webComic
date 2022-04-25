<?php

namespace App\Listeners;

use App\Events\ChapterView;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;

class ChapterViewCount
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
    public function handle(ChapterView $event)
    {
        $chapter = $event->chapter;

        if (!$this->isChapterViewed($chapter))
	    {
	        $event->chapter->comic->increment('view_count');
	        $this->storeChapter($chapter);
	    }
    }

    private function isChapterViewed($chapter)
	{
	    $viewed = $this->session->get('viewed_chapters', []);

	    return array_key_exists($chapter->id. '_chapter', $viewed);
	}

    private function storeChapter($chapter)
	{
	    $key = 'viewed_chapters.' . $chapter->id . '_chapter';

	    $this->session->put($key, time());
	}
}
