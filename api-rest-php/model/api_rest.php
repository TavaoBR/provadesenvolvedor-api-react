<?php 

namespace Api\Model;

class ApiRest 
{
   public static function api()
   {
    $dados = [
          
        [
             "employeName" => "Josevaldo Peixoto",
             "punchDate" => "18/01/2023",
             "entries" => 
                array([
                 "punchDateTime" => "18/01/2023 18:00",
                 "punchType" => 1   
                ],
                [
                 "punchDateTime" => "19/01/2023 06:00",
                 "punchType" => 2  
                ]
                ) ,
                "amountOfHoursWorked" => 12 
         ],
 
 
         [
             "employeName" => "Josevaldo Peixoto",
             "punchDate" => "20/01/2023",
             "entries" => 
                 array([
                   "punchDateTime" => "20/01/2023 08:00",
                   "punchType" => 1
                 ],
                 [
                     "punchDateTime" => "20/01/2023 12:00",
                     "punchType" => 2
                 ],
                 [
                     "punchDateTime" => "20/01/2023 14:00",
                     "punchType" => 1
                 ],
                 [
                     "punchDateTime" => "20/01/2023 18:00",
                     "punchType" => 2
                 ]),
     
             "amountOfHoursWorked" => 8
         ]
     
             ];
 
 
     
     exit(json_encode($dados));
   }
}