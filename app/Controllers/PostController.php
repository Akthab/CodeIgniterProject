<?php

namespace App\Controllers;
use App\Models\PostModel;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class PostController extends ResourceController
{
    use ResponseTrait;
    public function index()
    {
        return view('welcome_message');
    }

    public function createQuestion()
    {
        $users=new PostModel();
        $data=[
            'postUserId' => $this->request->getVar('postUserId'),
            'question' => $this->request->getVar('question'),
            'make' => $this->request->getVar('make'),
            'year' => $this->request->getVar('year'),
            'fuelType' => $this->request->getVar('fuelType'),
            'model' => $this->request->getVar('model')
        ];
        
            $result = $users->save($data);

            if($result){
                return $this->respondCreated([
                    'status' => 1,
                    'message' => 'Post created successfully'
                ]);
            }else{
                return $this->respondCreated([
                    'status' => 0,
                    'message' => 'Post not created successfully'
                ]);
            }   
        // }
    }

    public function getPosts()
    {
        $posts = new PostModel();
        $data = $posts->findAll();
        return $this->respond($data);
    }

    public function deletePosts()
    {
        $posts = new PostModel();
        $data=[
            'postId' => $this->request->getVar('postId')];
        $deleted = $posts->where('postId',$data )->delete($data);

        return $this->respondDeleted([
            'status' => 1,
            'message' => 'Post Deleted Successfully',
        ]);

    }
}
