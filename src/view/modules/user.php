<?php
 date_default_timezone_set('America/Bogota');
 $ultimo_login=date("Y-m-d H:i");
 ?>
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>User</h1>
         </div>
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="homepage">Home</a></li>
             <li class="breadcrumb-item active">User</li>
           </ol>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">

     <!-- Default box -->
     <div class="card">
       <div class="card-header">

         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
           Agregar Usuario
         </button>

       </div>
       <div class="box-body">

         <table class="table table-bordered table-striped dt-responsive admin">

           <thead>


             <tr>

               <th style="width:10px;">#</th>
               <th>nombre</th>
               <th>usuario</th>
               <th>foto</th>
               <th>perfil</th>
               <th>estado</th>
               <th>ultimo login</th>
               <th>acciones</th>
             </tr>
           </thead>
           <tbody>

            <?php

            $item= null;
            $valor=null;

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);

            foreach ($usuarios as $key => $value) {
              
              echo ' <tr>
              <td>'.$value["id"].'</td>
              <td>'.$value["nombre"].'</td>
              <td>'.$value["usuario"].'</td>';

              if($value["foto"] != ""){
                echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" witdh="10px"></td>';
              }else{
                echo '<td><img src="src/view/img/usuarios/default/anonymous.png" class="img-thumbnail" witdh="10px"></td>';
              }
              
              
              echo '<td>'.$value["perfil"].'</td>
              <td><button type="button" class="btn btn-success btn-xs">Success</button></td>
              <td>'.$value["ultimo_login"].'</td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-info btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#editarModalUsuario"> <i class="fa fa-pen"></i></button>

                  <button class="btn btn-danger"> <i class="fa fa-times"></i></button>

                </div>

              </td>


            </tr>';
            }
            
            
            ?>
            

           </tbody>
         </table>

       </div>
       <!-- /.card-body -->
       <div class="card-footer">
         Footer
       </div>
       <!-- /.card-footer-->
     </div>
     <!-- /.card -->

   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- CREAR USUARIO VENTANA MODAL -->

 <div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">


     <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

         <div class="modal-header" style="background: #FFC300; color: black">
           <h5 class="modal-title" id="modalAgregarUsuario">Agregar Usuario</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>



         <div class="modal-body">

           <div class="box-body">

             <!-- ESPACIO PARA INGRESAR NOMBRE -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-user"></i></span>

                 <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar Nombre" required>

               </div>

             </div>

             <!-- ESPACIO PARA INGRESAR EL USUARIO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-key"></i></span>

                 <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar Usuario" required>

               </div>

             </div>

             <!-- ESPACIO PARA INGRESAR EL CONTRASE??A -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-lock"></i></span>

                 <input type="password" class="form-control input-lg" name="nuevoContrase??a" placeholder="Ingresar Contrase??a" required>

               </div>

             </div>

             <!-- ESPACIO PARA SELECCIONAR EL TIPO DE USUARIO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-users"></i></span>

                 <select class="form-control input-lg" name="nuevoPerfil">

                   <option value="">Seleccionar</option>

                   <option value="Administrador">Administrador</option>

                   <option value="Especial">Especial</option>

                   <option value="Empleado">Empleado</option>

                 </select>

               </div>

             </div>


             <!-- ESPACIO PARA INGRESAR EL USUARIO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-star"></i></span>

                 <select class="form-control input-lg" name="nuevoEstado">

                   <option value="">Seleccionar</option>

                   <option value="0">Activo</option>

                   <option value="1">Inactivo</option>

                 </select>

               </div>

             </div>


             <!-- ESPACIO PARA SUBIR FOTO -->

             <div class="form-group">

               <div class="panel">
                 SUBIR FOTO (OPCIONAL)
               </div>

               <input type="file" class="nuevaFoto" name="nuevaFoto">

               <p class="help-block"> PESO MAXIMO DE LA FOTO 2MB</p>

               <img src="src/view/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" witdh="100px">

             </div>

           </div>

         </div>

         <!-- FIN DEL MODAL -->
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save changes</button>
           <?php
            $crearUsuario = new ControladorUsuarios();
            $crearUsuario->ctrCrearUsuario();
            ?>
         </div>

       </form>
     </div>
   </div>
 </div>
  <!-- EDITAR USUARIO VENTANA MODAL -->

  <div class="modal fade" id="editarModalUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">


     <div class="modal-content">

       <form role="form" method="post" enctype="multipart/form-data">

         <div class="modal-header" style="background: #FFC300; color: black">
           <h5 class="modal-title" id="editarModalUsuario">Editar Usuario</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>



         <div class="modal-body">

           <div class="box-body">

             <!-- ESPACIO PARA INGRESAR NOMBRE -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-user"></i></span>

                 <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

               </div>

             </div>

             <!-- ESPACIO PARA INGRESAR EL USUARIO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-key"></i></span>

                 <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

               </div>

             </div>

             <!-- ESPACIO PARA INGRESAR EL CONTRASE??A -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-lock"></i></span>

                 <input type="password" class="form-control input-lg" name="editarContrase??a" placeholder="Escribe una nueva contrase??a">

                 <input type="hidden" id="passwordActual" name="passwordActual">

               </div>

             </div>

             <!-- ESPACIO PARA SELECCIONAR EL TIPO DE USUARIO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-users"></i></span>

                 <select class="form-control input-lg" name="editarPerfil">

                   <option value="" id="editarPerfil"></option>

                   <option value="Administrador">Administrador</option>

                   <option value="Especial">Especial</option>

                   <option value="Empleado">Empleado</option>

                 </select>

               </div>

             </div>


             <!-- ESPACIO PARA INGRESAR EL ESTADO -->

             <div class="form-group">

               <div class="input-group-prepend">

                 <span class="input-group-text"><i class="fas fa-star"></i></span>

                 <select class="form-control input-lg" name="editarEstado">

                   <option value="" id="editarEstado">Seleccionar</option>

                   <option value="0">Activo</option>

                   <option value="1">Inactivo</option>

                 </select>

               </div>

             </div>


             <!-- ESPACIO PARA SUBIR FOTO -->

             <div class="form-group">

               <div class="panel">
                 SUBIR FOTO (OPCIONAL)
               </div>

               <input type="file" class="nuevaFoto" name="editarFoto">

               <p class="help-block"> PESO MAXIMO DE LA FOTO 2MB</p>

               <img src="src/view/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" witdh="100px">

              <input type="hidden" id="fotoActual" name="fotoActual">

             </div>

           </div>

         </div>

         <!-- FIN DEL MODAL -->
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Modificar Usuario</button>
           <?php
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario->ctrEditarUsuarios();
            ?> 
         </div>

       </form>
     </div>
   </div>
 </div>