<?php

namespace Entity;

/**
 * OauthAccessTokens
 */
class OauthAccessTokens
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $clientId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $scopes;

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
     * @var \DateTime
     */
    private $expiresAt;


    /**
     * Get id
     *
     * @return string
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
     * @return OauthAccessTokens
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
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return OauthAccessTokens
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return OauthAccessTokens
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
     * Set scopes
     *
     * @param string $scopes
     *
     * @return OauthAccessTokens
     */
    public function setScopes($scopes)
    {
        $this->scopes = $scopes;

        return $this;
    }

    /**
     * Get scopes
     *
     * @return string
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Set revoked
     *
     * @param boolean $revoked
     *
     * @return OauthAccessTokens
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
     * @return OauthAccessTokens
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
     * @return OauthAccessTokens
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

    /**
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return OauthAccessTokens
     */
    public function setExpiresAt($expiresAt)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt
     *
     * @return \DateTime
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
}

