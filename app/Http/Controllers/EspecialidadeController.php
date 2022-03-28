<?php

namespace App\Http\Controllers;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index(){
        $especialidades = Especialidade::orderBy('nome')->get();
        return view('especialidades.index', [
            'especialidades' => $especialidades
        ]);
    }

    public function edit($id){
        $especialidade =   $id > 0 ? Especialidade::findOrFail($id):new Especialidade();
        return view('especialidades.edit', [
            'id' => $id,
            'especialidade' => $especialidade
        ]);
    }

    public function save($especialidade, $request){
        $this->validate($request, [
            'nome' => 'bail|required|max:50',
        ]);
        $especialidade->fill($request->input());
        $especialidade->save();
    }

    public function store(Request $request){
        $especialidade = new Especialidade();
        $this->save($especialidade, $request);
        return redirect()->route('especialidades.index')->with('alert', 'Especialidade criada com sucesso.');
    }

    public function update(Request $request, $id){
        $especialidade = Especialidade::findOrFail($id);
        $this->save($especialidade, $request);
        return redirect()->route('especialidades.index')->with('alert', 'Especialidade editada com sucesso.');
    }

    public function destroy($id){
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->delete();
        return redirect()->route('especialidades.index')->with('alert', 'Especialidade excluída com sucesso.');
    }
}
