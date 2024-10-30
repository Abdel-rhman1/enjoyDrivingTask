<?php 

namespace App\Http\Services;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Session\Session;
use Kreait\Firebase\Contract\Auth  as FirebaseAuth;
use App\Models\User;
class AuthService{

    private $auth;
    public function __construct(FirebaseAuth $auth)
    {
        $this->auth = $auth;
    }

    public function login($request){
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request->email, $request->password);
            
            session()->put('token',  $signInResult->idToken());
            session()->put('email',  $request->email);

            return redirect('/')->with(['success'=>'Register Success pls Login']);
            
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    }

    public function register($request){
        $data = [
            'name'=>$request->name,
            'email' => $request->email,
            'password' => $request->password,
            'user_type'=>$request['user_type'],
        ];
        $user = $this->auth->createUser($data);
        User::create($data);
        if($user){

            return view('Auth.login')->with(['success'=>'Register Success pls Login']);
        }else{
            dd('Error In Creating User');
        }
    }

    public function logout($request){

    }
}