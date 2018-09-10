<?php

namespace Entity;

/**
 * OauthAuthCodes
 */
class OauthAuthCodes
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var string|null
     */
    private $scopes;

    /**
     * @var bool
     */
    private $revoked;

    /**
     * @var \DateTime|null
     */
    private $expiresAt;


    /**
     * Get id.
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId.
     *
     * @param int $userId
     *
     * @return OauthAuthCodes
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set clientId.
     *
     * @param int $clientId
     *
     * @return OauthAuthCodes
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId.
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set scopes.
     *
     * @param string|null $scopes
     *
     * @return OauthAuthCodes
     */
    public function setScopes($scopes = null)
    {
        $this->scopes = $scopes;

        return $this;
    }

    /**
     * Get scopes.
     *
     * @return string|null
     */
    public function getScopes()
    {
        return $this->scopes;
    }

    /**
     * Set revoked.
     *
     * @param bool $revoked
     *
     * @return OauthAuthCodes
     */
    public function setRevoked($revoked)
    {
        $this->revoked = $revoked;

        return $this;
    }

    /**
     * Get revoked.
     *
     * @return bool
     */
    public function getRevoked()
    {
        return $this->revoked;
    }

    /**
     * Set expiresAt.
     *
     * @param \DateTime|null $expiresAt
     *
     * @return OauthAuthCodes
     */
    public function setExpiresAt($expiresAt = null)
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    /**
     * Get expiresAt.
     *
     * @return \DateTime|null
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
}
