<?php
/**
 * File: CreateFile.php
 * Author: Yusuf Shakeel
 * GitHub: https://github.com/yusufshakeel/dyrssfeed-php
 * Date: 15-Apr-2018 Sunday
 * Description: This will create RSS Feed file.
 *
 * MIT License
 *
 * Copyright (c) 2018 Yusuf Shakeel
 */

namespace DYRSSFeed\Utilities;

use DYRSSFeed\Core\Channel;
use DYRSSFeed\Core\Config;

/**
 * This class will help to write the feed.
 *
 * Class CreateFile
 * @package DYRSSFeed\Utilities
 */
class CreateFile
{
    /**
     * This holds the file handle.
     * @var bool|resource
     */
    public static $filehandle = false;

    /**
     * This will write the opening tags.
     */
    public static function openingTags()
    {
        $filename = Config::$outputFile;

        try {
            CreateFile::$filehandle = fopen($filename, 'w');
        } catch (\Exception $e) {
            die("There is some problem in opening the file: " . $e->getMessage());
        }

        try {
            $fileData = Config::$rssfeed_xml_element;
            $fileData .= Config::$rssfeed_rss_element_opening_tag;
            $fileData .= Config::$rssfeed_channel_element_opening_tag;
            fwrite(CreateFile::$filehandle, $fileData);
            fclose(CreateFile::$filehandle);
        } catch (\Exception $e) {
            die("There is some problem in writing in the file: " . $e->getMessage());
        }
    }

    /**
     * This will write the closing tags.
     */
    public static function closingTags()
    {
        $filename = Config::$outputFile;

        try {
            CreateFile::$filehandle = fopen($filename, 'a');
        } catch (\Exception $e) {
            die("There is some problem in opening the file: " . $e->getMessage());
        }

        try {
            $fileData = Config::$rssfeed_channel_element_closing_tag;
            $fileData .= Config::$rssfeed_rss_element_closing_tag;
            fwrite(CreateFile::$filehandle, $fileData);
            fclose(CreateFile::$filehandle);
        } catch (\Exception $e) {
            die("There is some problem in writing in the file: " . $e->getMessage());
        }
    }

    /**
     * This will append the channel elements.
     *
     * @param array $data
     */
    public static function appendChannelElements()
    {
        $data = Channel::$elements;
        $filename = Config::$outputFile;

        try {
            CreateFile::$filehandle = fopen($filename, 'a');
        } catch (\Exception $e) {
            die("There is some problem in opening the file: " . $e->getMessage());
        }

        $fileData = '';

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                if (in_array($key, array('skipDays', 'skipHours'))) {

                    $fileData .= '<' . $key . '>';

                    $selectedVal = $value;
                    foreach ($selectedVal as $innerKey => $innerValue) {
                        foreach ($innerValue as $val) {
                            $fileData .= '<' . $innerKey . '>' . $val . '</' . $innerKey . '>';
                        }
                    }

                    $fileData .= '</' . $key . '>';

                } else {

                    $selectedVal = $value;
                    $fileData .= '<' . $key . '>';
                    foreach ($selectedVal as $innerKey => $innerValue) {
                        $fileData .= '<' . $innerKey . '>' . $innerValue . '</' . $innerKey . '>';
                    }
                    $fileData .= '</' . $key . '>';

                }
            } else {
                $fileData .= '<' . $key . '>' . $value . '</' . $key . '>';
            }
        }

        try {
            fwrite(CreateFile::$filehandle, $fileData);
            fclose(CreateFile::$filehandle);
        } catch (\Exception $e) {
            die("There is some problem in writing in the file: " . $e->getMessage());
        }
    }

    /**
     * This will append the items.
     *
     * @param array $data
     */
    public static function appendItems($data)
    {
        $filename = Config::$outputFile;

        try {
            CreateFile::$filehandle = fopen($filename, 'a');
        } catch (\Exception $e) {
            die("There is some problem in opening the file: " . $e->getMessage());
        }

        $dataLen = count($data);
        $fileData = '';

        for ($i = 0; $i < $dataLen; $i++) {
            $selectedItem = $data[$i];
            $fileData .= '<item>';
            foreach ($selectedItem as $key => $value) {
                $fileData .= '<' . $key . '>' . $value . '</' . $key . '>';
            }
            $fileData .= '</item>';
        }

        try {
            fwrite(CreateFile::$filehandle, $fileData);
            fclose(CreateFile::$filehandle);
        } catch (\Exception $e) {
            die("There is some problem in writing in the file: " . $e->getMessage());
        }
    }
}