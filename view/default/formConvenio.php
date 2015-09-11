<?php use mvc\routing\routingClass as routing ?>
<?php use mvc\i18n\i18nClass as i18n ?>
<?php $id = clienteTableClass::ID ?>

<form method="post" action="<?php echo routing::getInstance()->getUrlWeb('default', ((isset($objConvenios)) ? 'update' : 'create' )) ?>">
  <?php if(isset($objConvenios) == true): ?>
    <input name="<?php echo clienteTableClass::getNameField(clienteTableClass::ID,true) ?>" value="<?php echo $objConvenios[0]->$id ?>" type="hidden">
  <?php endif ?>
  
    
    <div class="row">
                <div class="col-md-6" id="columna1"><!--Columna 1-->

                    <div class="form-group">
                    <br>
                        <div class="hero-unit input-group">
                            <input type="text" class="form-control"  data-toggle="tooltip" data-placement="top" title="<?php echo $_SESSION['plan_formulario']; ?>" name="plan" value="<?php echo $_SESSION['plan_formulario']; ?>" disabled>
                            <span class="input-group-btn">
                                <a  href="formPlan.php"  style="margin-left:2%;" class="btn btn-primary btn-signin">cambiar plan</a>
                            </span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label>Numero de Documento</label>
                        <input type="text" class="form-control" name="nit"/>
                    </div>

                    <div class="form-group">
                        <label>Tipo de Documento</label>
                        <select id="selectbasic"  class="form-control" name="tipodcto_cod">
                        <option></option>
                        <option value="CC">CC - CEDULA DE CIUDADANIA</option>
                        <?php

                            $filtroDocumento = tipoDocumento();

                            for($e=0;$e<count($filtroDocumento['tipodcto_cod']);$e++)
                            {

                            echo "<option value='" . $filtroDocumento['tipodcto_cod'][$e] . "'>" .
                                $filtroDocumento['tipodcto_cod'][$e] ." - ".$filtroDocumento['descrip'][$e] ."</option>";

                            }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Nombres</label>
                        <input type="text" class="form-control" name="nom1"/>
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" class="form-control" name="ape1"/>
                    </div>

                    <div class="form-group">
                        <label>Direccion</label>
                        <input type="text" class="form-control" name="direccion"/>
                    </div>

                    <div class="form-group">
                        <label>Tipo de servicio</label>
                        <select id="cod_enla1" name="cod_enla1" class="form-control">
                            <option></option>
                            <option value="ALTO RIESGO">ALTO RIESGO</option>
                            <option value="URGENCIAS">URGENCIAS</option>
                            <option value="CIRUGIA">CIRUGIA</option>
                            <option value="OTRO">OTRO</option>
                        </select>
                    </div>

                </div>


            <div class="col-md-6" id="columna2"><!-- columna 2-->
                <div class="form-group">
                    <label>Documento Medico</label>
                    <input type="text" class="form-control" name="medico_cod"/>
                </div>

                <div class="form-group">
                    <label>Nombre de Medico</label>
                    <input type="text" class="form-control" name="medico"/>
                </div>

                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input type="email" class="form-control" placeholder="correo del paciente" name="email"/>
                </div>

                <div class=" hero-unit form-group">
                    <label>Edad</label>
                    <input type="text" class="form-control"  id="edad" name="edad">
                </div>

                <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" class="form-control" name="telefono"/>
                </div>

                <div class="form-group">
                    <label>Sexo</label>
                    <select id="selectbasic" name="sexo" class="form-control">
                        <option></option>
                        <option value="F">F</option>
                        <option value="M">M</option>
                    </select>
                </div>

            </div>

            </div>
               
               <div class="row">
                   <div class="col-md-12" id="columna3">

                       <div class="form-group">
                           <label>Examenes</label>
                           <input id="tokenize" multiple="multiple" name="alterno_exa1" class="tokenize-sample"/>
                       </div>

                       <div class="form-group">
                           <label for="observaciones">Observaciones:</label>
                           <textarea class="form-control" rows="5"  name="observaciones"></textarea> 
                       </div>

                       <div class="form-group">
                           <center>
                               <button class="btn btn-lg btn-success btn-signin" style="width: 200px;" type="submit" id="registrar" onclick="mandarDatos();">
                                   Registrar</button></center>
                           <input type="hidden" name="hidden" value="1">
                       </div>

                   </div>
               </div>
</form>

    
  
  
  
  
  
  
  
  
  
  <input type="submit" value="<?php echo i18n::__(((isset($objUsuario)) ? 'update' : 'register')) ?>">














