<?php declare(strict_types=1);

namespace App\Entity\Users;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Representation of loggable user
 *
 * @ORM\HasLifecycleCallbacks()
 * @package App\Entity\Users
 */
abstract class AbstractUser implements UserInterface
{
    /**
     * Username
     * @ORM\Column(type="string", length=180, unique=true)
     */
    protected $username;

    /**
     * User roles
     * @ORM\Column(type="json")
     */
    protected $roles = [];

    /**
     * The hashed password
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * User unique ID
     * @ORM\Column(type="integer", options={"unsigned": true})
     */
    protected $uuid;

    /**
     * User name
     * @ORM\Column(type="string", length=32)
     */
    protected $name;

    /**
     * User surname
     * @ORM\Column(type="string", length=64)
     */
    protected $surmame;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $createdAt;

    /**
     * User's e-mail
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    protected $mail;

    public function getUuid(): ?int
    {
        return $this->uuid;
    }

    public function setUuid(int $uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getSurmame(): ?string
    {
        return $this->surmame;
    }

    public function setSurmame(string $surmame): self
    {
        $this->surmame = $surmame;
        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    /** @see UserInterface */
    public function getUsername(): ?string
    {
        return (string)$this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /** @see UserInterface */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';
        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;
        return $this;
    }

    /** @see UserInterface */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /** @see UserInterface */
    public function getSalt()
    {
    }

    /** @see UserInterface */
    public function eraseCredentials(): void
    {
    }

    /**
     * Auto-generate 6-digit UUID
     * @ORM\PrePersist()
     *
     * @throws Exception actually never
     */
    public function generateUuid(): void
    {
        $this->uuid = random_int(100000, 999999);
    }

    /**
     * Auto-add creation date
     * @ORM\PrePersist()
     *
     * @param DateTime $dateTime
     * @throws Exception actually never
     */
    public function setCreation(DateTime $dateTime): void
    {
        $this->createdAt = $dateTime;
    }
}
