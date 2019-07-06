<?php declare(strict_types=1);

namespace App\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * Representation of student
 *
 * @ORM\Entity(repositoryClass="App\Repository\Users\StudentRepository")
 */
class Student extends AbstractUser
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
