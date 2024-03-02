<?php

function page_recetas_register_query_var($vars) {
    $vars[] = 'recetas-portafolio'; // Nombre de tu 'query var'
    return $vars;
}