import java.util.ArrayList;
import javax.swing.*;
import java.awt.*;
/**
 * en la clase mapa lo que se implementará, será, las funciones matemaricas para
 * por medio del radio encerrarme un circulo al rededor y así encerrarme los cupo dentro 
 * de él, ademas hay filtro tales como el barrio y la direccion .
 * 
 * @author (Edmonblack&&Cali) 
 * @version (a version number or a date)
 */
public class Mapa
{
    // instance variables - replace the example below with your own
    private String direccion;
    private String barrio;
    private int radio;

    /**
     * Constructor for objects of class Mapa
     */
    public Mapa(String direccion, String barrio, int radio)
    {
        this.direccion = direccion;
        this.barrio = barrio;
        this.radio = radio;
    }
    
    /**
     * me busca todas los inmuebles de un arrendador 
     */
    public ArrayList<Cupos> buscarResidencias(Arrendador a){
        
        ArrayList<Cupos> lista = a.getInmueble();
        ArrayList<Cupos> solicitados = new ArrayList<Cupos>();
        
        for(int i=0; i<=lista.size()-1; i++){
            
            if(lista.get(i).getBarrio()==barrio){
                solicitados.add(lista.get(i));
            }
        }
        
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("Se encontraron un total de "+solicitados.size()+"\n");
        return solicitados;
    }
    
    /**
     *me genera el circulo con un radio
     */
    public void paint(Graphics g)
    {
          g.drawOval(40, 40, 60, 60);
    }
    
}
