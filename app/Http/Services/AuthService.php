<?php 

namespace App\Http\Services;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Session\Session;
use Kreait\Firebase\Contract\Auth  as FirebaseAuth;

class AuthService{

    private $auth;
    public function __construct(FirebaseAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login($request){
        // dd($request);
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request->email, $request->password);
            // Cache::put($request->email , $signInResult->idToken() , 30);
            session()->put('token',  $signInResult->idToken());
            return redirect('/')->with(['success'=>'Register Success pls Login']);
            
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function register($request){
        $user = $this->auth->createUser([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($user){
            return view('Auth.login')->with(['success'=>'Register Success pls Login']);
        }else{
            dd('Error In Creating User');
        }
    }

    public function logout($request){

    }
}