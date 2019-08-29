import java.util.ArrayList;
/**
 *en publicidad se manejaran todos los metodos que me controlen los anuncios.
 * 
 * @author (Edmonblack&&Cali) 
 * @version (a version number or a date)
 */
public class Publicidad
{
    // se instancian las variables 
    
    private String eslogan;
    private String descripcion;
    private ArrayList<String> imagenes;
    private String tipo;
    

    /**
     * Constructor donde se inicializan y se requieren las variables 
     * para así crear la publidad
     */
    public Publicidad(String eslogan, String descripcion, String tipo)
    {
        imagenes =new ArrayList();
        this.eslogan = eslogan;
        this.descripcion = descripcion;
        this.tipo = tipo;
    }
    
    /**
     *se pasa el eslogan de la publicidad
     */
    public void setEslogan(String eslogan){
        this.eslogan = eslogan;
    }
    
    /**
     *me muestra el actual eslogan
     */
    public String getEslogan(){
        return eslogan;
    }
    
    /**
     *pide una breve descripcion de la publicidad
     */
    public void setDescripcion(String descripcion){
        this.descripcion=descripcion;
    }
    
    /**
     *muestra la descripcion actual
     */
    public String getDescripcion(){
        return descripcion;
    }
    
    /**
     *se pasa el tipo de publicidad 
     */
    public void setTipo(String tipo){
        this.tipo=tipo;
    }
    
    /**
     *devuelve el tipo de la publicidad
     */
    public String getTipo(){
        return tipo;
    }
    
    /**
     *se le pude adicionar varias imagenes a la publicidad 
     */
    public void adicionarImagen(String img){
        imagenes.add(img);
    }
    
    /**
     *controla la existencia de imagenes
     */
    public boolean existeImagen(String img){
        if(imagenes.contains(img) == true){
            return true;
        }
        else{
            return false;
        }
    }
    
    /**
     *me controla la existencia de imagen y la elimina
     */
    public void eliminarImagen(String img){
        if(imagenes.contains(img)==true)
        {
            imagenes.remove(img);
        }
        else
        {
            System.out.println("No existe la imagen#"+img);
        }
    }
    
    /**
     *vacia todas las imagenes hayan
     */
    public void vaciarArreglo(){
        imagenes.clear();
    }
}
