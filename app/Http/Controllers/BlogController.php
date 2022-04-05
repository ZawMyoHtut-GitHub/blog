<?php

namespace App\Http\Controllers;

use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $userInstance = new Blog;
        $columns = [
            'status',
            'nickname',
        ];
        $values = [
            [
                'Mohammad',
                'Ghanbari',
                
            ] ,
            [
                'Saeed',
                'Mohammadi',
                
            ] ,
            [
                'Avin',
                'Ghanbari',
                
            ] ,
        ];
        $batchSize = 500; // insert 500 (default), 100 minimum rows in one query

        // $result = Batch::insert($userInstance, $columns, $values, $batchSize);
        $result = batch()->insert($userInstance, $columns, $values, $batchSize);
        
        return $result;   
    }

    public function edit(Blog $blog)
    {
        $userInstance = new Blog;
        $value = [
            [
                'id' => 1,
                'status' => 'active',
                'nickname' => 'Mohammad',
                'total' => ['+',5000]
            ] ,
            [
                'id' => 5,
                'status' => 'deactive',
                'nickname' => 'Ghanbari',
                'total' => ['*',6]
            ] ,
        ];
        $index = 'id';
        
        // $result = Batch::update($userInstance, $value, $index);
        $result = batch()->update($userInstance, $value, $index);
        return Blog::All()->toArray();
    }
}
