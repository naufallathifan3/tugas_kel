<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            $admin = $this->request->getPost('admin');
            $password = $this->request->getPost('password');
            
            // Simple authentication check (ganti dengan validasi yang lebih aman)
            if ($admin == 'admin' && $password == 'password') {
                session()->set(['admin' => $admin]);
                return redirect()->to('/');
            } else {
                return redirect()->to('/login')->with('error', 'Invalid login');
            }
        }
        
        return view('login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
