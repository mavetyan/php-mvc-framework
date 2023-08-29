<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller {
    /**
     * Default method. Loads the home view with a welcome message.
     */
    public function Homepage() {
        $data = [
            'title' => 'Welcome to Simple MVC!',
            'content' => 'home'  
        ];
        $this->view('index', $data);
    }
    
}
