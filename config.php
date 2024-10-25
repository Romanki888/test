<?

//Запрос для устранения символа CR, который может появиться в поле residence после редактирования .CSV файла
    $query_clear = "
    UPDATE tempo
    SET residential_complex = REPLACE(residential_complex, CHAR(13), '')
    ";




// Запрос данных из временной DB
    $query_download = "
    SELECT id1, id, custom_id, rooms, rooms1, floor, floor1, price, description, description1, residential_complex, comment 
    FROM realty_prepare
    ";



// Удаление невалидных строк
    $query_delete_trash = '
    DELETE FROM `realty_prepare` WHERE comment <>""
    ';
    


	
	
	
// Перенос из realty_prepare1 в realty по custom_id
    $query_export1 = "
    UPDATE realty AS r 
    JOIN realty_prepare AS t  ON r.custom_id = t.custom_id

    SET
    r.rooms = t.rooms,
    r.floor = t.floor,
    r.price = t.price,
    r.description = t.description,
    r.residential_complex = t.complex_id
    WHERE 1 
    ";

// Перенос из realty_prepare2 в realty id
    $query_export2 = "
    UPDATE realty AS r 
    JOIN realty_prepare AS t  ON r.id = t.id

    SET
    r.custom_id = t.custom_id, 
    r.rooms = t.rooms,
    r.floor = t.floor,
    r.price = t.price,
    r.description = t.description,
    r.residential_complex = t.complex_id
    WHERE 1 
    ";

// Перенос оставшихся записей
    $query_export3 = "
    INSERT  INTO realty (custom_id,rooms,floor, price,description, residential_complex)
    SELECT custom_id,rooms,floor, price,description, complex_id FROM realty_prepare
    WHERE 
    realty_prepare.custom_id NOT IN (SELECT DISTINCT realty.custom_id FROM realty)
    AND realty_prepare.custom_id NOT IN (SELECT DISTINCT realty.id FROM realty)
    ";
    
// Очистка tempo
    $query_tempo_clear = "
    TRUNCATE realty_prepare
    ";

?>