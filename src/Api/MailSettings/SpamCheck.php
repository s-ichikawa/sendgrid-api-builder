<?php
namespace Sichikawa\SendgridApiBuilder\Api\MailSettings;

class SpamCheck
{
    /**
     * @var bool
     */
    public $enable;

    /**
     * @var int
     */
    public $threshold;

    /**
     * @var string
     */
    public $post_to_url;

    /**
     * @param boolean $enable
     * @return SpamCheck
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;
        return $this;
    }

    /**
     * @param int $threshold
     * @return SpamCheck
     */
    public function setThreshold($threshold)
    {
        $this->threshold = $threshold;
        return $this;
    }

    /**
     * @param string $post_to_url
     * @return SpamCheck
     */
    public function setPostToUrl($post_to_url)
    {
        $this->post_to_url = $post_to_url;
        return $this;
    }


}
