<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersStoreRequest;
use App\Http\Requests\UsersUpdaterequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
use function Laravel\Prompts\table;
use Faker\Factory;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $users = DB::table('users')->select('name')->orderBy('name', 'asc')->get();
//        dd($users);


                $users = DB::table('users')->get();
        return view('users/index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersStoreRequest $request)
    {
        $input = $request->all();
        $alldata = $request->safe()->merge($input)->merge([
            'created_at' => Carbon::now()
        ])->except(['_token', '_method', 'password_confirmation']);


        DB::table('users')->insert($alldata);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = DB::table('users')->find($id);


        return view('users/show', compact('users'));
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
    public function update(UsersUpdaterequest $request, string $id)
    {

        $input = $request->all();
        $alldata = $request->safe()->merge($input)->except(['_token', '_method', 'password_confirmation']);


        DB::table('users')->where('id', $id)->update($alldata);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->back();
    }


    public function created_dummy_users(Request $request)
    {


        $faker = Factory::create();

        for($i = 0; $i < 101; $i++){
            DB::table('users')->insert([
                'name'=>$faker->name,
                'email'=> $faker->email,
                "password"=> Hash::make($faker->email),
                'email_verified_at'=> now(),
                'remember_token'=> \Illuminate\Support\Str::random(10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->back();


//        $users = Storage::json('public/users.json');
//        $time = Carbon::now();
//        foreach ($users as $user) {
//
//
//            DB::table('users')->insert([
//                'name' => $user['name'],
//                'email' => $user['email'],
//                'password' => Hash::make($user['email']),
//                'created_at' => $time->addHours(3),
//                'updated_at' => $time->addHours(3)
//
//            ]);
//        }
        return redirect()->back();
    }

    public function delete_dummy_users(Request $request)
    {
        DB::table('users')->truncate();
        return redirect()->back();
    }

}
