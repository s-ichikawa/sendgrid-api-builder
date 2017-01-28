<?php
namespace Sichikawa\SendgridApiBuilder;

use Sichikawa\SendgridApiBuilder\Api\Asm;
use Sichikawa\SendgridApiBuilder\Api\Attachment;
use Sichikawa\SendgridApiBuilder\Api\Content;
use Sichikawa\SendgridApiBuilder\Api\CustomArgs;
use Sichikawa\SendgridApiBuilder\Api\From;
use Sichikawa\SendgridApiBuilder\Api\Headers;
use Sichikawa\SendgridApiBuilder\Api\MailSettings;
use Sichikawa\SendgridApiBuilder\Api\Personalize;
use Sichikawa\SendgridApiBuilder\Api\ReplyTo;
use Sichikawa\SendgridApiBuilder\Api\Sections;
use Sichikawa\SendgridApiBuilder\Api\TrackingSettings;

trait SendGridApi
{
    /**
     * @var array
     */
    private $sg_params = [];

    /**
     * clean for posting to sendgrid
     * @param $params
     * @return array|mixed
     */
    public function cleanParams($params)
    {
        if (is_object($params)) {
            $params = json_decode(json_encode($params), true);
        }
        if (is_array($params)) {
            $params = array_filter($params, function ($val) {
                return !empty($val);
            });

            $result = [];
            foreach ($params as $key => $val) {
                if (is_object($val) || is_array($val)) {
                    $result[$key] = $this->cleanParams($val);
                    continue;
                }
                $result[$key] = $val;
            }
            return $result;
        }
        return $params;
    }

    /**
     * @param bool $clean
     * @return array
     */
    public function getSgParams($clean = true)
    {
        return $clean ? $this->cleanParams($this->sg_params) : $this->sg_params;
    }

    /**
     * @param array $sg_params
     */
    public function setSgParams($sg_params)
    {
        $this->sg_params = $sg_params;
    }

    /**
     * @param array $personalizations
     * @return $this
     */
    public function setPersonalizations($personalizations)
    {
        $this->sg_params['personalizations'] = $personalizations;
        return $this;
    }

    /**
     * @param Personalize $personalize
     * @return $this
     */
    public function addPersonalizations(Personalize $personalize)
    {
        $this->sg_params['personalizations'][] = $personalize;
        return $this;
    }

    /**
     * @param $email
     * @param null $name
     * @return $this
     */
    public function setFrom($email, $name = null)
    {
        $this->sg_params['from'] = $email instanceof From ? $email : new Api\From($email, $name);
        return $this;
    }

    /**
     * @param $email
     * @param null $name
     * @return $this
     */
    public function setReplyTo($email, $name = null)
    {
        $this->sg_params['reply_to'] = $email instanceof ReplyTo ? $email : new Api\ReplyTo($email, $name);
        return $this;
    }

    /**
     * @param string $subject
     * @return $this
     */
    public function setSubject($subject)
    {
        $this->sg_params['subject'] = $subject;
        return $this;
    }

    /**
     * @param array $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->sg_params['content'] = $content;
        return $this;
    }

    /**
     * @param $type
     * @param $value
     * @return $this
     */
    public function addContent($type, $value = null)
    {
        $this->sg_params['content'][] = $type instanceof Content ? $type : new Content($type, $value);
        return $this;
    }

    /**
     * @param array $attachments
     * @return $this
     */
    public function setAttachments($attachments)
    {
        $this->sg_params['attachments'] = $attachments;
        return $this;
    }

    /**
     * @param Attachment $attachment
     * @return $this
     */
    public function addAttachments(Attachment $attachment)
    {
        $this->sg_params['attachments'][] = $attachment;
        return $this;
    }

    /**
     * @param string $id
     * @return $this
     */
    public function setTemplateId($id)
    {
        $this->sg_params['template_id'] = $id;
        return $this;
    }

    /**
     * @param Sections $section
     * @return $this
     */
    public function setSection($section)
    {
        $this->sg_params['section'] = $section;
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addSection($key, $value)
    {

        if (empty($this->sg_params['section'])) {
            $this->sg_params['section'] = new Sections();
        }
        $this->sg_params['section']->$key = $value;
        return $this;
    }

    /**
     * @param Headers $headers
     * @return $this
     */
    public function setHeaders($headers)
    {
        $this->sg_params['headers'] = $headers;
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addHeaders($key, $value)
    {
        if (empty($this->sg_params['headers'])) {
            $this->sg_params['headers'] = new Headers();
        }
        $this->sg_params['headers']->$key = $value;
        return $this;
    }

    /**
     * @param array $categories
     * @return $this
     */
    public function setCategories($categories)
    {
        $this->sg_params['categories'] = $categories;
        return $this;
    }

    /**
     * @param string $category
     * @return $this
     */
    public function addCategories($category)
    {
        $this->sg_params['categories'][] = $category;
        return $this;
    }

    /**
     * @param CustomArgs $custom_args
     * @return $this
     */
    public function setCustomArgs($custom_args)
    {
        $this->sg_params['custom_args'] = $custom_args;
        return $this;
    }

    /**
     * @param string $key
     * @param string $val
     * @return $this
     */
    public function addCustomArgs($key, $val)
    {
        if (empty($this->sg_params['custom_args'])) {
            $this->sg_params['custom_args'] = new CustomArgs();
        }
        $this->sg_params['custom_args'][$key] = $val;
        return $this;
    }

    /**
     * @param int $send_at
     * @return $this
     */
    public function setSendAt($send_at)
    {
        $this->sg_params['send_at'] = $send_at;
        return $this;
    }

    /**
     * @param string $batch_id
     * @return $this
     */
    public function setBatchId($batch_id)
    {
        $this->sg_params['batch_id'] = $batch_id;
        return $this;
    }

    /**
     * @param Asm $asm
     * @return $this
     */
    public function setAsm(Asm $asm)
    {
        $this->sg_params['asm'] = $asm;
        return $this;
    }

    /**
     * @param string $ip_pool_name
     * @return $this
     */
    public function setIpPoolName($ip_pool_name)
    {
        $this->sg_params['ip_pool_name'] = $ip_pool_name;
        return $this;
    }

    /**
     * @param MailSettings $mailSetting
     * @return $this
     */
    public function setMailSettings(MailSettings $mailSetting)
    {
        $this->sg_params['mail_settings'] = $mailSetting;
        return $this;
    }

    /**
     * @param TrackingSettings $trackingSettings
     * @return $this
     */
    public function setTrackingSettings(TrackingSettings $trackingSettings)
    {
        $this->sg_params['tracking_settings'] = $trackingSettings;
        return $this;
    }
}
