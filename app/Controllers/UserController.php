<?php

namespace App\Controllers;
use App\Models\UserModel;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;
use \Firebase\JWT\KEY;


class UserController extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        return view('welcome_message');
    }

    public function createUser()
    {
        $users=new UserModel();
        $data=[
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
        ];
        $is_email=$users->where('email', $this->request->getVar('email'))->first();

        //Checks if the email already exist
        if($is_email){
            return $this->respondCreated([
                'status' => 0,
                'message' => 'Email already exists',
            ]);
        } else {
            //Saving the data in the DB
            $result = $users->save($data);

            if($result){
                return $this->respondCreated([
                    'status' => 1,
                    'message' => 'User created successfully'
                ]);
            }else{
                return $this->respondCreated([
                    'status' => 0,
                    'message' => 'User not created successfully'
                ]);
            }   
        }
    }

    public function login(){
        {
            $users = new UserModel();
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $is_email = $users->where('email', $email)->first();
            if ($is_email) {
                $verify_password = password_verify($password, $is_email['password']);
                if ($verify_password) {
                    $key = "akthabfromSL";
                    $payload = [
                        "iss" => "localhost",
                        "aud" => "localhost",
                        // we can also use exprire time in seconds
                        "data" => [
                            'name' => $is_email['name'],
                            'email' => $is_email['email']
                        ]
                    ];
                    $jwt = JWT::encode($payload, $key, 'HS256');
                    return $this->respondCreated([
                        'status' => 1,
                        'jwt' => $jwt,
                        'message' => 'User Login Successfully',
                    ]);
                } else {
                    return $this->respondCreated([
                        'status' => 0,
                        'message' => 'Invalid Email and Password',
                    ]);
                }
            } else {
                return $this->respondCreated([
                    'status' => 0,
                    'message' => 'Email is not found',
                ]);
            }
        }
    }

    public function readUser()
    {
        $request = service('request');
        $key = "akthabfromSL";
        $headers = $request->getHeader('authorization');
        $jwt = $headers->getValue();
        $userData = JWT::decode($jwt, new KEY($key, 'HS256'));
        $users = $userData->data;
        return $this->respond([
            'status' => 1,
            'users' => $users
        ]);
    }

    public function logout()
    {
        $request = service('request');
        $key = "akthabfromSL";
        $headers = $request->getHeader('authorization');
        $loggedOut = $headers->delete();
        return $this->respond([
            'status' => 1,
            'users' => $loggedOut
        ]);

    }

    public function getUsers()
    {
        $users = new UserModel();
        $data = $users->findAll();
        return $this->respond($data);
    }

    public function getUserDetailsByToken()
    {
        $request = service('request');
        $key = "akthabfromSL";
        $headers = $request->getHeader('authorization');
        $jwt = $headers->getValue();
        $userData = JWT::decode($jwt, new KEY($key, 'HS256'));
        $users = $userData->data;

        $user = new UserModel();
        $newData = $user->where('email', $users->email)->first();;

        return $this->respond(['status'=> '1', 'userDetails' => $newData]);
    }
}
