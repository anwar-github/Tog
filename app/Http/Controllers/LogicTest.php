<?php

namespace App\Http\Controllers;

class LogicTest extends Controller
{
    /*
     * checck apakah bilangan prima ?
     */
    public function isPrime($number)
    {
        if ( $number == 1 ) {
            return 'NO';
        }

        if ( $number == 2 ) {
            return 'YES';
        }

        $x = sqrt($number);
        $x = floor($x);
        for ( $i = 2 ; $i <= $x ; ++$i ) {
        if ( $number % $i == 0 ) {
            break;
            }
        }

        if( $x == $i-1 ) {
            return 'YES';
        } else {
            return 'NO';
        }

    }

    /*
     * memebuat setengah segitiga
     */
    public function formatNumber()
    {
        for ($a = 1; $a < 9; $a++) {
            for ($b = 1; $b <= $a; $b++) {
                echo $b;
            }
            echo "<br/>";
        }
    }

    /*
     * mengurutkan dengan bubble sort
     */
    public function bubbleSort()
    {
        $array = [ 99, 2, 64, 8, 111, 33, 65, 11, 102, 50 ];

        do {
            $swapped = false;
            for ($i = 0, $c = count($array) - 1; $i < $c; $i++) {
                if ($array[ $i ] > $array[ $i + 1 ]) {
                    list($array[ $i + 1 ], $array[ $i ]) = [ $array[ $i ], $array[ $i + 1 ] ];
                    $swapped = true;
                }
            }
        } while ($swapped);

        return $array;
    }

    /*
     * menentukan bilangan terbesar dari array
     */
    public function bigNumberInArray()
    {
        $array = [
            11,
            6,
            31,
            201,
            99,
            861,
            1,
            7,
            14,
            79
        ];

        $big = 0;

        foreach ($array as $key => $item) {
            if ($item > $big) {
                $big = $item;
            }
        }

        return $big;
    }

    public function arrayCreative()
    {
        for ($a = 1; $a < 5; $a++) {
            echo $a;
            for ($b = 1; $b <= 2; $b++) {
                $x = $a+(4*$b);
                echo $x;
            }
            echo "<br/>";
        }
    }

}
