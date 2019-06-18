<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class libaryadmin extends Controller
{
    //
    public function quickadd(){
        return view('libaryadmin_quickadd');
    }
    public function save(){
        $name = $_POST['name'];
        $title = $_POST['title'];
        $link = $_POST['link'];
        $this->hashID();
        $id = $this->hashID;
        var_dump($id);

        $this->insert_value = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'value','column_libary_value'=>$link,'column_libary_user'=>'root']; 
        $this->insert_type = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'type','column_libary_value'=>'link','column_libary_user'=>'root']; 
        $this->insert_show = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'show','column_libary_value'=>'y','column_libary_user'=>'root']; 
        $this->insert_title = ['column_libary_name'=>$name,'column_libary_id'=>$id,'column_libary_type'=>'title','column_libary_value'=>$title,'column_libary_user'=>'root']; 
        $this->sqlArr = [$this->insert_value,$this->insert_type,$this->insert_show,$this->insert_title];
        DB::transaction(function(){
            DB::table('table_libary')
            ->insert($this->sqlArr);
         });
    }
    public function hashID($n=1,$m=1){
        // ID 是6位数的
        // ID mod 620  = [2,3,5,7,11....];
        // H(K) = K MOD M
        $y = (floor(100000/620)+$n)*620;
        $x = $y+1;
        $sql  = "SELECT column_libary_id FROM table_libary WHERE column_libary_id ='".$x."'";
        $a = DB::select($sql);
        if(empty($a)) return $this->hashID=$x;
        else{
            $a=$a[0];
            //var_dump($a);
            $a = (array)$a;
            $a = $a['column_libary_id'];
            if($a>999999) return $this->hashID($n+1,$m+1);
            else  return $this->hashID($n+1);
        } 
    }

}
