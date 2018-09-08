<?php

namespace Entity;

/**
 * OauthRefreshTokens
 */
class OauthRefreshTokens
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $accessTokenId;

    /**
     * @var boolean
     */
    private $revoked;

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
     * Set accessTokenId
     *
     * @param string $accessTokenId
     *
     * @return OauthRefreshTokens
     */
    public function setAccessTokenId($accessTokenId)
    {
        $this->accessTokenId = $accessTokenId;

        return $this;
    }

    /**
     * Get accessTokenId
     *
     * @return string
     */
    public function getAccessTokenId()
    {
        return $this->accessTokenId;
    }

    /**
     * Set revoked
     *
     * @param boolean $revoked
     *
     * @return OauthRefreshTokens
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
     * Set expiresAt
     *
     * @param \DateTime $expiresAt
     *
     * @return OauthRefreshTokens
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
