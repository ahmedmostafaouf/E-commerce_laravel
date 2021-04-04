<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users=User::all();
        return view('admin.users.show_all_user',get_defined_vars());
    }


    public function activeUser()
    {
        $users=User::where('status',1)->get();
        return view('admin.users.active_user',get_defined_vars());

    }


    public function destroy($id)
    {
      $user=User::findOrFail($id);
      $user->delete();
      return redirect()->route('users.index')->with(['success'=>'Delete Successfully']);
    }
 public function changeStatus($id){
        $users=User::FindOrFail($id);
        $users->status =='1' ? $users->update(['status'=>'0']):$users->update(['status'=>'1']);
     return redirect()->route('users.index')->with(['success'=>'Change Status Successfully']);

 }
}
