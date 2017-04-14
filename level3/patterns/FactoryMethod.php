<?php
abstract class AbstractParser
{
    abstract public function create($type);
}

class JsonObjectParser
{
    public function parseMessage($message)
    {
        return json_decode($message);
    }
}

class JsonArrayParser
{
    public function parseMessage($message)
    {
        return json_decode($message, true);
    }
}

class XmlObjectParser
{
    public function parseMessage($message)
    {
        $xml = simplexml_load_string($message);
        $json = json_encode($xml);
        $object = (object)json_decode($json, true);
        
        return $object;
    }
}

class XmlArrayParser
{
    public function parseMessage($message)
    {
        $xml = simplexml_load_string($message);
        $json = json_encode($xml);
        $array = json_decode($json, true);
        
        return $array;
    }
}

/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
class JsonParserFactory extends AbstractParser
{
    public function create($type)
    {
        $resource = null;
        switch ($type) {
            case 'object':
                $resource = new JsonObjectParser();
                break;
            case 'array':
                $resource = new JsonArrayParser();
                break;
            default:
                break;
        }
        
        return $resource;
    }
}

class XmlParserFactory extends AbstractParser
{
    public function create($type)
    {
        $resource = null;
        switch ($type) {
            case 'object':
                $resource = new JsonParser();
                break;
            case 'array':
                $resource = new XmlParser();
                break;
            default:
                break;
        }
    
        return $resource;
    }
}

$parser = new JsonParserFactory();
$jsonObjectParser = $parser->create('object');
// object type
$message = $jsonObjectParser->parseMessage(json_encode(['name' => 'Denis', 'age' => 30]));
echo "<pre>";
    var_dump($message);
echo "</pre>";

$jsonArrayParser = $parser->create('array');
// array type
$message = $jsonArrayParser->parseMessage(json_encode(['name' => 'Denis', 'age' => 30]));
echo "<pre>";
    var_dump($message);
echo "</pre>";
