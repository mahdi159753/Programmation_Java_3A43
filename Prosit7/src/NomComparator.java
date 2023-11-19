
import java.util.Comparator;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author fedi
 */
public class NomComparator implements Comparator<Etudiant>{

    @Override
    public int compare(Etudiant t, Etudiant t1) {
        return t.getNom().compareToIgnoreCase(t1.getNom());


    }
    
}
