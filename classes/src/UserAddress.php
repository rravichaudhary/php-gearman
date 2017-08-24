<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * UserAddress
 */
class UserAddress
{
    /**
     * @var integer
     */
    private $user_book_id;

    /**
     * @var \DateTime
     */
    private $purchase_on;

    /**
     * @var \User
     */
    private $user_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $book_id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->book_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get user_book_id
     *
     * @return integer 
     */
    public function getUserBookId()
    {
        return $this->user_book_id;
    }

    /**
     * Set purchase_on
     *
     * @param \DateTime $purchaseOn
     * @return UserAddress
     */
    public function setPurchaseOn($purchaseOn)
    {
        $this->purchase_on = $purchaseOn;

        return $this;
    }

    /**
     * Get purchase_on
     *
     * @return \DateTime 
     */
    public function getPurchaseOn()
    {
        return $this->purchase_on;
    }

    /**
     * Set user_id
     *
     * @param \User $userId
     * @return UserAddress
     */
    public function setUserId(\User $userId = null)
    {
        $this->user_id = $userId;

        return $this;
    }

    /**
     * Get user_id
     *
     * @return \User 
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Add book_id
     *
     * @param \Book $bookId
     * @return UserAddress
     */
    public function addBookId(\Book $bookId)
    {
        $this->book_id[] = $bookId;

        return $this;
    }

    /**
     * Remove book_id
     *
     * @param \Book $bookId
     */
    public function removeBookId(\Book $bookId)
    {
        $this->book_id->removeElement($bookId);
    }

    /**
     * Get book_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookId()
    {
        return $this->book_id;
    }
}
