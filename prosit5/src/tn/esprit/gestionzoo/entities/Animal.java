package tn.esprit.gestionzoo.entities;

public class Animal {

    String family;
    String name;
    int age;
    boolean isMammal;

    
    public Animal(String family, String name, int age, boolean isMammal) {
        if (age >= 0) {
            this.age = age;
        } else {
            this.age = 0;
        }
        this.family = family;
        this.name = name;
        this.isMammal = isMammal;
    }

   
    public Animal() {
    }


    public String getFamily() {
        return family;
    }

    public String getName() {
        return name;
    }

    public int getAge() {
        return age;
    }

    public boolean isMammal() {
        return isMammal;
    }


    @Override
    public String toString() {
        return "Animal{" +
                "family='" + family + '\'' +
                ", name='" + name + '\'' +
                ", age=" + age +
                ", isMammal=" + isMammal +
                '}';
    }
}
