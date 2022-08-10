<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function add()
    {
        return view('form');
    }

    public function store(UserRequest $request)
    {
        // validate tu dong back nguoc lai trang request toi neu xay ra loi
        // :attribute la ten cua trường đưa vào

        // Cach 1
        // $request->validate([
        //     'username' => 'required|min:2',
        //     'password' => 'required|min:5|integer'
        // ], [
        //     'username.required' => 'Phai nhap :attribute',
        //     'username.min'=>'Username phai hon 2 ky tu',
        //     'password.required'=>'Phai nhap :attribute',
        //     'password.min'=>'Password phai hon 5 ky tu',
        //     'password.integer'=>'Password chi chua so'
        // ]);

        // Cach 2
        // $rules = [
        //     'username' => 'required|min:2',
        //     'password' => 'required|min:5|integer'
        // ];
        // $messages = [
        //     'required' => ':attribute bat buoc phai nhap',
        //     'min' => ':attribute khong duoc nho hon :min ky tu',
        //     'integer' => ':attribute phai la so',
        // ];
        // $request->validate($rules,$messages);

        // Cach 3: dung form request


        echo 'Cac item trong request->all la: <br>';
        $allData = $request->all();
        foreach ($allData as $item) {
            echo '- ' . $item . '<br>';
        }
        echo 'Đường dẫn là: ' . $request->path() . '<br>';
        echo 'Full đường dẫn là: ' . $request->fullUrl() . '<br>';
        echo 'Method là: ' . $request->method() . '<br>';
        if ($request->has('username')) {
            echo 'Có trường user name <br>';
        }
        if (!$request->has('address')) {
            echo 'Ko Có trường address <br>';
        }
        $content = 'Da add user: ' . $request->username .
            ' voi mat khau la: ' . $request->password;
        return $content;
    }

    public function edit()
    {
        echo 'phuong thuc put';
        // Respone trả về route home với status code
        // là 303 và truyên vào 1 session status tới trang home
        return redirect(route('home'), 303)->with('status', 'user updated!');
    }

    public function delete()
    {
        echo 'phuong thuc delete';
        // Respone trả về route admin.news có truyền tham số slug và id
        return redirect()->route(
            'admin.news',
            [
                'slug' => 'nguyen-khoa-hoang',
                'id' => 257
            ]
        );
    }

    public function food($id = null)
    {
        return 'food co id la: ' . $id;
    }
}
