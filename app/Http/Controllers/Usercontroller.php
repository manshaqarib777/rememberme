<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Qrcode;
use App\Models\UserQrcode;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function index(){
        $users = User::where('id','!=', auth()->user()->id)
        ->orderBy('id','desc')
        ->paginate(20);

        return inertia('Users/Index',compact('users'));
    }

    public function delete($id)
    {

        User::find($id)->delete();
        return to_route('users')->with('success', 'User deleted successfully');
    }

   




}
