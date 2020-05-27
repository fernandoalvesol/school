<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateRequestUser;


class UserController extends Controller
{

    private $user;

    public function __construct(User $user){

        $this->user = $user;

    }

    public function logout(){

        Auth::logout();

        return redirect()
                ->route('home');

    }

    public function register(){

        return view('Painel.User.register');
    }


    public function create(UserRequest $request){

        //pega todos os dados de usuarios via request
        $dataForm = $request->all();

        //criptografar senha
        $dataForm['password'] = bcrypt($dataForm['password']);

        //upload de imagem
        if( $request->hasfile('image')){

            $image = $request->file('image');

            $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();
            
            $dataForm['image'] = $nameImage;

            $upload = $image->storeAs('users', $nameImage);

            if( !$upload ){

                return redirect()
                        ->back()
                        ->with(['errors' => 'Falha no upload']);
            }
        }

        //cadastra o usuario
        $insert = $this->user->create($dataForm);

        if( $insert ){

            return redirect()
                    ->route('home')
                    ->with(['success' => 'Cadastro Realizado com Sucesso']);
        }

        else
            return redirect()->back()
                    ->with(['errors' => 'Falha ao Cadastrar']);
        
    }

    public function profile(){

        $title = "Exibir Perfil de Usuário";

        return view('Painel.User.profile');
    }


    public function update(UpdateRequestUser $request){

        $dataForm = $request->all();

        $user = $this->user->find(auth()->user()->id);

          //Criptografa a senha
        if( $dataForm['password'] != '' )
            $dataForm['password'] = bcrypt($dataForm['password']);

            else
                unset( $dataForm['password']);
                

        //upload de imagem
        if( $request->hasfile('image')){

            $image = $request->file('image');

            if( $user->image != null)

                $nameImage = $user->image;

            else

                $nameImage = uniqid(date('YmdHis')).'.'.$image->getClientOriginalExtension();

            
            $dataForm['image'] = $nameImage;

            $upload = $image->storeAs('users', $nameImage);

            if( !$upload ){

                return redirect()
                        ->back()
                        ->with(['errors' => 'Falha no upload']);
            }
        }

        $update = $user->update($dataForm);     
        
        
        if($update)
            
            return redirect()
                ->back()
                ->with(['success' => 'Perfil Atualizado com Sucesso']);        
        else
            
            return redirect()
                ->route('perfil')
                ->withErrors(['errors' => 'Erro ao cadastrar...'])
                ->withInput();


    }


}
