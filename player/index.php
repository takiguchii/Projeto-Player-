<?php

require_once("Item.php");
require_once("Inventario.php");


$mochila = new Inventario(10); 
$item1 = new Item("Magia", 2);
$mochila->adicionar($item1);
$item2 = new Item("Ataque", 5);
$mochila->adicionar($item2);
$item3 = new Item("Defesa", 2);
$mochila->adicionar($item3);
$mochila->remover("Magia");


