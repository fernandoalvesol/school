<?php

namespace App\Http\Controllers\Painel;
use App\Models\Category;
use App\Models\Course;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\StoreCourseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CursoController extends Controller
{

    private $course;
    private $totalPage = 4;

    
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function create(Category $category){

        $title = "Cadastrar Cursos";
        $categories = $category->pluck('name', 'id');

        return view('Painel.Cursos.create', compact('title', 'categories'));
    }

    public function store(StoreCourseRequest $request){

        //pega todos os dados da model coursos
        $dataForm = $request->all();

        //tratar campos 
        $dataForm['published']  = isset($dataForm['published']);
        $dataForm['free']       = isset($dataForm['free']);

        //upload de imagem
        if( $request->hasFile('image') ) {
            $image = $request->file('image');
            
            $nameImage = $dataForm['url'].'.'.$image->getClientOriginalExtension();
            
            $dataForm['image'] = $nameImage;
            
            $update = $image->storeAs('users', $nameImage);

            //verifica se 
            if( !$update )
                return redirect()->back()->with('error', 'Falha no Upload da Imagem');

            $dataForm['user_id'] = auth()->user()->id;
            
            $insert = $this->course->create($dataForm);


            if( $insert ){

                return redirect()->route('exibir-cursos')
                          ->with('success', 'Curso cadastrado com sucesso');
            }

            else
                return redirect()->back()
                          ->with(['errors' => 'Erro ao cadastrar o novo curso']);
        }   
    }

    public function show(){

        $title = "Exibir Cursos";

        //pega os cursos do usuário que esta logado
        $courses = $this->course->where('user_id', auth()->user()->id)->paginate($this->totalPage);

        return view('Painel.Cursos.show', compact('title', 'courses'));
    }


    public function search(Request $request){

        $dataForm = $request->except('_token');
        $keySearch = $dataForm['key-Search'];
        
        $title = "Instrutor: Meus Cursos - Resultados para: {$keySearch}";
        
        $courses = $this->course
                    ->where('user_id', auth()->user()->id)
                    ->where('name', 'LIKE', "%{$keySearch}%")
                    ->paginate($this->totalPage);
        
        return view('Painel.Cursos.show', compact('title', 'courses', 'dataForm'));


    }

    public function editCursos($id, Category $category){


        $title = "Exibir Cursos";

        $courses = $this->course->find($id);
        $categories = $category->pluck('name', 'id');


        return view('Painel.Cursos.editCursos', compact('title', 'courses', 'categories'));

    }

    public function updateCursos(CourseRequest $request, $id){

          //pega todos os dados da model coursos
          $courses = $this->course->find($id);
          
          $dataForm = $request->all();

          //tratar campos 
          $dataForm['published']  = isset($dataForm['published']);
          $dataForm['free']       = isset($dataForm['free']);
  
          //upload de imagem
          if( $request->hasFile('image') ) {
              $image = $request->file('image');

              if( $courses->image == null)

                $nameImage = $courses->image; 

              else

                $nameImage = $dataForm['url'].'.'.$image->getClientOriginalExtension();
              
                $dataForm['image'] = $courses->image;
              
                $update = $image->storeAs('courses', $nameImage);
  
              //verifica se 
              if( !$update )
                  return redirect()->back()->with('error', 'Falha no Upload da Imagem');
            }


                $dataForm['user_id'] = auth()->user()->id;
                
                $update = $courses->update($dataForm);
  
  
              if( $update ){
  
                  return redirect()->route('exibir-cursos')
                            ->with('success', 'Curso Editado com sucesso');
              }
  
              else
                  return redirect()->back()
                            ->with(['errors' => 'Erro ao editar o curso']);

            }

}
