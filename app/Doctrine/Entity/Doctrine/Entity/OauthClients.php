<?php

namespace Doctrine\Entity;

/**
 * OauthClients
 */
class OauthClients
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $redirect;

    /**
     * @var boolean
     */
    private $personalAccessClient;

    /**
     * @var boolean
     */
    private $passwordClient;

    /**
     * @var boolean
     */
    private $revoked;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return OauthClients
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OauthClients
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set secret
     *
     * @param string $secret
     *
     * @return OauthClients
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;

        return $this;
    }

    /**
     * Get secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Set redirect
     *
     * @param string $redirect
     *
     * @return OauthClients
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;

        return $this;
    }

    /**
     * Get redirect
     *
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * Set personalAccessClient
     *
     * @param boolean $personalAccessClient
     *
     * @return OauthClients
     */
    public function setPersonalAccessClient($personalAccessClient)
    {
        $this->personalAccessClient = $personalAccessClient;

        return $this;
    }

    /**
     * Get personalAccessClient
     *
     * @return boolean
     */
    public function getPersonalAccessClient()
    {
        return $this->personalAccessClient;
    }

    /**
     * Set passwordClient
     *
     * @param boolean $passwordClient
     *
     * @return OauthClients
     */
    public function setPasswordClient($passwordClient)
    {
        $this->passwordClient = $passwordClient;

        return $this;
    }

    /**
     * Get passwordClient
     *
     * @return boolean
     */
    public function getPasswordClient()
    {
        return $this->passwordClient;
    }

    /**
     * Set revoked
     *
     * @param boolean $revoked
     *
     * @return OauthClients
     */
    public function setRevoked($revoked)
    {
        $this->revoked = $revoked;

        return $this;
    }

    /**
     * Get revoked
     *
     * @return boolean
     */
    public function getRevoked()
    {
        return $this->revoked;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return OauthClients
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return OauthClients
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

