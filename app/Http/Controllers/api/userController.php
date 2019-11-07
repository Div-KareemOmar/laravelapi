<?php


namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
//            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            $success['msg']="success";
            $success['status']="true";
            $success['result']=[
                "registration"=>[
                    "Fname"=>$user['name'],
                    "Lname"=>"",
                    "Phone"=>"",
                    "Email"=>$user['email'],



                ]
            ];
            return response()->json( $success);
        }
        else{
            $error['msg']="error";
            $error['status']="false";
            $error['result']=[
                "registration"=>[
                    "Fname"=>"",
                    "Lname"=>"",
                    "Phone"=>"",
                    "Email"=>""
                ]
            ];

            return response()->json($error);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['name'] =  $user->name;
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }
}