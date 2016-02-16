<?php
/* objectif: tester les passages de parametres dans les fonction php */

// passage de paramètre par valeur (même pour les tableaux)
function local_change($a){
	$a[0]=0;
	var_dump($a);
}

// passage par référence et valeur par défaut
// Les arguments avec valeur par défaut doivent se trouver après les autres.
//    normal c'est parce que les parametres sont identifiés par leur position.
function visible_change(&$a, $val="toto"){
	unset($a[0]);
	$a[]=$val;
}


/* Quand on a plusieurs parametres avec valeur par défaut, il n'est pas possible de 
   passer un valeur au dernier sans donner de valeur aux autres.
   Visiblement il n'y a pas d'argument nommé en php (différent de python) */
function triple_default($a, $b = 0, $c = array("titi","toto"), $d = NULL){
	echo "a[".$a."] b[". $b ."] c[".implode(",", $c) ."] d[".$d."]\n";
}


/* nombre d'argument indeterminé (ou variable) en php < 5.6
   Là ça nécessite quelques méthode proche de l'introspection...
     func_num_args(), func_get_arg() et func_get_args()

   En php 5.6 voir le mot clef '...'
*/
function add_n_arguments(){
    $sum = 0;
    foreach (func_get_args() as $v) {
        $sum += $v;
    }
    return $sum;
}

/* les objets sont passés par référence (en fait c'est la référence this qui est copiée... comme souvent
   Il est possible de préciser le type de l'argument pour les classes, les interfaces, les tableaux (5.1) et les callable (5.4).
   Il n'est pas possible de préciser le type pour les scalaires (int, string...) les ressources et les traits.  */
function object_local_change(User $user){
	$user->name = 'Mad';
}


$a = array(1,2,3);

local_change($a);
var_dump($a);

visible_change($a);
var_dump($a);

triple_default("valeur A");

echo "add_n_arguments(): " . add_n_arguments(1,5,7,8,4,6,9)."\n";
