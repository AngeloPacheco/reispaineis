<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Movel;
use App\Models\Painel\CategoriaMovel;
use \Illuminate\Support\Facades\DB;
use App\Http\Requests\Painel\MovelFormRequest;

class MovelController extends Controller
{
    private $movel;
    private $totalPage = 10;
    
    public function __construct(Movel $movel){
        $this->movel = $movel;
    } 


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = 'Móveis';
        $moveis =  DB::table('moveis')
                ->select('moveis.*','categoria_moveis.descricao as categoria')
                ->join('categoria_moveis','categoria_moveis.id','=','moveis.categoria_id')
                ->orderby('moveis.descricao','asc')
                ->paginate($this->totalPage);


        return view('painel.moveis.index', compact('title', 'moveis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo Móvel';
        $categorias = CategoriaMovel::orderBy('descricao','asc')->get();     
                
        return view('painel.moveis.create-edit', compact('title','categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovelFormRequest $request)
    {
        $dataForm = $request->all();
        
        //echo '<pre>'; var_dump($dataForm['produto-titulo']); echo '</pre>';
        //die;

        $dataForm['ativo']    = ( !isset($dataForm['ativo'])) ? 0 : 1;
        $dataForm['novidade'] = ( !isset($dataForm['novidade'])) ? 0 : 1;
        $dataForm['custo']    = str_replace(",","." , $dataForm['custo']);
        $dataForm['lucro']    = str_replace(",","." , $dataForm['lucro']);
        $dataForm['venda']    = str_replace(",","." ,  $dataForm['venda']);
        
        if ( existeMovel($dataForm['descricao']) ){

            $messagens = ['descricao.unique' => 'Móvel já cadastrado'];

            $this->validate($request, [
                'descricao' => 'unique:moveis'], $messagens);
               
        }else{

            $insert = $this->movel->create($dataForm);
            /*
            foreach ($request->photos as $photo) {
                
                $filename = $photo->store('public/img-produtos');
                
                $nm_imagem = substr($filename, 7 );
                
                Imagem::create([
                        'nm_imagem'     =>  $nm_imagem,
                        'titulo'        =>  $dataForm['produto-titulo'],
                        'conteudo_id'   =>  $insert->id,
                        'conteudo_tipo' =>  'P',
                        'path'          =>  '/public/img-produtos',
                ]);
            }
             */
            if ($insert) {
                return redirect('/painel/moveis');
            } else {
                return redirect()->route('painel.moveis.create-edit');
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
        $movel = Movel::find($id);
        $title = "Detalhes";
        
        $categoria = CategoriaMovel::find($movel->categoria_id);
        
        /*
        $imagens = DB::table('imagens')
                  ->where([
                            ['imagens.conteudo_id', '=', $id],
                            ['imagens.conteudo_tipo', '=', 'P'],
                          ])->get();
      


          $imagens = Imagem::where('conteudo_id', $id)->get()->pluck('nm_imagem');
         */
        //echo '<pre>'; var_dump($imagens); echo '</pre>';
        //die; 

        $descricaoCategoria = $categoria->descricao;
        //$pathImagem         = $imagem->nm_imagem;
        
      
       return view('painel.moveis.show' , compact('title','movel','descricaoCategoria')); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title ="Editar Móvel";
        $movel = Movel::find($id);
        $categorias = CategoriaMovel::orderBy('descricao','asc')->get();     
        
        return view('painel.moveis.create-edit',compact('title', 'movel', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovelFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $movel     = Movel::find($id); 
        $update    = $movel->update($dataForm);
        
        if( $update ){
            return redirect('/painel/moveis');
        }
            else{
            return redirect()->route('moveis.edit', $id)->with(['errors' => 'Erro ao editar.']);
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
        $movel = Movel::find($id);
        $delete = $movel->delete();
        
        if ($delete){
            return redirect('/painel/moveis');
        }    
        else {
            return redirect()->route('moveis.show', $id)->with(['errors' => 'Erro ao exluir']);
        }
    }

    public function busca(Request $request){

        $title = "Pesquisa Móveis";

        $key = $request->input('descricao');

            $moveis = DB::table('moveis')
                     ->select('moveis.*', 'categoria_moveis.descricao as categoria')
                     ->join('categoria_moveis', 'categoria_moveis.id', '=', 'moveis.categoria_id')
                     ->where('moveis.descricao','like','%'. $key .'%')
                     ->orderby('moveis.descricao','asc')
                     ->Paginate($this->totalPage);
             
        if (count($moveis) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($moveis) . ' registro(s)';
            return view('painel.moveis.busca', compact('title','moveis','msg')); 
        }else{

            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';
            return view('painel.moveis.busca', compact('title', 'moveis','msg'));
        }   
    }
}
