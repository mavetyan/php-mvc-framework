<?php

namespace Core;

class Controller {
    /**
     * Load a model class.
     *
     * @param string $model Name of the model class to load.
     * @return object The instantiated model class.
     */
    protected function model($model) {
        // Convert model name to correct namespace
        $class = "App\\Models\\" . ucfirst($model);
        
        // Check if the class exists before trying to instantiate it
        if (class_exists($class)) {
            return new $class();
        } else {
            // Optionally, you can throw an exception or handle this scenario differently
            throw new \Exception("Model $model not found");
        }
    }

    /**
     * Load a view file with optional data.
     *
     * @param string $view Path of the view file to load, relative to the views directory.
     * @param array $data (optional) Associative array of data to pass to the view.
     */
    protected function view($view, $data = []) {
        $viewPath = "../app/views/{$view}.php";
        
        if (file_exists($viewPath)) {
            // Extract the associative array to individual variables for the view
            extract($data);
            require_once $viewPath;
        } else {
            // Optionally, you can throw an exception or handle this scenario differently
            throw new \Exception("View $view not found");
        }
    }
}
