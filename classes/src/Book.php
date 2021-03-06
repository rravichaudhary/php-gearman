<?php
/**
 *
 * @author Ravi Chaudhary
 * @Entity @Table(name="Books")
 *
 */
Class Book{
	
	/** @Id @Column(type="integer") @GeneratedValue **/
	public $book_id;
	/** @Column(type="string") **/
	public $title;
	/** @Column(type="integer") **/
	public $isbn;
	/** @Column(type="float") **/
	public $price;
	/** @Column(type="string") **/
	public $summary;
	
	public function getBookId(){
		return $this->book_id;
	}
	
	public function setBookId($value){
		$this->book_id = $value;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setTitle($value){
		$this->title = $value;
	}
	
	public function getISBN(){
		return $this->isbn;
	}
	
	public function setISBN($value){
		$this->isbn = $value;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	public function setPrice($value){
		$this->price = $value;
	}
	
	public function getSummary(){
		return $this->summary;
	}
	
	public function setSummary($value){
		$this->summary = $value;
	}
}
