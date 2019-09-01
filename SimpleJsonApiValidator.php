<?php

class SimpleJsonApiValidator implements JsonValidator
{
   public function validate(string $json):bool
   {
       $object = json_decode($json);
       if($object === null){
           throw new InvalidJsonException();
       }
       if (property_exists($object, 'data') = false) 
            {
           throw new InvalidJsonApiException('Missing data property');
        }
    }
}
