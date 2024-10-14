<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatrixController extends Controller
{
    public function generateMatrix($length)
    {
        $size = intval($length);
        if ($size <= 0) {
            return response("Invalid length. Please provide positive integer.", 400); 
        }

        $matrix = array_fill(0, $size, array_fill(0, $size, 0));

        $currentValue = 0;
        $top = 0;
        $bottom = $size - 1;
        $left = 0;
        $right = $size - 1;

        while ($top <= $bottom && $left <= $right) {
            // övre raden
            for ($row = $left; $row <= $right; $row++) {
                $matrix[$top][$row] = str_pad($currentValue++, 2, '0', STR_PAD_LEFT);
            }
            $top++;

            // höger kolumn
            for ($row = $top; $row <= $bottom; $row++) {
                $matrix[$row][$right] = str_pad($currentValue++, 2, '0', STR_PAD_LEFT);
            }
            $right--;

            // nedre raden
            if ($top <= $bottom) {
                for ($row = $right; $row >= $left; $row--) {
                    $matrix[$bottom][$row] = str_pad($currentValue++, 2, '0', STR_PAD_LEFT);
                }
                $bottom--;
            }

            // vänster kolumn
            if ($left <= $right) {
                for ($row = $bottom; $row >= $top; $row--) {
                    $matrix[$row][$left] = str_pad($currentValue++, 2, '0', STR_PAD_LEFT);
                }
                $left++;
            }
        }

        return view('matrix', ['matrix' => $matrix]);
    }
}
