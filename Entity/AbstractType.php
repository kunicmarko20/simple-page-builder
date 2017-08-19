<?php

namespace KunicMarko\SimplePageBuilderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * PageBuilder
 *
 * @ORM\Entity()
 * @ORM\Table(name="simple_page_builder_type")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 *
 */
abstract class AbstractType
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="PageBuilderHasType", mappedBy="type")
     **/
    private $pageBuilderHasType;

    public function getPageBuilderHasType()
    {
        return $this->pageBuilderHasType;
    }

    /**
     * @param mixed $pageBuilderHasType
     */
    public function setPageBuilderHasType($pageBuilderHasType)
    {
        $this->pageBuilderHasType = $pageBuilderHasType;
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
     * * Create form field for sonata create/edit form
     * @param FormMapper $formMapper
     * @return void
     */
    abstract public function generateFormField(FormMapper $formMapper);

    public function __toString()
    {
        return (new \ReflectionClass($this))->getShortName();
    }
}
