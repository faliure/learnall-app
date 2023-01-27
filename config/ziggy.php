<?php

/**
 * Define which routes to include or exclude from Ziggy's routes in the
 * page views.
 *
 * Use either 'only' or 'exclude'. Using boths will disable filtering.
 */
return [
    // 'only' => [],
    'except' => ['ignition.*', 'sanctum.*', 'telescope*'],
];
