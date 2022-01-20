<?php


use App\Models\Config;
use App\Models\Galeria;
use App\Models\Whatsapp;



function setting()
{
	
	return Config::get()->last();
}



function whapp()
{
	
	return Whatsapp::get();
}


function galeria()
{
	
	return Galeria::paginate(6);
}



