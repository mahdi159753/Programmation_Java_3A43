package tn.esprit.gestionzoo.entities;

class Penguin extends Aquatic {
    float swimmingDepth;
    public Penguin(String habitat, float swimmingDepth) {
        super(habitat);
        this.swimmingDepth = swimmingDepth;
    }
    public float getSwimmingDepth() {
        return swimmingDepth;
    }
    public void setSwimmingDepth(float swimmingDepth) {
        this.swimmingDepth = swimmingDepth;
    }
}