
import java.util.ArrayList;
import java.util.Collection;
import java.util.Collections;
import java.util.Vector;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author fedi
 */
public class EspritVector  implements University{

    private Vector listeEtudiant =new Vector<Etudiant>();
    
    
    @Override
    public void ajouterEtudiant(Etudiant e) {
this.listeEtudiant.add(e);
    }

    @Override
    public boolean rechercherEtudiant(Etudiant e) {
return this.listeEtudiant.indexOf(e)>-1;
    }

    @Override
    public boolean rechercherEtudiant(String nom) {
  for (Object object : listeEtudiant) {

      if(((Etudiant)object).getNom().equals(nom))
    
          return true;
        }
  return false;

    }

    @Override
    public void supprimerEtudiant(Etudiant e) {
 
        this.listeEtudiant.remove(e);
        
    }

    @Override
    public void displayEtudiants() {
        
        for (Object object : listeEtudiant) {
        
            System.out.println(object.toString());
            
        }
    }

    @Override
    public void trierEtudiantsParId() {
        Collections.sort(listeEtudiant);
    }

    @Override
    public void trierEtudiantsParNom() {
        Collections.sort(listeEtudiant,new NomComparator());
    }
    
}
