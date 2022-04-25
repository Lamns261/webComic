<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ChapterViewCount
{
    private $session;

    public function __construct(Store $session)
    {
        $this->session = $session;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $chapters = $this->getViewedChapters();

        if (!is_null($chapters))
        {
            $chapters = $this->cleanExpiredViews($chapters);
            $this->storeChapters($chapters);
        }

        return $next($request);
    }

    private function getViewedChapters()
    {
        return $this->session->get('viewed_chapters', null);
    }

    private function cleanExpiredViews($chapters)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($chapters, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeChapters($chapters)
    {
        $this->session->put('viewed_chapters', $chapters);
    }
}
