<?php
namespace Sichikawa\SendgridApiBuilder\Api\MailSettings;

class Footer
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
     * @param boolean $enable
     * @return Footer
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param string $text
     * @return Footer
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $html
     * @return Footer
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }


}
