<?php

class ErrorHandler
{
    public static function handleExeption(Throwable $exeption): void
    {
        http_response_code(500);
        echo json_encode([
            "code" => $exeption->getCode(),
            "message" => $exeption->getMessage(),
            "file" => $exeption->getFile(),
            "line" => $exeption->getLine()
        ]);
    }
}
