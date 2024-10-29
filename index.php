<?php

/* Check if Wordpress */
if (!defined('ABSPATH')) exit;

/* Run Elberos */
if (!function_exists('elberos'))
{
	echo "Please enable Elberos plugin";
}
else
{
	elberos();
}