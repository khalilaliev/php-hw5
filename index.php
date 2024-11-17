<?php 

abstract class Root 
{
    public int $first_property;
    public int $pow_property;

  public function set_first_property(int $first_prop): void
    {
        $this->first_property = $first_prop;
    }

  public function get_first_property(): int
    {
        return $this->first_property;
    }

  public function set_pow_property(int $pow_prop): void
    {
        $this->pow_property = $pow_prop;
    }

  public function get_pow_property(): int
    {
        return $this->pow_property;
    }

  public function calculate(): int
    {
        return $this->first_property ** $this->pow_property;
    }
}

class Adder extends Root 
{
    public int $additional_property;

    public function set_additional_property(int $value): void
    {
        $this->additional_property = $value;
    }

    public function get_additional_property(): int
    {
        return $this->additional_property;
    }

    public function sum_properties(): int
    {
        return $this->calculate() + $this->additional_property;
    }
}

class Multiplier extends Root 
{
    public int $factor;

    public function set_factor(int $value): void
    {
        $this->factor = $value;
    }

    public function get_factor(): int
    {
        return $this->factor;
    }

    public function multiply_properties(): int
    {
        return $this->calculate() * $this->factor;
    }
}

class Divider extends Root 
{
    private int $divisor;

    public function set_divisor(int $value): void
    {
        $this->divisor = $value;
    }

    public function get_divisor(): int
    {
        return $this->divisor;
    }

    public function divide_properties(): float
    {
        if ($this->divisor === 0) {
            throw new Exception("Division by 0 is not allowed");
        }
        return $this->calculate() / $this->divisor;
    }
}

class AdderChild1 extends Adder 
{
    private int $child_property;

    public function set_child_property(int $value): void
    {
        $this->child_property = $value;
    }

    public function get_child_property(): int
    {
        return $this->child_property;
    }

    public function add_child_property(): int
    {
        return $this->sum_properties() + $this->child_property;
    }

    public function add_with_root(): int
    {
        return $this->get_first_property() + $this->child_property;
    }
}

class AdderChild2 extends Adder 
{
    private int $child_property;

    public function set_child_property(int $value): void
    {
        $this->child_property = $value;
    }

    public function get_child_property(): int
    {
        return $this->child_property;
    }

    public function multiply_child_property(): int
    {
        return $this->sum_properties() * $this->child_property;
    }

    public function multiply_with_root(): int
    {
        return $this->get_first_property() * $this->child_property;
    }
}

class DividerChild1 extends Divider 
{
    private int $child_property;

    public function set_child_property(int $value): void
    {
        $this->child_property = $value;
    }

    public function get_child_property(): int
    {
        return $this->child_property;
    }

    public function subtract_child_property(): int
    {
        return $this->divide_properties() - $this->child_property;
    }

    public function subtract_with_root(): int
    {
        return $this->get_first_property() - $this->child_property;
    }
}

class DividerChild2 extends Divider 
{
    private int $child_property;

    public function set_child_property(int $value): void
    {
        $this->child_property = $value;
    }

    public function get_child_property(): int
    {
        return $this->child_property;
    }

    public function divide_child_property(): float
    {
        if ($this->child_property === 0) {
            throw new Exception("Division by 0 is not allowed");
        }
        return $this->divide_properties() / $this->child_property;
    }

    public function divide_with_root(): float
    {
        if ($this->child_property === 0) {
            throw new Exception("Division by 0 is not allowed");
        }
        return $this->get_first_property() / $this->child_property;
    }
}

$adder = new AdderChild1();
$adder->set_first_property(2);
$adder->set_pow_property(3);
$adder->set_additional_property(5);
$adder->set_child_property(10);

var_dump($adder->calculate());
echo '<br>';
var_dump($adder->sum_properties());
echo '<br>';
var_dump($adder->add_child_property());
echo '<br>';

$divider = new DividerChild2();
$divider->set_first_property(16);
$divider->set_pow_property(2);
$divider->set_divisor(4);
$divider->set_child_property(2);

var_dump($divider->calculate());
echo '<br>';
var_dump($divider->divide_properties());
echo '<br>';
var_dump($divider->divide_child_property());