<?php

namespace App\Http\Controllers;

use App\Models\Logs;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function list()
    {
        
        $logs = Logs::all()->toArray();
        
        $json = array();
        foreach($logs as $log){
            $data[] = $log['id'];
            $data[] = $log['conteudo'];
            $data[] = $log['tipo'];
            $data[] = $log['created'];
            //'<nobr>'.$btnEdit.$btnDelete.$btnDetails.'</nobr>'
            array_push($json, json_encode($data));
        }


        $teste[] = [126,"qauqwue coida","Teste PDO TARDE","2024-08-30 20:51:54"];
        $teste[] = [127,"qauqwue coida","Teste PDO TARDE","2024-08-30 20:51:54"];
        $teste[] = [128,"qauqwue coida","Teste PDO TARDE","2024-08-30 20:51:54"];

        return view('logs.list', [ "data"=>$teste ]);
    }
}
