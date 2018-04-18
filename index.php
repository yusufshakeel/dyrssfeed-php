<?php
/**
 * File: index.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This is the index page of the project.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

require_once __DIR__ . '/src/DYRSSFeed/autoload.php';

try {

    $runningTime = microtime(true); // time in Microseconds

    $config['outputFile'] = __DIR__ . '/output/feed.xml';

    $channelData = array(
        'title' => 'Example Blog',
        'link' => 'https://example.com',
        'description' => 'This is my blog.',
        'language' => 'en-us',
        'category' => 'Food, Travel, Vlog, Blogs',
        'image' => array(
            'title' => 'Example Blog',
            'url' => 'https://example.com/path/to/some/image/file.png',
            'link' => 'https://example.com',
            'description' => 'This is the blog image title.',
            'width' => 88,
            'height' => 31
        ),
        'copyright' => 'Copyright (c) 2018 Yusuf Shakeel. All rights reserved.',
        'pubDate' => 'Sun, 15 Apr 2018 20:30:40 GMT',
        'ttl' => 60,
        'skipDays' => array(
            'day' => array(
                'Sunday',
                'Tuesday',
                'Thursday',
                'Saturday'
            )
        ),
        'skipHours' => array(
            'hour' => array(0, 10, 20)
        )

    );

    echo("Channel Elements Data");
    var_dump($channelData);
    echo("Config Data");
    var_dump($config);

    $obj = new \DYRSSFeed\DYRSSFeed($channelData, $config);

    echo("DYRSSFeed Object");
    var_dump($obj);

    echo("Creating file...");
    $obj->openFile();
    $obj->addChannel();


    $itemsData = array();
    for ($i = 1; $i <= 10; $i++) {
        $newItem = array(
            "title" => "Item " . $i,
            "link" => "https://example.com/item/" . $i . '?t=' . time(),
            "description" => "Description " . $i,
            "guid" => "https://example.com/item/" . $i . '?t=' . time()
        );
        array_push($itemsData, $newItem);
    }

    echo("Item Elements Data");
    var_dump($itemsData);

    $obj->addItems($itemsData);

    $obj->closeFile();

    echo (microtime(true) - $runningTime) . ' elapsed';

    echo("Done");

} catch (\Exception $e) {
    die('Error: ' . $e->getMessage());
}