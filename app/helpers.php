<?php

use Carbon\Carbon;

if (!function_exists('formatDateTime')) {
    function formatDateTime(string $date)
    {
        return Carbon::parse($date, config('app.timezone'))->format('d-M-Y');
    }
}
