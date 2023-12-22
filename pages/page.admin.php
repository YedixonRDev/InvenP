<?php require 'components/admin/header.php';  ?>

<div class="site">
    <div class="site__body">
        <div class="block marginTop80">
            <div class="container container--max--lg">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="card flex-grow-1 mb-md-0 mr-0 mr-lg-3 ml-0 ml-lg-4">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Ingreso al Sistema</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="signin-email">Nombre Usuario</label>
                                        <input id="signin-email" type="text" class="form-control"  />
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-email">Correo Electronico</label>
                                        <input id="signin-email" type="email" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="signin-password">Contraseña</label>
                                        <input id="signin-password" type="password" class="form-control"  />
                                        <small class="form-text text-muted"><a href="#"></a></small>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary mt-3">
                                           Enviar Datos
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>