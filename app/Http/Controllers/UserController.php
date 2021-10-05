<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all()->first();
        return view('actualizacion_datos', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request) {
        if ($request->email === NULL || $request->email==='') {
            $alert = "Llena el campo de email";

            return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
        }
        if ($request->password_1 === NULL or $request->password_2 === NULL
        || $request->password_1 === '' or $request->password_2 === '') {
            $alert = "Llena los campos de contraseña";
            return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
        }
        $findUser = User::where('email', $request->email)->first();
        $pedirPassword = 'FALSE';
        $alert = "Llena todos los campos";

        if (!$findUser) {
            if ($request->password_1 != $request->password_2) {
                $alert = "Las contraseñas no son iguales";
                return redirect()->route('crear_cuenta_alert', ['alert'=> $alert]);
            }
            $user = new User();
            $user->email = $request->email;
            $user->password = $request->password_1;
            $user->email_verified_at = $request->email_verified_at;
            $user->remember_token = $request->_token;
            $user->current_team_id = $request->current_team_id;
            $user->profile_photo_path = $request->profile_photo_path;
            $user->id_roles = 2;
            if($user->save()){
                Auth::login($user);
                return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            }
        }
        return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::findf0rFail($id);
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user=User::findOrFail($id);
        return view('auth/actualizacion_datos',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $pass_user = User::where('id', $id)->first();
        if ($pass_user->password != NULL) {
            $pedirPassword = 'FALSE';
        } else {
            $pedirPassword = 'TRUE';
        }
        if ($request->name == NULL or $request->apellido == NULL or $request->cedula == NULL or $request->telefono == NULL or $request->genero == NULL) {
            $alert = "Llena todos los campos";
            return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
        }
        if ($request->password_1 or $request->password_2) {
            if ($request->password_1 == NULL or $request->password_2 == NULL) {
                $alert = "Llena los campos de contraseña";
                return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
            }
        }
        $findUser = User::where('cedula', $request->cedula)->first();
        if ($findUser) {
            $alert = "Número de cedula ya registrado";
            return redirect()->route('alert_actualizar_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
        }
        if (isset($request->password_1)) {
            if (isset($request->password_2)) {
                if ($request->password_1 != $request->password_2) {
                    return view('auth/actualizacion_datos');
                }
            }
        }
        $findUser = User::where('email', $request->email)->first();
        if (!$findUser) {
            $user = User::findOrFail($id);
            $user->name=$request->input('name');
            $user->apellido=$request->input('apellido');
            $user->telefono=$request->input('telefono');
            $user->cedula=$request->input('cedula');
            $user->genero=$request->input('genero');
            if (isset($request->password_1)) {
                $user->password=$request->input('password_1');
            }
            $user->remember_token=$request->_token;
            if ($user->save()) {
                return redirect()->route('cursos_aprobados', $user->id);
            }
        }
        return redirect('actualizacion_datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id) {
        $user = User::findOrFail($id);
        if($user->delete()){
            return new UserResource($user);
        }
    }

    public function login_2(Request $request) {
        if ($request->cedula != null){
            $user = User::where("cedula", $request->cedula)->where('id_roles','2')->first();
            if ($user){
                Auth::login($user);
                return redirect()->route('cursos_aprobados');
            }
            $alert ="Su némero de cédula no esta registrado por favor comuniquese con su cordinador de curso";
        }
        return redirect()->route('welcome')->with('alert', $alert);
    }

    public function login(Request $request) {
        if ($request->email == null) {
            $alert = "Llena el email";
        } else {
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                $emailIncorrect = $request->email;
                $alert = "El email ". $emailIncorrect. " no esta registrado. Crea una cuenta con aquel email";
                return view('auth.login', ['alert' => $alert]);
            }
        }

        if ($request->password == null) {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                $alert = $user->name. " llena el campo de contraseña";
            } else {
                $alert = "Llena el campo de contraseña";
            }
        }
        if ($request->email == null and $request->password == null) {
            $alert = "Llena todos los campos";
        }

        if ($request->email != null and $request->password != null) {

            if (User::where('email', $request->email)->first()) {
                $user = User::where('email', $request->email)->where('password', $request->password)->first();
                if ($user) {
                    Auth::login($user);
                    if ($user->id_roles != 1) {
                        return redirect()->route('cursos_aprobados');
                    }
                    if($user->id_roles == 1) {
                        return redirect()->route('cursos.index');
                    }
                } else {
                    $user = User::where('email', $request->email)->first();
                    $alert = $user->name. " tu contraseña es incorrecta";
                    return view('auth.login', ['alert' => $alert]);
                }
            }
        }
    }

    public function logoutUser(Request $request) {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('welcome');
    }

    public function actualizar_datos ($pedirPassword, $alert) {
        return view('auth.actualizacion_datos', ['pedirPassword'=> $pedirPassword, 'alert' => $alert]);
    }
}
