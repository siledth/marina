<div id="page-loader" class="fade show"><span class="spinner"></span></div>
<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
    <div id="header" class="header navbar-default">
        <div class="navbar-header">
            <a href="" class="navbar-brand"><span class="navbar-logo"><i style="color:83CEEA"
                        class="fas fa-briefcase"></i></span> <b>Marina</b> </a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <ul class="navbar-nav navbar-right">
            <li></li>
            <li class="dropdown"></li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= base_url() ?>Plantilla/admin/assets/img/user/user-13.jpg" alt="" />
                    <span class="d-none d-md-inline"><?= $this->session->userdata('nombre') ?></span>
                    <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="<?= base_url() ?>index.php/login/logout" class="dropdown-item">Cerrar Sesión</a>
                    <a href="<?= base_url() ?>index.php/login/v_camb_clave" class="dropdown-item">Cambio de
                        Contraseña</a>
                </div>
            </li>
        </ul>
    </div>

    <div id="sidebar" class="sidebar">
        <div data-scrollbar="true" data-height="100%">
            <ul class="nav">
                <li class="nav-profile">
                    <a href="javascript:;" data-toggle="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="image text-center ml-5">
                            <img src="<?= base_url() ?>Plantilla/admin/assets/img/user/user-13.jpg" alt="" />
                        </div>
                        <div class="info ml-5">
                            <b class=""></b>
                            <?= $this->session->userdata('nombre') ?>
                            <small>Bienvenido</small>
                        </div>
                    </a>
                </li>
                <!-- <li>
                        <ul class="nav nav-profile">
                                <li><a href="javascript:;"><i class="ion-ios-cog"></i> Settings</a></li>
                                <li><a href="javascript:;"><i class="ion-ios-share-alt"></i> Send Feedback</a></li>
                                <li><a href="javascript:;"><i class="ion-ios-help"></i> Helps</a></li>
                        </ul>
                </li> -->
            </ul>
            <ul class="nav">
                <li class="nav-header">Navegador</li>
                <?php if (($this->session->userdata('perfil') == 1) || ($this->session->userdata('perfil') == 3)) : ?>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-sliders-h fa-lg"></i>
                            <span>Servicios</span>
                        </a>

                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <span>Servicio-Tarifas</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>index.php/Tarifa/tarif">Registrar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-file-invoice-dollar fa-lg"></i>
                            <span>Facturación/Recibo</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <span>Factura</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>index.php/Factura/fac">Registrar</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Factura/anuFac">Ver</a></li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <span>Recibo</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>index.php/Factura/Rec">Registrar</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Factura/verRecibo">Ver </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-calendar-alt fa-lg"></i>
                            <span>Mensualidades</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url() ?>index.php/Mensualidades/ver">Ver</a></li>
                            <!-- <li><a href="<?= base_url() ?>index.php/Factura/anuFac">Ver / Anular</a></li> -->
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-paste fa-lg"></i>
                            <span> Planilla</span>
                        </a>

                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <li><a href="<?= base_url() ?>index.php/Buque/Plantilla">Registrar</a></li>
                                </a>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <li><a href="<?= base_url() ?>index.php/Buque/desin">Desincorporar</a></li>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-file-invoice-dollar fa-lg"></i>
                            <span>Transito</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <span>Factura</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>index.php/Factura/transito">Registrar</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Factura/anutransito">Ver</a></li>
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret"></b>
                                    <span>Recibo</span>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?= base_url() ?>index.php/Factura/recibo_transito">Registrar</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Factura/anutransitorecibo">Ver </a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-file-alt fa-lg"></i>
                            <span> Reporte</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <li><a href="<?= base_url() ?>index.php/Reporte/ubicaci">Ubicacion</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Reporte/Report">Total Canon</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Reporte/saldoxpagar">Saldo por Pagar</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Reporte/condxpagar">Condición de Pago</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Reporte/cxc_embarcacion">Cuentas por Cobrar / por embarcaciòn</a></li>
                                    <li><a href="<?= base_url() ?>index.php/Reporte/servicios">Servicios</a></li>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="fas fa-chart-pie"></i>
                            <span> Gráficas</span>
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <li><a href="<?= base_url() ?>index.php/Reporte/tt_ing_egr">Totales Ingreso / Egresos</a></li>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if (($this->session->userdata('perfil') <= 2)) : ?>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret"></b>
                            <i class="ion-gear-b fa-spin" style="background-color:#1E90FF;"></i>
                            <span>Configuración</span>
                        </a>
                        <ul class="sub-menu">
                            <?php if (($this->session->userdata('perfil') <= 2)) : ?>
                                <ul class="sub-menu">
                                    <li class="has-sub">
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    </li>   
                                </ul>
                            <?php endif; ?>
                            <?php if (($this->session->userdata('perfil') == 1)) : ?>
                                <li class="has-sub">
                                    <a href="javascript:;">
                                        <b class="caret"></b>
                                        <span>Tablas Parametros</span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="<?= base_url() ?>index.php/Fuentefinanc/tipoestaci">
                                                - Tipo Estacionamiento
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>index.php/Fuentefinanc/tipocliente">
                                                - Tipo Cliente
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>index.php/Fuentefinanc/und">
                                                - Tipo Barco
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>index.php/Fuentefinanc/alicuotaiva">
                                                - Alicuota
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= base_url() ?>index.php/Fuentefinanc/dolar">
                                                - Precio Dolar
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <span>Usuarios</span>
                                </a>
                                <ul class="sub-menu">
                            </li>
                            <?php if ($this->session->userdata('perfil') <= 2) : ?>
                                <li>
                                    <a href="<?= base_url() ?>index.php/user/usuario">
                                        <i class="fas fa-lg fa-fw m-r-10 fa-list-alt"></i>- Registro Usuarios
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <li class="mt-5"><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify">
                <i class="ion-ios-arrow-back"></i> <span>Cerrar Navegador</span></a></li>
        </div>
    </div>
    <div class="sidebar-bg"></div>