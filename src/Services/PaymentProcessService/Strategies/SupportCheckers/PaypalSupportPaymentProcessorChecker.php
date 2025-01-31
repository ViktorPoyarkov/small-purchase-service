<?php

namespace App\Services\PaymentProcessService\Strategies\SupportCheckers;

class PaypalSupportPaymentProcessorChecker
    extends AbstractSupportPaymentProcessorChecker
    implements Interfaces\IPaypalSupportPaymentProcessorChecker
{
    protected string $paymentProcessor = 'paypal';
}