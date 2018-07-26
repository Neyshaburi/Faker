# Farsi Faker
Farsi faker package for laravel . This package is created for testing your project with fake data not for create spam. please do not use it to create spam. New options are comming soon. Enjoy it, thanks.


## Installation

### Step 1

get install package with composer

```bash
composer require neyshaburi/faker
```

### Step 2

Next add this line in your 'config/app.php' in the providers array:

```php
Neyshaburi\Faker\FakerServiceProvider::class,
```
### Step 3

Next add this line in your 'config/app.php' in the aliases array:

```php
'Faker' => Neyshaburi\Faker\Facades\Faker::class,
```
Done :)

| Code | Description |
| --- | --- |
| ``` Faker::firstName() ``` | Return a random firstname |
| ``` Faker::lastName() ``` | Return a random lastname |
| ``` Faker::fullName() ``` | Return a random fullname |
| ``` Faker::company() ``` | Return a random company name |
| ``` Faker::mobile() ``` | Return a random mobile number +989123456789 |
| ``` Faker::telephone() ``` | Return a random telephone number +982187654321|
| ``` Faker::email() ``` | Return a random email address |
| ``` Faker::domain() ``` | Return a random domain like: https://www.blablabla.ir |
| ``` Faker::age($min=10, $max=70) ``` | Return a random you can use $min and $max but thery are nullable |
| ``` Faker::birthday($from=1315, $to=1387, $split='/') ``` | Return a random birthday date use $sign for replace '/' between year/mounth/day |
| ``` Faker::date($from=1315, $to=1397, $split='/') ``` | Return a random date betwen 1315 to 1397 use $split for replace '/' between year/mounth/day |
| ``` Faker::time($from=0, $to=23, $split=':') ``` | Return a random time betwen 00:00:00 to 23:59:59 use $split for replace ':' between HH:MM:SS |
| ``` Faker::dateTime($from=1315, $to=1397, $dateSplit='/', $timeSplit=':') ``` | Return a random dateTime betwen 1315/01/01 00:00:00 to 1397/12/30 23:59:59 |
| ``` Faker::address() ``` | Return a random postal address |
| ``` Faker::city() ``` | Return a random city of iran name |
| ``` Faker::state() ``` | Return a random state of iran name |
| ``` Faker::melliCode() ``` | Return a random 10 integer |
| ``` Faker::word() ``` | Return a random word |
| ``` Faker::title() ``` | Return a random title |
| ``` Faker::sentence() ``` | Return a random sentence |
| ``` Faker::paragraph() ``` | Return a random paragraph |
| ``` Faker::paragraphs($count=2) ``` | Return a random two ... paragraphs |

## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
