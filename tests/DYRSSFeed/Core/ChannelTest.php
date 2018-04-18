<?php
/**
 * File: ChannelTest.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This file contains tests for the Channel class.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

namespace DYRSSFeed\Tests\Core;

use DYRSSFeed\Core\Channel as Channel;

class ChannelTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        // this is the channel elements data
        $channelElements = array(
            'title' => 'Example Blog',
            'link' => 'https://example.com',
            'description' => 'This is my blog.',
            'language' => 'en-us',
            'category' => null,
            'image' => array(
                '_isIncluded' => true,
                'title' => 'This is the blog logo.',
                'url' => 'https://example.com/path/to/some/image/file.png',
                'link' => 'https://example.com',
                'description' => 'This is the blog image title.',
                'width' => 88,
                'height' => 31
            ),
            'copyright' => 'Copyright (c) 2018 Yusuf Shakeel. All rights reserved.',
            'pubDate' => 'Sun, 15 Apr 2018 20:30:40 UTC',
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

        Channel::$elements = $channelElements;
    }

    public function testChannelTitle()
    {
        $this->assertEquals('Example Blog', Channel::$elements['title']);
    }

    public function testChannelLink()
    {
        $this->assertEquals('https://example.com', Channel::$elements['link']);
    }

    public function testChannelDescription()
    {
        $this->assertEquals('This is my blog.', Channel::$elements['description']);
    }

    public function testChannelLanguage()
    {
        $this->assertEquals('en-us', Channel::$elements['language']);
    }

    public function testChannelCategory()
    {
        $this->assertEquals(null, Channel::$elements['category']);
    }

    public function testImage_isIncluded()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals(true, $imageElement['_isIncluded']);
    }

    public function testImage_title()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals('This is the blog logo.', $imageElement['title']);
    }

    public function testImage_url()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals('https://example.com/path/to/some/image/file.png', $imageElement['url']);
    }

    public function testImage_link()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals('https://example.com', $imageElement['link']);
    }

    public function testImage_description()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals('This is the blog image title.', $imageElement['description']);
    }

    public function testImage_width()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals(88, $imageElement['width']);
    }

    public function testImage_height()
    {
        $imageElement = Channel::$elements['image'];
        $this->assertEquals(31, $imageElement['height']);
    }

    public function testCopyright()
    {
        $this->assertEquals('Copyright (c) 2018 Yusuf Shakeel. All rights reserved.', Channel::$elements['copyright']);
    }

    public function testPubDate()
    {
        $this->assertEquals('Sun, 15 Apr 2018 20:30:40 UTC', Channel::$elements['pubDate']);
    }

    public function testTtl()
    {
        $this->assertEquals(60, Channel::$elements['ttl']);
    }

    public function testSkipDays_day()
    {
        $skipDaysElement = Channel::$elements['skipDays'];
        $this->assertEquals(array('Sunday', 'Tuesday', 'Thursday', 'Saturday'), $skipDaysElement['day']);
    }

    public function testSkipHours_hour()
    {
        $skipHoursElement = Channel::$elements['skipHours'];
        $this->assertEquals(array(0, 10, 20), $skipHoursElement['hour']);
    }

}