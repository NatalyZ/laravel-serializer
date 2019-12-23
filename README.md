# laravel-serializer
Adaptive package of JMS serializer to Laravel

The laravel-serializer library integrates laravel framework with jms serializer 
https://jmsyst.com/libs/serializer.


Installation

You should use composer, installing laravel-serializer is easy:

git require laravel/serializer

Put to config/app.php package provider and enjoy:

\LaravelSerializer\LaravelSerializerProvider::class

To use jms serializer create your entity classes as following:

    /** @XmlRoot("employeeRequest")
    *@AccessType("public_method")
    */
    class EmployeeRequest
    {
    /**
     * @Type("Document")
     */
    private $document;

    /**
     * @Type("Address")
     */
    private $address;
    /**
     * @Type("string")
     * @XmlElement(cdata=false)
     */
    private $name;
    /**
     * @Type("double")
     * @XmlElement(cdata=false)
     */
    private $salary;
    
    ...
    }
    
 To use:
    
    $document = new Document();
    $document->setSeria('SN');
    $address = new Address();
    $address->setCity('X');
    $employeeRequest = new EmployeeRequest();
    $employeeRequest->setDocument($document);
    $employeeRequest->setAddress($address);
    $employeeRequest->setName($name);
    $employeeRequest->setSalary(10);
    
    $xml = $serializer->serialize($employeeRequest, 'xml');
    
  To receive object:
    
    $this->serializer->deserialize($response, $class, 'xml');