<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DiscussionRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Callback;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Google\Cloud\Language\V1\AnnotateTextRequest\Features;
use Google\Cloud\Language\V1\AnnotateTextResponse;
use Google\Cloud\Language\V1\Document;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\Sentiment;
use GuzzleHttp\Client;
use Symfony\Component\Serializer\Annotation\Groups;







/**
 * Discussion
 *
 * @ORM\Table(name="discussion", indexes={@ORM\Index(name="fk_discussion_utilisateur", columns={"ID_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\DiscussionRepository")
 */
class Discussion

{
    

    
    /**
     * @var int
     *
     * @ORM\Column(name="ID_discussion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"discussions"})
     */
    private $idDiscussion;

    /**
     * @var string
     *
     * @ORM\Column(name="titre_discussion", type="string", length=100, nullable=false)
     * @Groups({"discussions"})
     */
    private $titreDiscussion;

 /**
 * @var string
 *
 * @ORM\Column(name="contenu_discussion", type="string", length=2000, nullable=false)
 * @Groups({"discussions"})
 */
private $contenuDiscussion;
    /**
 * @ORM\Column(type="string", nullable=true)
 * @Groups({"discussions"})
 */
private $imageDiscussion;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_discussion", type="date", nullable=false)
     * @Groups({"discussions"})
     */
    private $dateDiscussion;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID_user")
     * 
     * })
     * @Groups({"discussions"})
     */
    private $idUser;

    public function getIdDiscussion(): ?int
    {
        return $this->idDiscussion;
    }

    public function getTitreDiscussion(): ?string
    {
        return $this->titreDiscussion;
    }

    public function setTitreDiscussion(string $titreDiscussion): self
    {
        $this->titreDiscussion = $titreDiscussion;

        return $this;
    }

    public function getContenuDiscussion(): ?string
    {
        return $this->contenuDiscussion;
    }

    public function setContenuDiscussion(string $contenuDiscussion): self
    {
        $this->contenuDiscussion = $contenuDiscussion;

        return $this;
    }

    public function getDateDiscussion(): ?\DateTimeInterface
    {
        return $this->dateDiscussion;
    }

    public function setDateDiscussion(\DateTimeInterface $dateDiscussion): self
    {
        $this->dateDiscussion = $dateDiscussion;

        return $this;
    }

    public function getIdUser(): ?Utilisateur
    {
        return $this->idUser;
    }

    public function setIdUser(?Utilisateur $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }

    public function getImageDiscussion(): ?string
    {
        return $this->imageDiscussion;
    }

    public function setImageDiscussion(?string $imageDiscussion): self
    {
        $this->imageDiscussion = $imageDiscussion;

        return $this;
    }

    /**
 * @Assert\Callback
 *
 */
public function validateNotBlank(ExecutionContextInterface $context)
{
    if(strlen($this->getTitreDiscussion()) < 5)
    {
        $context->buildViolation('Titre de la discussion doit être superieur à 5')
            ->atPath('titreDiscussion')
            ->addViolation();
    }
    if(strlen($this->getContenuDiscussion()) < 10){
        $context->buildViolation('Contenu de la discussion doit être superieur à 10 caractères')
            ->atPath('contenuDiscussion')
            ->addViolation(); 
    }
}
/**
 * @Assert\Callback
 */

}



