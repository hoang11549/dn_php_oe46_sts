<?php
function userComplete($auId, $User = [])
{
    $CheckSbj = false;
    if ($User == []) {
        $CheckSbj = false;
    } else {
        foreach ($User as $u) {
            if ($u->id == $auId) {
                $CheckSbj = true;
            }
        }
    }
    return $CheckSbj;
}
