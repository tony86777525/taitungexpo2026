<?php

// app/Helpers/functions.php

if (!function_exists('lang_route')) {
    /**
     * @param string  $name
     * @param array   $parameters
     * @param boolean $absolute
     * @return string
     */
    function lang_route(string $name, array $parameters = [], bool $absolute = true): string
    {
        // 取得目前網址中所有的 Query 參數 (例如 lang=en)
        $currentLangQuery = request()->query('lang');

        // 將目前的參數與新傳入的參數合併
        return route($name, array_merge(['lang' => $currentLangQuery], $parameters), $absolute);
    }
}
