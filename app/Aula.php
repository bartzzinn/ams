<?php

namespace App;
 class Aula {
    public function extrairInformacoes(){
        $get_dados = file_get_contents('aulas/aula/aula.js');
        $dados_json = json_decode(substr($get_dados,18));
        $get_imports = $dados_json -> imports;
        $save_dados = [];

        foreach($get_imports as $get_import_one_by_one){
            $get_dados_one_by_one = file_get_contents('aulas/aula'. $get_import_one_by_one);
            $get_dados_one_by_one_json = json_decode(rtrim(substr($get_dados_one_by_one,14),")"));
            $obj_one_by_one =  [
                "id" => $get_dados_one_by_one_json->id,
                "tipo" => $get_dados_one_by_one_json->tipo
            ];

            $save_dados=array_push($save_dados,$obj_one_by_one);

        }

        file_put_contents('aulas/aula.json', json_encode($save_dados));

        var_dump($save_dados);
    }
   
 }