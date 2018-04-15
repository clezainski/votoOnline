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
   						  CPF varchar(11),
                             SENHA varchar(255),
							 CEP varchar (5),
   						  RUA varchar(255),
   						  NUMERO varchar(5),
   						  COMPLEMENTO varchar(255),
   						  BAIRRO varchar(255),
                             CIDADE varchar(255), 
   						  ESTADO varchar(255),
   						  ADMIN bool,
   						  ATIVO bool,
                             PRIMARY KEY  (ID)
                             )";
   				$table2 = "CREATE TABLE IF NOT EXISTS CANDIDATOS (						  
   						  ID int(11) AUTO_INCREMENT,
                             NOME varchar(255),
   						  SOBRENOME varchar(255),
   						  NUMERO varchar(255) ,
   						  ATIVO bool,
   						  PRIMARY KEY  (ID)
   						  )";
   				
   				$table3 = "CREATE TABLE IF NOT EXISTS VOTOS (
   						  ID int (11) AUTO_INCREMENT, 
   						  candidato_id INT,						  
   						  FOREIGN KEY (candidato_id) REFERENCES candidatos(id)
   						  ON DELETE CASCADE,
   						  PRIMARY KEY  (ID)
   						  )";
   						  
   				$tables = [$table1, $table2, $table3];	
   				
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