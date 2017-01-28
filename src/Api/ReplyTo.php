<?php
namespace Sichikawa\SendgridApiBuilder\Api;

class ReplyTo
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $name;

    /**
     * To constructor.
     * @param $email
     * @param null $name
     */
    public function __construct($email, $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }
}
