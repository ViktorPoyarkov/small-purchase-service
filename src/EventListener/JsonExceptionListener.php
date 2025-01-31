<?php
namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class JsonExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        // todo

        $response = new JsonResponse(
            [
                'error' => $exception->getMessage(),
                'code' => $exception->getCode()
            ],
            500
        );

        // Устанавливаем новый ответ на событие
        $event->setResponse($response);
    }
}