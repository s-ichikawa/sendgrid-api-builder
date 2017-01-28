<?php
namespace Sichikawa\SendgridApiBuilder\Api\TrackingSettings;

class OpenTracking
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var string
     */
    public $substitution_tag;

    /**
     * @param boolean $enable
     * @return OpenTracking
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param string $substitution_tag
     * @return OpenTracking
     */
    public function setSubstitutionTag($substitution_tag)
    {
        $this->substitution_tag = $substitution_tag;
        return $this;
    }


}
