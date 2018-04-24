<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CorController extends Controller
{
    public function index()
    {
        $words = '';
        $date = date('md', time());

        foreach ([1,2,3,4,5,6,7] as $num) {
            $img = public_path('images') . "/$date/$num.jpg";
            $content = \Ocr::basicGeneral($img);
            foreach ($content['words_result'] as $word) {
                $words .= '- ' . $word['words']. "\n";
            }
        }


        $text = public_path('images') . "/$date/text.txt";
        file_put_contents($text, $words);
        echo $words;
    }
}
