<?php

namespace App\Http\Controllers;
use App\Models\Dentista;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class DentistaController extends Controller
{
    public function index(){
        $dentistas = Dentista::orderBy('name')->get();
        return view('dentistas.index', [
            'dentistas' => $dentistas
        ]);
    }

    public function edit($id){
        $dentista =   $id > 0 ? Dentista::findOrFail($id):new Dentista();
        $especialidades = Especialidade::orderBy('nome')->get();
        return view('dentistas.edit', [
            'id' => $id,
            'dentista' => $dentista,
            'especialidades' => $especialidades
        ]);
    }

    public function save($dentista, $request){
        $this->validate($request, [
            'name' => 'bail|required|max:100',
            'email' => 'bail|required|max:100|unique:dentistas,email,'.$dentista->id.',id',
            'cro' => 'bail|required|max:11|unique:dentistas,cro,'.$dentista->id.',id',
            'cro_uf' => 'bail|required|max:2',
            'especialidades' => 'bail|required',
        ]);
        $dentista->fill($request->input());
        $dentista->save();
        $dentista->especialidades()->sync($request->especialidades);
    }

    public function store(Request $request){
        $dentista = new Dentista();
        $this->save($dentista, $request);
        return redirect()->route('dentistas.index')->with('alert', 'Dentista criado com sucesso.');
    }

    public function update(Request $request, $id){
        $dentista = Dentista::findOrFail($id);
        $this->save($dentista, $request);
        return redirect()->route('dentistas.index')->with('alert', 'Dentista editado com sucesso.');
    }

    public function destroy($id){
        $dentista = Dentista::findOrFail($id);
        $dentista->delete();
        return redirect()->route('dentistas.index')->with('alert', 'Dentista excluído com sucesso.');
    }
}
