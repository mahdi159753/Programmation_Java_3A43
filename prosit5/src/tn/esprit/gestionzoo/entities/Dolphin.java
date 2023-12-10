package tn.esprit.gestionzoo.entities;

class Dolphin extends Aquatic {
    private float swimmingSpeed;

    public Dolphin(String habitat) {
        super(habitat);
    }

    public float Dolphin(String habitat, float swimmingSpeed) {
        super(habitat);
        this.swimmingSpeed = swimmingSpeed;
        public float getSwimmingSpeed() {
            return swimmingSpeed;
            public void setSwimmingSpeed(float swimmingSpeed) {
                this.swimmingSpeed = swimmingSpeed;
            }
        }
    }
    @Override
    public void swim() {
        System.out.println("This dolphin is swimming.");
    }
}