<?php
namespace Sichikawa\SendgridApiBuilder\Api;


class Content
{
    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $value;

    /**
     * Content constructor.
     * @param string $type
     * @param string $value
     */
    public function __construct($type, $value)
    {
        $this->type = $type;
        $this->value = $value;
    }
}
