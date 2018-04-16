<?php
   $conn = mysqli_connect("localhost","root","","votodb") or die(mysqli_error($conn));
   
   $query = "SELECT ID FROM USUARIOS";
   $result = mysqli_query($conn, $query);
   
    if(empty($result)) {
			   $table1 = "CREATE TABLE IF NOT EXISTS USUARIOS (
						 ID int(11) AUTO_INCREMENT,
						 EMAIL varchar(255),
						 NOME varchar(255),
						 SOBRENOME varchar(255) ,   						  
						 SENHA varchar(255),							 
						 ADMIN bool,
						 ATIVO bool,
						 PRIMARY KEY  (ID)
						 )";
   				$table2 = "CREATE TABLE IF NOT EXISTS CANDIDATOS (						  
   						  ID int(11) AUTO_INCREMENT,
                          NOME varchar(255),
   						  SOBRENOME varchar(255),
   						  NUMERO varchar(255) ,
						  QUANT_VOTO int (11),
   						  ATIVO bool,
   						  PRIMARY KEY  (ID)
   						  )";
   						  
   				$tables = [$table1, $table2];	
   				
   				foreach($tables as $k => $sql){
   					$query = @$conn->query($sql);
   					if(!$query)
   					   $errors[] = "Table $k : Creation failed ($conn->error)";
   					else
   					   $errors[] = "Table $k : Creation done";
   				   
   				}
   			
   }   
   
   if ($conn == true) {
    echo "Aplicação conectada ao banco de dados.";    
    
   }else {
    echo "Aplicação não conectada ao banco de dados.";
   }
   
   ?>﻿