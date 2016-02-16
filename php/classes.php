<?php
/* objectif: montrer le fonctionnement des classes, héritage etc. en php
*/

class Human{
	public $name ;
	protected $p = 0;
	private $x = 0;
	const PI = 3.1415926535;
	public static $population = 0;
	
	function __construct($name = "unknown"){
		print "==> constructeur de Human (" . $name . ")\n";
		$this->name = $name;
		self::$population ++;
	}
	
	function __destruct(){
		print "<== destruction de Human(" . $this->name . ")\n";
		self::$population--;
		
	}
	
	public function say($speech){
		echo $this->name . ": " . $speech . "\n";
	}
	
	public static function get_population(){
		return self::$population;
	}
	
}

class User extends Human{       // pas d'héritage multiple.
	public $password = "mdp";
	
	function __construct($name, $passwd = "123456"){
		print "==> contructeur User (" . $name . ")\n";
		parent::__construct($name);
		$this->password = $passwd; 
	}
	
	function __destruct(){
		parent::__destruct();
		print "<== destruction de User(" . $this->name . ")\n";
	}
	
}

// les objets sont passés par référence (en fait c'est la référence this qui est copiée... comme souvent)
function object_local_change(User $user){
	$user->name = 'Mad';
}


$nico = new User("Nico");
$nico->say("Bonjour");
object_local_change($nico);
$nico->say("Ai-je changé de nom?");
var_dump($nico instanceof Human); // true : normal user est human
echo User::PI . "\n";
echo "Population: " . User::$population . "\n"; 
$ben = new Human("Ben");

// object_local_change($ben); // Plante parce que $ben est seulement Human mais pas User.

$chacha = new User("Charlotte");
$chacha2 = clone $chacha;     // clone ne repasse pas par le constructeur du coup, la population n'augmente pas!
echo "Population: " . User::get_population() . "\n"; // 3 (Nico, Ben et Charlotte (même si il y en a deux))

var_dump($chacha == $chacha2);   // égaux parce que toutes les propriétées sont égales.
var_dump($chacha === $chacha2);  // différentes parce que ce ne sont pas les même instances.



