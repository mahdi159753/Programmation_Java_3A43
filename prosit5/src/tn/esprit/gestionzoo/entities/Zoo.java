package tn.esprit.gestionzoo.entities;

import tn.esprit.gestionzoo.entities.Animal;
public class Zoo {
    private static final int MAX_ANIMALS = 25;

    private Animal[] animals;

    private String name, city;
    private int nbrCages;

    private int nbrAnimals;

    public Zoo() {
    }

    public Zoo(String name, String city) {
        if (!name.isEmpty()) {
            this.name = name;
        } else {
            throw new IllegalArgumentException("Le nom du Zoo ne peut pas être vide.");
        }
        this.name = name;
        this.city = city;
        this.nbrCages = MAX_ANIMALS;
        animals = new Animal[MAX_ANIMALS];
    }


    void displayZoo() {
        System.out.println("Name: " + name + ", City: " + city + ", N° Cages/Animals: " + nbrCages);
    }
     

 boolean isZooFull() {
    return nbrAnimals == nbrCages;
}
public boolean addAnimal(Animal animal) {
    if (searchAnimal(animal) != -1)
        return false;
    if (isZooFull())
        return false;
    animals[nbrAnimals] = animal;
    nbrAnimals++;
    return true;
}

    boolean removeAnimal(Animal animal) {
        int indexAnimal = searchAnimal(animal);
        if (indexAnimal == -1)
            return false;
        for (int i = indexAnimal; i < nbrAnimals; i++) {
            animals[i] = animals[i + 1];
            animals[nbrAnimals] = null;
            this.nbrAnimals--;
        }
        return true;
    }

    void displayAnimals() {
        System.out.println("Liste des animaux de " + name + ":");
        for (int i = 0; i < nbrAnimals; i++) {
            System.out.println(animals[i]);
        }
    }

    int searchAnimal(Animal animal) {
        int index = -1;
        for (int i = 0; i < nbrAnimals; i++) {
            if (animal.name == animals[i].name)
                return i;
        }
        return index;
    }

    static Zoo comparerZoo(Zoo z1, Zoo z2) {
        if (z1.getNbrAnimals() > z2.getNbrAnimals()) {
            return z1;
        } else {
            return z2;
        }
    }

    public int getNbrAnimals() {
        return nbrAnimals;
    }
    public String getName() {
        return name;
    }
    public Animal[] getAnimals() {
        return animals;
    }
    public String getCity() {
        return city;
    }
    public int getNbrCages() {
        return nbrCages;
    }
    

    @Override
    public String toString() {
        return "Name: " + name + ", City: " + city + ", N° Cages/Animals: " + nbrCages;
    }
}
