<?php
    include 'getenv.php';// загружаем переменные окружения (в теории))

        $connect = new PDO("mysql:host=localhost;dbname=dbname;", "user", "password", array(
        PDO::MYSQL_ATTR_LOCAL_INFILE => true,
           ));
            // Сбор данных из списка ЖК
        
                $ask_zhk = $connect->prepare('SELECT id, residential_complex t FROM residential_complexes');
                $ask_zhk->execute();
                $zhk = $ask_zhk->fetchAll(PDO::FETCH_ASSOC); //массив с ЖК   
                
                
                $input = file_get_contents('php://input');


                            // Готовим SQL insert statement
                            $insert_row = $connect->prepare("
                            INSERT INTO realty_prepare (
                            id, custom_id, rooms,
                            floor,price,description,
                            residential_complex,rooms1,floor1,description1,comment,complex_id) 
                            VALUES (
                            :id, :custom_id, :rooms,
                            :floor,:price,:description,
                            :residential_complex,:rooms1,:floor1,:description1,:comment,:complex_id)");


                // Retrieve the raw POST data
                    $jsonArray = file_get_contents('php://input');  
                    $data = json_decode($jsonArray, true); // Decode JSON array into PHP associative array
                    foreach ($data as $item) {
    

                        // Присваиваем значения id,rooms,floor,description
                            $id = '';
                            $rooms = '';
                            $floor = '';
                            $description = '';  
                            $comment='';
                            
                        // Проверяем наличие ошибок
                            $id1 = intval($item['id']); if ($id1 > 18446744073709551615 or $id1<0 ) {$comment=$comment.'id не корректен<br>';}
                            $custom_id = $item['custom_id']; 
                            $rooms1 = intval($item['rooms']); if ( ($rooms1<1 or $rooms1>10) and $item['rooms']<>'Студия')  {$comment=$comment.'rooms должны быть или "Студия" или количество комнат до 10<br>';}
                            $floor1 = intval($item['floor']); if ($floor1<1 or $floor1>35) {$comment=$comment.'floor от 1 до 35го этажа<br>';}
                            $price = $item['price']; 
                            $description1 = $item['description']; if (iconv_strlen($description1)>500) {$comment=$comment.'описание должно быть не более 500 символов<br>';}
                            $residential_complex = str_replace("\n", ' ', strip_tags($item['residential_complex']));

                        // Если ошибок нет, то id,rooms,floor,description тоже заполняем
                            if ($comment=='')    {
                                $id = $id1;
                                $rooms = $rooms1;
                                $floor = $item['rooms'];
                                $description = $item['description'];
                                
                            }
                      

                        // Проверяем  ЖК и устанавливаем complex_id
                            $iszhk=0;
                            
                              
                                foreach ($zhk as $row)  {
                                // Если ЖК найден - присваиваем значение complex_id
                                
                                if ($row['t']==$residential_complex)    { 
                                    $iszhk=1;
                                    $complex_id=$row['id'];
                                }
                                }
                            
                                                 
                        
                        // Если ЖК нет - добавим
                            if ($iszhk==0) {
                                    $insert_zhk = $connect->prepare('INSERT INTO
                                    `residential_complexes` (residential_complex)
                                    VALUES ('.'"'.$residential_complex.'"'.')');
                                    $insert_zhk->execute();
                            
                                // И присвоим значение из базы
                                $ask_zhk->execute();
                                $zhk = $ask_zhk->fetchAll(PDO::FETCH_ASSOC); //массив с ЖК
                                
                                foreach ($zhk as $row)  {
                                // Если ЖК найден - присваиваем значение complex_id
                                if ($row['t']==$residential_complex)    { 
                                    $iszhk=1;
                                    $complex_id=$row['id'];
                                }
                                }
                            }
    
     



                        // Выполняем
                            $insert_row->execute(['id' => $id,
                                            'custom_id' => $custom_id,
                                            'rooms' => $rooms,
                                            'floor' => $floor,
                                            'price' => $price, 
                                            'description' => $description,
                                            'residential_complex' => $residential_complex,
                                            'rooms1' => $rooms1,
                                            'floor1' => $floor1,
                                            'description1' => $description1,
                                            'comment' => $comment,
                                            'complex_id' => $complex_id]
                                            
                                            ); 
    
                                           
                      
                                
                            }


   
 
    include 'config.php';// загружаем запросы 

   
      // Исполняем запросы валидации (здесь residence_notice идет после residence)
    $validation_array=['export1','export2','export3','tempo_clear','download'];
    foreach($validation_array as $fieldn)
        {

        $q='query_'.$fieldn;
        $query= "{$$q}";


        $statement = $connect->prepare($query);
        $statement->execute();

        if ($fieldin='download') { 
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($results);} // отправляем в браузер пустоту (после чистки)

        }
 



?>