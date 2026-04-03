<?php

namespace App\Http\Middleware;

use App\Enums\Language;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetApiLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $defaultLocale = Language::TW->value;

        if (request()->query('lang') === Language::EN->value) {
            $defaultLocale = Language::EN->value;
        } elseif ($request->headers->has('referer')) {
            $referer = $request->headers->get('referer');
            $queryString = parse_url($referer, PHP_URL_QUERY);
            parse_str($queryString, $params);

            $lang = $params['lang'] ?? null;

            if ($lang === Language::EN->value) {
                $defaultLocale = Language::EN->value;
            }
        }

        app()->setLocale($defaultLocale);

        return $next($request);
    }
}
