<?php


 $connect = new PDO("mysql:host=localhost;dbname=dbname;", "user", "password", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
    ));
    
    $offset='';
    $order='';
    $sort='';
    $limit='';

    if (isset($_GET['search'])) {
        

        if (isset($_GET['limit'])) {$limit=' LIMIT '.$_GET['limit'];
        if (isset($_GET['offset'])) {$offset=' LIMIT '.$_GET['offset'].','.$_GET['limit'];}}
        if (isset($_GET['sort'])) {$sort=' order by '.$_GET['sort'];}
        if (isset($_GET['order'])) {$order=' '.$_GET['order'];}
        
     $query= 'SELECT * FROM realty WHERE 1 ' . $sort . $order . $limit;  



         // Скачиваем данные 

           $statement = $connect->prepare($query);
           $statement->execute();
           $results = $statement->fetchAll(PDO::FETCH_ASSOC);
           $count = count($results);
           echo     '{"total": '.$count.',
                    "totalNotFiltered": '.$count.',
                    "rows": '.json_encode($results).'}';
           

        }

 
         if (isset($_GET['del'])) {  

           $query= 'DELETE FROM realty WHERE id='.$_GET['del'] ;
           $statement = $connect->prepare($query);
           $statement->execute();
           $query= 'SELECT * FROM realty WHERE 1';         
           $statement = $connect->prepare($query);
           $statement->execute();
           $results = $statement->fetchAll(PDO::FETCH_ASSOC);
           $count = count($results);
           echo     '{"total": '.$count.',
                    "totalNotFiltered": '.$count.',
                    "rows": '.json_encode($results).'}';    }     
         
         

 



?>