<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Socialite;
use App\SocialProvider;
use DB;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::find($id);
        $blogs = DB::table('blogs')
        ->where('user_id',$id)
        ->select('blogs.id','blogs.title','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();

        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//	return "1";
        $user_id = DB::table('blogs')
        ->where('id', $id)
        ->value('user_id');
        $user = User::find($user_id);
        $blogs = DB::table('blogs')
        ->where('user_id',$user_id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$user_id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();
//	return "1";
        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }
        public function show1($name)
    {
        $id = DB::table('users')
        ->where('name', $name)
        ->value('id');
	return $name;
        $user = User::find($id);
        $blogs = DB::table('blogs')
        ->where('user_id',$id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();
	}
	public function bshow($id)
    {
        $user_id = DB::table('blogs')
        ->where('id', $id)
        ->value('user_id');
        $user = User::find($user_id);
        $blogs = DB::table('blogs')
        ->where('user_id',$user_id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$user_id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();

        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }
    public function cshow($id)
    {
        $user_id = DB::table('comments')
        ->where('id', $id)
        ->value('user_id');
        $user = User::find($user_id);
        $blogs = DB::table('blogs')
        ->where('user_id',$user_id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$user_id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();

        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }

    public function qshow($id)
    {
        $user_id = DB::table('questions')
        ->where('id', $id)
        ->value('user_id');
        $user = User::find($user_id);
        $blogs = DB::table('blogs')
        ->where('user_id',$user_id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$user_id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();

        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }

    public function ashow($id)
    {
        $user_id = DB::table('answers')
        ->where('id', $id)
        ->value('user_id');
        $user = User::find($user_id);
        $blogs = DB::table('blogs')
        ->where('user_id',$user_id)
        ->select('blogs.id','blogs.title','blogs.intro','blogs.img','blogs.content','blogs.category','blogs.created_at')
        ->orderBy('id', 'DESC')
        ->get();
        $questions = DB::table('questions')
        ->where('user_id',$user_id)
        ->select('questions.id','questions.title','questions.description','questions.category','questions.created_at')
        ->orderBy('id', 'DESC')
        ->get();

        return response()->json(
            [
            'user' => $user,
            'blogs' => $blogs,
            'questions' => $questions,
            ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $id = auth()->user()->id;
        $user = User::find($id);

        return response()->json(
            [
            'user' => $user,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
	    'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
        ]);
        $id = $request['id'];
        $user = User::find($id);
	$user -> name = $request['name'];
        $user -> description = $request['description'];
        if ($request->hasFile('img')) {
            $imagePath = request('img')->store('uploads','s3');
            $user -> img = $imagePath;
            $user->save();
        }
        else{
            $user->save();
        }

        return response()->json(
        [
        'Status'=> 'User Updated.',
        ]);
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
    public function register(Request $request)
    {
         $validatedData = $request->validate([
             'name'=>'required|max:55',
             'email'=>'email|required|unique:users',
             'password'=>'required|confirmed'
         ]);
 
         $validatedData['password'] = bcrypt($request->password);
 
         $user = User::create($validatedData);
 
         $accessToken = $user->createToken('authToken')->accessToken;
 
         return response(['user'=> $user, 'access_token'=> $accessToken]);   
    }

    public function login(Request $request)
    {
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        
        if(!auth()->attempt($loginData)) {
            return response(['message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);
    }
    public function getdata()
    {
        return response()->json(['user' => auth()->user()], 200);
    }
    public function logout()
    {
        auth()->user()->accessTokens()->delete();

        return response()->json(
            [
            'Status'=> 'Logged Out and Tokens Deleted.',
            ]);
    }
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        try
        {
            $socialUser = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            return redirect('/');
        }
        //check if we have logged provider
        $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider)
        {
            //create a new user and provider
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                ['name' => $socialUser->getName()]
            );

            $user->socialProviders()->create(
                ['provider_id' => $socialUser->getId(), 'provider' => $provider]
            );

        }
        else
            $user = $socialProvider->user;

        auth()->login($user);

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user' => auth()->user(), 'access_token' => $accessToken]);

        // return redirect('/home');
    }
}
