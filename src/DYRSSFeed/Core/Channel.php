<?php
/**
 * File: Channel.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This file contains the configuration of the channel elements
 *              the RSS feed.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

namespace DYRSSFeed\Core;

/**
 * This class configures the channel element of the RSS feed.
 *
 * Class Channel
 * @package DYRSSFeed\Core
 */
class Channel
{
    /**
     * This is the channel of the RSS Feed.
     * (Required)
     *
     * @var array
     */
    public static $elements = array(

        /**
         * This is the title of the channel.
         * (Required)
         *
         * Example: Title of the website like "Example Blog"
         */
        'title' => '',

        /**
         * This is the link of the channel.
         * (Required)
         *
         * Example: This will be the URL of the website like "https://example.com"
         */
        'link' => '',

        /**
         * This is the description of the channel.
         * (Required)
         *
         * Example: This will describe the channel like "This is my blog."
         */
        'description' => '',

        /**
         * This specifies the language the feed is written in.
         * (Optional)
         *
         * Example: US English like "en-us"
         * Default: 'en-us'
         */
        'language' => 'en-us',

        /**
         * This specifies one or more categories of the feed.
         * (Optional)
         *
         * Example: "Tour Travel Food Vlogs Blogs"
         * Default: null
         */
        'category' => null,

        /**
         * This specifies the image to be displayed when any aggregators presents
         * the feed.
         * (Optional)
         */
        'image' => array(

            /**
             * Set this to true if you are planning to show the image.
             */
            '_isIncluded' => false,

            /**
             * This is the title for the image.
             * It will be displayed if the image fails to load or
             * could not be displayed.
             * (Required)
             *
             * Example: "Yusuf Shakeel website logo"
             */
            'title' => '',

            /**
             * This is the URL of the image.
             * (Required)
             *
             * Example: "https://example.com/path/to/some/image/file.png"
             */
            'url' => '',

            /**
             * This is the link of the website providing the feed.
             * (Required)
             *
             * Example: "https://example.com"
             */
            'link' => '',

            /**
             * This specifies the text in the HTML title attribute of the image.
             * (Optional)
             *
             * Example: "This is a sample image."
             */
            'description' => '',

            /**
             * This specifies the width of the image.
             * (Optional)
             *
             * Default: 88
             * Max value: 144
             */
            'width' => 88,

            /**
             * This specifies the height of the image.
             * (Optional)
             *
             * Default: 31
             * Max value: 400
             */
            'height' => 31
        ),

        /**
         * Specifies about copyrighted content.
         * (Optional)
         *
         * Example: "Copyright (c) 2018 Yusuf Shakeel. All rights reserved."
         * Default: null
         */
        'copyright' => null,

        /**
         * Specifies the last publication date of the feed content.
         * (Optional)
         *
         * Example: Sun, 15 Apr 2018 20:30:40 UTC
         * Default: null
         */
        'pubDate' => null,

        /**
         * ttl or Time To Live
         * Specifies the number of minutes the feed can be cached before
         * it is refetched from the source.
         * (Optional)
         *
         * Example: 180  i.e. (180/60) = 3 hours
         * Default: null
         */
        'ttl' => null,

        /**
         * This specifies the days where aggregators would skip
         * updating the feed.
         * (Optional)
         */
        'skipDays' => array(
            /**
             * This specifies the name of the days to skip.
             * (Required)
             * From: Sunday, Monday, ..., Saturday
             */
            'day' => array()
        ),

        /**
         * This specifies the hours where aggregators would skip
         * updating the feed.
         * (Optional)
         */
        'skipHours' => array(
            /**
             * This specifies the hours to skip.
             * (Required)
             * From 0 to 23
             */
            'hour' => array()
        )

    );
}