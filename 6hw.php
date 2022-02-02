<?php
// 1 Задание

/**
 * PHP имеет несколько встроенных интерфейсов, связанных с паттерном
 * Наблюдатель.
 *
 * Вот как выглядит интерфейс Издателя:
 *
 * @link http://php.net/manual/ru/class.splsubject.php
 *
 *     interface SplSubject
 *     {
 *         // Присоединяет наблюдателя к издателю.
 *         public function attach(SplObserver $observer);
 *
 *         // Отсоединяет наблюдателя от издателя.
 *         public function detach(SplObserver $observer);
 *
 *         // Уведомляет всех наблюдателей о событии.
 *         public function notify();
 *     }
 *
 * Также имеется встроенный интерфейс для Наблюдателей:
 *
 * @link http://php.net/manual/ru/class.splobserver.php
 *
 *     interface SplObserver
 *     {
 *         public function update(SplSubject $subject);
 *     }
 */

/**
 * Издатель владеет некоторым важным состоянием и оповещает наблюдателей о его
 * изменениях.
 */
class HandHunter implements \SplSubject
{
    /**
     * @var int Для удобства в этой переменной хранится состояние Издателя,
     * необходимое всем подписчикам.
     */
    public $jobs;

    /**
     * @var \SplObjectStorage Список подписчиков. В реальной жизни список
     * подписчиков может храниться в более подробном виде (классифицируется по
     * типу события и т.д.)
     */
    private $observers;

    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * Методы управления подпиской.
     */
    public function attach(\SplObserver $observer): void
    {
        echo "Subject: Attached an observer.\n";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }

    /**
     * Запуск обновления в каждом подписчике.
     */
    public function notify(): void
    {
        echo "Subject: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * Обычно логика подписки – только часть того, что делает Издатель. Издатели
     * часто содержат некоторую важную бизнес-логику, которая запускает метод
     * уведомления всякий раз, когда должно произойти что-то важное (или после
     * этого).
     */
    public function someBusinessLogic(): void
    {
        echo "\nSubject: I'm doing something important.\n";
        $this->jobs = 0;
        $this->jobs += 1;

        echo "Quntity jobs in HandHunter: {$this->jobs}\n";
        $this->notify();
    }
}

/**
 * Конкретные Наблюдатели реагируют на обновления, выпущенные Издателем, к
 * которому они прикреплены.
 */
class JobSeekers implements \SplObserver
{   
    $name;
    $email;
    $experience;
    private function __constructor($name, $email, $experience){
        $this->namec= $name;
        $this->email = $email;
        $this->experience = $experience;
    }
    public function attach(\SplSubject $subject): void
    {
        $subject->attach($this);
    }
    public function attach(\SplSubject $subject): void
    {
        $subject->detach($this);
    }
}


/**
 * Клиентский код.
 */

$handHunter = new HandHunter();
$seeker = new JobSeekers('Jerry', 'sjdfkfn@mail.ru', 10);
$seeker->attach($handHunter);
$seeker->detach($handHunter);


$subject->someBusinessLogic();
$subject->someBusinessLogic();

// 2 Задание


/**
 * Интерфейс Стратегии объявляет операции, общие для всех поддерживаемых версий
 * некоторого алгоритма.
 *
 * Контекст использует этот интерфейс для вызова алгоритма, определённого
 * Конкретными Стратегиями.
 */
interface Strategy
{
    public function pay(): array;
}

/**
 * Конкретные Стратегии реализуют алгоритм, следуя базовому интерфейсу
 * Стратегии. Этот интерфейс делает их взаимозаменяемыми в Контексте.
 */
class Qiwi implements Strategy
{
    public function pay()
    {
        echo 'Qiwi payment';

    }
}

class Yandex implements Strategy
{
    public function pay()
    {
        echo 'Yandex payment';

    }
}
class WebMoney implements Strategy
{
    public function pay()
    {
        echo 'WebMoney payment';

    }
}

class PaymentMethod{
    private $strategy;
    public function __construct(Strategy $strategy){
        $this->strategy = $strategy;
    }
    public function setStrategy(Strategy $strategy){
        $this->strategy = $strategy;
    }
    public function pay(Strategy $strategy){
        $this->strategy->pay();
    }
}

// Использование

$paymentMethod = new PaymentMethod(new Qiwi);
$paymentMethod->pay();
