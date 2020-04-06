<?php

class Translate {
    
    static public function reverse( $translate_strings )
    {
        $translate_strings = array_flip( $translate_strings );
        
        return $translate_strings;
    }
}