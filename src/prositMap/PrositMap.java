/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package prositMap;

/**
 *
 * @author SALMA
 */
public class PrositMap {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {

        Employé e1 = new Employé(50000000, "10253B3", "DAMAK", "Salma");
        Employé e2 = new Employé(20000000, "10263B3", "HMEIDI", "Aziz");
        Employé e3 = new Employé(60000000, "10273B3", "NAFII", "Hamdi");
        Employé e4 = new Employé(40000000, "10283B3", "KOLSI", "Syrine");
        Employé e5 = new Employé(15000000, "10293B3", "AHMADI", "Sarra");

        Département d1 = new Département(1, "Finance");
        Département d2 = new Département(10, "Marketing");
        Département d3 = new Département(5, "Production");

        System.out.println("++++++++++++++++++++ HashMap++++++++++++++++++++++++");

        SocieteHashMap shm = new SocieteHashMap();

        shm.ajouterEmployeDepartement(e1, d1);
        shm.ajouterEmployeDepartement(e2, d2);
        shm.ajouterEmployeDepartement(e3, d2);
        shm.ajouterEmployeDepartement(e4, d3);

        shm.afficherLesEmployesLeursDepartements();

        System.out.println("***********************************");

        System.out.println("les employés : ");
        shm.afficherLesEmployes();

        System.out.println("***********************************");

        System.out.println("les département : ");
        shm.afficherLesDepartements();

        System.out.println("***************************");

        shm.afficherDepartement(e2);
        System.out.println("***************************");

        System.out.println(" recherche de e1 : " + shm.rechercherEmploye(e1));

        System.out.println(" recherche de e5 : " + shm.rechercherEmploye(e5));

        System.out.println("***************************");

        System.out.println(" recherche du dép d3 : " + shm.rechercherDepartement(d3));

        System.out.println("***************************");
        shm.supprimerEmploye(e2);
        shm.afficherLesEmployesLeursDepartements();

        
        System.out.println("");
                System.out.println("++++++++++++++++++++TreeMap++++++++++++++++++++++++");
        System.out.println("");

        SocieteTreeMap stm = new SocieteTreeMap();

        stm.ajouterEmployeDepartement(e1, d1);
        stm.ajouterEmployeDepartement(e2, d2);
        stm.ajouterEmployeDepartement(e3, d2);
        stm.ajouterEmployeDepartement(e4, d3);

        stm.afficherLesEmployesLeursDepartements();

        System.out.println("***********************************");

        System.out.println("les employés : ");
        stm.afficherLesEmployes();

        System.out.println("***********************************");

        System.out.println("les département : ");
        stm.afficherLesDepartements();

        System.out.println("***************************");

        stm.afficherDepartement(e2);
        System.out.println("***************************");

        System.out.println(" recherche de e1 : " + stm.rechercherEmploye(e1));

        System.out.println(" recherche de e5 : " + stm.rechercherEmploye(e5));

        System.out.println("***************************");

        System.out.println(" recherche du dép d3 : " + stm.rechercherDepartement(d3));

        System.out.println("***************************");
        stm.supprimerEmploye(e2);
        stm.afficherLesEmployesLeursDepartements();
                System.out.println("***************************");

        
                System.out.println("++++++++++++++++++++ HashMap V2 ++++++++++++++++++++++++");

        SocieteHashMapV2 shmv2 = new SocieteHashMapV2();

        shmv2.ajouterEmployeDepartement(e1, d1);
        shmv2.ajouterEmployeDepartement(e2, d2);
        shmv2.ajouterEmployeDepartement(e3, d2);
        shmv2.ajouterEmployeDepartement(e4, d3);
        shmv2.ajouterEmployeDepartement(e4, d2);

        shmv2.afficherLesEmployesLeursDepartements();

        System.out.println("***********************************");

        System.out.println("les employés : ");
        shmv2.afficherLesEmployes();

        System.out.println("***********************************");

        System.out.println("les département : ");
        shmv2.afficherLesDepartements();

        System.out.println("***************************");

        shmv2.afficherDepartement(e2);
        System.out.println("***************************");

        System.out.println(" recherche de e1 : " + shmv2.rechercherEmploye(e1));

        System.out.println(" recherche de e5 : " + shmv2.rechercherEmploye(e5));

        System.out.println("***************************");

        System.out.println(" recherche du dép d3 : " + shmv2.rechercherDepartement(d3));

        System.out.println("***************************");
        shmv2.supprimerEmploye(e2);
        shmv2.afficherLesEmployesLeursDepartements();

        
        System.out.println("");
        
                System.out.println("");
                System.out.println("++++++++++++++++++++TreeMapV2++++++++++++++++++++++++");
        System.out.println("");

        SocieteTreeMapV2 stmv2 = new SocieteTreeMapV2();

        stmv2.ajouterEmployeDepartement(e1, d1);
        stmv2.ajouterEmployeDepartement(e2, d2);
        stmv2.ajouterEmployeDepartement(e3, d2);
        stmv2.ajouterEmployeDepartement(e4, d3);

        stmv2.afficherLesEmployesLeursDepartements();

        System.out.println("***********************************");

        System.out.println("les employés : ");
        stmv2.afficherLesEmployes();

        System.out.println("***********************************");

        System.out.println("les département : ");
        stmv2.afficherLesDepartements();

        System.out.println("***************************");

        stmv2.afficherDepartement(e2);
        System.out.println("***************************");

        System.out.println(" recherche de e1 : " + stmv2.rechercherEmploye(e1));

        System.out.println(" recherche de e5 : " + stmv2.rechercherEmploye(e5));

        System.out.println("***************************");

        System.out.println(" recherche du dép d3 : " + stmv2.rechercherDepartement(d3));

        System.out.println("***************************");
        stmv2.supprimerEmploye(e2);
        stmv2.afficherLesEmployesLeursDepartements();
                System.out.println("***************************");
        
        
    }

}
