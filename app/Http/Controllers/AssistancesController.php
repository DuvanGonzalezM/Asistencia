<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Assistance;

class AssistancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $Asistencias = DB::table('assistances')
        ->join('personals', 'assistances.FK_AsisPers', '=', 'personals.ID_Pers')
        ->select('personals.PersFirstName','personals.PersLastName','personals.PersDocNumber', 'personals.PersSlug', 'assistances.*')
        ->get();

        return view('assistances.index', compact('Asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $Asistencias = DB::table('assistances')
        ->select('FK_AsisPers','ID_Asis','AsisSalida','AsisLlegada')
        ->where('AsisFecha',date('Y-m-d'))
        ->orWhereRaw('DATEDIFF(DATE_ADD(NOW(), INTERVAL -1 DAY),AsisLlegada) = 0 and AsisSalida is null')
        ->get();
        $personal = DB::table('personals')
        ->select('*')
        ->get();/*
        return $Asistencias;*/
        if(Auth::user()->UsRol == "Vigilante"){
            return view('assistances.create',compact('personal','Asistencias'));
        }
        else{
            return redirect()->route('asistencia.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $Asistencia = new Assistance();
        $Asistencia->AsisLlegada = now();
        $Asistencia->AsisFecha = date('Y-m-d');
        $Asistencia->AsisStatus = 1;
        $Asistencia->FK_AsisPers = $request->input('AsisPers');
        $Asistencia->save();
        // return redirect()->route('asistencia.create', compact('Asistencia2'));
        return redirect()->route('asistencia.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit(Assistance $Asistencia){
    public function edit($slug){
        $Asistencias = DB::table('assistances')
        ->select('ID_Asis','AsisSalida','AsisLlegada')
        ->where('ID_Asis', '=', $slug)
        ->get();
        // var_dump($Asistencias);
        // exit();
        return view('assistances.edit', compact('Asistencias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        // return $request;
            $Asistencia  = Assistance::where('ID_Asis',$id)->first();
            if(!$request->input('llegada')){
                $Asistencia->AsisSalida = now();
                $Asistencia->AsisNocturnas = $Asistencia->AsisSalida->diffInHours($Asistencia->AsisLlegada);
                $Asistencia->AsisStatus = 0;
                $Asistencia->save();
                return redirect()->route('asistencia.create');
            }
            else{
                $Asistencia->AsisLlegada = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('llegada'));
                $Asistencia->AsisSalida = Carbon::createFromFormat('Y-m-d H:i:s', $request->input('salida'));
                $Asistencia->AsisNocturnas = $Asistencia->AsisSalida->diffInHours($Asistencia->AsisLlegada);
                $Asistencia->save();
                return redirect()->route('asistencia.index');
            }
            


       

       
        // return "Update";
        
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
