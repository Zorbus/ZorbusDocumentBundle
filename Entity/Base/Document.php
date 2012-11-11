<?php

namespace Zorbus\DocumentBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 */
abstract class Document
{
    protected $iconTemp;
    protected $attachmentTemp;

    public function __toString()
    {
        return $this->getTitle();
    }

    public function getIconTemp()
    {
        return $this->iconTemp;
    }

    public function setIconTemp($image)
    {
        $this->iconTemp = $image;
    }

    public function getAttachmentTemp()
    {
        return $this->attachmentTemp;
    }

    public function setAttachmentTemp($attachment)
    {
        $this->attachmentTemp = $attachment;
    }

    public function getAbsolutePath($file)
    {
        return null === $file ? null : $this->getUploadRootDir() . '/' . $file;
    }

    public function getWebPath($file)
    {
        return null === $file ? null : $this->getUploadDir() . '/' . $file;
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir()
    {
        return 'uploads/document';
    }
}
