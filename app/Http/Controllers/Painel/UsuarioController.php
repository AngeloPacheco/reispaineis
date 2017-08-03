<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Painel\UsuarioFormRequest;
use App\Models\Painel\Usuario;
use App\Models\Painel\Imagem;

class UsuarioController extends Controller
{
    private $usuario;
    private $totalPage = 10;
    
    public function __construct(Usuario $usuario){
        $this->usuario = $usuario;
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title    = 'Usuários';
        $usuarios =  Usuario::orderby('name', 'asc')->paginate($this->totalPage);

        return view('painel.usuarios.index',compact('title','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo usuário';
        return view('painel.usuarios.create-edit',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioFormRequest $request)
    {
        $dataForm = $request->all();

        $insert = $this->usuario->create($dataForm);

        if(isset($request->photos)){ 

            foreach ($request->photos as $photo) {
            
                $filename = $photo->store('public/img-usuarios');
                
                $nm_imagem = substr($filename, 7 );
                
                Imagem::create([
                        'nm_imagem'     =>  $nm_imagem,
                        'titulo'        =>  $insert->name,
                        'conteudo_id'   =>  $insert->id,
                        'conteudo_tipo' =>  'US',
                        'path'          =>  '/public/img-usuarios',
                    ]);
            }
        }
           
        if ($insert) {
            return redirect('/painel/usuarios');
        } else {
            return redirect()->route('painel.usuarios.create-edit');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
