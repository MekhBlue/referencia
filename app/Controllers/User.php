<?php
namespace App\Controllers;
use CodeIgniter\API\ResponseTrait;

use CodeIgniter\HTTP\Request;
use phpDocumentor\Reflection\Types\Integer;

class User extends BaseController
{
    use ResponseTrait;

    public function register() {

        $db = \Config\Database::connect();
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'max_length[60]|required',
                'username' => 'max_length[30]|required',
                'password' => 'max_length[20]|required',
                'passwordAgain' => 'matches[password]|required'
            ];
            $errors = [
                'email' => [
                    'max_length' => 'A maximális karakterszám 60',
                    'required' => 'Kötelező kitölteni!',
                ],
                'username' => [
                    'max_length' => 'A maximális karakterszám 30',
                    'required' => 'Kötelező kitölteni!',
                ],

                'password' => [
                    'max_length' => 'A maximális karakterszám 16',
                    'required' => 'Kötelező kitölteni!',
                ],
                'passwordAgain' => [
                    'matches' => 'A jelszavaknak egyezniük kell!',
                    'required' => 'Kötelező kitölteni!',
                ],


            ];
            if (!$this->validate($rules, $errors)) {
                print_r($this->validator->getErrors());
            } else {
                $email = $this->request->getVar('email');
                $username = $this->request->getVar('username');
                $password = $this->request->getVar('password');

                $data = [
                    'email' => $email,
                    'username' => $username,
                    'password' => sha1($password),
                ];
                $res = $db->table('users')->where('email', $email)->get()->getResultArray();
                if(count($res) == 0) {
                    $db->table('users')->insert($data);
                    return view ('login');
                }
                return view ('register');
            }
        } else {
            return view('register');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/');
    }

    public function login()
    {
        $db = \Config\Database::connect();
        $session = session();

        $rules = [
            'email' => 'max_length[60]|required',
            'password' => 'max_length[20]|required',
        ];
        $errors = [
            'email' => [
                'max_length' => 'A maximális karakterszám 60',
                'required' => 'Kötelező kitölteni!',
            ],
            'password' => [
                'max_length' => 'A maximális karakterszám 16',
                'required' => 'Kötelező kitölteni!',
            ],
        ];
        if (!$this->validate($rules, $errors)) {
            return view('login');
        } else {
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $user = $db->table('users')->where('email', $email)->get()->getRowArray();

            if($user) { // Létezik-e olyan email
                if($user['password'] == sha1($password)){
                    $session->set('user', $user);
                    $session->set('isUserLoggedIn', true);
                    return redirect()->to('/');
                }
                return redirect()->to('login');
            } else {
                return redirect()->to('login');
            }
        }
    }
    public function post() {
        $db = \Config\Database::connect();
        $session = session();
        if ($this->request->getMethod() == "post") {
            $rules = [
                'postText' => 'required|min_length[1]',
                'color' => 'required',
            ];
            $errors = [
                'postText' => [
                    'required' => 'input megadása kötelező!',
                    'min_length' => 'Az input minimális hossza (1) karakter!',
                ],
                'color' => [
                    'required' => 'Szín megadása kötelező!'
                ],
            ];
            $postText = $this->request->getVar('postText');
            $color = $this->request->getVar('color');
            $username = $session->get('user')['username'];
            $email = $session->get('user')['email'];

            $data = [
                'postText' => $postText,
                'color' => $color,
                'username' => $username,
                'email' => $email,
            ];

            $db->table('posts')->insert($data);

            if (!$this->validate($rules, $errors)) {
                return $this->respond($this->validator->getErrors(), 401, 'Hibas adatok');
            } else {
                return view ('login');
            }
        }
    }
}