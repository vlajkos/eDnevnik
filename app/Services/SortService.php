<?php

namespace App\Services;

use App\Models\Ucenik;
use Illuminate\Support\Facades\DB;

class SortService
{
    public function sort($ucenici)
    {
        $azbuka = array("A", "B", "V", "G", "D", "Đ", "E", "Ž", "Z", "I", "J", "K", "L", "LJ", "M", "N", "NJ", "O", "P", "R", "S", "T", "Ć", "U", "F", "H", "C", "DŽ", "Š");

        if (count($ucenici) > 1) {
            $uceniciSorted = [];
            foreach ($azbuka as $slovo) {
                foreach ($ucenici as $ucenik) {
                    if (strtoupper($ucenik->prezime[0]) === "L" && strtoupper($ucenik->prezime[1]) === "J") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    }
                    if (strtoupper($ucenik->prezime[0]) === "N" && strtoupper($ucenik->prezime[1]) === "J") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    }
                    if (strtoupper($ucenik->prezime[0]) === "D" && strtoupper($ucenik->prezime[1]) === "Ž") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    } else if (strtoupper($ucenik->prezime[0]) === $slovo) {
                        $uceniciSorted[] = $ucenik;
                    }
                }
            }
            return $uceniciSorted;
        } else return $ucenici;
    }
}
