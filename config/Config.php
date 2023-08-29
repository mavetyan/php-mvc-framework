<?php

namespace Config;

/**
 * Application configuration
 *
 */
class Config {

    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'your-database-host';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'your-database-name';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'your-database-user';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = 'your-database-password';

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

     /**
     * Base path of the application
     * @var string
     */
    public static function BASE_PATH() {
        return (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'localhost') 
                      ? '/php-mvc-framework/public' 
                      : '/';
    }

    // Add other config parametrs if needed
}
