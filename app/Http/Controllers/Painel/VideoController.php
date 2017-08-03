<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Video;
use App\Http\Requests\Painel\VideoFormRequest;
use \Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    
    private $video;
    private $totalPage = 10;
    
    public function __construct(Video $video){
        $this->video = $video;
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title ='Vídeos';
        $videos = Video::orderby('titulo','asc')->paginate($this->totalPage);

        return view('painel.videos.index',compact('title','videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo Vídeo';
        
        return view('painel.videos.create-edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoFormRequest $request)
    {
        $dataForm = $request->all();
        
        $insert = $this->video->create($dataForm);

        if ($insert) {
            return redirect('/painel/videos');
        } else {
            return redirect()->route('painel.videos.create-edit');
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
        $title = 'Detalhes do Vídeo';
        $video = Video::find($id);
        return view('painel.videos.show',compact('title','video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Editar Vídeo';
        $video = Video::find($id);
        return view('painel.videos.create-edit',compact('title','video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VideoFormRequest $request, $id)
    {
        $dataForm  = $request->all();
        $video     = Video::find($id); 
        $update    = $video->update($dataForm);

         if( $update ){
            return redirect('/painel/videos');
        }
            else{
            return redirect()->route('videos.edit', $id)->with(['errors' => 'Erro ao editar']);
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
        $video  = Video::find($id);
        $delete = $video->delete();
        
        if ($delete){
            return redirect('/painel/videos');
        }    
        else {
            return redirect()->route('videos.index', $id)->with(['errors' => 'Erro ao exluir.']);
        }
    }

    public function busca(Request $request){

        $title = "Pesquisa Vídeos";

        $key = $request->input('descricao');

            $videos = DB::table('videos')
                     ->select('videos.*')
                     ->where('videos.titulo','like','%'. $key .'%')
                     ->orderby('videos.titulo','asc')
                     ->Paginate($this->totalPage);
             
        if (count($videos) > 0){
             
            $msg = 'Sistema informa: A pesquisa retornou '. count($videos) . ' registro(s)';
            return view('painel.videos.busca', compact('title','videos','msg')); 
        }else{

            $msg = 'Sistema informa: A pesquisa não retornou registro(s)';
            return view('painel.videos.busca', compact('title', 'videos','msg'));
        }   
    }
}
