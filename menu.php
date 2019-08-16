<?php 
    session_start();
?>
<header class="mn-header navbar-fixed">
    <nav class="blue darken-3">
        <div class="nav-wrapper row">
            <section class="material-design-hamburger navigation-toggle">
                <a href="#" data-activates="slide-out"
                    class="button-collapse show-on-large material-design-hamburger__icon">
                    <span class="material-design-hamburger__layer"></span>
                </a>
            </section>
            <div class="header-title col s3">

                <span class="" onclick="location.href='index.php'">VOAE</span>

            </div>

            <!--<ul class="right col s9 m3 nav-right-menu"-->

            <!--li class="hide-on-small-and-down"><a href="javascript:void(0)" data-activates="dropdown1"
                        class="dropdown-button dropdown-right show-on-large"><i
                            class="material-icons">notifications_none</i><span
                            class="badge yellow darken-2">4</span></a></li>

            </ul>-->

            <ul id="dropdown1" class="dropdown-content notifications-dropdown">
                <li class="notificatoins-dropdown-container">
                    <ul>
                        <li class="notification-drop-title">Today</li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle cyan"><i class="material-icons">done</i></div>
                                    <div class="notification-text">
                                        <p><b>Alan Grey</b> uploaded new theme</p><span>7 min ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle deep-purple"><i
                                            class="material-icons">cached</i></div>
                                    <div class="notification-text">
                                        <p><b>Tom</b> updated status</p><span>14 min ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle red"><i class="material-icons">delete</i></div>
                                    <div class="notification-text">
                                        <p><b>Amily Lee</b> deleted account</p><span>28 min ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle cyan"><i class="material-icons">person_add</i>
                                    </div>
                                    <div class="notification-text">
                                        <p><b>Tom Simpson</b> registered</p><span>2 hrs ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle green"><i
                                            class="material-icons">file_upload</i></div>
                                    <div class="notification-text">
                                        <p>Finished uploading files</p><span>4 hrs ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-drop-title">Yestarday</li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle green"><i class="material-icons">security</i>
                                    </div>
                                    <div class="notification-text">
                                        <p>Security issues fixed</p><span>16 hrs ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle indigo"><i
                                            class="material-icons">file_download</i></div>
                                    <div class="notification-text">
                                        <p>Finished downloading files</p><span>22 hrs ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#!">
                                <div class="notification">
                                    <div class="notification-icon circle cyan"><i class="material-icons">code</i></div>
                                    <div class="notification-text">
                                        <p>Code changes were saved</p><span>1 day ago</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>


<aside id="slide-out" class="side-nav white">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="<?php echo $_SESSION["fotoPerfil"]; ?>" class="circle" alt="">
            </div>

        </div>
        <div class="sidebar-profile-info">

            <h6 align="center" id="lbl_menu_nombres"><?php echo $_SESSION["nombre"]; ?></h6>

        </div>
        <ul class="sidebar-menu collapsible collapsible-accordion" data-collapsible="accordion">
            <li class="no-padding">

                <a class="waves-effect waves-grey active-page" onclick="location.href='inicio.php'" id="btn-inicio">
                    <i class="material-icons">home</i>
                    Inicio
                </a>
            </li>
            <!--VISIBLE PARA ADMIN-->
            <?php 
                if($_SESSION["idTipoUsuario"]==1){
            ?>
            <li class="no-padding">
                <a class="waves-effect waves-grey" href="gestionar_Usuarios.php" id="btn_gestionar_usuarios">
                    <i class="material-icons">people</i>
                    Gestionar usuarios
                </a>
            </li>
            <li class="no-padding">
                <a class="waves-effect waves-grey" href="procesos.php" id="btn_procesos">
                    <i class="material-icons">autorenew</i>
                    Procesos
                </a>
            </li>
            <?php
                }
            ?>
            <!--VISIBLE PARA ORIENTADORES-->
            <?php 
                if($_SESSION["idTipoUsuario"]==2 || $_SESSION["idTipoUsuario"]==3){
            ?>
            <li class="no-padding">
                <a class="waves-effect waves-grey" href="gestionar_horarios.php" id="btn_gestionar_horarios">
                    <i class="material-icons">access_time</i>
                    Gestionar Horarios
                </a>
            </li>
            <?php
                }
            ?>

            <li class="no-padding">
                <a class="waves-effect waves-grey" href="perfil.php" id="btn-perfil">
                    <i class="material-icons">account_circle</i>
                    Perfil
                </a>
            </li>
            <li class="no-padding">
                <a class="waves-effect waves-grey" href="cerrar_sesion.php" id="btn-perfil">
                    <i class="material-icons">exit_to_app
                    </i>
                    Cerrar Sesión
                </a>
            </li>

        </ul>
        <div class="footer">
            <p class="copyright" align="right" style="font-size: 0.8em;">Orientación Profesional 2019 ©</p>
        </div>
    </div>
</aside>

<script src="assets/js/alpha.js"></script>