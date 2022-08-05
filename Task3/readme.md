
Skip to content

    Product 

Team
Enterprise
Explore
Marketplace
Pricing

Sign in
Sign up
mvsvolkovskillbox /
hr_teacher_tasks
Public

Code
Issues
Pull requests
Actions
Projects
Wiki
Security

    Insights

hr_teacher_tasks/php_courses/Task3.md
@mvsvolkov
mvsvolkov Корректировка задания по микро-фреймворку
Latest commit 73b3287 on 30 Nov 2020
History
1 contributor
70 lines (49 sloc) 4.35 KB
# Задание 3

Создайте микро-фреймворк (MVC), состоящий из Ядра (`Application`), Маршрутизатора (`Router`), Контроллера (`Controller`) и Модели (`ModelInterface`).
Файл с его использованием приложен в задании `index.php` (см. ниже)
В качестве шаблона можете использовать любой фреймворк, или не использовать вообще ничего. У сайта должен быть единый `header` и `footer` для всех его страниц. Например: [bootstrap album](https://getbootstrap.com/docs/4.1/examples/album/)

## Структура сайта
Создайте следующие страницы на сайте
- **Список товаров на сайте**, выводится в виде таблицы с тремя колонками (или в другом схожем виде: карточки, список и т.д.): название, цена, кнопка "Удалить". Над таблицей ссылка на создание товара
- **Создание товара** - выводится форма с двумя текстовыми полями: название и цена
- **Удаление товара** - происходит удаление товара и редирект на список товаров

## Хранение данных
Для товара хранятся и выводятся два поля - Название товара и цена товара. Любой посетитель зайдя на сайт может создать свой собственный временный каталог (*время хранения = время жизни сессии*). Товары хранятся в сессии. Валидация не реализуется.

## Автозагрузка файлов
Должна быть реализована автозагрузка файлов по стандарту PSR-4 с использованием `composer`.

## Запуск проекта
Проект должен запускаться встроенным в php веб-сервером:

```sh
php -S localhost:8000
```

## Описание классов

### Application
Основной класс приложения. Внутри его метода `run` должен быть вызван метод `dispatch` класса `Router` и выведен результат его работы.

### Router
Отвечает за маршрутизацию
- метод `dispatch($url)`, определяет какой маршрут запрошен по `url`, и выполнять `callback` этого маршрута в случае совпадения, либо выбрасывает исключение.
- метод `get(...)` — используется для регистрации маршрута при http-запросе методом GET по указанному адресу;
- метод `post(...)` — используется для регистрации маршрута при http-запросе методом POST по указанному адресу;

Оба метода `get()` и `post()` принимают два параметра: первый URL адрес, второй выполняемая функция (callable тип данных).

### Controller
Содержит внутри себя логику выполнения маршрутов и подключает необходимый шаблон.

### ModelInterface
Интерфейс модели, должен содержать три метода: `list()`, `create($fields)`, `delete($id)`.

Класс с товарами `Product` должен реализовывать этот интерфейс.

## index.php
```php
<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
use App\Application;
use App\Controller;
use App\Router;
require_once 'vendor/autoload.php';
$router = new Router();
$router->get('/',          [Controller::class, 'index']);
$router->post('/products', [Controller::class, 'storeProduct']);
$router->get('/products/create', [Controller::class, 'createProduct']);
$router->post('/products/delete', [Controller::class, 'deleteProduct']);
$application = new Application($router);
$application->run();
```
Footer
© 2022 GitHub, Inc.
Footer navigation

    Terms
    Privacy
    Security
    Status
    Docs
    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

