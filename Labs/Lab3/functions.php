<?php
    // suit, bool, val
    // 4 arrays
    $suit = "";
    $drawn = FALSE;
    
    $deck = array();
    
    for ($i = 0; $i < 4; $i++)
    {   // suit type
        switch($i) 
        {
            case 0:
                $suit = "heart";
                for ($j = 0; $j < 12; $j++)
                {
                    $card = array($suit, $j + 1, $drawn);
                    array_push($deck, $card);    
                }
                break;
            case 1:
                $suit = "diamond";
                for ($j = 0; $j < 12; $j++)
                {
                    $card = array($suit, $j + 1, $drawn);
                    array_push($deck, $card);    
                }
                break;
        }
    }
    
    var_dump($deck);
?>