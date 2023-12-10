
import java.util.*;

public class EspritTreeSet implements GestionEnseignant {

      List<Enseignant> Ens ;
      
     /* public EspritTreeSet(){
         private Hashset<Enseignant> Ens = new Hashset<Enseignant>;
      }*/
      
    @Override
    public void ajouterEnseignant(Enseignant e) {
        Ens.add(e);
    }

    @Override
    public boolean rechercherEnseignant(Enseignant e) {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }

   
      @Override
    public boolean rechercherEnseignant(int id) {
         for (Enseignant ens : Ens){
            if(ens.getId()==id)
                return true;
    }
         return false;
         }
    
    @Override
    public void supprimerEnseignant(Enseignant e) {
        
    }

    @Override
    public void displayEnseignants() {
        throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
    }
    
}



//equals peut comparer juste des chaines d ecaractères