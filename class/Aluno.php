<?php
class Aluno{
    private $nome;
    private $nota1 = 0;
    private $nota2 = 0;
    private $nota3 = 0;
    private $nota4 = 0;
    private $media = 0;

    public function NOME($nome=''){
        if($nome == ''){
            return $this->nome;
        }
        $this->nome = $nome;
    }

    public function NOTA1($nota=''){
        if($nota == ''){
            return $this->nota1;
        }
        if($nota >= 0 && $nota <= 10){
            $this->nota1 = $nota;
            return true;            
        }
        else{
            return false;
        }
    }
    public function NOTA2($nota=''){
        if($nota == ''){
            return $this->nota2;
        }
        if($nota >= 0 && $nota <= 10){
            $this->nota2 = $nota;
            return true;            
        }
        else{
            return false;
        }
    }
    public function NOTA3($nota=''){
        if($nota == ''){
            return $this->nota3;
        }
        if($nota >= 0 && $nota <= 10){
            $this->nota3 = $nota;
            return true;            
        }
        else{
            return false;
        }
    }
    public function NOTA4($nota=''){
        if($nota == ''){
            return $this->nota4;
        }
        if($nota >= 0 && $nota <= 10){
            $this->nota4 = $nota;
            return true;            
        }
        else{
            return false;
        }
    }

    public function calcMedia($peso=[]){
        if($peso == []){
            $this->media = ($this->nota1 + $this->nota2 + $this->nota3 + $this->nota4)/4;
            return $this->media;
        }
               
        $this->media += $this->nota1 * $peso[0];
        $this->media += $this->nota2 * $peso[1];
        $this->media += $this->nota3 * $peso[2];
        $this->media += $this->nota4 * $peso[3];        
        $this->media = $this->media/array_sum($peso);
        return $this->media;
    }
}