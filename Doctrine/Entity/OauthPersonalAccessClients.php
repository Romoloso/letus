<?php

namespace Entity;

/**
 * OauthPersonalAccessClients
 */
class OauthPersonalAccessClients
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $clientId;

    /**
     * @var \DateTime|null
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     */
    private $updatedAt;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set clientId.
     *
     * @param int $clientId
     *
     * @return OauthPersonalAccessClients
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
     * Set createdAt.
     *
     * @param \DateTime|null $createdAt
     *
     * @return OauthPersonalAccessClients
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt.
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt.
     *
     * @param \DateTime|null $updatedAt
     *
     * @return OauthPersonalAccessClients
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt.
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
