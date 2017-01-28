<?php
namespace Sichikawa\SendgridApiBuilder\Api;

use Sichikawa\SendgridApiBuilder\Api\Personalize\Bcc;
use Sichikawa\SendgridApiBuilder\Api\Personalize\Cc;
use Sichikawa\SendgridApiBuilder\Api\Personalize\CustomArgs;
use Sichikawa\SendgridApiBuilder\Api\Personalize\Headers;
use Sichikawa\SendgridApiBuilder\Api\Personalize\Substitutions;
use Sichikawa\SendgridApiBuilder\Api\Personalize\To;

class Personalize
{
    /**
     * @var To
     */
    public $to;

    /**
     * @var Cc
     */
    public $cc;

    /**
     * @var Bcc
     */
    public $bcc;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var Headers
     */
    public $headers;

    /**
     * @var Substitutions
     */
    public $substitutions;

    /**
     * @var CustomArgs
     */
    public $custom_args;

    /**
     * @var int
     */
    public $send_at;

    /**
     * @param array $to
     * @return $this
     */
    public function setTo($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param $email
     * @param null $name
     * @return $this
     */
    public function addTo($email, $name = null)
    {
        $this->to[] = new To($email, $name);
        return $this;
    }

    /**
     * @param array $cc
     * @return $this
     */
    public function setCc($cc)
    {
        $this->cc = $cc;
        return $this;
    }

    /**
     * @param $email
     * @param null $name
     * @return $this
     */
    public function addCc($email, $name = null)
    {
        $this->cc[] = new Cc($email, $name);
        return $this;
    }

    /**
     * @param array $bcc
     * @return $this
     */
    public function setBcc($bcc)
    {
        $this->bcc = $bcc;
        return $this;
    }

    /**
     * @param $email
     * @param null $name
     * @return $this
     */
    public function addBcc($email, $name = null)
    {
        $this->bcc[] = new Bcc($email, $name);
        return $this;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @param Headers $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addHeaders($key, $value)
    {
        if (empty($this->headers)) {
            $this->headers = new Headers();
        }
        $this->headers->$key = $value;
        return $this;
    }

    /**
     * @param array $substitutions
     * @return $this
     */
    public function setSubstitutions($substitutions)
    {
        $this->substitutions = $substitutions;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addSubstitutions($key, $value)
    {
        if (empty($this->substitutions)) {
            $this->substitutions = new Substitutions();
        }
        $this->substitutions[$key] = $value;
        return $this;
    }

    /**
     * @param $custom_args
     * @return $this
     */
    public function setCustomArgs($custom_args)
    {
        $this->custom_args = $custom_args;
        return $this;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addCustomArgs($key, $value)
    {
        if (empty($this->custom_args)) {
            $this->custom_args = new CustomArgs();
        }
        $this->custom_args[$key] = $value;
        return $this;
    }

    /**
     * @param int $send_at
     */
    public function setSendAt($send_at)
    {
        $this->send_at = $send_at;
    }
}

