<?php
error_reporting(-1);
require_once 'bootstrap.php';

$faker = new Faker\Generator();
$faker->addProvider(new Faker\Provider\en_US\Person($faker));
$faker->addProvider(new Faker\Provider\en_US\Address($faker));
$faker->addProvider(new Faker\Provider\en_US\PhoneNumber($faker));
$faker->addProvider(new Faker\Provider\en_US\Company($faker));
$faker->addProvider(new Faker\Provider\Lorem($faker));
$faker->addProvider(new Faker\Provider\Internet($faker));



//print $faker->name;

/// insert into user
Class fakerinsert{
	public $faker;
	public function __construct(){
		$this->faker = new Faker\Generator();
		$this->faker->addProvider(new Faker\Provider\en_US\Person($this->faker));
		$this->faker->addProvider(new Faker\Provider\en_US\Address($this->faker));
		$this->faker->addProvider(new Faker\Provider\en_US\PhoneNumber($this->faker));
		$this->faker->addProvider(new Faker\Provider\en_US\Company($this->faker));
		$this->faker->addProvider(new Faker\Provider\Lorem($this->faker));
		$this->faker->addProvider(new Faker\Provider\DateTime($this->faker));
		$this->faker->addProvider(new Faker\Provider\Barcode($this->faker));
		$this->faker->addProvider(new Faker\Provider\Internet($this->faker));
		$this->faker->addProvider(new Faker\Provider\Miscellaneous($this->faker));
	}
	
	public function generateUser(){
		$gender_array = array('male','female');
		$gender_key = array_rand($gender_array,1);
		$gender = $gender_array[$gender_key];
		$user = array(
				'username' => $this->faker->userName,
				'email' => $this->faker->email,
				'password' => $this->faker->password,
		);	
		switch ($gender){
			case 'male':
				$user['first_name'] = $this->faker->firstNameMale;
				$user['title'] = $this->faker->titleMale;
				break;
			case 'female':
				$user['first_name'] = $this->faker->firstNameFemale;
				$user['title'] = $this->faker->titleFemale;
		}
		$user['last_name'] = $this->faker->lastName;
		$user['ip'] = $this->faker->ipv4;
		$user['currency'] = $this->faker->currencyCode;
		$user['company'] = $this->faker->company;
		$user['gender'] = ucfirst($gender);
		$user['created_on'] = new DateTime($this->faker->date('Y-m-d H:i:s'));
		$user['updated_on'] = new DateTime($this->faker->date('Y-m-d H:i:s'));
		
		return  $user;
	}
	
	public function generateBook(){
		$book = array();
		$title = $this->faker->sentence;
		$book['title'] = substr($title, 0, strlen($title) - 1);
		$book['isbn'] = $this->faker->isbn10;
		$book['price'] = $this->faker->randomFloat(2);
		$book['summary'] = $this->faker->text;
		return $book;
	}
	
}

$obj = new fakerinsert();


for($i=0;$i<100000;$i++){
	$userData = $obj->generateUser();
	$user = new User();
	$user->setDate($userData);
	$entityManager->persist($user);
	$entityManager->flush();
	print_r($user);
	
}

exit;
for($i=0;$i<100000;$i++){
	$book = new Book();
	$bookData = $obj->generateBook();
	$book->title = $bookData['title'];
	$book->isbn = $bookData['isbn'];
	$book->price = $bookData['price'];
	$book->summary = $bookData['summary'];
	$entityManager->persist($book);
	$entityManager->flush();
	print_r($book);
}

