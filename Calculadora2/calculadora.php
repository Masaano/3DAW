<?php
   if ($_SERVER["REQUEST_METHOD"]  == "POST") {
      $num1 = $_POST['num1'];
      $num2 = $_POST['num2'];
      $op= $_POST['operacao'];

      if($op == "raiz" || $op == "1/x"){
         $num2 = 0;
      }
      function validarDados($num1, $num2, String $op){
         $erroMsg = "";
         if (!is_numeric($num1)) {
            $erroMsg = "Valor 1 não é valido";
         }else if (!is_numeric($num2)) {
               $erroMsg = "Valor 2 não é valido";
         }

         if ($op == "divi" and $num2 == 0) {
               $erroMsg = "Valor 2  não pode ser 0 para divisão";
         }
         return $erroMsg;
   }
      

      function soma(float $num1, float $num2){
         $resul = $num1 + $num2;
         return $resul;
      }

      function subtracao(float $num1, float $num2){
         $resul = $num1 - $num2;
         return $resul;
      }

      function multiplicacao(float $num1, float $num2){
         $resul = $num1 * $num2;
         return $resul;
      }

      function divisao(float $num1, float $num2){
         if($num2 == 0){
            $resul = "invalido";
         }else{
            $resul = $num1 / $num2;
         }
         return $resul;
      }
      function exponenciacao(float $num1, float $num2){
        $resul = $num1 ** $num2;
        return $resul;
     }
     function raizQuadrada(float $num1){
        $resul = sqrt($num1);
        return $resul;
     }
     function umSobreX(float $num1){
        $resul = 1/$num1;
        return $resul;
     }
     function porcentagem(float $num1, float $num2){
        $resul = ($num1*$num2)/100;
        return $resul;
     }
      $vali = validarDados($num1,$num2,$op);
      if($vali == ""){
         if($op == 'soma'){
            $c = soma($num1, $num2);
         }else if($op == 'sub'){
            $c = subtracao($num1, $num2);
         }else if($op == 'mult'){
            $c = multiplicacao($num1, $num2);
         }else if($op == 'divi'){
            $c = divisao($num1, $num2);      
         }else if($op == 'exp'){
            $c = exponenciacao($num1, $num2);      
         }else if($op == 'raiz'){
            $c = raizQuadrada($num1);      
         }else if($op == '1/x'){
            $c = umSobreX($num1);      
         }else if($op == 'porc'){
            $c = porcentagem($num1, $num2);      
         }else{
            $c = "Pare de mexer no codigo" ;
         }
      
         echo "O resultado da operacao: $c";
      }
      echo $vali;
   }
   
?>       