<?php

namespace ArmMage\LearningMagento\Api\Data;
interface ViewInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const ENTITY_ID = 'entity_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const STATUS = 'status';
    /**#@-*/

    /**
     * Get Title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get Description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Get Created At
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get Updated At
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set Title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Set Description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description);

    /**
     * Set Crated At
     *
     * @param int $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Set Crated At
     *
     * @param int $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);


    /**
     * @param int $status
     * @return mixed
     */
    public function setStatus($status);

    /**
     * Set ID
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);
}
