<?php
namespace Sichikawa\SendgridApiBuilder\Api\Email;

abstract class Email
{
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

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;
}
