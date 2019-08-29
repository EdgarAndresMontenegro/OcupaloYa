import java.util.ArrayList;

/**
 * Se declaran las funciones basicas que el publicitario va a poder
 * hacer en la apliacion.
 * 
 * @author (Edmonbkack&&Cali) 
 * @version (a version number or a date)
 */
public class Publicitario extends Usuario
{
    // instance variables - replace the example below with your own
    private boolean control; //Variable que controla si el publicitario pago o no un plan para publicar contenido
    private ArrayList<Publicidad> inmueble; //Guardo los registros de publicaciones que va a hacer el publicitario
    private int plan; //El plan q contrato el pulicitario
    /**
     * Constructor for objects of class Usuarios donde se inicializan 
     * las variables propias y las heredas
     */
    public Publicitario(String nombre, String contraseña,String correo,int telefono, String genero)
    {
        super(nombre, contraseña, correo, telefono,genero);
        this.control = false;
        inmueble = new ArrayList<Publicidad>();
    }
        /**
         * Esta funcion le permite a un publicitario hacer una publicacion
           */
        public void publicarPublicitario(Publicidad p)
        {
            if( control == true)
            {
                System.out.println("-----------------------------------------------------------------------");
                System.out.println("Publicacion hecho con exito");
                inmueble.add(p);
            }
            else 
            {
                System.out.println("-----------------------------------------------------------------------");
                System.out.println("Primero debe contratar un plan\n- 1 mes vale $10.000\n- 3 meses valen $25.000\n- 7 meses valen $50.000");
            }
        }
        public void consultarPublicitario(Publicidad p)
        {
            if( control == true)
            {
                if(inmueble.contains(p) == true){
                    System.out.println("-----------------------------------------------------------------------");
                    System.out.println("Esta publicacion esta en vigencia");
                }
                else{
                    System.out.println("-----------------------------------------------------------------------");
                    System.out.println("Esta publicacion no esta en vigencia");
                }
            }
            else 
            {
                System.out.println("-----------------------------------------------------------------------");
                System.out.println("Primero debe contratar un plan\n- 1 mes vale $10.000\n- 3 meses valen $25.000\n- 7 meses valen $50.000");
         }
        }
    
            /**
               * Esta funcion esta bien escrita
           */
    
          public String contratarPlan(int plan )
          {
                if(plan == 10000)
                {
                  this.control = true; //Contrata un plan y la variable de control se convierte en verdadera
                  this.plan = plan; //Guarda en el atributo plan el valor que pago para publicar.
                  return "Tiene 1 mes pagos y ha cancelado "+plan;
                }
                else if(plan == 25000)
                {
                    this.control = true;
                    this.plan = plan;
                    return  "Tiene 3 meses pagos y ha cancelado "+plan;
                }
                else if(plan == 50000)
                {
                    this.control = true;
                    this.plan = plan;
                    return "tiene 7 meses pagos y ha cancelado "+plan;
                }
                System.out.println("-----------------------------------------------------------------------");
                System.out.println("\n- 1 mes vale $10.000\n- 3 meses valen $25.000\n- 7 meses valen $50.000"); 
                return "Ingrese las tarifas estipuladas, gracias";
            }
            /**
             * Esta funcion me retorna cual fue el plan q contrato el publicitario
               */
        public String plan()
        {
            if (control==true)
            {
                if(plan == 10000)
                {
                    return "Tiene 1 mes pagos y ha cancelado "+plan;
                }   
                else if(plan == 25000)
                {
                return  "Tiene 3 meses pagos y ha cancelado "+plan;
            }   
                else if(plan == 50000)
                {
                    return "tiene 7 meses pagos y ha cancelado "+plan;
                } 
            }
            System.out.println("-----------------------------------------------------------------------");
            System.out.println("\n- 1 mes vale $10.000\n- 3 meses valen $25.000\n- 7 meses valen $50.000");
            return "No ha adquirido ningun plan";
        }
        /**
         * Esta funcion me coloca la varible de control en false para que el publicitario no pueda ejecutar publicaciones
             */
    public String cancelarPlan()
    {
        if(control == true){
            control = false;
            return "Su plan se ha cancelado exitosamente";
        }
        else{
            return "Usted no ha contratado ningun plan actualmente";
        }
    }
    
    /**
     *Esta funcion me eilimina una publicacion existente
     */
    public String eliminarPublicacion(Publicidad anuncio)
    {
        if(inmueble.isEmpty()==true)
        {
            return "No hay publicaciones";
        }
         else if( inmueble.contains(anuncio)==true)
        {
            inmueble.remove(anuncio);
            return "La eliminación ha sido exitosa";
        }
        else
        {
            return "No existe dicha publicacion";
        }
    }
}
