# test-backend

La aplicación resuelve el problema [cube summation](https://www.hackerrank.com/challenges/cube-summation) de la pagina [HakerRank](https://www.hackerrank.com).
Las capas con que cuenta la aplicación son las misma de Laravel, ya que se utilizo dicho framework, pero las que se usan en este caso son:

- La **vista** (*/resource/views/home.blade.php*), la cual es usada para mostrar un formulario para la entrada de datos y visualización de la solución del problema, en ésta se utiliza *AJAX* para transmitir los datos del formulario.
- El **controlador** (*app/Http/Controllers/SolutionController.php*), el cual contiene la lógica de la aplicación, que en este caso es solucionar el problema *cube summation*.
- Las **rutas** (*app/Http/routes.php*), donde se registran las rutas de la aplicación, en este caso el home ('/') que muestra el formulario y la ruta que recibe los datos por POST ('/summ') y redirige al controlador para solucionar el problema, el cual a su vez da la solución en texto plano.

> **Nota:** no se uso la capa de modelo debido a que no se hizo uso de base de datos.

####**Controlador**
Como se había dicho antes, el controlador es el que contiene la lógica de la aplicación, para ello se crearon dos clases, la clase auxiliar ***Point.php*** (*/app/Point.php*), que solamente representa un objeto usado por la otra clase, ***SolutionCotroller.php***, que es la encargada de resolver el problem el cual es pasado como parámetro a través del objeto *Response* en formato de texto plano y es procesada para obtener cada uno de los comando que representan el problema, una vez obtenida la solución, se retorna como texto plano, y si hay errores en la ejecución también se retorna en dicha salida.
