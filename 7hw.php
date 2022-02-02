<?php

// Задание 1
/* architecture/app/config/routing.php

Классы:
use Controller\MainController;
use Controller\OrderController;
use Controller\ProductController;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
*/

/* Задание 2

 Registry доступен разным модулям внутри всего приложения. Основная задача - он заменяет глобальные переменные. Не требует создания объекта так как использует статические методы. В нем реализован ContainerBuilder DI для того что бы не было жестких зависимостей между классами.
 
 */

/* Задание 3
*/

class IdentityMap
{
    private $identityMap = [];
 
    public function add(IDomainObject $obj)
    {
        $key = $this->getGlobalKey(get_class($obj), $obj->getId());
 
        $this->identityMap[$key] = $obj;
    }
 
    public function get(string $classname, int $id)
    {
        $key = $this->getGlobalKey($classname, $id);
 
        if (isset($this->identityMap[$key])) {
            return $this->identityMap[$key];
        }
 
        else{
            return 'new';
        }
    }
 
    private function getGlobalKey(string $classname, int $id)
    {
        return sprintf('%s.%d', $classname, $id);
    }
}

    private function createUser(array $user): Entity\User
        {
        $identityMap = new IdentityMap();
        $oldUser = $identityMap->get($user['name'], $user['id']);
        if($oldUser != 'new'){
            return $oldUser;
        }
        else{
            $role = $user['role'];

            return new Entity\User(
                $user['id'],
                $user['name'],
                $user['login'],
                $user['password'],
                new Entity\Role($role['id'], $role['title'], $role['role'])
            );
        }    
    }
    
