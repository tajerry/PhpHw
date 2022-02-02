<?php
class CircleAreaLib
{
   public function getCircleArea(int $diagonal)
   {
       $area = (M_PI * $diagonal**2))/4;

       return $area;
   }
}

class SquareAreaLib
{
   public function getSquareArea(int $diagonal)
   {
       $area = ($diagonal**2)/2;

       return $area;
   }
}

// Имеющиеся интерфейсы:
<?php
interface ISquare
{
function squareArea(int $sideSquare);
}

interface ICircle
{
function circleArea(int $circumference);
}


// Адаптер библиотеки круга 

class AdapterCircle implements ICircle{
    private $adaptee;
    public function __construct(Adaptee $adaptee){
        $this->adaptee = $adaptee;
    }
    public function circleArea (int $circumference){
        $diagonal = $circumference/M_PI;
        $this->adaptee->getCircleArea(int $diagonal);
    }
}

// Адаптер библиотеки квадрата
class AdapterSquare implements ICircle{
    private $adaptee;
    public function __construct(Adaptee $adaptee){
        $this->adaptee = $adaptee;
    }
    public function squareArea (int $sideSquare){
        $diagonal = $sideSquare*sqrt(2);
        $this->adaptee->getSquareArea(int $diagonal);
    }
}

// Клиентский код

// Площадь круга через длину окружности
$adaptee = new CircleAreaLib();
$adapterCircle = new AdapterCircle($adaptee);
$adapterCircle->circleArea(10);

// Площадь квадрата через длину стороны

$adaptee = new SquareAreaLib();
$adapterCircle = new AdapterSquare($adaptee);
$adapterCircle->squareArea(4);

