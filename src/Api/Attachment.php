<?php
namespace Sichikawa\SendgridApiBuilder\Api;


class Attachment
{
    /**
     * @var string
     */
    public $content;

    /**
     * @var string
     */
    public $type;

    /**
     * @var string
     */
    public $filename;

    /**
     * @var string
     */
    public $disposition;

    /**
     * @var string
     */
    public $content_id;

    /**
     * @param string $content
     * @return Attachment
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param string $type
     * @return Attachment
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param string $filename
     * @return Attachment
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;
        return $this;
    }

    /**
     * @param string $disposition
     * @return Attachment
     */
    public function setDisposition($disposition)
    {
        $this->disposition = $disposition;
        return $this;
    }

    /**
     * @param string $content_id
     * @return Attachment
     */
    public function setContentId($content_id)
    {
        $this->content_id = $content_id;
        return $this;
    }


}
