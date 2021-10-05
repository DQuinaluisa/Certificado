<?php

namespace App\Http\Controllers;

use App\Models\Certificado;
use App\Models\User;
use App\Models\Curso_Nuevo;
use Illuminate\Http\Request;
use App\Http\Resources\CertificadoResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Detalle_User_Certificado;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
      *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso_Nuevo::all();
        $certificados = Certificado::all();
        return view('administrator.certificados.upload', ['cursos' => $cursos, 'certificados' => $certificados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if (($request->nombre == NULL or $request->nombre == 'Seleccione') or $request->certificados == NULL) {
            $alert = "Lena todos los campos para subir los certificaddos";
            return redirect()->route('certificados_create')->with('alert', $alert);

        } else {
            $filesNotUploaded = [];
            $filesUploaded = [];
            foreach ($request->certificados as $certificado_req) {
                $pattern_1 = '/^[0-9]{10}/'; // que sea cédula
                $pattern_2 = '/\b[0-9]{10}\b/'; // que sea celular
                $pattern_3 = '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,6}\b/'; // que sea correo
                $pattern_4 = '/(pdf|jpg)/i'; // extención del archivo
                $pattern_5 = '/\s/'; //espacios
                $nombreArchivo = $certificado_req->getClientOriginalName();
                $certificado = new Certificado();
                $certificado->nombre = $request->nombre;
                $numeroCedula = [];
                if ((
                    preg_match($pattern_1, basename($nombreArchivo, pathinfo($nombreArchivo, PATHINFO_EXTENSION))) ||
                    preg_match($pattern_2, basename($nombreArchivo, pathinfo($nombreArchivo, PATHINFO_EXTENSION))) ||
                    preg_match($pattern_3, basename($nombreArchivo, pathinfo($nombreArchivo, PATHINFO_EXTENSION)))) &&
                    preg_match($pattern_4, pathinfo($nombreArchivo, PATHINFO_EXTENSION)) && !preg_match($pattern_5, $nombreArchivo)
                    ) {
                        if (preg_match($pattern_3, basename($nombreArchivo, pathinfo($nombreArchivo, PATHINFO_EXTENSION)))) {
                            $nombreArchivo = str_replace(array("@",'.'),'_', rtrim(basename($nombreArchivo, pathinfo($nombreArchivo, PATHINFO_EXTENSION)), ".")).'.'.pathinfo($nombreArchivo, PATHINFO_EXTENSION);
                        }
                    for ($i = 0; $i < 10; $i++) {
                        array_push($numeroCedula, $nombreArchivo[$i]);
                    }
                    $numeroCedula = implode("", $numeroCedula);
                    $path = public_path().'\storage\certificados/'.$numeroCedula.'/';
                    if (!is_dir($path)) {
                        mkdir($path, 0777, true);
                    }

                    $url_carpeta = 'public/certificados/'. $numeroCedula . '/';
                    $img = $certificado_req->storeAs($url_carpeta, $nombreArchivo);
                    $url = Storage::url($img);
                    $certificado->nombre_archivo = $nombreArchivo;
                    $certificado->imagen = $url;
                    $certificado->save();
                    array_push($filesUploaded, $nombreArchivo);
                } else {
                    array_push($filesNotUploaded, $nombreArchivo);
                }
            }
            return redirect()
            ->route('certificados_create')
            ->with(
                [
                    'filesUploaded' => $filesUploaded,
                    'filesNotUploaded' => $filesNotUploaded
                ]
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('mostrarCertificadosAprobados', $id);
        // $certificados = Certificado::where()->first();

        // $certificado=Certificado::findOrFail($id);
        // return new CertificadoResource($certificado);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $certificado=Certificado::find($id);
        return $certificado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $certificado=Certificado::findOrFail($id);
        $certificado->nombre=$request->nombre;
        $certificado->fecha=$request->fecha;
        $certificado->imagen=$request->imagen;
        if($certificado->save()){
            return new CertificadoResource($certificado);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $certificado=Certificado::findOrFail($id);
        if($certificado->delete()){
            return new CertificadoResource($certificado);
        }
    }

    public function download($id)
    {
        $id_cliente = Auth::id();
        $user = User::findOrFail($id_cliente);
        $certificado_usuario = Certificado::where('id', $id)->first();

        $datos = new Detalle_User_Certificado();
        $datos->id_usuarios = json_decode($user->id);
        $datos->id_certificado = json_decode($certificado_usuario->id);
        $datos->save();
        $pathToFile = storage_path("certificados/" .  $certificado_usuario->nombre_archivo);

        /* Cambio URL */
        $url = "C:/xampp/htdocs/certificadosTest/public/storage/certificados/1724985334/$certificado_usuario->nombre_archivo";

       /*return response()->json([
            'certificado' => $certificado_usuario,
            'cliente' => $user,
            'data' => $datos
        ]);*/

        return response()->download($url);
     }

     public function datosDescarga(){

     }

    // Mostrtar todos los cursos para subir el certificado
    public function mostrarCursosCertifcados()
    {
        $cursos=Curso_Nuevo::all();
        $certificado = Certificado::all();
        return view('administrator.certificados.upload', ['cursos' => $cursos, 'certificado' => $certificado]);
    }
}
