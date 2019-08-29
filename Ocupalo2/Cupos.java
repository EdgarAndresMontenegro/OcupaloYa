import java.util.ArrayList;
/**
 * En esta clase ya se empiezan a juntar y a llamar las clase arrendador y arendatario
 * para unificar las funciones de ambos, el cupo se crea y lo tomamos con un ya como 
 * independiete, para asi ser mostrado a los usuarios,así empezarle a dar
 * cuerpo a la aplicaion.
 * 
 * @author (Edmonblack&&Cali) 
 * @version (a version number or a date)
 */
public class Cupos
{
    // instance variables - replace the example below with your own
    private Arrendatario inquilino;//se llaman las metodos de clase Arrendatario
    private Arrendador propietario;//se llaman las metodos de clase Arrendador
    private boolean disponibilidad;// aqui la disponibilidad es binaria
    private String direccion;//se necesita la direccion del cupo
    private String barrio;//el barrio donde se ubica el cupo
    private ArrayList<String> imagenes;//se guardan en un arreglo las imagenes pertinentes del cupo 
    private String tipo;//me dice el tipo del cupo, apto, casa, etc
    private int precio;//se guarda el precio del cupo
    
    /**
     * Constructor se inicializan las variables y se ingresan los datos del 
     * cupo
     */
    public Cupos(Arrendador a, String direccion, String barrio, String imagen, String tipo, int precio)
    {
        propietario = a;
        inquilino = null;
        disponibilidad =true;
        this.direccion = direccion;
        this.barrio = barrio;
        this.tipo = tipo;
        this.precio = precio;
        imagenes = new ArrayList();
        imagenes.add(imagen);
    }
    
    /**
     * se registra un ocupante del cupo, cambia la disponibilidad al se ocupado
     * y esta controlado por si ya hay alguien 
     */
    public void registrarResidente(Arrendatario i){
        if(disponibilidad == true){
        inquilino = i;
        disponibilidad = false;
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("Se ha registrado el nuevo inquilino con exito");
            }
       else{
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("El establecimiento cuenta actualmete con un residente");
            }
    }
    
    /**
     *se elimina al quien esta en el cupo, queda desocupado y disponibilidad cambia
     * y esta controlado por si no hay nadie 
     */
    public void eliminarResidente(){
        if(inquilino != null){
        inquilino = null;
        disponibilidad =true;
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("Se ha eliminado el residente con exito");
       }
       else{
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("No hay un residente asociado con la sucursal actualmente");
       }
    }
    
    /**
     *se cambia al residente, y si no tiene nadie, se le asigna 
     *uno nuevo
     */
    public void cambiarResidente(Arrendatario a){
        inquilino = a;
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("Ahora la sucursal tiene un nuevo inquilino");
    }
    
    /**
     *se agregan las imagenes del cupo 
     */
    public void agregarImagen(String img){
        imagenes.add(img);
    }
    
    /**
     *elimina las imagenes que se le hayan puesto, y me controla que no 
     *se vaya a eliminar algo que no exista
     */
    public void eliminarImagen(String img){
            if (imagenes.contains(img)==true){
                    imagenes.remove(img);
                    System.out.println("-----------------------------------------------------------------------");
                    System.out.println("Se ha eliminado la imagen exitosamente");
                }
            else{
                    System.out.println("-----------------------------------------------------------------------");
                    System.out.println("No existe esa imagen, no se ha eliminado nada");
                }
    }
    
    
    /**
     *se le ingresa un propietario al cupo
     */
    public void setPropietario(Arrendador propietario){
            this.propietario = propietario;
    }
    
    /**
     *me muestra el propietario del cupo 
     */
    public Arrendador getPropietario(){
            return propietario;
    }
    
    /**
     *se le agrega el inquilino, es quien va a vivir 
     */
    public void setInquilino(Arrendatario inquilino){
            this.inquilino = inquilino;
    }
    
    /**
     *me mustra cual es el actual inquilino del cupo
     */
    public Arrendatario getInquilino(){
            return inquilino;
    }
    
    /**
     *aqui se controla la disponibilidad del cupo, lo que hace es cambiara 
     *de estado 
     */
    public void setDisponibilidad(){
        if(disponibilidad == true){
            disponibilidad = false;
        }
        else{
            disponibilidad = true;
        }
    }
    
    /**
     *me retorna la disponibilidad del cupo 
     */
    public boolean getDisponibilidad(){
        return disponibilidad;
    }
    
    /**
     *se le puede cambiar la direccion inicial al cupo
     */
    public void setDireccion(String direccion){
        this.direccion = direccion;
    }
    
    /**
     *retorna la direccion actual
     */
    public String getDireccion(){
        return direccion;
    }
    
    /**
     *se le puede cambiar el barrio inicial
     */
    public void setBarrio(String barrio){
        this.barrio = barrio;
    }
    
    /**
     *me retorna el barrio actualdel cupo
     */
    public String getBarrio(){
        return barrio;
    }
    
    /**
     *me cambia el tipo inicial del inmueble
     */
    public void setTipo(){
        this.tipo=tipo;
    }
    
    /**
     *me retorna el tipo de inmueble 
     */
    public String getTipo(){
        return tipo;
    }
}
