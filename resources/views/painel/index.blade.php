<!DOCTYPE html>
<html>
    <head>
    
      <title>{{$title or ''}} | ADM - Reis dos Painéis</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
       <!-- bootstrap-->
      <link rel="stylesheet" href="{{url('assets/all/css/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{url('assets/painel/css/style.css')}}"/>
      <link rel="stylesheet" href="{{url('assets/painel/css/menu.css')}}"/>
      <link rel="stylesheet" href="{{url('assets/all/css/font-awesome.min.css')}}"/>
      <link rel="shortcut icon" href="{{url('assets/painel/imgs/tag.png')}}" type="image/x-icon" />
      <script src="{{url('assets/all/js/jquery-3.2.1.min.js')}}"></script>


    </head>
    <body>
      <div class="topo">
        <div class="dropdown user">
           <div class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
               <img src="{{url('assets\painel\imgs\img-user.jpg')}}" alt="usuario" class="user img-circle">
               <p class="user-name">Nome do Usuário</p>
               <span class="caret"></span>
           </div>
           <ul class="dropdown-menu dp-menu" aria-labelledby="dropdownMenu1">
               <li><a href="#">Perfil</a></li>
               <li><a href="#">Sair</a></li>
           </ul>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div id="wrapper">
             <!-- Sidebar -->
             <div id="sidebar-wrapper">
                  
                <img src="{{url('assets\painel\imgs\logo.png')}}" alt="logomarca" class="logo">

                <ul class="sidebar-nav painel-navbar" style="margin-left:0;">
                  <li class="sidebar-brand">
                      <a class="painel-fa" href="#menu-toggle"  id="menu-toggle" style="margin-top:20px;float:right;" > <i class="fa fa-bars " style="font-size:20px !Important;" aria-hidden="true" aria-hidden="true"></i></a>
              
                  </li>
                  
                  <li>
                      <a class="painel-fa" href="{{url('painel/')}}" title="Página inicial"><i class="fa fa-home" aria-hidden="true"> </i> <span style="margin-left:10px;">Início</span>  </a>
                  </li>

                  <li>
                      <a class="painel-fa" href="{{url('painel/quem-somos')}}" title="Texto de aprensentação da empresa"><i class="fa fa-question" aria-hidden="true"> </i> <span style="margin-left:10px;">Quem somos</span>  </a>
                  </li>
                  
                   <li>
                      <a class="painel-fa" href="{{url('painel/empresa')}}" title="Dados da empresa"> <i class="fa fa-institution" aria-hidden="true"> </i> <span style="margin-left:10px;"> Empresa</span> </a>
                  </li>

                  <li>
                      <a class="painel-fa" href="{{url('painel/categoria-de-moveis')}}" title="Categoria de móveis"> <i class="fa fa-tags" aria-hidden="true"> </i> <span style="margin-left:10px;">Categorias</span> </a>
                  </li>

                  <li>
                      <a class="painel-fa" href="{{url('painel/moveis')}}" title="Móveis"> <i class="fa fa-barcode" aria-hidden="true"> </i> <span style="margin-left:10px;">Móveis</span> </a>
                  </li>
                  
                   <li>
                      <a class="painel-fa" href="{{url('painel/clientes')}}" title="Clientes"> <i class="fa fa-users" aria-hidden="true"> </i> <span style="margin-left:10px;">Clientes</span> </a>
                  </li>
                  
                  <li>
                      <a class="painel-fa" href="{{url('painel/videos')}}" title="Vídeos"> <i class="fa fa-film" aria-hidden="true"> </i> <span style="margin-left:10px;">Vídeos</span> </a>
                  </li>
                  
                  <li>
                      <a class="painel-fa" href="{{url('painel/usuarios')}}" title="Usuários do sistema"> <i class="fa fa-users" aria-hidden="true"> </i> <span style="margin-left:10px;"> Usuários</span> </a>
                  </li>
              </ul>
            </div>
                    
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <script>
                                
                                $("#menu-toggle").click(function(e) {
                                   e.preventDefault();
                                   $("#wrapper").toggleClass("toggled");
                                });
                               
                            </script>
                      </div>
                    </div>
                </div>
            </div>
               
        </div>
      </div>
    </div>


        <div class='container'>
             @yield('content')
        </div>   
        <!--fim container-->
    </body>

        <!-- Jquery -->
        <script src="{{url('assets/painel/js/jquery-ui.js')}}"></script>
        <!-- JS Bootstrap -->
        <script src="{{url('assets/all/js/bootstrap.min.js')}}"></script>
         

 </html>    

 @yield('post-script')
 @yield('scripts-moveis')
 