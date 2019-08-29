/**
 * en esta clase se ponen los metodos fundamentales y las variables 
 * de los 3 usuarios que hay .
 * 
 * @author (Edmonblack&&Cali) 
 * @version (a version number or a date)
 */
public abstract class Usuario 
{
    // Estos son los datos de usuario
    private String nombre;
    private String contraseña;
    private String correo;
    private int telefono;
    private String genero;

    /**
     * Constructor para inicializar las variabiables funcamentales que 
     * cada usuario debe ingresar
     */
    public Usuario(String nombre, String contraseña,String correo,int telefono, String genero)
    {
        this.nombre=nombre;
        this.contraseña=contraseña;
        this.correo=correo;
        this.telefono=telefono;
        this.genero=genero;
    }

    /**
     * Funciones para consultar y cambiar los datos personales
     */
    
    public void setNombre(String nombre){
        this.nombre=nombre;
    }
    
    
    public String getNombre(){
        return nombre;
    }
    public void setContraseña(String contraseña){
        this.contraseña=contraseña;
    }
    public String getContraseña(){
        return contraseña;
    }
    public void setCorreo(String correo){
        this.correo=correo;
    }
    public String getCorreo(){
        return correo;
    }
    public void setTelefono(int telefono){
        this.telefono=telefono;
    }
    public int getTelefono(){
        return telefono;
    }
}
