<?php

namespace App\Controllers;

use Core\Controller;

class UserController extends Controller {
    /**
     * User default method. Loads the user view with a welcome message.
     */
    public function index() {
        $data = [
            'title' => ''
        ];
        $this->view('users/index', $data);
    }
}
