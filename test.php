<?php


    // Получаем данные из CSV файла в массив PHP
        if(!empty($_FILES['file']['name']))
            {
            
            include 'config.php';// загружаем запросы
                
            // Соединение с БД
            $connect = new PDO("mysql:host=localhost;dbname=dbname;", "user", "password", array(
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
             ));
            // Сбор данных из списка ЖК
        
                $ask_zhk = $connect->prepare('SELECT id, residential_complex t FROM residential_complexes');
                $ask_zhk->execute();
                $zhk = $ask_zhk->fetchAll(PDO::FETCH_ASSOC); //массив с ЖК                
                
                
                
                $total_row = count(file($_FILES['file']['tmp_name']))-1;
                $file_location = str_replace("\\", "/", $_FILES['file']['tmp_name']);
                
                // Open the CSV file for reading
                    if (($handle = fopen($file_location, "r")) !== FALSE) {
                        // Read the header row
                            $header = fgetcsv($handle);

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

                      

                        // Читаем строки
                            while (($item = fgetcsv($handle)) !== FALSE) {
                                
                        // Присваиваем значения id,rooms,floor,description
                            $id = '';
                            $rooms = '';
                            $floor = '';
                            $description = '';  
                            $comment='';
                            $complex_id='';
                            
                        // Проверяем наличие ошибок
                            $id = intval($item[0]); if ($id > 18446744073709551615 or $id<0 ) {$comment=$comment.'id не корректен<br>';}
                            $custom_id = $item[1]; 
                            $rooms1 = $item[2]; if ((intval($rooms1)<1 or intval($rooms1)>10) and $item[2]<>'Студия')  {$comment=$comment.'rooms должны быть или "Студия" или количество комнат до 10<br>';}
                            $floor1 = intval($item[3]); if ($floor1<1 or $floor1>35) {$comment=$comment.'floor от 1 до 35го этажа<br>';}
                            $price = $item[4]; 
                            $description1 = $item[5]; if (iconv_strlen($description1)>500) {$comment=$comment.'описание должно быть не более 500 символов<br>';}
                            $residential_complex = $item[6];

                        
                      
                                $rooms = $item[2];
                                $floor = $item[3];
                                $description = $item[5];
                                
                            
                      

                        // Проверяем  ЖК и устанавливаем complex_id
                            $iszhk=0;
                            
                              
                                foreach ($zhk as $row)  {
                                // Если ЖК найден - присваиваем значение complex_id
                                
                                if ($row['t']==$residential_complex)    { 
                                    $iszhk=1;
                                    $complex_id=$row['id'];
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


                            } 
                   
                // Close the file handle
                    fclose($handle); 
                    
                    
                    
           // Скачиваем данные из временной таблицы

                $statement = $connect->prepare($query_download);
                $statement->execute();
                $results = $statement->fetchAll(PDO::FETCH_ASSOC);
               echo json_encode($results);
            // Чистим таблицу
                
                $statement = $connect->prepare($query_tempo_clear);
                $statement->execute();
           
           
            }

 



?>