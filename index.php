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

require_once 'src/DYRSSFeed/autoload.php';

try {

    // this is the channel elements config
    $channelConfig = array(

        /**
         * This is the title of the channel.
         * (Required)
         *
         * Example: Title of the website like "Example Blog"
         */
        'title' => 'Example Blog',

        /**
         * This is the link of the channel.
         * (Required)
         *
         * Example: This will be the URL of the website like "https://example.com"
         */
        'link' => 'https://example.com',

        /**
         * This is the description of the channel.
         * (Required)
         *
         * Example: This will describe the channel like "This is my blog."
         */
        'description' => 'This is my blog.',

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
            'title' => 'This is the blog logo.',

            /**
             * This is the URL of the image.
             * (Required)
             *
             * Example: "https://example.com/path/to/some/image/file.png"
             */
            'url' => 'https://example.com/path/to/some/image/file.png',

            /**
             * This is the link of the website providing the feed.
             * (Required)
             *
             * Example: "https://example.com"
             */
            'link' => 'https://example.com',

            /**
             * This specifies the text in the HTML title attribute of the image.
             * (Optional)
             *
             * Example: "This is a sample image."
             */
            'description' => 'This is the blog image title.',

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

    $dyRssFeedObj = new \DYRSSFeed\DYRSSFeed($channelConfig);

    echo '<p>Channel Title: ' . $dyRssFeedObj->getChannelElement('title') . '</p>';
    echo '<p>Channel Link: ' . $dyRssFeedObj->getChannelElement('link') . '</p>';
    echo '<p>Channel Description: ' . $dyRssFeedObj->getChannelElement('description') . '</p>';
    echo '<p>Channel Language: ' . $dyRssFeedObj->getChannelElement('language') . '</p>';
    echo '<p>Channel Category: ' . $dyRssFeedObj->getChannelElement('category') . '</p>';

    $channelImage = $dyRssFeedObj->getChannelElement('image');

    echo '<p>Channel Image->_isIncluded: ' . json_encode($channelImage['_isIncluded']) . '</p>';
    echo '<p>Channel Image->Title: ' . $channelImage['title'] . '</p>';
    echo '<p>Channel Image->URL: ' . $channelImage['url'] . '</p>';
    echo '<p>Channel Image->Link: ' . $channelImage['link'] . '</p>';
    echo '<p>Channel Image->Descriptoin: ' . $channelImage['description'] . '</p>';
    echo '<p>Channel Image->Width: ' . $channelImage['width'] . '</p>';
    echo '<p>Channel Image->Height: ' . $channelImage['height'] . '</p>';

} catch (\Exception $e) {
    die('Error: ' . $e->getMessage());
}