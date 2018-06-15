<?php 

function isPortaria()
{
    $usuario = $_SESSION['usuario'];
    if ($usuario['tipo_perfil'] == 'Portaria') {
        return true;
    }
    
    return false;
}

function isAdm()
{
    $usuario = $_SESSION['usuario'];
    if ($usuario['tipo_perfil'] == 'Master') {
        return true;
    }
    
    return false;
}