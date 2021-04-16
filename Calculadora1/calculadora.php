<?php
   $num1 = $_POST['num1'];
   $num2 = $_POST['num2'];
   $op= $_POST['operacao'];

   function soma(int $num1, int $num2){
      $resul = $num1 + $num2;
      return $resul;
   }

   function subtracao(int $num1, int $num2){
      $resul = $num1 - $num2;
      return $resul;
   }

   function multiplicacao(int $num1, int $num2){
      $resul = $num1 * $num2;
      return $resul;
   }

   function divisao(int $num1, int $num2){
      if($num2 == 0){
         $resul = "invalido";
      }else{
         $resul = $num1 / $num2;
      }
      return $resul;
   }

   if($op == 'Soma'){
      $c = soma($num1, $num2);
   }else if($op == 'Subtracao'){
      $c = subtracao($num1, $num2);
   }else if($op == 'Multiplicacao'){
      $c = multiplicacao($num1, $num2);
   }else{
      $c = divisao($num1, $num2);
      
   }

   echo "O resultado da operacao: $c";
   

?>       