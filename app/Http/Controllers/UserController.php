<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function index(Request $request)
    {
        $query = User::query();
        if($request->ajax())
        {
            $query->where('name','LIKE','%'.$request->search."%");

            $users = DB::table('users')->join('designations','designations.id','=','users.designation_id')->join('departments','departments.id','=','users.department_id')
            ->select('users.name as name','designations.name as designation','departments.name as department')
            ->where('users.name','LIKE','%'.$request->search."%")
            ->orWhere('designations.name','LIKE','%'.$request->search."%")->orWhere('departments.name','LIKE','%'.$request->search."%")->get();
           
            //$users = $query->with(['designation','department'])->get();
            return response()->json($users);
        }

        $users = $query->get();

        return view('welcome',compact('uers'));
    }
}
