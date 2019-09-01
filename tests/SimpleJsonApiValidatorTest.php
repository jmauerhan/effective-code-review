<?php

class SimpleJsonApiValidatorTest extends TestCase
{

   public function testValidateThrowsExceptionWhenJsonInvalid()
   {
       $json = '{"data":}';
       $this->expectException(InvalidJsonException::class);
       $validator = new SimpleJsonApiValidator();
       $validator->validate($json);
   }

   public function invalidJsonProvider()
   {
       return [
           'missingData' => ['{"someJson":"myText"}'],
           'missingType' => ['{"data":{}}']
       ];
   }

   /**
    * @dataProvider invalidJsonProvider
    */
   public function testValidateThrowsExceptionWhenSchemaInvalid(string $json)
   {
       $this->expectException(InvalidJsonApiException::class);
       $validator = new SimpleJsonApiValidator();
       $validator->validate($json);
   }

   public function testValidateReturnsTrueWhenJsonValid()
   {
       $data = (object)[
           'type' => 'chirp',
           'id' => 'uuid',
           'attributes' => (object)[
               'chirpText' => 'Test'
           ]
       ];
       $payload = (object)['data' => $data];
       $json = json_encode($payload);
       $validator = new SimpleJsonApiValidator();
       self::assertTrue($validator->validate($json));
   }
}
