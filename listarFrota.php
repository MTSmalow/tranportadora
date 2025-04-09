<?php
try{
    include_once("conexao.php");
    
   $query = "SELECT * FROM frota";
 
    $result=$conn->query($query);
    $result->execute();
    
        $response = array();
        $res = $result->fetchALL(PDO::FETCH_OBJ);
            foreach ($res as $r) {
                $response[] = $r;
                
            }
            
        header('Content-Type: application/json');
		echo json_encode($response);
    }
    
catch(PDOException $e){
    echo "Falha ao listar dados ";
                      }
                      