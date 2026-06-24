<?php

function base_url($path = '')
{
    return '/fordas/public' . $path;
}

function redirect($path)
{
    header('Location: ' . base_url($path));
    exit;
}