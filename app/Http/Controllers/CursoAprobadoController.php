<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso_Aprobado;
use App\Models\Curso_Nuevo;
use Illuminate\Http\Request;
use App\Http\Resources\CursoAprobadoResource;
use App\Models\Detalle_User_Certificado;
use App\Models\Certificado;

use function PHPSTORM_META\type;

class CursoAprobadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscarScope(Request $request)
    {
            $cedula = trim($request->get('search'));
            $nombre = trim(strtr($request->get('search2'), " ", "_"));
            $celular = trim($request->get('search3'));
            $correo = trim(strtr($request->get('search4'), "@", "_"));
            $certificados = Certificado::nombrearchivo($cedula)
                          ->nombrearchivo($nombre)
                          ->nombrearchivo($correo)
                          ->nombrearchivo($celular)
                          ->latest()
                          ->paginate(5);
            return view('buscar', ['certificados' => $certificados,
                        'search' => $cedula, 'search2' => $nombre,
                        'search3' => $celular, 'search4' => $correo]);
    }

    public function index()
    {
        $certificados = Certificado::latest()->paginate(5);
        return view ('client.certificados.index',compact('certificados'))
        ->with('i', (request()->input('page', 1) - 1) * 5);









        // // =====================================================================================================
        // // IMPRIMIMOS LOS CURSOS APROBADOS SEGÚN EL USUARIO
        // // $certificadosUsers = Certificado::all();

        // // extraemos los cursos aprobados segun el usuario
        // $userCursosAprobados = Detalle_User_Certificado::where('id_usuarios',$id)->get();

        // // aqui guardamos los ids del detalle del certificado
        // $idsDetalle = [];
        // foreach ($userCursosAprobados as $userCA => $userCursoAprobado) {
        //     array_push($idsDetalle, $userCursoAprobado->id);
        // }

        // // obetenemos los cursos aprobados
        // $cursoAprobado = [];

        // // segun el id del certificado
        // foreach ($idsDetalle as $idsDetll => $idDet) {
        //     $CursosAprobados = Curso_Aprobado::where('id_detalle', $idDet)->get();
        //     foreach ($CursosAprobados as $CA => $CursosApro) {
        //         array_push($cursoAprobado, $CursosApro);
        //     }
        // }
        // // =====================================================================================================

        // return view('auth.cursos_recibidos', ['cursosAprobado' => $cursoAprobado]);
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
        $cursoAprobado=new Curso_Aprobado();
        $cursoAprobado->nombre=$request->nombre;
        $cursoAprobado->horas=$request->horas;
        $cursoAprobado->id_encuesta=$request->id_encuesta;
        $cursoAprobado->id_detalle=$request->id_detalle;
        if($cursoAprobado->save()){
            return new CursoAprobadoResource($cursoAprobado);
        }

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso_Aprobado  $curso_Aprobado
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso_Aprobado  $curso_Aprobado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cursoAprobado=Curso_Aprobado::find($id);
        return $cursoAprobado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso_Aprobado  $curso_Aprobado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cursoAprobado=Curso_Aprobado::find($id);
        $cursoAprobado->nombre=$request->nombre;
        $cursoAprobado->horas=$request->horas;
        $cursoAprobado->id_encuesta=$request->id_encuesta;
        $cursoAprobado->id_detalle=$request->id_detalle;
        if($cursoAprobado->save()){
            return new CursoAprobadoResource($cursoAprobado);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso_Aprobado  $curso_Aprobado
     * @return \Illuminate\Http\Response
     */
    public function destroy ($id)
    {
        $cursoAprobado=Curso_Aprobado::find($id);
        if($cursoAprobado->save()){
            return new CursoAprobadoResource($cursoAprobado);
        }
    }

    // buscamos la cedula del cliente
    public function buscarCedula (Request $request)
    {
        $user = User::where('cedula', $request->cedula)->first();
        if ($user) {
            $certificados = Certificado::all();
            $user = User::where('id', $request->user)->first();
            $certificado_elegido = Certificado::where('id', $request->certificado_elegido)->first();
            return view('livewire.certificados.index', ['user' => $user, 'certificados' => $certificados, 'certificado_elegido' => $certificado_elegido]);
        }

        if (isset($request->curso)) {
            return "submit para crear curso aprobado";
        }
    }




    // buscamos el curso a aprobar
    public function buscar_curso_a_aprobar ($id)
    {
        $certificados = Certificado::all();
        $user = Certificado::where('id', $id)->first();
        return view('livewire/cursos/creat', ['user' => $user, 'certificados' => $certificados]);

    }
}
