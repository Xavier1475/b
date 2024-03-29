<?php

namespace FactelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Establecimiento
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="FactelBundle\Entity\Repository\EstablecimientoRepository")
 */
class Establecimiento {

    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\Blameable\Blameable
    ;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Emisor", inversedBy="establecimientos")
     * @ORM\JoinColumn(name="emisor_id", referencedColumnName="id", nullable=false)
     */
    protected $emisor;

    /**
     * @ORM\OneToMany(targetEntity="PtoEmision", mappedBy="establecimiento")
     */
    protected $ptosEmision;

    /**
     * @ORM\OneToMany(targetEntity="Factura", mappedBy="establecimiento")
     */
    protected $facturas;

    /**
     * @ORM\OneToMany(targetEntity="NotaCredito", mappedBy="establecimiento")
     */
    protected $notasCredito;

    /**
     * @ORM\OneToMany(targetEntity="NotaDebito", mappedBy="establecimiento")
     */
    protected $notasDebito;

    /**
     * @ORM\OneToMany(targetEntity="Retencion", mappedBy="establecimiento")
     */
    protected $retencion;

    /**
     * @ORM\OneToMany(targetEntity="Guia", mappedBy="establecimiento")
     */
    protected $guias;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60)
     */
    protected $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=3)
     */
    protected $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="urlweb", type="string", length=255,nullable=TRUE)
     */
    protected $urlweb;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreComercial", type="string", length=255,nullable=TRUE)
     */
    protected $nombreComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=300, nullable=TRUE)
     */
    protected $direccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", nullable=TRUE)
     */
    protected $activo;

    /**
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Favor subir un logo valido")
     * @var type 
     */
    protected $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="dirLogo", type="string", length=200,nullable=TRUE)
     */
    protected $dirLogo;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Establecimiento
     */
    public function setNombre($nombre) {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre() {
        return $this->nombre;
    }

    /**
     * Set codigo
     *
     * @param string $codigo
     * @return Establecimiento
     */
    public function setCodigo($codigo) {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo() {
        return $this->codigo;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return Establecimiento
     */
    public function setDireccion($direccion) {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion() {
        return $this->direccion;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     * @return Establecimiento
     */
    public function setActivo($activo) {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean 
     */
    public function getActivo() {
        return $this->activo;
    }

    /**
     * Set emisor
     *
     * @param \FactelBundle\Entity\Emisor $emisor
     * @return Establecimiento
     */
    public function setEmisor(\FactelBundle\Entity\Emisor $emisor = null) {
        $this->emisor = $emisor;

        return $this;
    }

    /**
     * Get emisor
     *
     * @return \FactelBundle\Entity\Emisor 
     */
    public function getEmisor() {
        return $this->emisor;
    }

    public function __toString() {
        return $this->nombre . " <---> " . $this->emisor->getRazonSocial();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->ptosEmision = new \Doctrine\Common\Collections\ArrayCollection();
        $this->facturas = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notasCredito = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notasDebito = new \Doctrine\Common\Collections\ArrayCollection();
        $this->guias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add ptosEmision
     *
     * @param \FactelBundle\Entity\PtoEmision $ptosEmision
     * @return Establecimiento
     */
    public function addPtosEmision(\FactelBundle\Entity\PtoEmision $ptosEmision) {
        $this->ptosEmision[] = $ptosEmision;

        return $this;
    }

    /**
     * Remove ptosEmision
     *
     * @param \FactelBundle\Entity\PtoEmision $ptosEmision
     */
    public function removePtosEmision(\FactelBundle\Entity\PtoEmision $ptosEmision) {
        $this->ptosEmision->removeElement($ptosEmision);
    }

    /**
     * Get ptosEmision
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPtosEmision() {
        return $this->ptosEmision;
    }

    /**
     * Add facturas
     *
     * @param \FactelBundle\Entity\Factura $facturas
     * @return Establecimiento
     */
    public function addFactura(\FactelBundle\Entity\Factura $facturas) {
        $this->facturas[] = $facturas;

        return $this;
    }

    /**
     * Remove facturas
     *
     * @param \FactelBundle\Entity\Factura $facturas
     */
    public function removeFactura(\FactelBundle\Entity\Factura $facturas) {
        $this->facturas->removeElement($facturas);
    }

    /**
     * Get facturas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFacturas() {
        return $this->facturas;
    }

    /**
     * Add notasCredito
     *
     * @param \FactelBundle\Entity\NotaCredito $notasCredito
     * @return Establecimiento
     */
    public function addNotasCredito(\FactelBundle\Entity\NotaCredito $notasCredito) {
        $this->notasCredito[] = $notasCredito;

        return $this;
    }

    /**
     * Remove notasCredito
     *
     * @param \FactelBundle\Entity\NotaCredito $notasCredito
     */
    public function removeNotasCredito(\FactelBundle\Entity\NotaCredito $notasCredito) {
        $this->notasCredito->removeElement($notasCredito);
    }

    /**
     * Get notasCredito
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotasCredito() {
        return $this->notasCredito;
    }

    /**
     * Add notasDebito
     *
     * @param \FactelBundle\Entity\NotaDebito $notasDebito
     * @return Establecimiento
     */
    public function addNotasDebito(\FactelBundle\Entity\NotaDebito $notasDebito) {
        $this->notasDebito[] = $notasDebito;

        return $this;
    }

    /**
     * Remove notasDebito
     *
     * @param \FactelBundle\Entity\NotaDebito $notasDebito
     */
    public function removeNotasDebito(\FactelBundle\Entity\NotaDebito $notasDebito) {
        $this->notasDebito->removeElement($notasDebito);
    }

    /**
     * Get notasDebito
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotasDebito() {
        return $this->notasDebito;
    }

    /**
     * Add retencion
     *
     * @param \FactelBundle\Entity\Retencion $retencion
     * @return Establecimiento
     */
    public function addRetencion(\FactelBundle\Entity\Retencion $retencion) {
        $this->retencion[] = $retencion;

        return $this;
    }

    /**
     * Remove retencion
     *
     * @param \FactelBundle\Entity\Retencion $retencion
     */
    public function removeRetencion(\FactelBundle\Entity\Retencion $retencion) {
        $this->retencion->removeElement($retencion);
    }

    /**
     * Get retencion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRetencion() {
        return $this->retencion;
    }

    /**
     * Set urlweb
     *
     * @param string $urlweb
     *
     * @return Establecimiento
     */
    public function setUrlweb($urlweb) {
        $this->urlweb = $urlweb;

        return $this;
    }

    /**
     * Get urlweb
     *
     * @return string
     */
    public function getUrlweb() {
        return $this->urlweb;
    }

    /**
     * Add guia
     *
     * @param \FactelBundle\Entity\Guia $guia
     *
     * @return Establecimiento
     */
    public function addGuia(\FactelBundle\Entity\Guia $guia) {
        $this->guias[] = $guia;

        return $this;
    }

    /**
     * Remove guia
     *
     * @param \FactelBundle\Entity\Guia $guia
     */
    public function removeGuia(\FactelBundle\Entity\Guia $guia) {
        $this->guias->removeElement($guia);
    }

    /**
     * Get guias
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuias() {
        return $this->guias;
    }

    /**
     * Set nombreComercial
     *
     * @param string $nombreComercial
     *
     * @return Establecimiento
     */
    public function setNombreComercial($nombreComercial) {
        $this->nombreComercial = $nombreComercial;

        return $this;
    }

    /**
     * Get nombreComercial
     *
     * @return string
     */
    public function getNombreComercial() {
        return $this->nombreComercial;
    }
    
     /**
     * Get fotoPerfil
     *
     * @return string
     */
    public function getLogo() {
        return $this->logo;
    }

    /**
     * Set fotoPerfil
     *
     * @param string $fotoPerfil
     *
     * @return User
     */
    public function setLogo($logo) {
        $this->logo = $logo;

        return $this;
    }


    /**
     * Set dirLogo
     *
     * @param string $dirLogo
     *
     * @return Establecimiento
     */
    public function setDirLogo($dirLogo)
    {
        $this->dirLogo = $dirLogo;

        return $this;
    }

    /**
     * Get dirLogo
     *
     * @return string
     */
    public function getDirLogo()
    {
        return $this->dirLogo;
    }
}
