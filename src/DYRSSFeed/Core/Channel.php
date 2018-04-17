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
 * Class ChannelElement
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
    private $_elements = array(

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
         */
        'language' => 'en-us',

        /**
         * This specifies one or more categories of the feed.
         * (Optional)
         *
         * Example: "Tour Travel Food Vlogs Blogs"
         *
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
        )

    );

    /**
     * Channel constructor.
     * @param array $config
     */
    public function __construct($config = array())
    {
        foreach ($config as $key => $value) {
            $this->_elements[$key] = $value;
        }
    }

    /**
     * This will return the value of the element.
     *
     * @param string $element
     * @return mixed|null
     */
    public function __get($element)
    {
        if (array_key_exists($element, $this->_elements)) {
            return $this->_elements[$element];
        }
        return null;
    }
}