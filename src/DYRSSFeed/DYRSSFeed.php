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

class DYRSSFeed
{
    /**
     * This is an object of the Channel class.
     * @var Channel Channel
     */
    private $_channelObj;

    /**
     * DYRSSFeed constructor.
     * @param array $channelConfig This holds the configuration for the channel element of RSS feed.
     */
    public function __construct($channelConfig = array())
    {
        $this->_channelObj = new Channel($channelConfig);
    }

    public function getChannelElement($element)
    {
        return $this->_channelObj->$element;
    }
}