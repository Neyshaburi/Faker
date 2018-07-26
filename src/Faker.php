<?php
/**
 * Neyshaburi/Faker package
 * @Neyshaburi
 */

namespace Neyshaburi\Faker;

class Faker
{

    public function __construct()
    {
        //include librrary array
        $this->objects = require __DIR__ . '/libs/library.php';

        // custom helper include
        $this->object = require 'helper.php';
    }

    /**
     * return random data in object
     * $object is a name of index of librrary
     * @author Ybazli
     */
    private function getRandomKey($object = null)
    {
        $name  = 0;
        $array = [];

        if (is_array($object)) {
            $array = $object;
        } elseif (is_string($object)) {
            $array = $this->objects[$object];
        }

        shuffle($array);
        $name  = array_rand($array);

        return string($array[$name]);
    }

    /**
     * return a random first name
     */
    public function firstName()
    {
        return $this->getRandomKey('firstName');
    }

    /**
     * return a random last name
     */
    public function lastName()
    {
        return $this->getRandomKey('lastName');

    }

    /**
     * return a random first name and last name together
     */
    public function fullName()
    {
        return $this->firstName() .' '. $this->lastName();
    }

    /**
     * return a random of job title
     */
    public function jobTitle()
    {
        return $this->getRandomKey('jobTitle');
    }

    /**
     * return a random word
     */
    public function words($count = 2)
    {
        $words = '';
        for ($i=0; $i<$count; $i++)
        {
            if ($words == '')
                $words = $this->getRandomKey('word');
            else
                $words = ' ' . $this->getRandomKey('word');
        }

        return $words;
    }

    public function word()
    {
        return $this->getRandomKey('word');
    }

    /**
     * return a random title
     */
    public function title()
    {
        return $this->getRandomKey('title');
    }

    /**
     * return a random sentence
     */
    public function sentence()
    {
        return $this->getRandomKey('sentence') . '.';
    }

    /**
     * return a random paragraph
     */
    public function paragraph()
    {
        return $this->getRandomKey('paragraph') . '.';
    }

    /**
     * return a random two paragraphs
     */
    public function paragraphs($count = 2)
    {
        if($count > 1){
            $paragraphs = '';
            for ($i = 0; $i < $count; $i++){
                if($i == 0)
                    $paragraphs = paragraph();


                $paragraphs .= '<br/>' . paragraph();

            }
            return $paragraphs;
        }

        return $this->getRandomKey('paragraph') . '.';
    }

    /**
     * return a random mobile phone number
     * return random 10 legnth number with iranian mobile mobile code like : 0912 , ...
     */
    public function mobile()
    {
        $prefix = $this->getRandomKey('mobile');
        $phone  = string('+98' . $prefix . randomNumber(7));
        return $phone;
        //return (strlen($phone) !== 13 ? $phone . rand(1, 10) : $phone);

    }

    /**
     * return a random tellphone number
     */
    public function telephone()
    {
        $prefix = $this->getRandomKey('telephone');
        return string('+98' . $prefix . randomNumber(7));
    }

    /**
     * return random city of iran
     */
    public function city()
    {
        return $this->getRandomKey('city');
    }

    /**
     * return random state of iran
     */
    public function state()
    {
        return $this->getRandomKey('state');
    }

    /**
     * return a random domain address .
     * $length is length of domain name
     * if not set parametr to method auto return random between 5-8 length string
     * tlds are like com , net , ir , co , co.ir , ...
     * random web protocol http & https
     */
    public function domain()
    {
        $domainName = $this->getRandomKey('enName');
        $domainName = strtolower($domainName);

        $domain = $this->getRandomKey('protocol') . '://' .'www.'. $domainName . '.' . $this->getRandomKey('domain');
        return $domain;

    }

    /**
     * return a random email address .
     * it's a random and fake email address not ussable
     * gmail , yahoo , msn , hotmail domain
     * $count is length of email address string
     * if not set parametr to method auto return random between 6-10 length string
     */
    public function email()
    {
        $mail = $this->getRandomKey('enName');
        $mail = strtolower($mail);
        $mail .= range(1930, 2010);
        $email = $mail . $this->getRandomKey('email');
        return $email;
    }

    /**
     * return 10 length random number
     */
    public function mellicode()
    {
        return rand(0, 1) . randomNumber(9);
    }

    /**
     * return a random birthday date
     * year strating from 1315 - 1387
     * $sign to sign between year mouth year
     * default sign is '/'
     * return year/mouth/day
     */
    public function birthday($split = '/')
    {
        return $this->date(1315, 1387);
    }

    public function date($from = 1315, $to = 1397, $split = '/')
    {
        $year  = rand($from, $to);
        $mouth = rand(1, 12); $mouth = $mouth < 10 ? '0' . $mouth : $mouth;
        $day   = rand(1, 30); $day = $day < 10 ? '0' . $day : $day;

        return $year . $split . $mouth . $split . $day;

    }

    public function time($from = 0, $to = 23, $Split = ':')
    {

        $h = rand($from, $to); $h = $h < 10 ? '0' . $h : $h;
        $m = rand(0, 59); $m = $m < 10 ? '0' . $m : $m;
        $s = rand(0, 59); $s = $s < 10 ? '0' . $s : $s;

        return $h . $Split . $m . $Split . $s;

    }

    public function dateTime($from = 1315, $to = 1397, $dateSplit = '/', $timeSplit = ':')
    {
        $date = $this->date($from, $to, $dateSplit);

        $time = $this->time(0, 23, $timeSplit);

        return $date . ' ' . $time;

    }

    /**
     * return random age
     * you can use $min for minimum start age and max for maximum age
     * if $min and $max is null return random age between 10-70 years;
     */
    public function age($min = 10 , $max = 70)
    {
        return rand(10 , 70);
    }

    /**
     * return random address
     */
    public function address()
    {
        $i = rand(0, 7);
        $pre = ['شهید ', 'دکتر ', 'آیت الله ', 'زنده یاد ', 'استاد '];
        $blv = 'بلوار ';
        $str = 'خیابان ';
        $lane = ' کوچه ';
        $bl = ' ساختمان ';
        $num = ' پلاک ';
        $flo = ' طبقه ';
        $unit = ' واحد ';


        switch ($i) {
            case 0:
                return  $blv . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .' '.
                        $str . $this->getRandomKey($pre) .' '. $this->getRandomKey('lastName') .
                        $lane . 'شهید '. $this->getRandomKey('lastName') .
                        $bl . $this->getRandomKey('flower') .
                        $num . randomNumber(3) . $flo . randomNumber(1) .
                        $unit . randomNumber(1);
                break;
            case 1:
                return  $blv . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .' '.
                        $str . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .
                        $lane . $this->getRandomKey('flower') .
                        $num . randomNumber(3) . $flo . randomNumber(1) .
                        $unit . randomNumber(1);
                break;
            case 2:
                return  $str . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .
                        $lane . 'شهید ' . $this->getRandomKey('lastName') .
                        $num . randomNumber(2) . $flo . randomNumber(1) .
                        $unit . randomNumber(1);
                break;
            case 3:
                return  $str . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .
                        $lane . $this->getRandomKey('flower') .
                        $num . randomNumber(2) . $flo . randomNumber(1) .
                        $unit . randomNumber(1);
                break;
            case 4:
                return  $str . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .
                        $lane . 'شهید ' . $this->getRandomKey('lastName') .
                        $num . randomNumber(2);
                break;
            case 5:
                return  $str . $this->getRandomKey($pre) . $this->getRandomKey('lastName') .
                        $lane . $this->getRandomKey('flower') .
                        $num . randomNumber(2);
                break;
            case 6 || 7:
                return  $str . $this->getRandomKey('flower') .
                        $lane . 'شهید ' . $this->getRandomKey('lastName') .
                        $num . randomNumber(2);
                break;
        }
        return $this->getRandomKey('address');
    }

}
