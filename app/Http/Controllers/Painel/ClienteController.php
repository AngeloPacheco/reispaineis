<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Cliente;
use App\Http\Requests\Painel\ClienteFormRequest;
use \Illuminate\Support\Facades\DB;


class ClienteController extends Controller
{
    
    private $cliente;
    private $totalPage = 10;
    
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title    = 'Clientes';
        $clientes =  Cliente::orderBy('nome','asc')->paginate($this->totalPage);

        return view('painel.clientes.index', compact('title', 'clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo cliente';
        return view('painel.clientes.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        $dataForm = $request->all();

        if (existeCliente($dataForm['cpf_cnpj'])){

            $messagens = ['cpf_cnpj.unique' => 'CPF ou CNPJ já cadastrada.'];

            $this->validate($request, ['cpf_cnpj' => 'unique:clientes'], $messagens);
               
        }else{

            $insert = $this->cliente->create($dataForm);
        }    

        if ($insert) {
           return redirect('/painel/clientes');
        } else {
                return redirect()->route('painel.clientes.create-edit');
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
        
        $title   = 'Detalhes do cliente';
        $cliente = Cliente::find($id);
             
        return view('painel.clientes.show', compact('title','cliente')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar cliente';
        $cliente = Cliente::find($id);
       
        return view('painel.clientes.create-edit',compact('cliente', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteFormRequest $request, $id)
    {
        $dataForm = $request->all();
        $cliente  = Cliente::find($id); 
      
        $update = $cliente->update($dataForm);
         
        if( $update ){
            return redirect('/painel/clientes');
        }
            else{
            return redirect()->route('clientes.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $cliente = $this->cliente->find($id);
        $delete = $cliente->delete();
        
        if ($delete){
            return redirect('/painel/clientes');
        }    
        else {
            return redirect()->route('clientes.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }
    public function busca(Request $request){

        $title = "Pesquisa Clientes";

        $key = $request->input('descricao');

            $clientes = DB::table('clientes')
                     ->where('clientes.nome','like','%'. $key .'%')
                     ->orwhere('clientes.cpf_cnpj','like','%'. $key .'%')
                     ->orwhere('clientes.localidade','like','%'. $key .'%')
                     ->orderby('clientes.celular','asc')
                     ->Paginate($this->totalPage);
             
        if (count($clientes) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($clientes) . ' registro(s)';
            return view('painel.clientes.busca', compact('title','clientes','msg')); 
        
        }else{
        
            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';
            return view('painel.clientes.busca', compact('title', 'clientes','msg'));
        }    
    }
}
