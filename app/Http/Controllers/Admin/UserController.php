<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserFormRequest;

class UserController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('/register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $data = $request->all();
        //- Remember to encrypt the password
        if (isset($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }

        $user = User::create($data);
        return view('admin.users.show', compact(['user']));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact(['user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.create', compact(['user']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //- Quick'n dirty validation
        $this->validate($request, [
            'name' =>  'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
        
        $user->email = $request->email;
        $user->name = $request->name;

        //- Passwords must be encrypted
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }

        //- Update user roles
        $user->roles()->detach();
        $user->roles()->attach($request->roles);

        //- Save the fucker
        $user->save();

        $request->session()->flash('status', 'User updated!');

        return redirect('admin/users/' . $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $user)
    {
        $user->delete();
        $request->session()->flash('status', 'User deleted!');
        return redirect('/admin/users');
    }
}
