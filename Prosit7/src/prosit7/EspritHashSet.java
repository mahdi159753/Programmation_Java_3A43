/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prosit7;

import java.util.HashSet;
import java.util.Iterator;
import java.util.TreeSet;

/**
 *
 * @author fedi
 */
public class EspritHashSet implements GestionEnseignant {

    
     private HashSet ens=new HashSet<Enseignant>();


    public EspritHashSet() {

    }
    
    @Override
    public void ajouterEnseignant(Enseignant e) {


        ens.add(e);
    }

    @Override
    public boolean rechercherEnseignant(Enseignant e) {

        return ens.contains(e);
    }

    @Override
    public boolean rechercherEnseignant(int id) {
 
        for (Object object : ens) {

      if(((Enseignant)object).getId()==id)
    
          return true;
        }
  return false; 
    }

    @Override
    public void supprimerEnseignant(Enseignant e) {

        this.ens.remove(e);
    }

    @Override
    public void displayEnseignants() {

        
          Iterator value = ens.iterator(); 
  
        // Displaying the values after iterating through the set 
        while (value.hasNext()) { 
            System.out.println(value.next().toString()); 
        } 
        
      
    }
    
}
