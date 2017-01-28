<?php
namespace Sichikawa\SendgridApiBuilder\Api\TrackingSettings;

class SubscriptionTracking
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $html;

    /**
     * @var string
     */
    public $substitution_tag;
}
