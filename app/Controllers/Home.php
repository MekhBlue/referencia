<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data = [
            'posts' => $db->table('posts')->orderBy('date','desc')->get()->getResultArray()
        ];
        return view('index', $data);
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}
