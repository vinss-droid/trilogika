<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        // dd($users);
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'data berhasil di hapus');
    }

    public function getUsers(){
        if (request()->ajax()) {
            $role = Role::findById('2');
            $users = User::role($role->name)->orderBy('created_at','desc')->get();

            $counter = 1;
            return datatables()->of($users)
                ->addColumn('DT_RowIndex',  function() use (&$counter){
                    return $counter++;
                })
                ->addColumn('action', function ($row) {
                    
                    $button ='
                    <a href="javascript:void(0)" id="btn-edit-post" class="btn icon btn-success btn-edit" data-id=' .$row->id.'><i class="bi bi-pencil"></i></a>
                    <a href="" class="btn icon btn-danger" onclick="deleteUser('.$row->id.')"><i class="bi bi-trash"></i></a>
                    <a href="'.route('unit-kompetensi.index',$row->id).'" class="btn icon btn-primary">UK</a>
                    ';
                    return new HtmlString($button);
                })
                ->make(true);
        }
    }
}
