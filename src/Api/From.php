<?php
namespace Sichikawa\SendgridApiBuilder\Api;

class From
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

    /**
     * @param string $name
     * @return From
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }


}
