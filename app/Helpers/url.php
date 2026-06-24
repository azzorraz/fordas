<?php

function base_url($path = '')
{
    return '/fordas/public' . $path;
}

header('Location: ' . base_url('/dashboard'));