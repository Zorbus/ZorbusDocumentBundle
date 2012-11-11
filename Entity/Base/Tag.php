<?php

namespace Zorbus\DocumentBundle\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tag
 */
abstract class Tag
{
    public function __toString()
    {
        return $this->getName();
    }
}
