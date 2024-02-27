<?php

function page_recetas_register_query_var($vars) {
    $vars[] = 'nuevas-recetas'; // Nombre de tu 'query var'
    return $vars;
}