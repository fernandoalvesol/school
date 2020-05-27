<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use App\Http\Requests\ModuloStoreUpdateRequest;

class ModuloController extends Controller
{
   
    private $course, $modules;
    private $totalPage = 5;

    public function __construct(Course $course, Module $modules){

        $this->course = $course;
        $this->modules = $modules;

    }

    public function index($id){

        //Pega o curso selecionado pelo id
        $cursos = Course::find($id);

        //pega o módulo relacionado ao curso, conforme método modules na model Course
        $modulos = $cursos->modules()->paginate($this->totalPage);

        $title = "MODULOS DO CURSO: {$cursos->name}";

        return view('Painel.Modulos.index', compact('cursos', 'modulos', 'title'));


    }
     
    public function create()
    {
        $title = "Cadastrar novo modulo";

        $cursos = Course::get()->pluck('name', 'id');

        //$cursos = Course::userByAuth()->pluck('name', 'id');

        return view('Painel.Modulos.create', compact('title', 'cursos'));

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModuloStoreUpdateRequest $request)
    {
        
        $dataForm = $request->all();


        $insert = $this->modules->create($dataForm);


            if( $insert ){

                return redirect()->route('modulos.cursos', $insert->course_id)
                          ->with('success', 'Modulo cadastrado com sucesso');
            }

            else
                return redirect()->back()
                          ->with(['errors' => 'Erro ao cadastrar o novo Modulo']);
        }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
        $modulos = $this->modules->find($id);

        //$title = "Editar Modulos:" {$modulos->name};

        $cursos = Course::get()->pluck('name', 'id');


        return view('Painel.Modulos.edit', compact('title', 'modulos', 'cursos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuloStoreUpdateRequest $request, $id)
    {
        $modulos = $this->modules->find($id);


        $dataForm = $request->all();


        $update = $modulos->update($dataForm);


            if( $update ){

                return redirect()->route('modulos.cursos', $dataForm['course_id'])
                          ->with('success', 'Modulo cadastrado com sucesso');
            }

            else
                return redirect()->back()
                          ->with(['errors' => 'Erro ao cadastrar o novo Modulo']);
        }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $course = $request->get('course_id');

        $this->modules->find($id)->delete();


        return redirect()->route('modulos.cursos', $course);
    }
}
