<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\Request;


class Home extends BaseController
{
    use ResponseTrait;

    public $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();

    }

    public function index()
    {
        $data = [
            'posts' => $this->db->table('posts')->orderBy('date','desc')->get()->getResultArray()
        ];

        // Posts tábla legfrissebb elemének id-ja sessionbe
        session()->set('lastPostId', $data['posts'][0]['id']);

        return view('index', $data);
    }

    public function getPosts() {
        $data = $this->db->table('posts')->where('id >', session()->get('lastPostId'))->orderBy('date','desc')->get()->getResultArray();

        if (!empty($data)) {
            session()->set('lastPostId', $data[0]['id']);
            return $this->respond($data, 200);
        }
        else {
            return $this->respond(['result' => 'nincs több poszt'], 200);
        }

    }
}
