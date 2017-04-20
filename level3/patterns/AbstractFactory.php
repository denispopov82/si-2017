<?php
abstract class AbstractParser
{
    abstract public function parseMessage($message);
}

class JsonParser extends AbstractParser
{
    public function parseMessage($message)
    {
        // TODO: Implement parse() method.
    }
}

class XmlParser extends AbstractParser
{
    public function parseMessage($message)
    {
        // TODO: Implement parse() method.
    }
}

class FactoryParser
{
    public function getParser($type)
    {
        $instance = null;
        switch ($type) {
            case 'json':
                $instance = new JsonParser();
                break;
            case 'xml':
                $instance = new XmlParser();
                break;
            default:
                break;
        }
        
        return $instance;
    }
}

$parser = new FactoryParser();
$jsonParser = $parser->getParser('json');
$jsonParser->parseMessage([1, 2, 3]);
