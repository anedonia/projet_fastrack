<?php

function doublon_stock($stock,$temp_stock)
{
    if (!empty($stock))
    {
        foreach($stock as $ligne)
        {
            if ($ligne['id_musique'] == $temp_stock['id_musique'])
            {
                return true; 
            }
        }
        return false;
    }
    else
    {
        return false;
    }
}




