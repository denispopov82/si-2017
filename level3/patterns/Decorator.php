<?php
/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
abstract class AbstractElement
{
    abstract public function render();
}

class Span extends AbstractElement
{
    protected $text;
    
    public function __construct($text)
    {
        $this->text = $text;
    }
    
    public function render()
    {
        return '<span>' . $this->text . '</span>';
    }
}

abstract class ElementDecorator extends AbstractElement
{
    protected $element;
    
    public function __construct(AbstractElement $element)
    {
        $this->element = $element;
    }
}

class TableElementDecorator extends ElementDecorator
{
    public function render()
    {
        return '<table width="100" border="1">' . $this->element->render() . '</table>';
    }
}

class TrElementDecorator extends ElementDecorator
{
    public function render()
    {
        return '<tr>' . $this->element->render() . '</tr>';
    }
}

class TdElementDecorator extends ElementDecorator
{
    public function render()
    {
        return '<td>' . $this->element->render() . '</td>';
    }
}

$table = new TableElementDecorator(
    new TrElementDecorator(
        new TdElementDecorator(
            new Span('Hello world!')
        )
    )
);

echo $table->render();
