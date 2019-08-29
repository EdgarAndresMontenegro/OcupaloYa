import java.util.ArrayList;
import java.util.HashMap;
/**
 * La clase Arrendatario se encarga de definir las funciones y precisar
 * el rango de usabilidad del inquilino, para que pueda buscar y darse a conocer en 
 * la aplicación.
 * 
 * @author (Edmonblack&&Cali) 
 * 
 */
public class Arrendatario extends Usuario
{
      // esta variable lo que hace es almacenarme los comentarios 
      //que el arrendatario pueda tener
    private HashMap<Arrendador,String> comentarios;

    /**
     * Constructor por objetos de la clase Arrendatario
     * aquí se inicializan las variables heredadas de usuario
     */
    public Arrendatario(String nombre, String contraseña,String correo,int telefono,String genero)
    {
        // variables de Usuarios que se heredan
        super(nombre, contraseña, correo, telefono,genero);
        comentarios = new HashMap<Arrendador,String>();
    }
    
    /**
     * El Arrendatario consulta en base de datos los el cupo q quiera ver de un arrenadador por su tipo
     */
    public void buscarPorTipo(Arrendador a, String tipo){
        ArrayList<Cupos> lista = a.getInmueble();
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("**************Lista de Cupos del tipo: "+tipo+" ****************");
        for(int i=0; i<=lista.size()-1; i++){
            if(lista.get(i).getTipo()==tipo){
                System.out.println(i+" "+lista.get(i)+"\n");
            }
        }
    }
    
    /**
     *Busca los inmuebles de la clase Arrendador, ya publicados 
     */
    public void buscarTodosLosCupos(Arrendador a){
        ArrayList<Cupos> lista = a.getInmueble();
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("**************Lista de Cupos de todos los cupos****************");
        for(int i=0; i<=lista.size()-1; i++){
            System.out.println(i+" "+lista.get(i)+"\n");
        }
    }
    
    /**
     *Busca los inmuebles por el filtro de barrios, para que la
     *busqueda sea mas limitada
     */
    public void buscarPorBarrio(Arrendador a, String barrio){
        ArrayList<Cupos> lista = a.getInmueble();
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("**************Lista de Cupos por barrio: "+barrio+" ****************");
        for(int i=0; i<=lista.size()-1; i++){
                if(lista.get(i).getBarrio()==barrio){
                System.out.println(i+" "+lista.get(i)+"\n");
            }
        }
    }
    
    /**
     *El arrendatario puede poner un comentario de como fue su experiencia
     *con el arrendador
     */
    public void ponerComentario(Arrendador a, String comentario){
        comentarios.put(a,comentario);
        System.out.println("-----------------------------------------------------------------------");
        System.out.println("Se ha registrado el comentario exitosamente");
    }
    
    /**
     *Del mismo modo, el usuario puede eliminar comentarios ya hechos 
     */
    public void eliminarComentario(Arrendador a, String comentario){
        if(comentarios.containsKey(a)==true){
            comentarios.remove(a);
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("Se ha eliminado el comentario exitosamente");
        }
        else{
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("El comentario ha dicho Arrendador no existe");
        }
    }
    
    /**
     *busca todos los comentarios realizados y los retorna 
     */
    public HashMap<Arrendador,String> getComentarios(){
        return comentarios;
    }
}





