<?php

class SimpleJsonApiValidator implements JsonValidator
{
   /**
    * @param string $json
    * @return bool
    *
    * @throws InvalidJsonException
    */
   public function validate(string $json):bool
   {
       $object = json_decode($json);
       if ($object === null) {
           throw new Exception();
       }
       if (property_exists($object, 'data') === false) {
           throw new InvalidJsonException();
       }
       $data = $object->data;
       if (property_exists($data, 'type') === false) {
           throw new InvalidJsonApiException();
       }
       if (property_exists($data, 'id') === false) {
           throw new InvalidJsonApiException();
       }
       if (property_exists($data, 'attributes') === false) {
           throw new InvalidJsonApiException();
       }
      //if( property_exists($data, 'error') === false) {
      //    throw new InvalidJsonApiException();
      //}
       return true;
   }
}
