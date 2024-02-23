<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReponseRepository;
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
 * Reponse
 *
 * @ORM\Table(name="reponse", indexes={@ORM\Index(name="fk_reponse_discussion", columns={"ID_discussion"}), @ORM\Index(name="fk_reponse_utilisateur", columns={"ID_user"})})
 * @ORM\Entity(repositoryClass="App\Repository\ReponseRepository")
 */
class Reponse
{
    public function getToxicity(string $text): ?float
    {
        $apiKey = 'AIzaSyB3KH8n7rtlgWsk3bCT6gzS1UgWOoXBvX8'; // Remplacer avec votre clé d'API

        $client = new Client();
        $response = $client->post('https://commentanalyzer.googleapis.com/v1alpha1/comments:analyze?key=' . $apiKey, [
            'json' => [
                'comment' => [
                    'text' => $text,
                ],
                'requestedAttributes' => [
                    'TOXICITY' => (object) [],
                ],
            ],
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        if (isset($result['attributeScores']['TOXICITY']['summaryScore']['value'])) {
            return $result['attributeScores']['TOXICITY']['summaryScore']['value'];
        }

        return null;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="ID_reponse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups({"reponses"})
     */
    private $idReponse;

   /**
 * @var string
 *
 * @ORM\Column(name="contenu_reponse", type="string", length=500, nullable=false)
 * @Assert\NotBlank(message="*Veuillez remplir ce champ.")
 * @Groups({"reponses"})
 */
    private $contenuReponse;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_reponse", type="date", nullable=false)
     * @Groups({"reponses"})
     */
    private $dateReponse;

    /**
     * @var \Discussion
     *
     * @ORM\ManyToOne(targetEntity=Discussion::class,cascade={"persist"})
     *
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_discussion", referencedColumnName="ID_discussion")
     * })
     * @Groups({"reponses"})
     */
    private $idDiscussion;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ID_user", referencedColumnName="ID_user")
     * })
     * @Groups({"reponses"})
     */
    private $idUser;

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function getContenuReponse(): ?string
    {
        return $this->contenuReponse;
    }

    public function setContenuReponse(string $contenuReponse): self
    {
        $this->contenuReponse = $contenuReponse;

        return $this;
    }

    public function getDateReponse(): ?\DateTimeInterface
    {
        return $this->dateReponse;
    }

    public function setDateReponse(\DateTimeInterface $dateReponse): self
    {
        $this->dateReponse = $dateReponse;

        return $this;
    }

    public function getIdDiscussion(): ?Discussion
    {
        return $this->idDiscussion;
    }

    public function setIdDiscussion(?Discussion $idDiscussion): self
    {
        $this->idDiscussion = $idDiscussion;

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
    /**
 * @Assert\Callback
 *
 */
public function validateNotBlank(ExecutionContextInterface $context)
{
    
    if(strlen($this->getContenuReponse()) < 10){
        $context->buildViolation('Contenu de la réponse doit être superieur à 10 caractères')
            ->atPath('contenuReponse')
            ->addViolation(); 
    }
}
/**
 * @Assert\Callback
 */

}
