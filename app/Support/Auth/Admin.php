<?php

namespace App\Support\Auth;

use App\Models\Admins;

class Admin
{
    public function admin()
    {
        return Admins::find(@$_SESSION['admin']);
    }

    public function check()
    {
        return isset($_SESSION['admin'],$_SESSION['role']);
    }

    public function attempt($email, $password)
    {
        // grab admin by email
        $admin = Admins::where('email', $email)->first();

        // if !admin return false
        if (!$admin) {
            return false;
        }

        // verify password for that admin
        if (password_verify($password, $admin->password)) {
            // set into session
            $_SESSION['admin'] = $admin->id;
            $_SESSION['role'] = $admin->role;
            return true;
        }

        return false;
    }

    public function logout()
    {
        unset($_SESSION['admin'],$_SESSION['role']);
    }
}