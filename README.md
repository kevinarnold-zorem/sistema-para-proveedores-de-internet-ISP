# gimax2
SISTEMA PARA ISP
SISTEMA PARA PROVEEDORES DE INTERNET

EL SISTEMA COMPREN POR:
1.-BASES- Que son las tienen equipos,antenas para repartir,distribuir internet a sus clientes por lo tanto en primer caso la base se crea
primero.Las bases tiene como reporte predefinido los equipos que le pertenecen y los clientes que le pertenece a esa Base.
2.-EQUIPOS- Los equipos,antenas que reparte o distribuyen el internet, al crear el equipo se tiene que hacer referencia a que base pertenece,
los atributos estan failmente para agregar y modificar el tipo de dato segun no afecte la referencia la tabla Bases.
3.-CLIENTES. Los clientes al registrarse se crea un fecha de pago o fecha de instalacion, la fecha registrada se tomara como punto de partida
para la generacion de pagos mensuales,tambien se tiene que hacer referencia al equipo que recepciona el internet el cliente.
Para la busqueda de equipos se usa un COMBOBOX con una lista de los equipos registrados separados por la base a la que pertenecen para evitar
problemas.
4.-PLAN DE PAGOS.- El plan de pagos para definir el pago fijo mensual del cliente.
5.-REGISTRO DE PAGOS-El registro mensualidades esta validado en su totalidad, si hay alguna falla avisadme.
Los pagos se realizan por Cliente seleccionando, se auto carga el monto fijo de pago mensual.
Al abonar el mes se seleecciona la fecha de pago que se utilizara solo el mes y año para definir el mes de pago, las validaciones ya realizadas
son que si se elije una fecha anterior a la fecha de registro del cliente retarnara null y no lo registrar, si el monto del pago registrado
es menor al pago fijo mensual la mensualidad sera registrada con deuda restante del total.


Por ultimo esta por terminar la funcionalidad de niveles de USUARIOS que esta predefinido "admin" y "user" el admin-contara con permisos de administrador y el user-con permisos solo de registro de abono de mensualidades.

Espero que sea de su utilidad.

DEMO: http://devfinest.com/gimax2

USER:admin

PASS:admin

