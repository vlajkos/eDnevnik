<?php

namespace App\Services;

use App\Models\Ucenik;
use Illuminate\Support\Facades\DB;

class SortService
{
    public function sort($ucenici)
    {
        $azbuka = array("A", "B", "V", "G", "D", "Đ", "đ", "E", "Ž", "ž", "Z", "I", "J", "K", "L", "LJ", "M", "N", "NJ", "O", "P", "R", "S", "T", "Ć", "ć", "U", "F", "H", "C", "DŽ", "dž", "Dž", "Š", "š");

        if (count($ucenici) > 1) {
            $uceniciSorted = [];
            foreach ($azbuka as $slovo) {
                foreach ($ucenici as $ucenik) {

                    $prezime = $ucenik->prezime;




                    if ($slovo == "đ" || $slovo == "Đ" || $slovo == "Ž" || $slovo == "ž" || $slovo == "Ć" || $slovo == "ć" || $slovo == "Š" || $slovo == "š") {
                        if (substr($ucenik->prezime, 0, 2) == $slovo) {
                            $uceniciSorted[] = $ucenik;
                        }
                    } elseif (strtoupper($ucenik->prezime[0]) === "L" && strtoupper($ucenik->prezime[1]) === "J") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    } elseif (strtoupper($ucenik->prezime[0]) === "N" && strtoupper($ucenik->prezime[1]) === "J") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    } elseif (strtoupper($ucenik->prezime[0]) === "D" && strtoupper(substr($ucenik->prezime[1], 1, 3)) === "Ž") {
                        if (strtoupper($ucenik->prezime[0]) . strtoupper($ucenik->prezime[1]) === $slovo)
                            $uceniciSorted[] = $ucenik;
                    } else if (strtoupper($ucenik->prezime[0]) == $slovo) {

                        $uceniciSorted[] = $ucenik;
                    }
                }
            }
            return $uceniciSorted;
        } else return $ucenici;
    }
}
