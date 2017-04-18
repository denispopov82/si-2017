<?php
include_once 'DB.php';

/**
 * ${CLASS_NAME}
 *
 * @package   ${PARAM_DOC}
 */
class User
{
    /**
     * @var int
     */
    private $id;
    
    /**
     * @var string
     */
    private $username;
    
    /**
     * @var string
     */
    private $email;
    
    /**
     * @var \DateTime
     */
    private $createdAt;
    
    public function __construct($name, $email)
    {
        $this
            ->setUsername($name)
            ->setEmail($email)
            ->setCreatedAt(new DateTime());
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }
    
    /**
     * @param string $username
     *
     * @return $this
     */
    public function setUsername($username)
    {
        $this->username = $username;
        
        return $this;
    }
    
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }
    
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }
    
    public function save()
    {
        $db = DB::getInstance();
    
        $username = $db->real_escape_string($this->getUsername());
        $email = $db->real_escape_string($this->getEmail());
        $createdAt = $this->getCreatedAt()->format('Y-m-d H:i:s');
        $query = "INSERT INTO users (`username`, `email`, `created_at`) " .
                    "VALUES ('$username', '$email', '$createdAt')";
        $result = $db->query($query);
        if (!$result) {
            die('User is not added ' . $db->error);
        }
        
        return true;
    }
}
