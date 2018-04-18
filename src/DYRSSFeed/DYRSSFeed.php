<?php
/**
 * File: DYRSSFeed.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This is the DYRSSFeed class.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

namespace DYRSSFeed;

use DYRSSFeed\Core\Channel as Channel;
use DYRSSFeed\Core\Config;
use DYRSSFeed\Utilities\CreateFile;
use DYRSSFeed\Utilities\WriteItems as WriteItems;

class DYRSSFeed
{
    /**
     * DYRSSFeed constructor.
     * @param array $channelData This holds the channel elements data.
     * @param array $config This holds the configuration data.
     */
    public function __construct($channelData = array(), $config = array())
    {
        Channel::$elements = $channelData;

        if (isset($config['outputFile'])) {
            Config::$outputFile = $config['outputFile'];
        }
        if (isset($config['database'])) {
            Config::$database = $config['database'];
        }
    }

    public function openFile()
    {
        CreateFile::openingTags();
    }

    public function addChannel()
    {
        CreateFile::appendChannelElements();
    }

    public function addItems($data)
    {
        CreateFile::appendItems($data);
    }

    public function closeFile()
    {
        CreateFile::closingTags();
    }


}