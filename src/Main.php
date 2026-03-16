<?php

// TWWC => Trovia WP Wordcount


namespace Hasan\TroviaWpWordcount;

use Hasan\TroviaWpWordcount\App\Trait\Singleton;
// use Hasan\TroviaWpWordcount\BlogContentEdit\BlogContentEdit;
use Hasan\TroviaWpWordcount\WordCount\WordCount;

if (!defined('ABSPATH')) {
    exit;
}


class Main
{
    use Singleton;

    public $wordCount;

    public function init()
    {
        $this->define_constance();

        add_action('plugins_loaded', [$this, 'plugins_loaded']);
    }

    public function define_constance()
    {
        define('TWWC_PLUGIN_VERSION', '1.0.0');
        define('TWWC_FIRST_UNIQUE_PLUGIN_AUTHOR', 'Hasan Karim');

        define(
            'TWWC_PLUGIN_URL',
            plugin_dir_url(dirname(__DIR__))
        );

        define(
            'TWWC_PLUGIN_PATH',
            plugin_dir_path(dirname(__DIR__))
        );
    }

    public function plugins_loaded()
    {
        load_plugin_textdomain(
            'TroviaWcpDomain',
            false,
            dirname(plugin_basename(dirname(__FILE__))) . '/languages'
        );
        // load classes
        $this->load_classes();
    }

    private function load_classes()
    {
        $this->wordCount = new WordCount();
        $this->wordCount->init();

    }
}
