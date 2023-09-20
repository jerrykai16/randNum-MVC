<?php

namespace App\Http\Controllers;

use App\Models\mydetail;
use App\Models\mymaster;
use Illuminate\Http\Request;

session_start();
class BooksController extends Controller
{
    public function index(){
        return view("index");
    }
    
    public function unique_num(){

        $unique_num = [];
        while(count($unique_num)<3){
            $num = mt_rand(0,9);
            if(!in_array($num,$unique_num))              
                $unique_num[] = (int)$num;         
        }
        if(session()->has('unique_num')){
            session(['unique_num' => $unique_num]);
            return redirect()->route('result');
        }else{            
            session(['unique_num' => $unique_num]);
            return redirect()->route('showArr');
        }
    }

    public function showArr(){
        $unique_num = session('unique_num', []);
        $result = "";
        $count = -1;
        foreach ($unique_num as $num){
            $count++;
            $result .= "[$count] => $num ";
        }
        $result = "Array( ". strval($result) . ")";
        session(['result' => $result]);
        return view ('index');
    }

    public function result(){
        $unique_num = session('unique_num', []);
        $rec = session('rec',[]);
        $finish = false;
        if(!session()->has('count')){
            $count = 1;
            $result = "";
        }
        else{
            $count = session('count');
            $result = session('result');
        }
        
        $a = abs($unique_num[1] - $unique_num[0]);
        $b = abs($unique_num[2] - $unique_num[1]);

        if($a == $b || $count >=10){
            $result .= "$count = $unique_num[0],$unique_num[1],$unique_num[2]<br>你已經找到數字或嘗試10次了!"; 
            $finish = true;            
        }else{
            $result .= "$count = $unique_num[0],$unique_num[1],$unique_num[2]<br>";
            $count++;
        }
                       
        $strRec = "$unique_num[0]$unique_num[1]$unique_num[2]";
        $rec[] = $strRec;
        session(['rec' => $rec]);
        session(['result' => $result]);
        session(['count' => $count]);
        if($finish)
            return redirect()->route('insert');
        else
            return view('index');
    }

    public function insert(){
        date_default_timezone_set('Asia/Taipei');
        $date = date('YmdHis');
        $rec = session('rec',[]);
        mymaster::create([
            'id' => $date,
            'freq' => session('count')
        ]);
        for($i = 0; $i<count($rec); $i++){
            mydetail::create([
                'id' => $date,
                'turn' => $i+1,
                'rec' => $rec[$i]
            ]);
        }
        return view('index');
    }
    public function clear(){
        session()->flush();
        return redirect()->route('start');
    }
}