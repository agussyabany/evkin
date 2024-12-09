<?php

if (!function_exists('generateMonths')) {
    function generateMonths($startYear, $endYear) {
        $months = [];
        for ($year = $startYear; $year <= $endYear; $year++) {
            for ($month = 1; $month <= 12; $month++) {
                $formattedMonth = str_pad($month, 2, '0', STR_PAD_LEFT);
                $months[] = $formattedMonth . '-' . $year;
            }
        }
        return $months;
    }
}
