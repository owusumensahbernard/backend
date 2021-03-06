<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id','asc')->paginate(6);
        return  view('manage.users.index', ["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('manage.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $this->validate($request, [
           'name' => 'required|max:255',
            'email' => 'required|email|unique:users'

        ]);

        if((new \Illuminate\Http\Request)->has('password')&& !empty($request->password)){
         $password = trim($request->password);

        } else{
            $length = 10;
            $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str ='';
            $max = mb_strlen($keyspace, '8bit')-1;
            for($i =0; $i<$length; ++$i){
                $str .= $keyspace[random_int(0, $max)];
            }
            $password = $str;
        }

        $user = new User();
        $user->name =$request->name;
        $user->email = $request->email;
        $user->password = Hash::make($password);



        if($user->save()){

            session()->flash('success', 'user successfully added');
          //  session::flash('success', 'user successfully added');
          return redirect()->route('users.show', $user->id);
        }
        else {
            session()->flash('success', 'user unsuccessfully added');
         return redirect()->route('users.create');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id);
        return view('manage.users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('manage.users.edit')->withUser($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //ddd($request->all());

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password_options == 'auto') {


          $length = 10;
          $keyspace = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $str ='';
          $max = mb_strlen($keyspace, '8bit')-1;
          for($i =0; $i<$length; ++$i){
              $str .= $keyspace[random_int(0, $max)];
          }
          $user->password = Hash::make($str);

      }
      elseif ($request->password_options == 'manual'){
          $user->password = Hash::make($request->password);
      }


      if($user->save())
      {


          session::flash('success', 'User profile edited Successfully');
          return redirect()->route('users.show', $id);
      }
else {
    session::flash('error', 'There was a problem saving the updated user information. Please try again later');
    return redirect()->route('users.edit', $id);
}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
