<?php
namespace Sichikawa\SendgridApiBuilder\Api\Personalize;

class Bcc
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
     * Bcc constructor.
     * @param $email
     * @param null $name
     */
    public function __construct($email, $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }
}
