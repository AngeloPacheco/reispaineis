<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\CategoriaMovel;
use App\Http\Requests\Painel\CategoriaMovelFormRequest;



class CategoriaMovelController extends Controller
{

    private $categoria;
    private $totalPage = 10;
    
    public function __construct(CategoriaMovel $categoria){
        $this->categoria = $categoria;
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Categoria de Móveis';
        $categorias = CategoriaMovel::orderby('descricao','asc')->paginate($this->totalPage);
        return view('painel.categoria-de-moveis.index', compact('title', 'categorias'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar Categoria';
        return view('painel.categoria-de-moveis.create-edit', compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaMovelFormRequest $request)
    {
        $dataForm = $request->all();
        
        if ( existeCategoriaMovel($dataForm['descricao'])){

            $messagens = ['descricao.unique' => 'Categoria já cadastrada.'];

            $this->validate($request, ['descricao' => 'unique:categoria_moveis'], $messagens);
               
        }else{

            $insert = $this->categoria->create($dataForm);

            if ($insert) {
                return redirect('/painel/categoria-de-moveis');
            } else {
                return redirect()->route('painel.categoria-de-moveis.create-edit');
            }
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
        $title = 'Editar Categoria';
        $categoria = $this->categoria->find($id);
        return view('painel.categoria-de-moveis.create-edit',compact('categoria', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaMovelFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $categoria = $this->categoria->find($id); 
        $update    = $categoria->update($dataForm);

         if( $update ){
            return redirect('/painel/categoria-de-moveis');
        }
            else{
            return redirect()->route('categoria-de-moveis.edit', $id)->with(['errors' => 'Erro ao editar']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = $this->categoria->find($id);
        $delete    = $categoria->delete();
        
        if ($delete){
            return redirect('/painel/categoria-de-moveis');
        }    
        else {
            return redirect()->route('categoria-de-moveis.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
}
