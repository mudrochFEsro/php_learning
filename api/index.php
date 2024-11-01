<?php

declare(strict_types=1);
// Načíta automatický načítač Composeru, aby bolo možné používať nainštalované balíky a závislosti
require dirname(__DIR__) . "/vendor/autoload.php";

set_exception_handler("ErrorHandler::handleExeption");

// Získa cestu URL z požiadavky a rozloží ju na časti
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Rozdelí cestu na časti podľa znaku "/"
$parts = explode("/", $path);

// Určí zdroj požiadavky z cesty (očakáva štvrtú časť cesty ako "tasks")
$resource = $parts[4];

// Nastaví $id na piatej časti cesty, ak je k dispozícii; ak nie, zostáva null
$id = $parts[5] ?? null;

// Ak zdroj nie je "tasks", nastaví sa chybový kód 404 a ukončí sa skript
if ($resource !== "tasks") {

    // Možnosť 1: Nastavenie hlavičky manuálne
    // header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");

    // Možnosť 2 (odporúčaný spôsob): Použije sa http_response_code na nastavenie 404
    http_response_code(404);
    exit; // Ukončí skript po nastavení 404
}

header("Content-type: application/json; charset=UTF-8");

// Vytvorí novú inštanciu TaskController
$controller = new TaskController;

// Zavolá metódu processRequest na spracovanie požiadavky s aktuálnou HTTP metódou a ID
$controller->processRequest($_SERVER['REQUEST_METHOD'], $id);
