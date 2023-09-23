<?php
namespace JS\Contact;

use System\Classes\PluginBase;

use JS\Contact\Components\ContactRequest;

final class Plugin extends PluginBase
{
    /**
     * @inheritDoc
     */
    public $require = [
        'JS.Core'
    ];

    /**
     * @inheritDoc
     */
    public function registerComponents() : array
    {
        return [
            ContactRequest::class => 'contactRequest'
        ];
    }
}
