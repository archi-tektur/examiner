<?php declare(strict_types=1);

namespace App\Entity\Users;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Representation of loggable user
 *
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
     * User's e-mail
     * @ORM\Column(type="string", length=120, nullable=true)
     */
    protected $mail;

    /**
     * @return mixed
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * @param mixed $uuid
     * @return self
     */
    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurmame()
    {
        return $this->surmame;
    }

    /**
     * @param mixed $surmame
     * @return self
     */
    public function setSurmame($surmame): self
    {
        $this->surmame = $surmame;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     * @return self
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @see UserInterface
     */
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

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string)$this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
    }
}
