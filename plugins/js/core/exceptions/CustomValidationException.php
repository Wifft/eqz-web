<?php
namespace JS\Core\Exceptions;

use Exception;
use Throwable;

final class CustomValidationException extends Exception implements Throwable
{
    /**
     * @inheritDoc
     */
    public function __construct()
    {
        parent::__construct();
    }
}
