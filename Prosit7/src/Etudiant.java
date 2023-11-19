/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author fedi
 */
public class Etudiant implements Comparable {
  
    private int id;
    
    private String nom;
    
    private String prenom;

    public  Etudiant(     int id,String nom, String prenom){
    this.id= id;
    
    this.nom= nom;
    
    this.prenom= prenom;
    }
    
    /**
     * @return the id
     */
    public int getId() {
        return id;
    }

    /**
     * @param id the id to set
     */
    public void setId(int id) {
        this.id = id;
    }

    /**
     * @return the nom
     */
    public String getNom() {
        return nom;
    }

    /**
     * @param nom the nom to set
     */
    public void setNom(String nom) {
        this.nom = nom;
    }

    /**
     * @return the prenom
     */
    public String getPrenom() {
        return prenom;
    }

    /**
     * @param prenom the prenom to set
     */
    public void setPrenom(String prenom) {
        this.prenom = prenom;
    }

    @Override
    public boolean equals(Object o) {
        return this.id==((Etudiant)o).getId(); //To change body of generated methods, choose Tools | Templates.
    }

    @Override
    public String toString() {
        return "id"+this.id+"nom"+this.nom+"prenom"+this.getPrenom();
    }

    @Override
    public int compareTo(Object t) {
        if(this.id==((Etudiant)t).getId())

            return 0;
        else if(this.id>((Etudiant)t).getId())
            return 1;
          
        return -1;            
            
    }
}
