<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ComicViewCount
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
        $comics = $this->getViewedComics();

        if (!is_null($comics))
        {
            $comics = $this->cleanExpiredViews($comics);
            $this->storeComics($comics);
        }

        return $next($request);
    }

    private function getViewedComics()
    {
        return $this->session->get('viewed_comics', null);
    }

    private function cleanExpiredViews($comics)
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($comics, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storeComics($comics)
    {
        $this->session->put('viewed_comics', $comics);
    }
}
