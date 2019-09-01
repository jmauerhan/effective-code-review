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
           throw new InvalidJsonException('Missing data property');
       }
       $data = $object->data;
       if (property_exists($data, 'type') === false) {
           throw new InvalidJsonApiException('Missing data->type property');
       }
       if (property_exists($data, 'id') === false) {
           throw new InvalidJsonApiException('Missing data->id property');
       }
       if (property_exists($data, 'attributes') === false) {
           throw new InvalidJsonApiException('Missing data->attributes property');
       }
       return true;
   }
}
