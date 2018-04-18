<?php
/**
 * File: Config.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This file contains the configurations.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

namespace DYRSSFeed\Core;

/**
 * This is the configuration class.
 *
 * Class Config
 * @package DYRSSFeed\Core
 */
class Config
{
    /**
     * This is the xml element.
     * @var string
     */
    public static $rssfeed_xml_element = <<<TEMPATE
<?xml version="1.0" encoding="UTF-8" ?>
TEMPATE;

    /**
     * This is the xml rss element opening tag.
     * @var string
     */
    public static $rssfeed_rss_element_opening_tag = <<<TEMPLATE
<rss version="2.0">
TEMPLATE;

    /**
     * This is the xml rss element closing tag.
     * @var string
     */
    public static $rssfeed_rss_element_closing_tag = <<<TEMPLATE
</rss>
TEMPLATE;

    /**
     * This is the xml channel element opening tag.
     * @var string
     */
    public static $rssfeed_channel_element_opening_tag = <<<TEMPLATE
<channel>
TEMPLATE;

    /**
     * This is the xml channel element closing tag.
     * @var string
     */
    public static $rssfeed_channel_element_closing_tag = <<<TEMPLATE
</channel>
TEMPLATE;

    /**
     * This is the name of the output file.
     * (Required)
     *
     * Default: /path/to/feed.xml
     * Set the full path.
     */
    public static $outputFile = 'feed.xml';
}