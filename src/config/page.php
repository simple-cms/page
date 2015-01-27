<?php

return [
  // Admin Page URL - example.com/<adminURL>/<pageAdminURL>
  'pageURL' => 'page',

  // Our media file configuration
  'mediaConfiguration' => [
    // The directory (relative to public/media) to store these files
    'path' => 'page',

    // An array of image sizes to generate
    'sizes' => [
      'original' => [
        'width' => null,
        'height' => null,
        'quality' => 100,
        'crop' => false,
        'maintainRatio' => true
      ],
      'thumb' => [
        'width' => 250,
        'height' => 250,
        'quality' => 70,
        'crop' => false,
        'maintainRatio' => true
      ],
      'main' => [
        'width' => 500,
        'height' => 350,
        'quality' => 70,
        'crop' => false,
        'maintainRatio' => true
      ]
    ],
  ]
];