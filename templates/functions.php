<?php
    date_default_timezone_set('America/Panama');

    function fecha(){
        $mes = array("","Enero",
                        "Febrero",
                        "Marzo",
                        "Mayo",
                        "Junio",
                        "Julio",
                        "Agosto",
                        "Septiembre",
                        "Octubre",
                        "Noviembre",
                        "Diciembre");
        return date('d')." de ". $mes[date('n')] . " de " . date('Y');
    }
?>