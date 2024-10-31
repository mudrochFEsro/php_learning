<?php

/**
 * Trieda TaskController slúži na spracovanie HTTP požiadaviek.
 * Podľa typu požiadavky (GET, POST, PATCH, DELETE) a prítomnosti identifikátora ($id)
 * simuluje CRUD operácie (vytvorenie, získanie, aktualizácia, vymazanie záznamu).
 */
class TaskController
{
    /**
     * Spracováva HTTP požiadavky na základe metódy a identifikátora záznamu.
     *
     * @param string $method HTTP metóda požiadavky ("GET", "POST", "PATCH", "DELETE")
     * @param mixed $id Identifikátor záznamu; ak je null, operácia sa týka všetkých záznamov
     */
    public function processRequest($method, $id)
    {
        // Ak nie je zadaný identifikátor ($id je null)
        if ($id === null) {
            // Ak je metóda GET, vypíše "index" (získanie všetkých záznamov)
            if ($method === "GET") {
                echo "index";

                // Ak je metóda POST, vypíše "create" (vytvorenie nového záznamu)
            } elseif ($method === "POST") {
                echo "create";
            }

            // Ak je zadaný identifikátor ($id obsahuje hodnotu)
        } else {
            // Použije sa switch, ktorý spracuje zadanú HTTP metódu
            switch ($method) {
                case "GET":
                    // Ak je metóda GET, vypíše "show" a ID záznamu (získanie konkrétneho záznamu)
                    echo "show" . " " . $id;
                    break;

                case "PATCH":
                    // Ak je metóda PATCH, vypíše "update" a ID záznamu (aktualizácia konkrétneho záznamu)
                    echo "update" . " " . $id;
                    break;

                case "DELETE":
                    // Ak je metóda DELETE, vypíše "delete" a ID záznamu (vymazanie konkrétneho záznamu)
                    echo "delete" . " " . $id;
                    break;
            }
        }
    }
}

// Príklady použitia metódy processRequest:
/*
$taskController = new TaskController();
$taskController->processRequest("GET", null);     // Výstup: index
$taskController->processRequest("POST", null);    // Výstup: create
$taskController->processRequest("GET", 5);        // Výstup: show 5
$taskController->processRequest("PATCH", 5);      // Výstup: update 5
$taskController->processRequest("DELETE", 5);     // Výstup: delete 5
*/
