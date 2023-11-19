package com.mycompany.prosit1010;

import java.util.HashMap;
import java.util.HashSet;
import java.util.Map;
import java.util.Set;

/**
 *
 * @author gth
 */
public class SocieteHashMap2 implements InterfaceSociete{
    Map<Departement, HashSet<Employe>> shm;
    
    public SocieteHashMap2(){
        shm=new HashMap<Departement,HashSet<Employe>>();
    }
    

    @Override
    public void ajouterEmployeDepartement(Employe e, Departement d) {
        HashSet<Employe> hs=new HashSet<Employe>();
        if(shm.containsKey(d)){
            hs=shm.get(d);   
        }
        hs.add(e);
        shm.put(d,hs);     
    }

    @Override
    public void supprimerEmploye(Employe e) {
        for(Departement d: shm.keySet()){
            if(shm.get(d).contains(e))
            {
              shm.get(d).remove(e);
            }
        }
    }

    @Override
    public void afficherLesEmployesLeursDepartements() {

       for( Map.Entry<Departement, HashSet<Employe>> entry : shm.entrySet()){
           System.out.println(entry.getKey().toString());
           for ( Employe j : entry.getValue()){
               System.out.println(j.toString());
           }
       }
    }

    @Override
    public void afficherLesEmployes() {
        
        }
    }

    @Override
    public void afficherLesDepartements() {
      
    }

 @Override
    public void afficherDepartement(Employe e) {
        if(!(shm.containsKey(e))) System.out.println("Employe inexistant");
        else{
            System.out.println(shm.get(e).toString());
        }
    }

    @Override
    public boolean rechercherEmploye(Employe e) {
        return shm.containsKey(e);
    }

    @Override
    public boolean rechercherDepartement(Departement e) {
        return shm.containsValue(e);

    
}
