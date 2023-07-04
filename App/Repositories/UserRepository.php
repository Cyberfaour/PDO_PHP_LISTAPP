<?php
namespace App\Repositories;
use App\Models\User;
use PDO;

class UserRepository
{
    private $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function findByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username=:username";
        $statement = $this->db->prepare($query);
        $statement->execute(['username' => $username]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['mfa_secret']);
        }
        return null;
    }
    public function findById($id)
    {
        $query = "SELECT * FROM users WHERE id=:id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $id]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['mfa_secret']);
        }

        return null;
    }
    public function createUser(User $user)
    {
        $query = "INSERT INTO users (username,password,mfa_secret) VALUES (:username, :password, :mfa_secret)";
        $statement = $this->db->prepare($query);
        $statement->execute(['username' => $user->getUsername(), 
                            'password' => $user->getPassword(),
                            'mfa_secret' => $user->getMfaSecret()]);
                            return $statement->rowCount()>0;

    }
    public function updateMFASecret(User $user){
        $query = "UPDATE users SET mfa_secret =:mfa_secret WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute(['id' => $user->getId(),
        'mfa_secre'=>$user->getMfaSecret()]);
        return $statement->rowCount()>0;
    }
}

?>