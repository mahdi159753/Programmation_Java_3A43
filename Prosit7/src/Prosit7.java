/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 *
 * @author fedi
 */
import prosit7.*;
public class Prosit7 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

/*
EspritArrayList al =new EspritArrayList();
al.ajouterEtudiant(new Etudiant(2,"2","2"));

al.ajouterEtudiant(new Etudiant(3,"1","3"));

al.ajouterEtudiant(new Etudiant(1,"3","1"));

al.displayEtudiants();
al.trierEtudiantsParId();
al.displayEtudiants();
al.trierEtudiantsParNom();
al.displayEtudiants();

*/
        System.err.println("\tEspritHashSet");

EspritHashSet hs=new EspritHashSet();
        System.err.println("\t ajouterEnseignant");

hs.ajouterEnseignant(new Enseignant(4, "nom4", "prenom4"));
hs.ajouterEnseignant(new Enseignant(1, "nom1", "prenom1"));
hs.ajouterEnseignant(new Enseignant(3, "nom3", "prenom3"));
hs.ajouterEnseignant(new Enseignant(2, "nom2", "prenom2"));
        System.err.println("\t displayEnseignants");
hs.displayEnseignants();

        System.err.println("\t rechercherEnseignant");
System.err.println(hs.rechercherEnseignant(new Enseignant(3, "nom3", "prenom3")));
        System.err.println("\t supprimerEnseignant");
hs.supprimerEnseignant(new Enseignant(3, "nom3", "prenom3"));
 System.err.println("\tdisplayEnseignants apres supprimer un Enseignant ");
hs.displayEnseignants();

        System.err.println("treeset");
EspritTreeSet ts=new EspritTreeSet();
ts.ajouterEnseignant(new Enseignant(4, "nom4", "prenom4"));
ts.ajouterEnseignant(new Enseignant(1, "nom1", "prenom1"));
ts.ajouterEnseignant(new Enseignant(3, "nom3", "prenom3"));
ts.ajouterEnseignant(new Enseignant(2, "nom2", "prenom2"));
 System.err.println("\t displayEnseignants");
ts.displayEnseignants();
System.err.println("\tEnseignant(3, \"nom3\", \"prenom3\"):"+ts.rechercherEnseignant(new Enseignant(3, "nom3", "prenom3")));
 System.err.println("\tsupprimerEnseignant");
ts.supprimerEnseignant(new Enseignant(3, "nom3", "prenom3"));

 System.err.println("\tdisplayEnseignants apres supprimer un Enseignant ");
ts.displayEnseignants();





    }
    
}
