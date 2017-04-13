<?php
abstract class AbstractParser
{
    abstract public function parseMessage($message);
}

class JsonParser extends AbstractParser
{
    public function parseMessage($message)
    {
        return json_decode($message, true);
    }
}
class XmlParser extends AbstractParser
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
class ParserFactory
{
    public function create($type)
    {
        $resource = null;
        switch ($type) {
            case 'json':
                $resource = new JsonParser();
                break;
            case 'xml':
                $resource = new XmlParser();
                break;
            default:
                break;
        }
        
        return $resource;
    }
}

$parser = new ParserFactory();
$jsonParser = $parser->create('json');
$message = $jsonParser->parseMessage(json_encode(['name' => 'Denis', 'age' => 30]));
