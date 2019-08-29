import java.util.ArrayList;
/**
 * Esta clase me define los limites y las funciones del arrendador, clasifica
 * muestra y extrae con una serie de funciones para la maniobrabilidad 
 * del arrendador.
 * 
 * @author (Edmonblack&&Cali) 
 * @version (a version number or a date)
 */
public class Arrendador extends Usuario
{
    // 
    private ArrayList<Cupos> inmueble; //En esta variable almacenare los datos de todos los cupos pertenecientes al propietario 
    
    /**
     * Constructor donde muestra las variables y las inicializa, hereda de usuario 
     */
    public Arrendador(String nombre, String contraseña,String correo,int telefono, String genero)
    {
        super( nombre, contraseña, correo, telefono, genero);
        inmueble = new ArrayList<Cupos>(); 
    }
    
    /**
     *Devuelve todos los cupos disponibles ya ingresados 
     */
    public ArrayList<Cupos> getInmueble(){
        return inmueble;
    }
    
    /**
     *registra los inmuebles para así ofrecerlos 
     */
    public void registrarCupo(Cupos c){
        if(inmueble.contains(c)==true){ 
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada ya se encuentra registrada en la base de datos");
        }
        else{
            inmueble.add(c);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha registrado el cupo con exito");
        }
    }
    
    /**
     *inicia el proceso y la interaccion con el arrendatario, cambia la disponibilidad
     *y registra al arrendatario
     */
    public void registrarResidente(Arrendatario i, Cupos c){
        if(inmueble.contains(c)==true){
            if(c.getDisponibilidad() == true){
            c.setInquilino(i);
            c.setDisponibilidad();
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha registrado el nuevo inquilino con exito");
           }
           else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("El establecimiento cuenta actualmete con un residente");
            }
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
            }
    }
    
    /**
     *Elimima al residente, cambia el inquilino y la disponibilidad para que 
     *el cupo quede disponible otra vez
     */
    public void eliminarResidente(Cupos c){
       if(inmueble.contains(c)==true){ 
           if(c.getInquilino() != null){
                c.setInquilino(null);
                c.setDisponibilidad();
                System.out.println("-----------------------------------------------------------------------");
                System.out.println("Se ha eliminado el residente con exito");
           }
           else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("No hay un residente asociado con la sucursal actualmente");
           }
      }
      else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
      }
    }
    
    /**
     *se cambia al inquilino existente, pero sigue sin cambiarse la disponibilidad 
     */
    public void cambiarResidente(Arrendatario a, Cupos c){
        if(inmueble.contains(c)==true){ 
            c.setInquilino(a);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Ahora la sucursal tiene un nuevo inquilino");
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
        }
    }
    
    /**
     *se agrega la imagen del lugar
     */
    public void agregarImagen(String img, Cupos c){
        if(inmueble.contains(c)==true){ 
            c.agregarImagen(img);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha agregado la imagen exitosamente");
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
        }
    }
    
    /**
     *Se elimina una imagen si existe
     */
    public void eliminarImagen(String img, Cupos c){
        if(inmueble.contains(c)==true){ 
            c.eliminarImagen(img);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha eliminado la imagen exitosamente");
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
        }
    }
    
    /**
     *se elimina un cupo si existe
     */
    public void eliminarCupo(Cupos c)
    {
        if(inmueble.contains(c)==true){ 
            inmueble.remove(c);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha eliminado la Sucursal exitosamente");
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("La sucursal ingresada no se encuentra registrada en la base de datos");
        }
    }
}
