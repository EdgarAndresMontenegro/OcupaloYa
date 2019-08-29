import java.util.Scanner;
/**
 * Clase principal, aqui se ejecuta los procesos y la aplicacion como tal.
 * 
 * @author (Edgar Montenegro, Alejandro Ramirez) 
 * @version (24/7/2019)
 */
public class Aplicacion
{
    // instance variables - replace the example below with your own
    private static Arrendador propietario;
    private static Arrendatario inquilino;
    private static Publicitario manager;
    private static Publicidad anuncio;
    private static Cupos cupo1;
    private static Cupos cupo2;
    private static Cupos cupo3;
    private static Mapa localidad;

    /**
     * Constructor for objects of class Aplicacion
     */
    public static void app()
    {
        
        
        
    }
    /**
     * An example of a method - replace this comment with your own
     * 
     * @param  y   a sample parameter for a method
     * @return     the sum of x and y 
     */
    public static void main(String[] arg)
    {
        int res = 0;
        Scanner tc = new Scanner(System.in);
        boolean salir = false;
        
        System.out.println("Bienvenidos al Software Ocupalo");
        System.out.println("Que deseas hacer:");
        System.out.println("1. Crear un Arrendatario");
        System.out.println("2. Crear un Arrendador");
        System.out.println("3. Crear un Publicitario");
        System.out.println("4. Crear una Publicacion");
        System.out.println("5. Crear un Cupo");
        System.out.println("6. Buscar mapa");
        System.out.println("7. Salir");
        res = tc.nextInt();
        
        while(!salir){
            switch(res)
            {
                case 1:
                    System.out.println("-------------------------------------------------");
                    System.out.println("Ha entrado 1");
                    inquilino = new Arrendatario("alejandro","alejo123","alejo@gmail.com",12345,"hemafrodita");
                    System.out.println("Se ha creado el usuario");
                    break;
                    
                case 2:
                    System.out.println("-------------------------------------------------");
                    System.out.println("Registro de Usuario Arrendador");
                    System.out.println("Escriba el nombre de usuario");
                    String nombre = tc.nextLine();
                    String nombre2 = tc.nextLine();
                    System.out.println("Escriba la contraseña");
                    String contraseña2 = tc.nextLine();
                    System.out.println("Escriba el correo");
                    String correo2 = tc.nextLine();
                    System.out.println("Digite el telefono");
                    int telefono2 = tc.nextInt();
                    System.out.println("genero (M o F)");
                    String genero = tc.nextLine();
                    String genero2 = tc.nextLine();
                    propietario = new Arrendador(nombre2,contraseña2,correo2,telefono2,genero2); 
                    System.out.println("Se ha creado el Arrendador exitosamente, bienvenido : "+propietario.getNombre());
                    break;
                case 7:
                    salir = true;
                    break;
                default:
                    System.out.println("Escriba una opcion correcta");
                    res = tc.nextInt();
                    
            }
            System.out.println("-------------------------------------------------");
            System.out.println("Deseas realizar otra accion? Digita la accion q deseas realizar");
            res = tc.nextInt();
        }
        System.out.println("-------------------------------------------------");
        System.out.println("Gracias por utlizar nuestros servicios :D");
    }
}
