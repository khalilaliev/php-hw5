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

  abstract public function calculate(): mixed;
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
        return $this->get_first_property() + $this->get_pow_property() + $this->additional_property;
    }

    public function calculate(): int | float
    {
      return $this->sum_properties();
    }

}

final class FinalAdder extends Adder
{
  private int $final_property;

  public function set_final_property(int $value): void
  {
    $this->final_property = $value;
  }

  public function get_final_property(): int
  {
    return $this->final_property;
  }

  public function add_final_property(): int
  {
    return $this->calculate() + $this->final_property;
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
        return $this->get_first_property() * $this->get_pow_property() * $this->factor;
    }

    public function calculate(): int
    {
      return $this->multiply_properties();
    }
}

class Divider extends Root
{
    public int $divisor;

  public function set_divisor(int $value): void
  {
    if ($value === 0) {
      throw new Exception("Division by 0 is not allowed");
    }
    $this->divisor = $value;
  }

    public function get_divisor(): int
    {
        return $this->divisor;
    }

    public function divide_properties(): float | int | null
    {
      return ($this->get_first_property() + $this->get_pow_property()) / $this->divisor;
    }

    public function calculate(): float
    {
      return $this->divide_properties();
    }
}

class DividerChild extends Divider
{
    public int $child_property;

    public function set_child_property(int $value): void
    {
      if ($value === 0) {
        throw new Exception("Division by 0 is not allowed");
      }
      $this->child_property = $value;
    }

    public function get_child_property(): int
    {
        return $this->child_property;
    }

    public function divide_child_property(): float | int | null
    {
      return $this->divide_properties() / $this->child_property;
    }

    public function divide_with_root(): float
    {
        return $this->get_first_property() / $this->child_property;
    }
}

$divider = new DividerChild();
$divider->set_first_property(16);
$divider->set_pow_property(2);
$divider->set_divisor(4);
$divider->set_child_property(2);

var_dump($divider->calculate());
echo '<br>';
var_dump($divider->divide_properties());
echo '<br>';
var_dump($divider->divide_child_property());
echo '<br>';

$finaladder = new FinalAdder();
$finaladder->set_first_property(2);
$finaladder->set_pow_property(3);
$finaladder->set_additional_property(5);
$finaladder->set_final_property(10);

var_dump($finaladder->calculate());
echo '<br>';
var_dump($finaladder->add_final_property());