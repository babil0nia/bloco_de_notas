<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginCriado(Request $request)
    {
        // form validation
        $request->validate(
            //regras
            [
                'email' => 'required|email',
                'senha' => 'required|min:6|max:16'
            ],
            //mensagens de erro
            [
                'email.required' => 'O email é orbigatório',
                'email.email' => 'O email deve ser válido',
                'senha.required' => 'A senha é orbigatória',
                'senha.min' => 'A senha deve ter no mínimo :min caracteres',
                'senha.max' => 'A senha deve ter no máximo :max caracteres'
            ]
        );

        //get user input
        $email =  $request->input('email');
        $senha =  $request->input('senha');

       // verificar se usuario existe 
       $user = User::where('username', $email)
                ->where('deleted_at', NULL)
                ->first();

        if(!$user){
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'usuario ou senha incorretos');
        }

        // verificando se a senha está certa 
        if (!password_verify($senha, $user->password)) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('loginError', 'usuario ou senha incorretos');
        }

        // atualizando último login
        $user->last_login = date('Y-m-d H:i:s');
        $user->save();

    

        // login usuario
        session([
            'user' => [
                'id' => $user->id,
                'username' => $user->username
                
            ]
        ]);

        //redirecionar para a home
        return redirect()->to('/');
        
    }

    public function sair()
    {
        // saindo da aplicação 
        session()->forget('user');
        return redirect()->to('/login');

    }
}