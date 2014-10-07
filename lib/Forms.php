<?php
/**
 * Created by PhpStorm.
 * User: Nick Stephen
 * Date: 3/10/14
 * Time: 6:22 PM
 */

require_once 'Output.php';

abstract class FormItem implements Output
{
    protected $name;
    public $required = true;
}

class SelectItem
{
    private $selected = false;
    private $value = '';
    private $contents = '';

    function __construct($isSelected, $value, $text)
    {
        $this->selected = $isSelected;
        $this->value = $value;
        $this->contents = $text;
    }

    function write()
    {
        echo '<option value="', $this->value, '" ';

        if ($this->selected)
        {
            echo 'selected';
        }

        echo '>', $this->contents, '</option>';
    }
}

class DropDownSelect extends FormItem
{
    private $items = array();

    function __construct($name)
    {
        $this->name = $name;
    }

    function addItem(SelectItem $item)
    {
        $this->items[] = $item;
    }

    function write()
    {
        echo '<select name="', $this->name, '">';

        foreach ($this->items as $item)
        {
            $item->write();
        }

        echo '</select>';
    }
}

class Input extends FormItem
{
    private $type = '';
    private $value = '';

    function __construct($name, $value = '', $type = 'text')
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    function write()
    {
        echo '<input type="', $this->type, '" name="', $this->name, '" value="', $this->value, '">';
    }
}

class TextBoxInput extends FormItem
{
    private $rows;
    private $cols;
    private $text;

    function __construct($name, $rows, $cols, $text = '')
    {
        $this->name = $name;
        $this->rows = $rows;
        $this->cols = $cols;
        $this->text = $text;
    }

    function write()
    {
        echo '<textarea name="', $this->name, '" rows="', $this->rows, '" cols="', $this->cols, '">', $this->text, '</textarea>';
    }
}

class Form implements Output
{
    private $name;
    private $method;
    private $action;

    private $items = array();

    function __construct($name, $method, $action)
    {
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
    }

    function addItem($key, FormItem $item)
    {
        $this->items[$key] = $item;
    }

    function write()
    {
        echo '<form name="', $this->name, '" method="', $this->method, '" action="', $this->action, '"><table>';

        foreach ($this->items as $key => $item)
        {
            $cls = $item->required ? 'key req' : 'key';
            echo '<tr><td class="', $cls, '">', $key, '</td><td>';
            $item->write();
            echo '</td>';
        }

        echo '<tr><td colspan="2"><input type="submit" value="Submit"></td></tr></table></form>';
    }
}