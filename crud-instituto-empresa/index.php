
<?php include("conexion.php");?>
<?php include("includes/header.php");?>


<div class="container p-4">
    <div class="row">
         <div class="col-md-4">

                 <!--Buscar tarea-->
        <div class="card card-body">
            <h3>Buscar empleado</h3>
            <form action="index.php" method="post">
                 <input type="text" name="dni" class="form-control" placeholder="DNI del empleado">

                    <br>
                <input type="submit" class="btn btn-secondary btn-block float-start " name="todos-empleados" value="Todos los empleados">
                 <input type="submit" class="btn btn-success btn-block float-end " name="buscar-empleado" value="Buscar">
            </form>
        </div>
<br>

        </div>
        <div class="col-md-8">
        
        <!--Mensaje de tarea-->

        <?php
        
        if(isset($_SESSION['message'])) { ?>
    
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"  onclick="location.href='index.php'"></button>
            </div>
        
            <?php session_unset(); } ?>

        <!--Guardar tarea-->
               <div class="card card-body">
            <h3>Nuevo empleado</h3>
            <form action="guardar.php" method="post">
                <div class="form-group">
                    <label>DNI:</label>
                    <input type="text" name="dni" class="form-control" placeholder="Ingresar DNI" autofocus><br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ingresar Nombre" autofocus><br>
                    <label>Apellido:</label>
                    <input type="text" name="apellido" class="form-control" placeholder="Ingresar Apellido" autofocus><br>
                    <label>Teléfono:</label>
                    <input type="text" name="telefono" class="form-control" placeholder="Ingresar Teléfono" autofocus><br>
                    <label>Provincia:</label>
                    <input type="text" name="Provincia" class="form-control" placeholder="Ingresar Provincia" autofocus><br>
                    <label>Código Postal:</label>
                    <input type="text" name="Codigo Postal" class="form-control" placeholder="Ingresar Código Postal" autofocus><br>


        <!-- NUEVOS CAMPOS AL REGISTRO DE EMPLEADOS-->

        <!-- LOCALIDAD -->
                <label>Localidad:</label>
                   <select name="localidad" class="form-control">
                    <option value="San Vicente">San Vicente</option>
                    <option value="Monte Grande">Domselaar</option>
                    <option value="Brandsen">Brandsen</option>
                    <option value="Canning">Canning</option>
                    <option value="Monte Grande">Monte Grande</option>
                   </select><br>
        
        <!-- DIRECCIÓN-->
                <label>Dirección:</label>
                <input type="text" name="direccion" class="form-control" placeholder="Ingresar dirección"><br>

        <!-- DEPARTAMENTO -->
                <label>Departamento:</label>
                    <select name="departamento" class="form-control">
                     <option value="Ventas">Ventas</option>
                     <option value="Producción">Producción</option>
                     <option value="Marketing">Marketing</option>
                     <option value="Administración">Administración</option>
                     <option value="Gerencia">Gerencia</option>
                    </select><br>
                </div>
                <br>
                <input type="submit" class="btn btn-success btn-block float-end " name="guardar-empleado" value="Guardar empleado">
            </form>
            </div>

	<script type="text/javascript">
	    function confirmar(){
	    return confirm('¿Quiere borrar el registro?');
	} 
    </script> 
            
        <!--Tabla-->
        <h2 class="text-center mt-4 mb-3">Empleados registrados</h2>
        <table class="table table-responsive table-bordered">
            <br>
            <br>

            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                    <th>Departamento</th>
                    <th>Direccion</th>
                    <th>Localidad</th>
                </tr>
            </thead>
            
              <!--Consulta con el select de todos los datos en tbody-->

            <tbody>

            <?php
                  
                       
                     if (isset($_POST['buscar-empleado'])){
                        
                        $apellido = $_POST['dni'];
    
                        $query = "select * from empleados where dni like '%$dni' ";
                        $resultado = mysqli_query($conexion, $query);
    
                        while($row = mysqli_fetch_array($resultado)) { ?>
                        <tr>
                            <td> <?php echo $row['dni']; ?></td>
                            <td> <?php echo $row['nombre']; ?></td>
                            <td> <?php echo $row['apellido']; ?></td>
                            <td> <?php echo $row['telefono']; ?></td>
                            <td> <?php echo $row['departamento']; ?></td>
                            <td> <?php echo $row['direccion']; ?></td>
                            <td> <?php echo $row['localidad']; ?></td>
                            <td>

                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">Ver</a>    
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Editar</a>
                            <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a>
                      
                            </td>
                        </tr>

                    
                        <?php }

                    } else  { ?>
            
                <?php 

                $query = "select * from empleados";
                $resultado = mysqli_query ($conn, $query);

                while($row = mysqli_fetch_array($resultado)) { ?>
                    <tr>
                        <td> <?php echo $row['dni']; ?></td>
                        <td> <?php echo $row['nombre']; ?></td>
                        <td> <?php echo $row['apellido']; ?></td>
                        <td> <?php echo $row['telefono']; ?></td>
                        <td> <?php echo $row['departamento']; ?></td>
                        <td> <?php echo $row['direccion']; ?></td>
                        <td> <?php echo $row['localidad']; ?></td>
                        <td>

        
                            <a href="ver.php?id=<?php echo $row['id']?>" class="btn btn-success">Ver</a>
                            <a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-secondary">Editar</a>
                            <?php echo "<a href='eliminar.php?id=".$row['id']."' onclick='return confirmar()' class='btn btn-danger'>Eliminar</a>"?>
                            
                        </td>
                    </tr>

            <?php } } ?>

            </tbody>
        </table>
        

        </div>

    </div>
    
</div>

<?php include ("includes/footer.php") ?>