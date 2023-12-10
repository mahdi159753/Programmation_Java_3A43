package tn.esprit.gestionzoo.main;

import tn.esprit.gestionzoo.entities.*;
import tn.esprit.gestionzoo.entities.Animal;



public class ZooManagement {
    


    public static <Dolphin> void main(String[] args) {

        Animal lion = new Animal();
        lion.name = "Simba";
        lion.age = 8;
        lion.family = "Cats";
        lion.isMammal = true;

        Zoo myZoo = new Zoo("Wildlife Park", "Ariana");

        String zooName = myZoo.getName();
        String zooCity = myZoo.getCity();
        int numberOfCages = myZoo.getNbrCages();
        Animal[] animalsInMyZoo = myZoo.getAnimals();
       
        Animal dog = new Animal("Canine", "Snoopy", 2, true);

        System.out.println(myZoo);
        System.out.println(myZoo.toString());

        System.out.println(myZoo.addAnimal(lion));
        System.out.println(myZoo.addAnimal(dog));

        myZoo.displayAnimals();

        System.out.println(myZoo.searchAnimal(dog));
        Animal dog2 = new Animal("Canine", "Snoopy", 2, true);
        System.out.println(myZoo.searchAnimal(dog2));

        System.out.println(myZoo.removeAnimal(dog));
        myZoo.displayAnimals();
        System.out.println(" zoo full? " + myZoo.isZooFull());
        Zoo zoo1 = new Zoo("Zoo 1", "Ville 1");
        Zoo zoo2 = new Zoo("Zoo 2", "Ville 2");
        Zoo zooAvecPlusAnimaux = Zoo.comparerZoo(zoo1, zoo2);
        System.out.println("Le zoo avec le plus d'animaux est : " + zooAvecPlusAnimaux.getName());

        Animal animal = new Animal();
        Aquatic aquaticAnimal = new Aquatic();
        Terrestrial terrestrialAnimal = new Terrestrial();
        Dolphin dolphin = new Dolphin();
        Penguin penguin = new Penguin();
    }

}

