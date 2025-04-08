<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use App\Services\Operations;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Symfony\Component\VarDumper\VarDumper;

class MainController extends Controller
{
    public function index()
    {
        // carregamento de notas do usuario
        $id = session('user.id');
        $notes = User::find($id)->notes()->get();



        // mostrar home 
        return view('home', ['notes' => $notes]);
    }

    public function newNote()
    {
        
        //mostrar nova nota view
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
       // validando o pedido
       $request->validate(
        //regras
        [
            'text_title' => 'required|min:3|max:200',
            'text_note' => 'required|min:3|max:3000'
        ],
        //mensagens de erro
        [
            'text_title.min' => 'O título deve ter no mínimo :min caracteres',
            'text_title.max' => 'O título deve ter no máximo :max caracteres',
            'text_title.required' => 'O título é orbigatório',
            'text_note.required' => 'A nota é orbigatória',
            'text_note.min' => 'A nota deve ter no mínimo :min caracteres',
            'text_note.max' => 'A nota deve ter no máximo :max caracteres'
        ]
    );
       
       // pegar o id do usuario
       $id = session('user.id');

       // criar nova nota
       $note = new Note();
       $note->user_id = $id;
       $note->title = $request->text_title;
       $note->text = $request->text_note;
       $note->save();

       // redirecionar para a home 
       return redirect()->route('home');
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);
        
        // carregar note
        $note = Note::find($id);

        // mostrar view de edição da nota 
        return view('edit_note', ['note' => $note]);
    }


    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);
        echo "Estou apagando uma nota com id = $id";
    }

    
}
