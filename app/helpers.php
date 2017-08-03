
<?php

/* Validar se  categoria de moveis está cadastrada*/
function existeCategoriaMovel($descricao){
  
  $query = DB::table('categoria_moveis')
           ->select('categoria_moveis.id')
           ->where('categoria_moveis.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }
}    

/* Validar se  móvel está cadastrado*/
function existeMovel($descricao){
  
  $query = DB::table('moveis')
           ->select('moveis.id')
           ->where('moveis.descricao', '=', $descricao)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }
}   

/* Validar se cliente já está cadastrada*/
function existeCliente($cpf_cnpj){
  
  $query = DB::table('clientes')
           ->select('clientes.id')
           ->where('clientes.cpf_cnpj', '=', $cpf_cnpj)
           ->get();

  if (count($query) > 0){

    return true;
  
  }else{

    return false;
  }            
}                 