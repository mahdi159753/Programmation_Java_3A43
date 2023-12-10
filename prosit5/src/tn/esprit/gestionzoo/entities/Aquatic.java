package tn.esprit.gestionzoo.entities;

class Aquatic extends Animal {
    private String habitat;
    public Aquatic(String habitat) {
        this.habitat = habitat;
    }
    public String getHabitat() {
        return habitat;
    }
    public void setHabitat(String habitat) {
        this.habitat = habitat;
    }
    public void swim() {
        System.out.println("This aquatic animal is swimming.");
    }
}

}
