<?php

namespace Zorbus\DocumentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 */
class Document extends Base\Document
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $size;

    /**
     * @var string
     */
    private $mime;

    /**
     * @var string
     */
    private $extension;

    /**
     * @var string
     */
    private $lang;

    /**
     * @var string
     */
    private $attachment;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var boolean
     */
    private $enabled;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Document
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Document
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Document
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set mime
     *
     * @param string $mime
     * @return Document
     */
    public function setMime($mime)
    {
        $this->mime = $mime;

        return $this;
    }

    /**
     * Get mime
     *
     * @return string
     */
    public function getMime()
    {
        return $this->mime;
    }

    /**
     * Set extension
     *
     * @param string $extension
     * @return Document
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Document
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set attachment
     *
     * @param string $attachment
     * @return Document
     */
    public function setAttachment($attachment)
    {
        $this->attachment = $attachment;

        return $this;
    }

    /**
     * Get attachment
     *
     * @return string
     */
    public function getAttachment()
    {
        return $this->attachment;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Document
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Document
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Document
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Document
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Document
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add tags
     *
     * @param \Zorbus\DocumentBundle\Entity\Tag $tags
     * @return Document
     */
    public function addTag(\Zorbus\DocumentBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Zorbus\DocumentBundle\Entity\Tag $tags
     */
    public function removeTag(\Zorbus\DocumentBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
    /**
     * @ORM\PrePersist
     */
    public function preIconUpload()
    {
        if (null !== $this->iconTemp)
        {
            $this->image = sha1(uniqid(mt_rand(), true)) . '.' . $this->iconTemp->guessExtension();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function preAttachmentUpload()
    {
        if (null !== $this->attachmentTemp)
        {
            $this->attachment = sha1(uniqid(mt_rand(), true)) . '.' . $this->attachmentTemp->guessExtension();
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function postRemove()
    {
        if ($file = $this->getAbsolutePath($this->image))
        {
            @unlink($file);
        }
        if ($file = $this->getAbsolutePath($this->attachment))
        {
            @unlink($file);
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function postIconUpload()
    {
        if ($this->iconTemp instanceof \Symfony\Component\HttpFoundation\File\UploadedFile)
        {
            $this->iconTemp->move($this->getUploadRootDir(), $this->image);

            unset($this->iconTemp);
        }
    }

    /**
     * @ORM\PostPersist
     */
    public function postAttachmentUpload()
    {
        if ($this->attachmentTemp instanceof \Symfony\Component\HttpFoundation\File\UploadedFile)
        {
            $this->attachmentTemp->move($this->getUploadRootDir(), $this->attachment);

            unset($this->attachmentTemp);
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setFileInfo()
    {
        if ($this->attachmentTemp)
        {
            $this->setSize($this->attachmentTemp->getSize());
            $this->setMime($this->attachmentTemp->getMimeType());
            $this->setExtension($this->attachmentTemp->guessExtension());

        }
    }
}