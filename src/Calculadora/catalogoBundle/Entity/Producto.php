<?php

namespace Calculadora\catalogoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Calculadora\catalogoBundle\Entity\ProductoRepository")
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=250)
     */
    private $nombre;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="decimal")
     */
    private $precio;

    /**
     * @ORM\ManyToOne(targetEntity="Marca", inversedBy="productos", cascade={"persist"})
     * @ORM\JoinColumn(name="marca_id", referencedColumnName="id"),
     */
    private $marca;
    
    /**
     * 
     * @ORM\ManyToMany(targetEntity="Caracteristica")
     * @ORM\JoinTable(name="producto_caracteristica",
     * joinColumns={@ORM\JoinColumn(name="producto_id", referencedColumnName="id")},
     * inverseJoinColumns={@ORM\JoinColumn(name="caracteristica_id", referencedColumnName="id")}
     * )
     */
    private $caracteristica;
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return Producto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }


    /**
     * Set marca
     *
     * @param \Calculadora\catalogoBundle\Entity\Marca $marca
     * @return Producto
     */
    public function setMarca(\Calculadora\catalogoBundle\Entity\Marca $marca = null)
    {
        $this->marca = $marca;
    
        return $this;
    }

    /**
     * Get marca
     *
     * @return \Calculadora\catalogoBundle\Entity\Marca 
     */
    public function getMarca()
    {
        return $this->marca;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->caracteristica = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add caracteristica
     *
     * @param \Calculadora\catalogoBundle\Entity\Caracteristica $caracteristica
     * @return Producto
     */
    public function addCaracteristica(\Calculadora\catalogoBundle\Entity\Caracteristica $caracteristica)
    {
        $this->caracteristica[] = $caracteristica;
    
        return $this;
    }

    /**
     * Remove caracteristica
     *
     * @param \Calculadora\catalogoBundle\Entity\Caracteristica $caracteristica
     */
    public function removeCaracteristica(\Calculadora\catalogoBundle\Entity\Caracteristica $caracteristica)
    {
        $this->caracteristica->removeElement($caracteristica);
    }

    /**
     * Get caracteristica
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCaracteristica()
    {
        return $this->caracteristica;
    }
}