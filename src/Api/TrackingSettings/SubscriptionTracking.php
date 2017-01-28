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

    /**
     * @param boolean $enable
     * @return SubscriptionTracking
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param string $text
     * @return SubscriptionTracking
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @param string $html
     * @return SubscriptionTracking
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * @param string $substitution_tag
     * @return SubscriptionTracking
     */
    public function setSubstitutionTag($substitution_tag)
    {
        $this->substitution_tag = $substitution_tag;
        return $this;
    }


}
