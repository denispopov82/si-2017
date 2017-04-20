<?php
abstract class AbstractParser1
{
    abstract public function parseMessage($message);
}

class JsonParser1 extends AbstractParser1
{
    public function parseMessage($message)
    {
        return json_decode($message, true);
    }
}
class XmlParser1 extends AbstractParser1
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
class ParserFactory1
{
    public function create($type)
    {
        $resource = null;
        switch ($type) {
            case 'json':
                $resource = new JsonParser1();
                break;
            case 'xml':
                $resource = new XmlParser1();
                break;
            default:
                break;
        }
        
        return $resource;
    }
}

$parser = new ParserFactory1();
$jsonParser = $parser->create('json');
$message = $jsonParser->parseMessage(json_encode(['name' => 'Denis', 'age' => 30]));
