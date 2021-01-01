<?php

    function is_Valid_insert_item($name, $price, $stock, $img){
        $array_errors = [];
        if(empty($name)){
            $array_errors[] = EMPTY_ITEM_NAME;
        } else if (mb_strlen($name) > ITEM_NAME_LENGTH_MAX) {
            $array_errors[] = EXCESS_LENGTH_ITEM_NAME;
        } else if (preg_match(HALF_SPACE, $name) === 1 || preg_match(ALL_SPACE, $name) === 1){
            $array_errors[] = REGEXP_SPACE_ONLY_NAME;
        }

        if(empty($price)){
            $array_errors[] = EMPTY_PRICE;
        }else if(preg_match(REGEXP_POSITIVE_INTEGER, $price) === 0){
            $array_errors[] = ILLEGAL_VALUE_PRICE;
        } else if (mb_strlen($price) > ITEM_PRICE_MAX){
            $array_errors[] = OVER_LENGTH_PRICE;
        }        
        if(empty($stock)){
            $array_errors[] = EMPTY_STOCK;
        }else if(preg_match(REGEXP_NUMBER, $stock) === 0){
            $array_errors[] = ILLEGAL_VALUE_STOCK;
        } else if (mb_strlen($stock) > ITEM_STOCK_MAX){
            $array_errors[] = OVER_LENGTH_STOCK;
        }
        

        if (is_uploaded_file($img['img']['tmp_name']) === TRUE) {
            $extension = pathinfo($img['img']['name'], PATHINFO_EXTENSION);
            if ($extension !== 'png'  &&
                $extension !== 'PNG'  &&
                $extension !== 'jpeg' &&                
                $extension !== 'JPEG' &&
                $extension !== 'JPG'  && 
                $extension !== 'jpg' ) {
                $array_errors[] = ILLEGAL_FILE_FORMAT;
            }
        } else {
            $array_errors[] = EMPTY_FILE;
        }

        return $array_errors;
    }
?>