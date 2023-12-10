
public class Enseignant {
    private int id;
    private String nom;
    private String prenom;
    
   public Enseignant(){
       
    }

    public Enseignant(int id , String nom , String prenom){
        this.id=id;
        this.nom=nom;
        this.prenom=prenom;
    }
     
public int getId(){
    return this.id;
}
  public String getNom(){
    return this.nom;
}      
    public String getPrenom(){
    return this.prenom;
}    
  public void setId(int id){
      this.id=id;
  }      
    public void setNom(String nom){
      this.nom=nom;
  }     
   public void setPrenom(String prenom){
      this.prenom=prenom;
  }         
   
    @Override
   public boolean equals(Object obj){
       if(obj==null)  return false;
       
       if(!(obj instanceof Enseignant))  return false;
       
       if(this.id != ((Enseignant)obj).getId())  return false;
        
       return true;
   }

  
    @Override
    public String toString(){
        return("Enseignant: "+"L'id :"+this.id+"Nom :"+this.nom+"Prenom :"+this.prenom);
        
    } 
}
