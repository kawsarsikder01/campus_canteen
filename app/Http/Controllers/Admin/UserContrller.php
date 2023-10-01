<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Storage;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $user ;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }
    public function index()
    {
        $users = $this->user->getAll();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::All();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $image = $request->image->store(('public/users'));
       $user = $this->user->create([
            'name'     => $request->name,
            'email'    => $request->email,
            'image'    => $image,
            'password' => $request->password

        ]);

        foreach($request->roles as $role){
            $user->roles()->attach($role);
        }
        return redirect(route('admin.user.index'));
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
    public function edit(User $user)
    {
        $roles = Role::All();
       return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $image = $user->image;
       if($request->hasFile('image')){
        Storage::delete($user->image);
        $image = $request->image->store(('public/menus'));
       }
       $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'image' =>$image
       ]);
       if($request->has('roles')){
        foreach($request->roles as $role) {
            $user->roles()->sync($role);
        }
       }
       return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        Storage::delete($user->image);
        if($user->roles){
            foreach($user->roles as $role){
                $user->roles()->detach($role);
            }
        }
        $this->user->delete($user->id);
        return redirect(route('admin.user.index'));
    }
}
