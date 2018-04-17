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
    private $_channelObj;

    protected function setUp()
    {
        // this is the channel elements config
        $channelConfig = array(
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
            )

        );

        $this->_channelObj = new Channel($channelConfig);
    }

    public function testChannelTitle()
    {
        $this->assertEquals('Example Blog', $this->_channelObj->title);
    }

    public function testChannelLink()
    {
        $this->assertEquals('https://example.com', $this->_channelObj->link);
    }

    public function testChannelDescription()
    {
        $this->assertEquals('This is my blog.', $this->_channelObj->description);
    }

    public function testChannelLanguage()
    {
        $this->assertEquals('en-us', $this->_channelObj->language);
    }

    public function testChannelCategory()
    {
        $this->assertEquals(null, $this->_channelObj->category);
    }

    public function testChannelImage_isIncluded()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals(true, $imageElement['_isIncluded']);
    }

    public function testChannelImage_title()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals('This is the blog logo.', $imageElement['title']);
    }

    public function testChannelImage_url()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals('https://example.com/path/to/some/image/file.png', $imageElement['url']);
    }

    public function testChannelImage_link()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals('https://example.com', $imageElement['link']);
    }

    public function testChannelImage_description()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals('This is the blog image title.', $imageElement['description']);
    }

    public function testChannelImage_width()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals(88, $imageElement['width']);
    }

    public function testChannelImage_height()
    {
        $imageElement = $this->_channelObj->image;
        $this->assertEquals(31, $imageElement['height']);
    }

}