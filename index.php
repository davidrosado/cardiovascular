<?php
//require_once(dirname(__FILE__).'/config.php');

/*GET UTM VALUE*/
$_utm_source = (empty($_GET['utm_source'])) ? 'Undefined' : strtolower($_GET['utm_source']);
$_utm_medium = (empty($_GET['utm_medium'])) ? 'Undefined' : strtolower($_GET['utm_medium']);
$_utm_term = (empty($_GET['utm_term'])) ? 'Undefined' : strtolower($_GET['utm_term']);
$_utm_campaign = (empty($_GET['utm_campaign'])) ? 'Undefined' : strtolower($_GET['utm_campaign']);
$_utm_content = (empty($_GET['utm_content'])) ? 'Undefined' : strtolower($_GET['utm_content']);
$_utm_email = (empty($_GET['utm_email'])) ? 'Undefined' : strtolower($_GET['utm_email']);

$num_dni = @$_POST['numdni_1'];
$_accion = @$_GET['accion'];

if( ($_accion=='invitado') and (!empty($num_dni)) ) {
    $oqUs = "SELECT * FROM leads WHERE ((campa='Evento Simposio Medicina Funcional') and (numdni_1='".$num_dni."')) LIMIT 1";
    $oqUs = mysql_query($oqUs);                 
    if (mysql_num_rows($oqUs)>0) {
        while($oqU = mysql_fetch_array($oqUs)) {
            $_id = $oqU['id'];
            $_numdni_1 = $oqU['numdni_1'];
            $_nombre_1 = $oqU['nombre_1'];
            $_apellido_1 = $oqU['apellido_1'];
            $_empresa_1 = $oqU['empresa_1'];
            $_cargo_1 = $oqU['cargo_1'];
            $_telefono_1 = $oqU['telefono_1'];
            $_email_1 = $oqU['email_1'];
        }
    }   
    $_tab_01 = '';
    $_tab_02 = 'in active';
    $_script_jump = '
        $("html, body").animate({
            scrollTop: $("#formulario").offset().top
        }, "2000");
    ';
}
else {
    $_tab_01 = 'in active';
    $_tab_02 = '';
    $_script_jump = '';
}

/*if($_id > 0) {
    $_tab_01 = 'in active';
    $_tab_02 = '';
    $_ready = '';
    $_empty = 0;
}
else {
    $_tab_01 = '';
    $_tab_02 = 'in active';
    $_ready = 'readonly';
    $_empty = 1;
}*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplicando la Medicina Funcional en la Práctica Clínica | AFMCP</title>
    <meta name="description" content="Dé el primer paso para obtener una certificación en la medicina del futuro: LA MEDICINA FUNCIONAL">    
    <link rel="stylesheet" href="pluggins/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="pluggins/font-awesome/css/font-awesome.min.css" type="text/css">
    <?php if($_accion == 'invitado') {
    }
    else { ?>
    <link rel="stylesheet" href="pluggins/animate.css">
    <?php } ?>
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="pluggins/slick/slick.css">
    <link rel="stylesheet" href="pluggins/slick/slick-theme.css">
    <link rel="stylesheet" href="css/fonts.css" type="text/css">
    <link rel="stylesheet" href="css/custom.css" type="text/css">
</head>
<body>
	<header>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-3 col-sm-offset-3 col-xs-6">
    				<img src="img/logo-usil-medicina.png" class="img-responsive">
    			</div>
    			<div class="col-sm-3 col-xs-6">
    				<img src="img/logo-AMFCP.png" height="80" width="231" class="img-responsive">
    			</div>
    		</div>
    		<nav class="navbar navbar-default">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div>

			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li><a href="#que-es" class="go-to">MEDICINA FUNCIONAL</a></li>
			        <li><a href="#acerca" class="go-to">ACERCA DEL AFMCP</a></li>
			        <li><a href="#programa" class="go-to">PROGRAMA</a></li>
			        <li><a href="#expositores" class="go-to">CONOZCA A LOS EXPOSITORES</a></li>
			        <li><a href="#videos" class="go-to">VIDEOS</a></li>
                    <li><a href="#estadia" class="go-to">ESTADIA Y ACTIVIDADES</a></li>
                    <li><a href="#noticias" class="go-to">NOTICIAS</a></li>
			        <li><a href="#formulario" class="go-to">REGISTRO</a></li>
			      </ul>
			      
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
    	</div>
    </header>

    <section id="banner">
        <div class="item img-1">
            <div class="container">
                <div class="col-md-7">
                    <img src="img/logo-AMFCP-logo.png" class="img-responsive">
                    <h2>Dé el primer paso para obtener una certificación en la medicina del futuro</h2>
                    <h3>del <strong>27</strong> de noviembre <br>al <strong>1</strong> de diciembre</h3>
                    <span style="  display: block; font-size: 16px; font-weight: bold;">en Lima, Perú</span>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                </div>
            </div>
        </div>
        <div class="item img-2">
            <div class="container">
                <div class="col-md-7">
                    <img src="img/logo-AMFCP-logo.png" class="img-responsive">
                    <h2>El primer curso de <br>Medicina Funcional en el Perú</h2>
                    <h3>del <strong>27</strong> de noviembre <br>al <strong>1</strong> de diciembre</h3>
                    <span style="  display: block; font-size: 16px; font-weight: bold;">en Lima, Perú</span>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                </div>
            </div>
        </div>
        <div class="item img-3">
            <div class="container">
                <div class="col-md-7">
                    <img src="img/logo-AMFCP-logo.png" class="img-responsive">
                    <h2 style="font-size: 25px;margin-bottom:15px;">Única oportunidad en Latinoamérica para obtener una certificación en la medicina del futuro: la Medicina Funcional</h2>
                    <h3 style="display:inline-block;">del <strong>27</strong> de noviembre <br>al <strong>1</strong> de diciembre</h3>
                    <img style="display:inline-block;margin: 0px;" src="img/banderas.png">
                    <span style="  display: block; font-size: 16px; font-weight: bold;">en Lima, Perú</span>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                </div>
            </div>
        </div>
        <div class="item img-4">
            <div class="container">
                <div class="col-md-7">
                    <img src="img/logo-AMFCP-logo.png" class="img-responsive">
                    <h2 style="font-size: 25px; margin-bottom:35px;">Única oportunidad en Latinoamérica para obtener una certificación en la medicina del futuro: la Medicina Funcional</h2>
                    <h3>del <strong>27</strong> de noviembre <br>al <strong>1</strong> de diciembre</h3>
                    <span style="  display: block; font-size: 16px; font-weight: bold;">en Lima, Perú</span>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                </div>
            </div>
        </div>
    </section>
	<section id="que-es">
		<a href="#que-es" class="go-to">
	        <div class="up">
	            <i class="fa fa-angle-down" aria-hidden="true"></i>
	        </div>
	    </a>
		<div class="container">
			<div class="row text-center">
				<div class="col-md-12">
					<h2>¿Qué es la <strong>Medicina Funcional</strong>?</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<h3>Prevenir antes que curar</h3>
					<p>La <strong>Medicina Funcional</strong> es un nuevo enfoque de la ciencia médica que postula que la salud significa más que la ausencia de enfermedades, sino que supone vitalidad positiva. Propone una relación estrecha entre el paciente y médico, donde la atención es integral y busca la causa misma de las enfermedades.</p>
					<br>
					<p>Para <strong>la Medicina Funcional</strong>, comprender realmente un organismo no basta con estudiar por separado sus partes (células, órganos, etc.), sino que debemos considerar el funcionamiento integrado de todos sus sistemas. Esta es la base de la Medicina Funcional y lo que se conoce como “biología de sistemas”.  Además, enfatiza la atención de las causas subyacentes de cada enfermedad utilizado un enfoque orientado en los sistemas biológicos y comprometiendo la colaboración de trabajo mutua entre el médico y el paciente.</p>
				</div>
				<div class="col-sm-6 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<h3>Principios</h3>
					<div class="box-principio">
						<span class="num">1</span>
						<p>Cuidado centrado en el paciente y no en la enfermedad.</p>
						<img src="img/icon-1.png">
					</div>
					<div class="box-principio">
						<span class="num">2</span>
						<p>Identificación de la salud como vitalidad positiva y no solo como la  ausencia de enfermedades.</p>
						<img src="img/icon-2.png">
					</div>
					<div class="box-principio">
						<span class="num">3</span>
						<p>Individualidad bioquímica.</p>
						<img src="img/icon-3.png">
					</div>
					<div class="box-principio">
						<span class="num">4</span>
						<p>Balance dinámico entre factores externos e internos (factores genéticos, ambientales, etc.).</p>
						<img src="img/icon-4.png">
					</div>
					<div class="box-principio">
						<span class="num">5</span>
						<p>Considera al individuo en su totalidad: interacción cuerpo, mente y espíritu para un completo abordaje.</p>
						<img src="img/icon-5.png">
					</div>
					<div class="box-principio">
						<span class="num">6</span>
						<p>Promueve no solo el incremento del tiempo de vida sino el tiempo de vida con óptima salud.</p>
						<img src="img/icon-6.png">
					</div>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
				</div>
			</div>
		</div>
	</section>

	<section id="acerca">
		<a href="#acerca" class="go-to">
	        <div class="up">
	            <i class="fa fa-angle-down" aria-hidden="true"></i>
	        </div>
	    </a>
		<div class="container">
			<div class="row">
                <div class="col-sm-8 col-sm-offset-4">
                    <h2>Acerca del <strong>AFMCP</strong></h2>
                    <P><STRONG>"Aplicando la Medicina Funcional en la Práctica Clínica" - AFMCP*,</STRONG> por sus siglas en inglés. es un curso de 5 días que otorga a los profesionales de la salud las herramientas necesarias para implementar la Medicina Funcional en pacientes con enfermedades crónicas.</P>
					<ul>
					    <li><strong>INVERSIÓN:</strong>
					        <ul>
					            <li>Inscripción hasta el 31 de julio: USD 1 470</li>
					            <li>Inscripción después del 31 de julio: USD 1 600</li>
					        </ul>
					    </li>
					    <li><strong>Inversión corporativa:</strong>
					        <ul>
					            <li>Para grupos de 3 participantes: USD 1 400 por persona</li>
					        </ul>
					    </li>
					</ul>
					<p class="text-mutted"><span>(*) Si usted desea mayor información, uno de nuestros representantes podrá visitarlo en su domicilio.<br />Facilidad de pago en tres cuotas.<br />Se reserva el derecho de admisión.</span></p>
                    <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                </div>
			</div>
		</div>
		<img src="img/animate-doc.png" class="animate1">
	</section>

    <section id="expositores">
        <div class="container">
            <div class="row line-d">
                <div class="col-md-3 col-md-offset-1">
                    <h3>INFORMACIÓN</h3>
                    <h2>Sobre los <strong>expositores</strong></h2>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <p class="info"><i>Constituye la única oportunidad en América Latina para lograr una atención médica integral y buscar la causa misma de las enfermedades a través de la Medicina Funcional.</i></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box-expo">
                        <img src="img/Patrick-Hanaway.png">
                        <h2>Patrick Hanaway, MD</h2>
                        <p>La Medicina Funcional es más que un conjunto alternativo de tratamientos para  medicina. Usando herramientas que han sido desarrolladas por el IFM, el Dr. Hanaway discutirá y describirá los fundamentos metodológicos para el enfoque de Medicina Funcional que nos pone en el camino de hacer cambios reales en nuestros pacientes con enfermedades crónicas.</p>
                        <br>
                        <a data-toggle="modal" href="#myModalvideo"  class="view-testimonial" data-testimonial="H3jX1rYr_BQ" data-title="Atrapa niebla (Sr. Abel Cruz)"><div class="box-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></div> VER VIDEO</a>
                    </div>  
                </div>
                <div class="col-md-4">
                    <div class="box-expo">
                        <img src="img/Shilpa-Saxena.png">
                        <h2>Shilpa Saxena, MD</h2>
                        <p>La doctora Saxena guiará a los participantes a través de una variedad de ejercicios  para ayudar a construir una comprensión de cómo usar la Línea de tiempo y la Matriz de Medicina Funcional, así como concretar los conceptos de antecedentes, disparadores y mediadores. </p>
                        <br>
                        <a data-toggle="modal" href="#myModalvideo"  class="view-testimonial" data-testimonial="pxKWyCQ0sLs" data-title="Atrapa niebla (Sr. Abel Cruz)"><div class="box-icon"><i class="fa fa-video-camera" aria-hidden="true"></i></div> VER VIDEO</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-expo">
                        <img src="img/Vincent-Pedre.png">
                        <h2>Vincent Pedre, MD</h2>
                        <p>El sistema digestivo es un componente crítico de la salud humana con numerosas  funciones complejas e interacciones con otros sistemas fisiológicos. La digestión, permeabilidad intestinal, microbiota intestinal, inflamación y sistema nervioso proporcionan un anclaje no solo para comprender las funciones del sistema gastrointestinal (GI), sino también para la disfunción a la que este sistema es susceptible que puede contribuir posteriormente a las enfermedades crónicas.</p>
                        <br>
                        <a href="perfil/vincent-pedre.html" class="modal-profile" style="color:#ffffff;"><div class="box-icon"><i class="fa fa-user" aria-hidden="true"></i></div> VER BIOGRAFÍA</a>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <div class="box-expo">
                        <img src="img/Mark-Menolascino.png">
                        <h2>Mark Menolascino, MD</h2>
                        <p>Sobre la base de la comprensión de los participantes de las etiologías de la disfunción gastrointestinal, el Dr. Menolascino establecerá un marco para el  desarrollo de enfoques terapéuticos a la disfunción GI utilizando el enfoque "5R" de eliminar, reemplazar, reinocular, reparar y equilibrar.</p>
                        <br>
                        <a href="perfil/mark-menolascino.html" class="modal-profile" style="color:#ffffff;"><div class="box-icon"><i class="fa fa-user" aria-hidden="true"></i></div> VER BIOGRAFÍA</a>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-expo">
                        <img src="img/Monique-Class.png">
                        <h2>Monique Class</h2>
                        <p>La enfermedad crónica se desarrolla a lo largo de la vida del paciente y debe ser entendida en su contexto. Desarrollar la capacidad de entender la historia de vida y la enfermedad de un paciente es esencial cuando se recopila información matizada acerca de cómo un paciente se relaciona con la salud y la enfermedad. Esta clase revisará la ciencia y facilitará los ejercicios destinados a desarrollar habilidades prácticas para obtener y comprender la historia de un paciente.</p>
                        <br>
                        <a href="perfil/monique-class.html" class="modal-profile" style="color:#ffffff;"><div class="box-icon"><i class="fa fa-user" aria-hidden="true"></i></div> VER BIOGRAFÍA</a>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="marging:50px 0px; text-align:center;">
                        <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                    </div>
                </div>
            </div>
        </div>

                    <div class="modal fade bs-example-modal-lg ModalProfile" id="ModalProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-muted" id="myModalLabel">Biografía de expositores</h4>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

    </section>

	<section id="programa">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2><strong>Programa</strong> Perú 2017</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <strong><i class="fa fa-calendar" aria-hidden="true"></i> Día 1:</strong> 27 de noviembre de 2017
                                </h4>
                            </div>
                        </a>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <table>
                                <tr>
                                    <td class="hora">8:00 a.m. - 8:30 a.m.</td>
                                    <td class="actividad">Registro de asistentes</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">8:30 a.m. - 9:00 a.m.</td>
                                    <td class="actividad">Inauguración oficial y bienvenida</td>
                                    <td class="actividad">AUTORIDADES USIL / Patrick Hanaway</td>
                                </tr>
                                <tr>
                                    <td class="hora">9:00 a.m. -10:30 a.m.</td>
                                    <td class="actividad">Introducción a la Medicina Funcional: Redefiniendo la Medicina de enfoque sistémico aplicada a las enfermedades</td>
                                    <td class="actividad">Patrick Hanaway, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">10:30 a.m. -11:15 a.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">11:15 a.m. -1:15 p.m.</td>
                                    <td class="actividad">Uso de la matriz de la Medicina Funcional</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">1:15 p.m. - 2:45 p.m.</td>
                                    <td class="actividad">Almuerzo</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">2:45 p.m. - 4:30 p.m.</td>
                                    <td class="actividad">Profundizando en las causas de la disfunción intestinal </td>
                                    <td class="actividad">Vincent Pedre, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">4:30 p.m. - 5:00 p.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">5:00 p.m. - 6:30 p.m.</td>
                                    <td class="actividad">Tratamiento de la disfunción intestinal</td>
                                    <td class="actividad">Mark Menolascino, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">6:30 p.m. - 7:00 p.m.</td>
                                    <td class="actividad">Preguntas y respuestas</td>
                                    <td class="actividad">Hanaway, Pedre, Menolascino y Saxena</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                            <strong><i class="fa fa-calendar" aria-hidden="true"></i> Día 2:</strong> 28 de noviembre de 2017
                          </h4>
                        </div>
                        </a>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <table>
                                <tr>
                                    <td class="hora">6:30 a.m. - 7:30 a.m.</td>
                                    <td class="actividad">Yoga</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">8:30 a.m. - 10:00 a.m.</td>
                                    <td class="actividad">Disfunción inmunológica e inflamación: un mecanismo esencial de la enfermedad</td>
                                    <td class="actividad">Vincent Pedre, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">10:00 a.m. - 10:30 a.m.</td>
                                    <td class="actividad">Break </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">10:30 a.m. - 12:00 p.m.</td>
                                    <td class="actividad">Alergia, sensibilidad e intolerancia alimentaria: diagnóstico y tratamiento</td>
                                    <td class="actividad">Mark Menolascino, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">12:00 p.m. - 1:30 p.m.</td>
                                    <td class="actividad">Almuerzo</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">1:30 p.m. - 2:45 p.m.</td>
                                    <td class="actividad">Prescribiendo una dieta de eliminación</td>
                                    <td class="actividad">Patrick Hanaway, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">2:45 p.m. - 4:00 p.m.</td>
                                    <td class="actividad">Antropometría, biomarcadores, evaluación clínica y evaluación de la dieta:<br>El ABCD de la evaluación nutricional: parte 1</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">4:00 p.m. - 4:30 p.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">4:30 p.m. - 5:45 p.m.</td>
                                    <td class="actividad">Cambiando el enfoque terapéutico</td>
                                    <td class="actividad">Monique Class, MS, APRN, BC</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                            <strong><i class="fa fa-calendar" aria-hidden="true"></i> Día 3:</strong> 29 de noviembre de 2017
                          </h4>
                        </div></a>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <table>
                                <tr>
                                    <td class="hora">6:30 a.m. - 7:30 a.m.</td>
                                    <td class="actividad">Yoga</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">8:30 a.m. - 9:45 a.m.</td>
                                    <td class="actividad">Comprendiendo el eje HPATG: bioquímica y antecedentes</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">9:45 a.m. -11:00 a.m.</td>
                                    <td class="actividad">Evaluación y tratamiento de la disfunción adrenal</td>
                                    <td class="actividad">Monique Class, MS, APRN, BC</td>
                                </tr>
                                <tr>
                                    <td class="hora">11:00 a.m. - 11:15 a.m.</td>
                                    <td class="actividad">Break </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">11:15 a.m. - 12:30 p.m.</td>
                                    <td class="actividad">Evaluación y tratamiento de la disfunción tiroidea</td>
                                    <td class="actividad">Patrick Hanaway, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">12:30 p.m. - 2:00 p.m.</td>
                                    <td class="actividad">Almuerzo </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">2:00 p.m. - 3:15 p.m.</td>
                                    <td class="actividad">Testosterona baja y hormonas masculinas</td>
                                    <td class="actividad">Mark Menolascino, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">3:15 p.m. - 3:45 p.m.</td>
                                    <td class="actividad">Break </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">3:45 p.m. - 5:30 p.m.</td>
                                    <td class="actividad">Hormonas femeninas</td>
                                    <td class="actividad">Mark Menolascino, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">5:30 p.m. - 6:00 p.m.</td>
                                    <td class="actividad">Preguntas y respuestas</td>
                                    <td class="actividad">Class, Hanaway, Menolascino y Saxena</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree"><div class="panel-heading" role="tab" id="headingFour">
                          <h4 class="panel-title">
                            <strong><i class="fa fa-calendar" aria-hidden="true"></i> Día 4:</strong> 30 de noviembre de 2017
                          </h4>
                        </div></a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                            <table>
                                <tr>
                                    <td class="hora">8:30 a.m. - 10:15 a.m.</td>
                                    <td class="actividad">Antropometría, biomarcadores, evaluación clínica y evaluación de la dieta: El ABCD de la evaluación nutricional: parte 2</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">10:15 a.m. - 10:45 a.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">10:45 a.m. - 12:30 a.m.</td>
                                    <td class="actividad">Reducción de la carga tóxica usando dieta, estilo de vida y otras estrategias</td>
                                    <td class="actividad">Monique Class, MS, APRN, BC</td>
                                </tr>
                                <tr>
                                    <td class="hora">12:30 a.m. - 2:00 p.m.</td>
                                    <td class="actividad">Almuerzo </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">2:00 p.m. - 4:00 p.m.</td>
                                    <td class="actividad">El abordaje funcional en la enfermedad cardiometabólica</td>
                                    <td class="actividad">Patrick Hanaway, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">4:00 p.m. - 4:30 p.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">4:30 p.m. - 5:00 p.m.</td>
                                    <td class="actividad">Preguntas y respuestas</td>
                                    <td class="actividad">Facilitated session (Class, Hanaway, Pedre, y Saxena)</td>
                                </tr>
                                <tr>
                                    <td class="hora">5:00 p.m. - 6:30 p.m.</td>
                                    <td class="actividad">Desafíos rumbo al cambio</td>
                                    <td class="actividad">Monique Class, MS, APRN, BC</td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><div class="panel-heading" role="tab" id="headingFive">
                          <h4 class="panel-title">
                            <strong><i class="fa fa-calendar" aria-hidden="true"></i> Día 5:</strong> 1 de diciembre de 2017
                          </h4>
                        </div></a>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                            <table>
                                <tr>
                                    <td class="hora">8:30 a.m. - 10:00 a.m.</td>
                                    <td class="actividad">Mitocondrias y dinámica energética</td>
                                    <td class="actividad">Patrick Hanaway, MD </td>
                                </tr>
                                <tr>
                                    <td class="hora">10:00 a.m. - 10:30 a.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">10:30 a.m. - 12:30 p.m.</td>
                                    <td class="actividad">Integración clínica de la nutrición funcional y el cambio de estilo de vida</td>
                                    <td class="actividad">Shilpa Saxena, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">12:30 p.m. - 2:00 p.m.</td>
                                    <td class="actividad">Almuerzo </td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">2:00 p.m. - 3:30 p.m.</td>
                                    <td class="actividad">La integración clínica y la matriz de la Medicina Funcional</td>
                                    <td class="actividad">Vincent Pedre, MD</td>
                                </tr>
                                <tr>
                                    <td class="hora">3:30 p.m. - 4:00 p.m.</td>
                                    <td class="actividad">Break</td>
                                    <td class="actividad"></td>
                                </tr>
                                <tr>
                                    <td class="hora">4:00 p.m. - 5:15 p.m.</td>
                                    <td class="actividad">Percepción, intuición y la asociación terapéutica</td>
                                    <td class="actividad">Monique Class, MS, APRN, BC</td>
                                </tr>
                                <tr>
                                    <td class="hora">5:15 p.m. - 5:30 p.m.</td>
                                    <td class="actividad">Clausura</td>
                                    <td class="actividad">Patrick Hanaway, MD </td>
                                </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
    			<div class="col-md-12">
    				<a href="#formulario" class="registrate go-to">Regístrese para participar</a>
    				<button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
    			</div>
    		</div>
        </div>
    </section>

    <section id="videos">
        <a href="#videos" class="go-to">
            <div class="up">
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </div>
        </a>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2>Sobre <strong>el curso</strong></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-xs-10 col-xs-offset-1">
                    <div class="slider-for">
                        <div>
                            <iframe  class="video-g" src="https://www.youtube.com/embed/AeoJ0wAoD_E?rel=0" frameborder="0" allowfullscreen></iframe>
                        </div>

                    </div>
                    <div class="slider-nav">
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/AeoJ0wAoD_E/mqdefault.jpg" data-galeria="AeoJ0wAoD_E"/>
                            <p class="txt-video">Las autoridades de la USIL participaron en la Conferencia Anual de Medicina Funcional, el encuentro mundial que convoca a médicos e investigadores de esta nueva tendencia de la medicina.</p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/iAedQ9fv3i4/mqdefault.jpg" data-galeria="iAedQ9fv3i4"/>
                            <p class="txt-video">El doctor Mark Hyman, director médico del Centro de Medicina Funcional del Cleveland Clinic’s, explica en qué consiste la medicina funcional y cuáles son sus aplicaciones.</p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/H3jX1rYr_BQ/mqdefault.jpg" data-galeria="H3jX1rYr_BQ"/>
                            <p class="txt-video">El doctor Patrick Hanaway, jefe de Educación Médica del Instituto de Medicina Funcional de los Estados Unidos, explica cuáles son las principales causas de las enfermedades crónicas en los países de América. </p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/pxKWyCQ0sLs/mqdefault.jpg" data-galeria="pxKWyCQ0sLs"/>
                            <p class="txt-video">La doctora Shilpa Saxena, especialista en medicina funcional e integrativa, comenta cómo la medicina funcional trata las enfermedades con un nuevo enfoque para lograr soluciones definitivas.</p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/Ix2nz2EzkJs/mqdefault.jpg" data-galeria="Ix2nz2EzkJs"/>
                            <p class="txt-video">El doctor Federico Martinez, experto en medicina funcional y miembro del Directorio de la USIL, comenta cómo la medicina funcional enfoca el tratamiento de las enfermedades y la relación de los médicos con sus pacientes.</p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/3EzmDFP4Cw0/mqdefault.jpg" data-galeria="3EzmDFP4Cw0" />
                            <p class="txt-video">Entrevista de Plus TV a la presidenta ejecutiva de la USIL, Luciana de la Fuente, y al doctor Federico Martinez, experto en medicina funcional y miembro del Directorio de la USIL.</p>
                        </div>
                        <div class="item">
                            <img class="video-galeria" src="http://img.youtube.com/vi/LDlX4GaHnHM/mqdefault.jpg" data-galeria="LDlX4GaHnHM"/>
                            <p class="txt-video">Entrevista de TV Perú al doctor Federico Martínez, experto en medicina funcional y miembro del Directorio de la USIL, en la que explica el abordaje de esta nueva especialidad médica para el tratamiento de las enfermedades crónicas.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div style="marging:50px 0px; text-align:center;">
                       <a href="#formulario" class="registrate go-to">Regístrese para participar</a>
                    <button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="estadia">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2><strong>Estadías y Actividades</strong> 2017</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                      <!-- Nav tabs -->
                        <ul class="nav nav-tabs d-tr" role="tablist">
                            <li role="presentation" class="active d-td"><a href="#hoteles" aria-controls="hoteles" role="tab" data-toggle="tab">HOTELES</a></li>
                            <li role="presentation" class="d-td"><a href="#hospedajes" aria-controls="hospedajes" role="tab" data-toggle="tab">HOSPEDAJES</a></li>
                            <li role="presentation" class="d-td"><a href="#alimentacion" aria-controls="alimentacion" role="tab" data-toggle="tab">ALIMENTACION</a></li>
                            <li role="presentation" class="d-td"><a href="#actividades-lima" aria-controls="actividades-lima" role="tab" data-toggle="tab">ACTIVIDADES EN LIMA</a></li>
                        </ul>
                      <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="hoteles">
                                <div class="carru-hoteles">
                                    <div class="item">
                                        <div class="row">
                                            <div class="box-tit">
                                                <div class="carru-fotos-hotel">
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria1.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria2.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria3.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria4.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria5.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria6.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria7.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria8.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria9.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria10.jpg" style="width: 100%;">
                                                    </div>
                                                    <div class="cuadro">
                                                        <img src="img/foto-galeria11.jpg" style="width: 100%;">
                                                    </div>
                                                </div>
                                                <img src="img/logo-hotel-golf.jpg" class="img-responsive" />
                                                <!--<h2>Hotel & Spa <br><strong>GOLF LOS INCAS</strong></h2>--> 
                                                <P>El hotel más cercano a la <strong>Universidad San Ignacio de Loyola</strong> y excelentes tarifas  para el evento internacional. Se ubica en el puesto 7 de los mejores hoteles de Lima en el ranking de 226 hoteles de Lima en el TRIPADVISOR.</P>
                                                <a href="http://www.golfincahotel.com/" target="_blank" class="btn btn-default btn-lg">MÁS INFORMACIÓN</a>
                                            </div>
                                            <div class="table-responsive">
                                            	<table>
	                                                <tr class="brd-none">
	                                                    <th>TIPO DE SUITE</th>
	                                                    <th class="text-center">DESCRIPCIÓN</th>
	                                                    <th class="text-center" COLSPAN="2">TARIFA GRUPO</th>
	                                                </tr>
	                                                <tr>
	                                                    <td></td>
	                                                    <td></td>
	                                                    <td class="tit-2">Simple USD$</td>
	                                                    <td class="tit-2">Doble USD$</td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Junior Standard</td>
	                                                    <td>2 Camas Full /vista a la piscina. Área  45m2 aprox.</td>
	                                                    <td class="text-center">142</td>
	                                                    <td class="text-center">162</td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Junior Suite</td>
	                                                    <td>2d Camas Full con vista al Golf. Área de 55m2 aprox.</td>
	                                                    <td class="text-center">152</td>
	                                                    <td class="text-center">172</td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Junior Suite superior</td>
	                                                    <td>Cama King/vista al Golf/Cesta de Frutas. Area 55 m2 aprox.</td>
	                                                    <td class="text-center">162</td>
	                                                    <td class="text-center">182</td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Suite Spa</td>
	                                                    <td>1 Cama King con vista al Golf, jacuzzi hidromasaje. Area 65m2 aprox.</td>
	                                                    <td class="text-center">172</td>
	                                                    <td class="text-center">192</td>
	                                                </tr>
	                                                <tr>
	                                                    <td>Suite Spa De Luxe</td>
	                                                    <td>1 Cama King , Jacuzzi hidromasaje en el baño. Area 70 m2 aprox. </td>
	                                                    <td class="text-center">200</td>
	                                                    <td class="text-center">220</td>
	                                                </tr>
	                                                <tr class="brd-none">
	                                                    <td>Penthouse</td>
	                                                    <td>1 Cama King con vista al Golf, jacuzzi y sauna Área de 100mts.</td>
	                                                    <td class="text-center">400</td>
	                                                    <td class="text-center">400</td>
	                                                </tr>
	                                            </table>
                                            </div>
                                            <h3><strong>*Preguntar por la tarifa especial Medicina Funcional.</strong></h3>
                                            <h4>Las tarifas No incluyen el 18% de IGV y el 10% de servicios</h4>
                                            <p>*De acuerdo a normas del Gobierno Peruano DL 919, las personas no domiciliadas en el país serán exoneradas del 18% de IGV, sólo en el caso que su permanencia no supere los 60 días, previa  presentación de la Tarjeta Andina de Migración y del pasaporte.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-hospedajes">
                                    <ul>
                                        <li>Tipo de Cambio Empleado S/.3.24</li>
                                        <li>Toda la información es meramente referencial y los precios/atributos del servicio/producto pueden variar.  Se recomienda a cada participante contratar directamente con el proveedor.</li>
                                        <li>La universidad San Ignacio de Loyola no brindará ninguno de estos servicios (a excepción del Di), ni se hace responsable bajo ningún tipo de circunstancia por estos servicios/ productos de forma directa o indirecta. </li>
                                        <li><span>*precios aproximados, sujetos a variación.</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="hospedajes">
                                <div class="carru-hospedajes">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="hospe-image">
                                                    <div class="hospe-image-box">
                                                        <img src="hospedaje/alojamiento-1p.png" class="img-responsive">
                                                    </div>
                                                    <h2>Alojamiento <strong>para 1 persona</strong></h2> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="hospe-desc">
                                                    <address>
                                                      <strong><i class="fa fa-map-marker" aria-hidden="true"></i> DIRECCIÓN</strong><br>
                                                      <p>Av. Javier Prado este - La Molina <br><small>(al costado del colegio Alpamayo)</small></p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-location-arrow" aria-hidden="true"></i> TIEMPO - DISTANCIA</strong><br>
                                                      <p>A 10 minutos de la USIL en carro</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-coffee" aria-hidden="true"></i> NO INCLUYE DESAYUNO</strong>
                                                    </address>
                                                    <a href="https://www.airbnb.com.pe/rooms/1412675?check_in=2017-11-25&check_out=2017-12-03&location=La%20Molina%2C%20Lima%2C%20Per%C3%BA&s=kMkPOPzE&guests=1&adults=1" target="_blank" class="btn btn-default btn-lg">MÁS INFORMACIÓN</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="hospe-list">
                                                    <h4>BENEFICIOS</h4>
                                                    <ul>
                                                        <li>Incluye servicios básicos, limpieza.</li>
                                                        <li>Pueden usar el comedor, utensilios de cocina y frigde, lavadero (con lavadora)</li>
                                                        <li>Uso de la televisión por cable, DVD (situado en el pasillo)</li>
                                                        <li>Uso del Internet</li>
                                                        <li>Uso de plancha.</li>
                                                        <li>Uso de la línea fija para recibir llamadas.</li>
                                                        <li>Seguridad en Condominio. Área de parrilla.</li>
                                                        <li>Hay tiendas cercanas. Parqueo.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="hospe-image">
                                                    <div class="hospe-image-box">
                                                        <img src="hospedaje/alojamiento-3p4p.png" class="img-responsive">
                                                    </div>
                                                    <h2>Alojamiento <br><strong>para 3 a 4 personas</strong></h2> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="hospe-desc">
                                                    <address>
                                                      <strong><i class="fa fa-map-marker" aria-hidden="true"></i> DIRECCIÓN</strong><br>
                                                      <p>Av. Circunvalación del Golf - Surco</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-location-arrow" aria-hidden="true"></i> TIEMPO - DISTANCIA</strong><br>
                                                      <p>A 6 min de la USIL en carro</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-coffee" aria-hidden="true"></i> NO INCLUYE DESAYUNO</strong>
                                                    </address>
                                                    <a href="https://www.airbnb.com.pe/rooms/17152798?check_in=2017-11-25&check_out=2017-12-03&location=La%20Molina%2C%20Lima%2C%20Per%C3%BA&s=kMkPOPzE&guests=1&adults=1" target="_blank" class="btn btn-default btn-lg">MÁS INFORMACIÓN</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="hospe-list">
                                                    <h4>BENEFICIOS</h4>
                                                    <ul>
                                                        <li>El departamento cuenta con wifi, cocina, elementos básicos, lavadora, TV, acceso a la piscina y parqueo</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="hospe-image">
                                                    <div class="hospe-image-box">
                                                        <img src="hospedaje/alojamiento-4p5p.png" class="img-responsive">
                                                    </div>
                                                    <h2>Alojamiento <br><strong>para 4 a 5 personas</strong></h2> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="hospe-desc">
                                                    <address>
                                                      <strong><i class="fa fa-map-marker" aria-hidden="true"></i> DIRECCIÓN</strong><br>
                                                      <p>Av. El Sol - La Molina</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-location-arrow" aria-hidden="true"></i> TIEMPO - DISTANCIA</strong><br>
                                                      <p>A 20 min de la USIL</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-coffee" aria-hidden="true"></i> NO INCLUYE DESAYUNO</strong>
                                                    </address>
                                                    <a href="https://www.airbnb.com.pe/rooms/19095170?adults=5&check_in=2017-11-25&check_out=2017-12-03&guests=5&location=La%20Molina%2C%20Lima%2C%20Per%C3%BA&s=pkMgBtQn" target="_blank" class="btn btn-default btn-lg">MÁS INFORMACIÓN</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="hospe-list">
                                                    <h4>BENEFICIOS</h4>
                                                    <ul>
                                                        <li>La casa cuenta con cocina, calefacción, lavadora, secadora y parqueo.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="hospe-image">
                                                    <div class="hospe-image-box">
                                                        <img src="hospedaje/alojamiento-5p7p.png" class="img-responsive">
                                                    </div>
                                                    <h2>Alojamiento <br><strong>para 5 a 7 persona</strong></h2> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="hospe-desc">
                                                    <address>
                                                      <strong><i class="fa fa-map-marker" aria-hidden="true"></i> DIRECCIÓN</strong><br>
                                                      <p>Av. Raul Ferrero - La Molina</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-location-arrow" aria-hidden="true"></i> TIEMPO - DISTANCIA</strong><br>
                                                      <p>A 7 min de la USIL en carro</p>
                                                    </address>
                                                    <address>
                                                      <strong><i class="fa fa-coffee" aria-hidden="true"></i> NO INCLUYE DESAYUNO</strong>
                                                    </address>
                                                    <a href="https://www.airbnb.com.pe/rooms/16403511?guests=7&adults=7&location=La%20Molina%2C%20Departamento%20de%20Lima&check_in=2017-11-26&check_out=2017-12-03&s=llfAvzdH#host-profile" target="_blank" class="btn btn-default btn-lg">MÁS INFORMACIÓN</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="hospe-list">
                                                    <h4>BENEFICIOS</h4>
                                                    <ul>
                                                        <li>Incluye servicio de limpieza, tiene wifi, cocina, zona para trabajar, lavadora, secador, entre otros elementos básicos.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navi-hospedajes bottom">
                                    <nav aria-label="...">
                                      <ul class="pager" style="margin: 20px;">
                                        <li class="previous"><a href="javascript:void(0);" class="prev_hospedajes" style="background: transparent; color: #fff; font-size: 14px; font-weight: bold;"><i class="fa fa-angle-left" aria-hidden="true"></i> ANTERIOR</a></li>
                                        <li class="next"><a href="javascript:void(0);" class="next_hospedajes" style="background: transparent; color: #fff; font-size: 14px; font-weight: bold;">SIGUIENTE <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                      </ul>
                                    </nav>
                                </div>
                                <div class="footer-hospedajes">
                                    <ul>
                                        <li>Tipo de Cambio Empleado S/.3.24</li>
                                        <li>Toda la información es meramente referencial y los precios/atributos del servicio/producto pueden variar.  Se recomienda a cada participante contratar directamente con el proveedor.</li>
                                        <li>La universidad San Ignacio de Loyola no brindará ninguno de estos servicios (a excepción del Di), ni se hace responsable bajo ningún tipo de circunstancia por estos servicios/ productos de forma directa o indirecta. </li>
                                        <li><span>*precios aproximados, sujetos a variación.</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="alimentacion">
                            	<div class="cont-di">
                            		<img src="img/cafe.png" class="cafe">
                            		<div class="row">
                            			<div class="col-xs-8">
                            				<h2>Desayunos y almuerzos Saludables <span>en el Di Cafe</span></h2>
                            			</div>
                            			<div class="col-xs-4">
                            				<img src="img/logo-di.png" class="logo-di img-responsive">
                            			</div>
                            		</div>
                            		<div class="row">
                            			<div class="col-md-5 col-md-offset-1 col-sm-6">
	                            			<h3>Desayunos:</h3>
	                            			<h4>Opción 1:</h4>
					                        <ul>
					                            <li>Yogurt con granola y miel de abeja</li>
					                            <li>Café</li>
					                            <li>Jugo de frutas </li>
					                        </ul>
					                        <p><strong>S/.14.00</strong></p>
					                        <br>
					                        <h4>Opción 2: </h4>
					                        <ul>
					                            <li>Mixto caliente (pan integral, queso y jamón de pavo)</li>
					                            <li>Café </li>
					                            <li>Jugo de frutas</li>
					                        </ul>
					                        <p><strong>S/.15.00</strong></p>
					                        <br>
					                        <h4>Opción 3: </h4>
					                        <ul>
					                            <li>Muffin  integral de frutas mixtas,</li>
					                            <li>Café</li>
					                            <li>Jugo de frutas</li>
					                        </ul>
					                        <p><strong>S/12.00</strong></p>
					                        <br>
					                        <h4>Opción 4: </h4>
					                        <ul>
					                            <li>Barra de granola</li>
					                            <li>Café </li>
					                            <li>Fruta.</li>
					                        </ul>
					                        <p><strong>S/.10.00</strong></p>
					                        <br>
					                        <h4>Opcion 5: </h4>
					                        <ul>
					                            <li>Avena </li>
					                            <li>Café</li>
					                            <li>Fruta</li>
					                        </ul>
					                        <p><strong>S/. 12.00</strong></p>
	                            		</div>
	                            		<div class="col-md-5 col-sm-6">
	                            			<br>
	                            			<br>
	                            			<br>
	                            			<br>
	                            			<h3>Almuerzos:</h3>
	                            			<h4>Opción 1</h4>
					                        <p>Solterito de quinua (quinua tricolor, humus, lechugas mixtas, habas verdes,   queso fresco, palta, choclo y hierba buena) con agua de día</p>
					                        <p><strong>S/. 20.00</strong></p>
					                        <br>
					                        <h4>Opción 2: </h4>
					                        <p>Sándwich light(pan árabe, tomates grillados, pepino, pollo deshilachado, palta, brotes y yogurt) con agua del día</p>
					                        <p><strong>S/. 16.00</strong></p>
					                        <br>
					                        <h4>Opción 3</h4>
					                        <p>Ensalada Di ( lechugas mixtas, tomate, zanahoria, pasas negras, fideos chinos fritos, palta y pollo a la plancha) con agua del día</p>
					                        <p><strong>S/. 16.00</strong></p>
					                        <br>
					                        <h4>Opción 4: </h4>
					                        <p>Veggie sándwich ( berenjenas, zapallito italiano, salsa de tomate, queso paria y albahaca fresca) con agua del día</p>
					                        <p><strong>S/.16.00</strong></p>
					                        <br>
					                        <h4>Opción 5:</h4>
					                        <p>Triple clásico, Panini mixto, Capresse con sopa del día y agua del día </p>
					                        <p><strong>S/.20.00</strong></p>
	                            		</div>
                            		</div>
                            		<div class="row text-center">
                            			<div class="col-md-12">
                            				<br>
                                            <br>
                            				<span><big><i class="fa fa-map-marker" aria-hidden="true"></i> Dirección: San Ignacio De Loyola 150, La Molina 15024</big></span><br>
                            				<span><big><i class="fa fa-phone" aria-hidden="true"></i> Teléfono:(01) 5183338</big></span>
                            			</div>
                            		</div>
                            		<img src="img/ensalada.png" class="ensalada">
                            		<img src="img/frutas.png" class="frutas">
                            	</div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="actividades-lima">
								<div class="panel-group" id="accordion_acti" role="tablist" aria-multiselectable="true">
  									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingA1">
									      <h4 class="panel-title">
									        <a role="button" data-toggle="collapse" data-parent="#accordion_acti" href="#collapseA1" aria-expanded="true" aria-controls="collapseA1">
									          <strong>Escapadas y excursiones</strong> de un día en Lima:
									          <span class="right-arrow pull-right">+</span>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseA1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingA1">
									      <div class="panel-body">
									            <div class="row">
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour1.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">                        
									                            <h4>Lunahuana:</h4>
									                            <p>excursión de rafting, tirolina y bodega desde Lima.</p>
									                            <!--<p><strong>$ 233.15</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour6.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">                
									                            <h4>Callao:</h4>
									                            <p>Tour from the Port of Callao</p>
									                            <!--<p><strong>$ 81.09</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="row">
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour2.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Yacimiento arqueológico de Caral:</h4>
									                            <p>Excursión privada con todo incluido al yacimiento arqueológico de Caral.</p>
									                            <!--<p><strong>$ 248.35</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour7.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Lima:</h4>
									                            <p>Day Trip to Pre-Inca Sites with Lunch from Lima</p>
									                            <!--<p><strong>$ 129.72</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="row">
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour3.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Islas Ballestas y la reserva nacional de Paracas:</h4>
									                            <p>Excursión de día completo a las Islas Ballestas y la reserva nacional de Paracas.</p>
									                            <!--<p><strong>$ 184.49</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour8.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Lunahuana:</h4>
									                            <p>Full-Day Lunahuana Rafting and Canopy Tour</p>
									                            <!--<p><strong>$ 263.55</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="row">
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour4.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Líneas de Nazca e Islas Ballestas:</h4>
									                            <p>Excursión de día completo con recorrido aéreo por las líneas de Nazca e Islas Ballestas</p>
									                            <!--<p><strong>$ 496.70</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour9.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Ica:</h4>
									                            <p>Full-Day Ica and Huacachina Sand Dunes Tour</p>
									                            <!--<p><strong>$ 258.48</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									            </div>
									            <div class="row">
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour5.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Montaña Olleros:</h4>
									                            <p>Ruta en bicicleta de montaña en la montaña Olleros desde Lima</p>
									                            <!--<p><strong>$ 401.41</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									                <div class="col-md-6">
									                    <div class="row box-tour">
									                        <div class="col-md-5 col-sm-4">
									                            <img src="img/tour10.jpg">
									                        </div>
									                        <div class="col-md-7 col-sm-8">
									                            <h4>Ictiotherapy and Clay Therapy:</h4>
									                            <p>Ictiotherapy and Clay Therapy at the Blue Lagoon</p>
									                            <!--<p><strong>$ 17.22</strong></p>-->
									                        </div>
									                    </div>
									                </div>
									            </div>
									                                            <div class="row">
									                                                <div class="col-md-12 text-center">
									                                                    <a href="https://www.tripadvisor.com.pe/Attraction_Products-g294316-zfg11867-Lima_Lima_Region.html" target="_blank" class="btn btn-cta btn-default btn-lg" tabindex="0">MÁS INFORMACIÓN</a>
									                                                </div>
									                                            </div>
									      </div>
									    </div>
 						 			</div>
  									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingA2">
									      <h4 class="panel-title">
									        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_acti" href="#collapseA2" aria-expanded="false" aria-controls="collapseA2">
									          <strong>Tours privados y personalizados</strong> en Lima:
									          <span class="right-arrow pull-right">+</span>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseA2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingA2">
									      	<div class="panel-body">
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour11.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Barranco:</h4>
	                                                            <p>Cena buffet privada y espectáculo típico peruano en Lima con visita al distrito de Barranco</p>
	                                                            <!--<p><strong>$ 65.89</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour15.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Circuito Mágico del Agua:</h4>
	                                                            <p>Recorrido nocturno privado por Lima con Circuito Mágico del Agua</p>
	                                                            <!--<p><strong>$ 48.65</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour12.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Pachacamac y Barranco:</h4>
	                                                            <p>Tour privado: Yacimiento arqueológico de Pachacamac y Barranco</p>
	                                                            <!--<p><strong>$ 57.77</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour16.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Museums of Lima:</h4>
	                                                            <p>Top Museums of Lima Private Tour</p>
	                                                            <!--<p><strong>$ 91.23</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-6">                           
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour13.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Miraflores:</h4>
	                                                            <p>Recorrido privado: compras en Lima en Larcomar y mercado de Miraflores</p>
	                                                            <!--<p><strong>$ 31.41</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour17.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Lima en autobús</h4>
	                                                            <p>Recorrido turístico por la ciudad de Lima en autobús descubierto</p>
	                                                            <!--<p><strong>$ 28.38</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-6">                                    
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour14.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Lima y mercado indio:</h4>
	                                                            <p>Visita privada: Lima y mercado indio local</p>
	                                                            <!--<p><strong>$ 96.30</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-12 text-center">
	                                                    <a href="https://www.tripadvisor.com.pe/Attraction_Products-g294316-zfg11882-Lima_Lima_Region.html" target="_blank" class="btn btn-cta btn-default btn-lg" tabindex="0">MÁS INFORMACIÓN</a>
	                                                </div>
	                                            </div>
      										</div>
    									</div>
  									</div>
  									<div class="panel panel-default">
									    <div class="panel-heading" role="tab" id="headingA3">
									      <h4 class="panel-title">
									        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_acti" href="#collapseA3" aria-expanded="false" aria-controls="collapseA3">
									          <strong>Gastronomía, vino y vida nocturna</strong> en Lima:
									          <span class="right-arrow pull-right">+</span>
									        </a>
									      </h4>
									    </div>
									    <div id="collapseA3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingA3">
									      	<div class="panel-body">
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour18.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Clase de cocina:</h4>
	                                                            <p>Clase de cocina en Lima con una familia local</p>
	                                                            <!--<p><strong>$ 75.01</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour21.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Clase de cocina:</h4>
	                                                            <p>Clase de cocina y recorrido gastronómico en Lima</p>
	                                                            <!--<p><strong>$ 151.94</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour19.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Clase de cocina:</h4>
	                                                            <p>Clase de cocina peruana incluyendo una visita al mercado y degustación de frutas exóticas</p>
	                                                            <!--<p><strong>$ 76.02</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">   
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour22.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Recorrido a pie:</h4>
	                                                            <p>Recorrido a pie por los colores y sabores de Lima</p>
	                                                            <!--<p><strong>$ 57.27</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                        <img src="img/tour20.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>ChocoMuseo:</h4>
	                                                            <p>ChocoMuseo de Miraflores en Lima: Taller de chocolate</p>
	                                                            <!--<p><strong>$ 30.41</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                                <div class="col-md-6">
	                                                    <div class="row box-tour">
	                                                        <div class="col-md-5 col-sm-4">
	                                                            <img src="img/tour23.jpg">
	                                                        </div>
	                                                        <div class="col-md-7 col-sm-8">
	                                                            <h4>Recorrido por bares</h4>
	                                                            <p>Recorrido por bares de Lima Bar con degustaciones de comida y bebidas</p>
	                                                            <!--<p><strong>$ 45.61</strong></p>-->
	                                                        </div>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            <div class="row">
	                                                <div class="col-md-12 text-center">
	                                                    <a href="https://www.tripadvisor.com.pe/Attraction_Products-g294316-zfg11868-Lima_Lima_Region.html" target="_blank" class="btn btn-cta btn-default btn-lg" tabindex="0">MÁS INFORMACIÓN</a>
	                                                </div>
	                                            </div>
								      		</div>
								    	</div>
								  	</div>
								</div>
                                <div class="footer-hospedajes">
                                    <ul>
                                        <li>Tipo de Cambio Empleado S/.3.24</li>
                                        <li>Toda la información es meramente referencial y los precios/atributos del servicio/producto pueden variar.  Se recomienda a cada participante contratar directamente con el proveedor.</li>
                                        <li>La universidad San Ignacio de Loyola no brindará ninguno de estos servicios (a excepción del Di), ni se hace responsable bajo ningún tipo de circunstancia por estos servicios/ productos de forma directa o indirecta. </li>
                                        <li><span>*precios aproximados, sujetos a variación.</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="noticias" style="display:block;">
    	<a href="#noticias" class="go-to">
	        <div class="up">
	            <i class="fa fa-angle-down" aria-hidden="true"></i>
	        </div>
	    </a>
    	<div class="container">
    		<div class="row text-center">
    			<div class="col-md-12">
    				<h2>Últimas <strong>noticias</strong></h2>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-12">
    				<div id="blogarea">
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/dra-teresa-blanco-asesora-de-la-carrera-de-nutricion-de-la-usil-recibio-reconocimiento-de-la-sociedad-peruana-de-nutricion.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>29 de Mayo 2017</span>
			    					<img src="blog/img/dra-teresa-blanco-asesora-de-la-carrera-de-nutricion-de-la-usil-recibio-reconocimiento-de-la-sociedad-peruana-de-nutricion.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>Dra. Teresa Blanco, asesora de la Carrera de Nutrición de la USIL, recibió reconocimiento de la Sociedad Peruana de Nutrición</h2>
			    						<p>El pasado viernes 26 de mayo, la Sociedad Peruana de Nutrición (Sopenut) otorgó el reconocimiento “Socia Honoraria” a la Dra. Teresa Blanco de Alvarado-Ortiz, asesora de...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/usil-organizo-el-ii-simposio-internacional-estilo-de-vida-saludable-nutricion-ejercicio-y-prevencion-de-enfermedades-cronicas.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>17 de Mayo 2017</span>
			    					<img src="blog/img/usil-organizo-el-ii-simposio-internacional-estilo-de-vida-saludable-nutricion-ejercicio-y-prevencion-de-enfermedades-cronicas.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>USIL organizó el II Simposio Internacional “Estilo de Vida Saludable: Nutrición, Ejercicio y Prevención de Enfermedades Crónicas”</h2>
			    						<p>Con el objetivo de actualizar los conocimientos sobre los hábitos de estilo de vida saludable y la práctica de actividad física para prevenir la aparición de enfermedades crónicas...</p>
			    						<br>			    						
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/usil-organiza-el-ii-simposio-internacional-estilo-de-vida-saludable-nutricion-ejercicio-y-prevencion-de-enfermedades-cronicas.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>12 de Mayo 2017</span>
			    					<img src="blog/img/usil-organiza-el-ii-simposio-internacional-estilo-de-vida-saludable-nutricion-ejercicio-y-prevencion-de-enfermedades-cronicas.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>USIL organiza el II Simposio Internacional: “Estilo de vida saludable: nutrición, ejercicio y prevención de enfermedades crónicas”</h2>
			    						<p>Continúan las actividades del Modo USIL que promueve  una cultura de vida desde el enfoque de la Medicina Funcional Integrativa, postulando las prácticas saludables...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/finalizo-el-i-simposio-internacional-sobre-medicina-funcional-hacia-la-medicina-del-futuro-prevenir-antes-que-curar-organizado-por-usil.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>28 de Abril 2017</span>
			    					<img src="blog/img/finalizo-el-i-simposio-internacional-sobre-medicina-funcional-hacia-la-medicina-del-futuro-prevenir-antes-que-curar-organizado-por-usil.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>Finalizó el I Simposio Internacional sobre Medicina Funcional: “Hacia la medicina del futuro. Prevenir antes que curar”, organizado por USIL</h2>
			    						<p>Con la asistencia de médicos, enfermeras, nutricionistas, farmacéuticos, profesionales y estudiantes del área médica, la Facultad de Ciencias de la Salud de la Universidad San Ignacio de Loyola...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/federico-martinez-es-necesario-analizar-al-paciente-en-sus-siete-sistemas-operativos.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>27 de Abril 2017</span>
			    					<img src="blog/img/federico-martinez-es-necesario-analizar-al-paciente-en-sus-siete-sistemas-operativos.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>Federico Martínez: “Es necesario analizar al paciente en sus siete sistemas operativos”</h2>
			    						<p>El Dr. Federico Martínez, especialista en Medicina Funcional fue entrevistado en el programa “A la cuenta de tres”, emitido por TV Perú y explicó en qué consiste la Medicina Funcional...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/usil-dio-inicio-al-i-simposio-internacional-sobre-medicina-funcional-hacia-la-medicina-del-futuro-prevenir-antes-que-curar.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>26 de Abril 2017</span>
			    					<img src="blog/img/usil-dio-inicio-al-i-simposio-internacional-sobre-medicina-funcional-hacia-la-medicina-del-futuro-prevenir-antes-que-curar.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>USIL dio inicio al I Simposio Internacional sobre Medicina Funcional: “Hacia la medicina del futuro. Prevenir antes que curar”</h2>
			    						<p>Con el objetivo de promover en el Perú el novedoso enfoque de la Medicina Funcional, la Facultad de Ciencias de la Salud de la Universidad San Ignacio de Loyola...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/la-importancia-de-la-medicina-funcional-entrevista-a-luciana-de-la-fuente-en-plus-tv.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>21 de Abril 2017</span>
			    					<img src="blog/img/la-importancia-de-la-medicina-funcional-entrevista-a-luciana-de-la-fuente-en-plus-tv.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>La importancia de la Medicina Funcional (entrevista a Luciana de la Fuente en Plus TV)</h2>
			    						<p>Esta mañana, Luciana de la Fuente, presidenta ejecutiva de la Universidad San Ignacio de Loyola (USIL) y coach nutricional, y al Dr. Federico Martínez, especialista en Medicina Funcional...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/usil-fue-sede-del-primer-encuentro-de-universidades-saludables-2017.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>10 de Abril 2017</span>
			    					<img src="blog/img/usil-fue-sede-del-primer-encuentro-de-universidades-saludables-2017.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>USIL fue sede del primer encuentro de universidades saludables 2017</h2>
			    						<p>A fin de intercambiar experiencias exitosas para construir conjuntamente las perspectivas y lineamientos de un plan de trabajo, la USIL en coordinación con la Dirección Ejecutiva de Promoción de la Salud de la Dirección de Salud IV Lima - Este del Ministerio de Salud...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
		    			<div class="blog-item" style="padding:10px;">
		    				<a href="blog/usil-international-business-school-aprobo-a-sus-primeras-doctoras-de-nutricion.html" class="modal-post">
		    					<div class="box-noticia">
			    					<span>05 de Abril 2017</span>
			    					<img src="blog/img/usil-international-business-school-aprobo-a-sus-primeras-doctoras-de-nutricion.jpg" class="img-responsive">
			    					<div class="white">
			    						<h2>USIL International Business School aprobó a sus primeras doctoras de Nutrición</h2>
			    						<p>El pasado miércoles 15 de marzo, Alexandra Cucufate y Karen Adams sustentaron con éxito su tesis para optar el grado de Doctor en Nutrición en las instalaciones de la USIL International Business School...</p>
			    						<br>
			    						<span>Leer más</span>
			    					</div>
			    				</div>
		    				</a>	
		    			</div>
    				</div>

    				<div class="modal fade bs-example-modal-lg ModalBlog" id="ModalBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    					<div class="modal-dialog modal-lg" role="document">
    						<div class="modal-content">
    							<div class="modal-header">
    								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    								<h4 class="modal-title text-muted" id="myModalLabel">ÚLTIMAS NOTICIAS</h4>
    							</div>
    							<div class="modal-body">

    							</div>
    							<div class="modal-footer">
    								<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    							</div>
    						</div>
    					</div>
    				</div>    				

    			</div>
    		</div>
    		<br>
    		<br>
    		<div class="row text-center">
    			<div class="col-md-12">
    				<a href="#formulario" class="registrate go-to">Regístrese para participar</a>
    				<button type="button" class="btn btn-primary btn-lg registrate" data-toggle="modal" data-target="#registro-modal">Regístrese y pague en línea aquí</button>

    			</div>
    		</div>
    	</div>
    </section>

    <section id="formulario">
    	<a href="#formulario" class="go-to">
	        <div class="up">
	            <i class="fa fa-angle-down" aria-hidden="true"></i>
	        </div>
	    </a>
    	<div class="container">
    		<div class="row text-center">
    			<div class="col-md-12">
    				<h2>Preinscríbase aquí</h2>
    				<H3>para participar</H3>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-8 col-md-offset-2 col-xs-10 col-xs-offset-1">

                        <div id="registro">

                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="<?php echo $_tab_01; ?>"><a href="#home" class="tab" aria-controls="home" role="tab" data-toggle="tab" style="padding: 5px 5px; font-size: 12px;">NUEVOS PARTICIPANTES</a></li>
                            <li role="presentation" class="<?php echo $_tab_02; ?>"><a href="#profile" class="tab" aria-controls="profile" role="tab" data-toggle="tab" style="padding: 5px 5px; font-size: 12px;">INVITADOS</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane <?php echo $_tab_01; ?>" id="home">
                                <form id="nuevo" action="http://conoce.usil.edu.pe/actions/landings-g/web-forms.php" method="post" class="" data-toggle="validator" role="form" style="">
									<div class="row">
						                <div class="col-sm-6">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Cuál es su nombre?</label>
						                    <input type="text" id="n_nombre_1" name="nombre_1" class="form-control" placeholder="Ingrese su nombre ..." data-error="No olvide ingresar su nombre" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						                <div class="col-sm-6">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Sus apellidos?</label>
						                    <input type="text" id="n_apellido_1" name="apellido_1" class="form-control" placeholder="Ingrese sus apellidos ..." data-error="No olvide ingresar sus apellidos" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						            </div>
									<div class="row">
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">Empresa donde Labora</label>
						                    <input type="text" id="n_empresa_1" name="empresa_1" class="form-control" placeholder="Ingrese su empresa ..." data-error="No olvide ingresar su empresa" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Cuál es su cargo?</label>
						                    <input type="text" id="n_cargo_1" name="cargo_1" class="form-control" placeholder="Ingrese su cargo ..." data-error="No olvide ingresar su cargo" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Cuál es su especialidad?</label>
						                    <input type="text" id="n_grado_1" name="grado_1" class="form-control" placeholder="Ingrese su especialidad ..." data-error="No olvide ingresar su especialidad" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						            </div>
						            <div class="row">
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">Déjenos su número de celular</label>
						                    <input type="tel" class="form-control" id="n_telefono_1" name="telefono_1" placeholder="Ingrese su número de celular ..." data-error="No olvide ingresar su número de celular" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Cuál es su correo electrónico?</label>
						                    <input type="email" id="n_email_1" name="email_1" class="form-control" placeholder="Ingrese su correo ..." data-error="Por favor ingrese un correo válido" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
						                <div class="col-sm-4">
						                  <div class="form-group has-feedback">
						                    <label for="">¿Cuál es su DNI?</label>
						                    <input type="text" id="n_numdni_1" name="numdni_1" minlength="8" maxlength="8" class="form-control" placeholder="Ingrese su número de DNI ..." data-error="No olvide ingresar su número de DNI" required>
						                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						                    <div class="help-block with-errors"></div>
						                  </div>
						                </div>
									</div>
						            <div class="row">
						                <div class="col-sm-12">
						                  <div class="form-group">
						                    <div class="checkbox">
						                      <label><input type="checkbox" id="n_terms" name="terms" value="SI" data-error="Debes marcar esta casilla para continuar" required> <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#myModal" style="font-size: 12px;">Acepto las condiciones para el tratamiento de mis datos personales</a></label>
						                      <div class="help-block with-errors"></div>
						                    </div>						                    
	                                        <div class="well well-sm" style="font-size:14px;margin:0px;background-color: rgba(27, 37, 47, 0.50);border-color: #1b252f;color: #00c5bb;padding: 5px;"><small>Luego de su preinscripción, estaremos en contacto con usted para indicarle la inversión de su participación y brindarle toda la información del evento.</small></div>
	                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                                          <div class="modal-dialog" role="document">
	                                            <div class="modal-content">
	                                              <div class="modal-header">
	                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                                <h4 class="modal-title text-muted" id="myModalLabel">TÉRMINOS Y CONDICIONES</h4>
	                                              </div>
	                                              <div class="modal-body">
	                                                <h4 class="text-muted">CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES - PERSONAS INTERESADAS</h4>
	                                                <p class="text-muted">De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales y su Reglamento aprobado mediante D.S. 003-2013-JUS, el interesado otorga su consentimiento expreso para que los datos personales que facilite queden incorporados en el Banco de Datos  Personales de Personas Interesadas en la UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A. – USIL y sean tratados por esta con la finalidad de absolver sus consultas y brindarles información publicitaria, dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad y prospección comercial, fines estadísticos, históricos, científicos y educación. El usuario autoriza a que USIL mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados. El interesado podrá ejercer su derecho de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales descargando el formato Solicitud de Atención de Derechos PDP desde la web <a class="enlace" href="www.usil.edu.pe/arco" target="_blank" style="margin: 0; font-size: 11px; line-height: 1;">www.usil.edu.pe/arco</a> y enviándolo a la dirección de correo electrónico <a class="enlace" href="mailto:arco@usil.edu.pe" style="margin: 0; font-size: 11px; line-height: 1;">arco@usil.edu.pe</a> o presentándolo físicamente en Recepción USIL, ubicada en Av. La Fontana 750, La Molina, Lima, Perú.</p>
	                                              </div>
	                                              <div class="modal-footer">
	                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                                                <button id="n_form_terms_check_frm" type="button" class="btn btn-primary go-to-form" data-dismiss="modal">Aceptar</button>
	                                              </div>
	                                            </div>
	                                          </div>
	                                        </div>
						                  </div>
						                </div>
						            </div>
                                    <div class="row" style="display:none;">
                                        <input type="text" name="unidad" id="unidad" value="USIL FACULTAD DE CIENCIAS DE LA SALUD" style="display:none;">
                                        <input type="text" name="campa" id="campa" value="Evento Simposio Medicina Funcional" style="display:none;">
                                        <input type="text" name="destinatarios" id="destinatarios" value="emontoya@usil.edu.pe, cgarcia@usil.edu.pe, wcampos@usil.edu.pe" style="display:none;">
                                        <input type="text" name="url_gracias" id="url_gracias" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp/gracias.php" style="display:none;">
                                        <input type="text" name="url_error" id="url_error" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp/error.php" style="display:none;">
                                      <input type="text" class="hide" style="display:none;" id="utm_source" name="utm_source" value="<?php echo $_utm_source; ?>" required>
                                      <input type="text" class="hide" style="display:none;" id="utm_medium" name="utm_medium" value="<?php echo $_utm_medium; ?>" required>
                                      <input type="text" class="hide" style="display:none;" id="utm_term" name="utm_term" value="<?php echo $_utm_term; ?>" required><!-- UTM CARRERA -->
                                      <input type="text" class="hide" style="display:none;" id="utm_campaign" name="utm_campaign" value="<?php echo $_utm_campaign; ?>" required>
                                      <input type="text" class="hide" style="display:none;" id="utm_content" name="utm_content" value="<?php echo $_utm_content; ?>" required><!-- UTM MEDIDAS PIEZA -->
                                    </div>
                                    <button id="btn_submit_form" type="submit" class="btn btn-block btn-lg btn-success enviar" style="">ENVIAR PREINSCRIPCIÓN</button>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane <?php echo $_tab_02; ?>" id="profile">
                                <?php if(($_accion == 'invitado') and ($_id > 0)) {  ?>
	                                <form id="invitado_2" action="http://conoce.usil.edu.pe/actions/landings-g/web-forms.php" method="post" class="" data-toggle="validator" role="form" style="">
	                                	<h5>Verifique que todos los campos han sido completado correctamente</h5>
										<div class="row">
							                <div class="col-sm-6">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu nombre?</label>
							                    <input type="text" id="nombre_1" name="nombre_1" class="form-control" value="<?php echo $_nombre_1; ?>" placeholder="Ingresa tu nombre ..." data-error="No olvides ingresar tu nombre" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							                <div class="col-sm-6">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Tus apellidos?</label>
							                    <input type="text" id="apellido_1" name="apellido_1" class="form-control" value="<?php echo $_apellido_1; ?>" placeholder="Ingresa tus apellidos ..." data-error="No olvides ingresar tus apellidos" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							            </div>
										<div class="row">
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">Empresa donde Labora</label>
							                    <input type="text" id="empresa_1" name="empresa_1" class="form-control" value="<?php echo $_empresa_1; ?>" placeholder="Ingresa tu empresa ..." data-error="No olvides ingresar tu empresa" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu cargo?</label>
							                    <input type="text" id="cargo_1" name="cargo_1" class="form-control" value="<?php echo $_cargo_1; ?>" placeholder="Ingresa tu cargo ..." data-error="No olvides ingresar tu cargo" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu especialidad?</label>
							                    <input type="text" id="grado_1" name="grado_1" class="form-control" placeholder="Ingresa tu especialidad ..." data-error="No olvides ingresar tu especialidad" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							            </div>
							            <div class="row">
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">Déjanos tu celular</label>
							                    <input type="tel" class="form-control" id="telefono_1" name="telefono_1" value="<?php echo $_telefono_1; ?>" placeholder="Ingresa tu número de celular ..." data-error="No olvides ingresar tu número de celular" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu correo?</label>
							                    <input type="email" id="email_1" name="email_1" class="form-control" value="<?php echo $_email_1; ?>" placeholder="Ingresa tu correo ..." data-error="Por favor ingresa un correo válido" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
							                <div class="col-sm-4">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu DNI?</label>
							                    <input type="text" id="numdni_1" name="numdni_1" minlength="8" maxlength="8" class="form-control" value="<?php echo $_numdni_1; ?>" placeholder="Ingresa tu número de DNI ..." data-error="No olvides ingresar tu número de DNI" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
										</div>
							            <div class="row">
							                <div class="col-sm-12">
							                  <div class="form-group">
							                    <div class="checkbox">
							                      <label><input type="checkbox" class="check" id="i2_terms" name="terms" value="SI" data-error="Debes marcar esta casilla para continuar" required> <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#myModal1" style="font-size: 12px;">Aceptas las condiciones para el tratamiento de tus datos personales</a></label>
							                      <div class="help-block with-errors"></div>
							                    </div>						                    
		                                        <div class="well well-sm" style="font-size:14px;margin:0px;background-color: rgba(27, 37, 47, 0.50);border-color: #1b252f;color: #00c5bb;padding: 5px;"><small>Luego de su preinscripción, estaremos en contacto con usted para indicarle la inversión de su participación y brindarle toda la información del evento.</small></div>
		                                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                                              <div class="modal-dialog" role="document">
	                                                <div class="modal-content">
	                                                  <div class="modal-header">
	                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                                    <h4 class="modal-title text-muted" id="myModalLabel">TÉRMINOS Y CONDICIONES</h4>
	                                                  </div>
	                                                  <div class="modal-body">
	                                                    <h4 class="text-muted">CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES - PERSONAS INTERESADAS</h4>
	                                                    <p class="text-muted">De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales y su Reglamento aprobado mediante D.S. 003-2013-JUS, el interesado otorga su consentimiento expreso para que los datos personales que facilite queden incorporados en el Banco de Datos  Personales de Personas Interesadas en la UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A. – USIL y sean tratados por esta con la finalidad de absolver sus consultas y brindarles información publicitaria, dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad y prospección comercial, fines estadísticos, históricos, científicos y educación. El usuario autoriza a que USIL mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados. El interesado podrá ejercer su derecho de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales descargando el formato Solicitud de Atención de Derechos PDP desde la web <a class="enlace" href="www.usil.edu.pe/arco" target="_blank" style="margin: 0; font-size: 11px; line-height: 1;">www.usil.edu.pe/arco</a> y enviándolo a la dirección de correo electrónico <a class="enlace" href="mailto:arco@usil.edu.pe" style="margin: 0; font-size: 11px; line-height: 1;">arco@usil.edu.pe</a> o presentándolo físicamente en Recepción USIL, ubicada en Av. La Fontana 750, La Molina, Lima, Perú.</p>
	                                                  </div>
	                                                  <div class="modal-footer">
	                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                                                    <button id="form_terms_check_frm" type="button" class="btn btn-primary go-to-form" data-dismiss="modal">Aceptar</button>
	                                                  </div>
	                                                </div>
	                                              </div>
	                                            </div>
							                </div>
							            </div>
	                                    <div class="row" style="display:none;">
	                                        <input type="text" name="unidad" id="unidad" value="USIL FACULTAD DE CIENCIAS DE LA SALUD" style="display:none;">
	                                        <input type="text" name="campa" id="campa" value="Evento Simposio Medicina Funcional" style="display:none;">
	                                        <input type="text" name="destinatarios" id="destinatarios" value="emontoya@usil.edu.pe, cgarcia@usil.edu.pe, wcampos@usil.edu.pe" style="display:none;">
	                                        <input type="text" name="url_gracias" id="url_gracias" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp/gracias.php" style="display:none;">
	                                        <input type="text" name="url_error" id="url_error" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp/error.php" style="display:none;">
                                          <input type="text" class="hide" style="display:none;" id="utm_source" name="utm_source" value="<?php echo $_utm_source; ?>" required>
                                          <input type="text" class="hide" style="display:none;" id="utm_medium" name="utm_medium" value="<?php echo $_utm_medium; ?>" required>
                                          <input type="text" class="hide" style="display:none;" id="utm_term" name="utm_term" value="<?php echo $_utm_term; ?>" required><!-- UTM CARRERA -->
                                          <input type="text" class="hide" style="display:none;" id="utm_campaign" name="utm_campaign" value="<?php echo $_utm_campaign; ?>" required>
                                          <input type="text" class="hide" style="display:none;" id="utm_content" name="utm_content" value="<?php echo $_utm_content; ?>" required><!-- UTM MEDIDAS PIEZA -->                                            
	                                    </div>
	                                    <button id="i2_btn_submit_form" type="submit" class="btn btn-block btn-lg btn-success enviar" style="">ENVIAR PREINSCRIPCIÓN</button>
	                                </form>
                                <?php } else { ?>
	                                <form id="invitado_1" action="index.php?accion=invitado" method="post" class="" data-toggle="validator" role="form" style="">
                                        <h5>Si ha participado en el Primer Simposio Internacional de Medicina Funcional, por favor ingrese su DNI. De lo contrario, vaya a la pestaña Nuevos participantes. </h5>
							            <div class="row">
							                <div class="col-sm-12">
							                  <div class="form-group has-feedback">
							                    <label for="">¿Cuál es tu DNI?</label>
							                    <input type="text" id="numdni_1" name="numdni_1" minlength="8" maxlength="8" class="form-control" value="<?php echo $_numdni_1; ?>" placeholder="Ingresa tu número de DNI ..." data-error="No olvides ingresar tu número de DNI" required>
							                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
							                    <div class="help-block with-errors"></div>
							                  </div>
							                </div>
										</div>
							            <div class="row">
							                <div class="col-sm-12">
							                  <div class="form-group">
							                    <div class="checkbox">
							                      <label><input type="checkbox" class="check" id="terms" name="terms" value="SI" data-error="Debes marcar esta casilla para continuar" required> <a href="javascript:void(0);" type="button" data-toggle="modal" data-target="#myModal2" style="font-size: 12px;">Aceptas las condiciones para el tratamiento de tus datos personales</a></label>
							                      <div class="help-block with-errors"></div>
							                    </div>						                    
		                                        <div class="well well-sm" style="font-size:14px;margin:0px;background-color: rgba(27, 37, 47, 0.50);border-color: #1b252f;color: #00c5bb;padding: 5px;"><small>Luego de su preinscripción, estaremos en contacto con usted para indicarle la inversión de su participación y brindarle toda la información del evento.</small></div>
		                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	                                              <div class="modal-dialog" role="document">
	                                                <div class="modal-content">
	                                                  <div class="modal-header">
	                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                                                    <h4 class="modal-title text-muted" id="myModalLabel">TÉRMINOS Y CONDICIONES</h4>
	                                                  </div>
	                                                  <div class="modal-body">
	                                                    <h4 class="text-muted">CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES - PERSONAS INTERESADAS</h4>
	                                                    <p class="text-muted">De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales y su Reglamento aprobado mediante D.S. 003-2013-JUS, el interesado otorga su consentimiento expreso para que los datos personales que facilite queden incorporados en el Banco de Datos  Personales de Personas Interesadas en la UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A. – USIL y sean tratados por esta con la finalidad de absolver sus consultas y brindarles información publicitaria, dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad y prospección comercial, fines estadísticos, históricos, científicos y educación. El usuario autoriza a que USIL mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados. El interesado podrá ejercer su derecho de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales descargando el formato Solicitud de Atención de Derechos PDP desde la web <a class="enlace" href="www.usil.edu.pe/arco" target="_blank" style="margin: 0; font-size: 11px; line-height: 1;">www.usil.edu.pe/arco</a> y enviándolo a la dirección de correo electrónico <a class="enlace" href="mailto:arco@usil.edu.pe" style="margin: 0; font-size: 11px; line-height: 1;">arco@usil.edu.pe</a> o presentándolo físicamente en Recepción USIL, ubicada en Av. La Fontana 750, La Molina, Lima, Perú.</p>
	                                                  </div>
	                                                  <div class="modal-footer">
	                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                                                    <button id="form_terms_check_frm" type="button" class="btn btn-primary go-to-form" data-dismiss="modal">Aceptar</button>
	                                                  </div>
	                                                </div>
	                                              </div>
	                                            </div>
							                  </div>
							                </div>
							            </div>
	                                    <button id="i1_btn_submit_form" type="submit" class="btn btn-block btn-lg btn-success enviar" style="">CONTINUAR</button>
                                    </form>
                                <?php } ?>
                            </div>
                          </div>

                        </div>

    			</div>
    		</div>
    	</div>
    </section>
    <section id="informes">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<h2><strong>Informes y contactos</strong></h2>
    				<h3>Nos puede contactar en</h3>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-sm-3">
    				<DIV class="box-contac">
    					<i class="fa fa-map-marker" aria-hidden="true"></i>
    					<p>Av. La Fontana 550,<br> La Molina</p>
    				</DIV>
    			</div>
    			<div class="col-sm-3">
    				<DIV class="box-contac">
    					<i class="fa fa-phone" aria-hidden="true"></i>
    					<p>Tel.: (51) 1 518 3333</p>
    				</DIV>
    			</div>
    			<div class="col-sm-3">
    				<DIV class="box-contac">
    					<i class="fa fa-envelope" aria-hidden="true"></i>
    					<p>medfuncional@usil.edu.pe</p>
    				</DIV>
    			</div>
    			<div class="col-sm-3">
    				<DIV class="box-contac">
    					<img src="img/icon-globe.png">
    					<p>www.usil.edu.pe/AFMCP</p>
    				</DIV>
    			</div>
    		</div>
    	</div>
    </section>

    <footer>
    	<div class="container">
    		<div class="row">
    			<div class="col-sm-6 ">
    				<!--<h2>Pague en línea con <img src="img/visa.png"></h2>-->
    			</div>
    			<div class="col-sm-3">
    				<img src="img/logo-AMFCP.png" class="img-responsive">
    			</div>
    			<div class="col-sm-3">
    				<img src="img/logo-usil-medicina.png" class="img-responsive">
    			</div>
    		</div>
    	</div>
    </footer>


    <!-- Modal -->
<!-- Modal -->
			<div class="modal fade" id="myModalvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			        <iframe id="player-testimonial" class="embed-responsive-item" src="https://www.youtube.com/embed/iAedQ9fv3i4" frameborder="0" allowfullscreen></iframe>

			      </div>
			      <div class="modal-footer">
			        
			      </div>
			    </div>
			  </div>
			</div>
			<!-- FIN Modal -->

<!--- FIN MODAL -->

		<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Política de protección de datos</h4>
              </div>
              <div class="modal-body">
                <p><strong>CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES - PERSONAS INTERESADAS</strong><br />De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales y su Reglamento aprobado mediante D.S. 003-2013-JUS, el interesado otorga su consentimiento expreso para que los datos personales que facilite queden incorporados en el <b>Banco de Datos  Personales de Personas Interesadas en la UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A. – USIL</b> y sean tratados por esta con la finalidad de absolver sus consultas y brindarles información publicitaria, dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad y prospección comercial, fines estadísticos, históricos, científicos y educación. El usuario autoriza a que USIL mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados. El interesado podrá ejercer su derecho de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales descargando el formato Solicitud de Atención de Derechos PDP desde la web <a href="http://www.usil.edu.pe/arco/" target="_blank">www.usil.edu.pe/arco</a> y enviándolo a la dirección de correo electrónico <a href="mailto:arco@usil.edu.pe">arco@usil.edu.pe</a> o presentándolo físicamente en Recepción USIL, ubicada en Av. La Fontana 750, La Molina, Lima, Perú.</p>
              </div>
              <div class="modal-footer">
                <div class="btn-group">
                  <button type="button" class="btn btn-primary " id="btn-check-terms" data-dismiss="modal"><i class="fa fa-fw fa-check"></i> Aceptar</button>
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>


        <!-- Modal -->
			<div class="modal fade" id="registro-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">PAGO EN LINEA</h4>
                  </div>
                  <div class="modal-body">
                    <form id="form" action="http://conoce.usil.edu.pe/actions/afmcp/web-forms.php" method="post" class="form-modal-box" data-toggle="validator" role="form" style="" novalidate="true">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su nombre?</label>
                                        <input type="text" id="p_nombre_1" name="nombre_1" class="form-control" placeholder="Ingrese su nombre ..." data-error="No olvide ingresar su nombre" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su apellido paterno?</label>
                                        <input type="text" id="p_apellido_1" name="apellido_1" class="form-control" placeholder="Ingrese su apellido paterno ..." data-error="No olvide ingrese su apellido paterno" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su apellido materno?</label>
                                        <input type="text" id="p_apellido_2" name="apellido_2" class="form-control" placeholder="Ingrese su apellido materno ..." data-error="No olvide ingrese su apellido materno" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group has-feedback">
                                        <label for="">Tipo de documento</label>
                                        <select id="p_tipodni_1" name="tipodni_1" class="form-control" data-error="Seleccione el tipo de documento" required>
                                            <option value="">Seleccionar tipo</option>
                                            <option value="1">Carnet de Extranjería</option>
                                            <option value="2">Carnet de Identidad</option>
                                            <option value="3">DNI</option>
                                            <option value="4">Pasaporte</option>
                                            <option value="5">Partida de Nacimiento</option>
                                            <option value="6">Social Security</option>
                                            <option value="7">ID</option>
                                            <option value="8">Licencia de Conducir</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su N° de Documento?</label>
                                        <input type="text" id="p_numdni_1" name="numdni_1" class="form-control" placeholder="Ingrese el numero de documento ..." data-error="Por favor ingrese el número de documento" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su país?</label>
                                        <select id="p_pais_1" name="pais_1" class="form-control" data-error="Seleccione el país" required>
                                            <option value="">Selecciona país</option>
                                            <option value="1">ANGOLA</option>
                                            <option value="2">ARGELIA</option>
                                            <option value="3">BENIN</option>
                                            <option value="4">BOTSWANA</option>
                                            <option value="5">BURKINA FASO</option>
                                            <option value="6">BURUNDI</option>
                                            <option value="7">CABO VERDE</option>
                                            <option value="8">CAMERUN</option>
                                            <option value="9">CHAD</option>
                                            <option value="10">CONGO REP. POPULAR DEL</option>
                                            <option value="11">COSTA DE MARFIL</option>
                                            <option value="12">DJIBOUTI</option>
                                            <option value="13">EGIPTO</option>
                                            <option value="14">ETIOPIA</option>
                                            <option value="15">GABON</option>
                                            <option value="16">GAMBIA</option>
                                            <option value="17">GHANA</option>
                                            <option value="18">GUINEA</option>
                                            <option value="19">GUINEA ECUATORIAL</option>
                                            <option value="20">GUINEA BISSAU</option>
                                            <option value="21">COMORES</option>
                                            <option value="22">KENYA</option>
                                            <option value="23">LESOTHO</option>
                                            <option value="24">LIBERIA</option>
                                            <option value="25">JA LIBIA</option>
                                            <option value="26">MADAGASCAR</option>
                                            <option value="27">MALAWI</option>
                                            <option value="28">MALI</option>
                                            <option value="29">MARRUECOS</option>
                                            <option value="30">MAURITANIA</option>
                                            <option value="31">MOZAMBIQUE</option>
                                            <option value="32">NAMIBIA</option>
                                            <option value="33">NIGER</option>
                                            <option value="34">NIGERIA</option>
                                            <option value="35">REP. CENTROAFRICANA</option>
                                            <option value="36">RWANDA</option>
                                            <option value="37">SANTO TOME Y PRINCIPE</option>
                                            <option value="38">SENEGAL</option>
                                            <option value="39">SEYCHELLES</option>
                                            <option value="40">SIERRA LEONA</option>
                                            <option value="41">SOMALIA</option>
                                            <option value="42">SWAZILANDIA</option>
                                            <option value="43">SUDAFRICA</option>
                                            <option value="44">SUDAN</option>
                                            <option value="45">TANZANIA</option>
                                            <option value="46">TOGO</option>
                                            <option value="47">TUNEZ</option>
                                            <option value="48">UGANDA</option>
                                            <option value="49">ZAIRE</option>
                                            <option value="50">ZAMBIA</option>
                                            <option value="51">ZIMBABWE</option>
                                            <option value="52">MAURICIO</option>
                                            <option value="101">ANTIGUA BARBUDA</option>
                                            <option value="102">ARGENTINA</option>
                                            <option value="103">BAHAMAS</option>
                                            <option value="104">BARBADOS</option>
                                            <option value="105">BELICE</option>
                                            <option value="106">BOLIVIA</option>
                                            <option value="107">BRASIL</option>
                                            <option value="108">CANADA</option>
                                            <option value="109">CHILE</option>
                                            <option value="110">COLOMBIA</option>
                                            <option value="111">COSTA RICA</option>
                                            <option value="112">CUBA</option>
                                            <option value="113">DOMINICA</option>
                                            <option value="114">ECUADOR</option>
                                            <option value="115">EL SALVADOR</option>
                                            <option value="116">ESTADOS UNIDOS DE AMERICA</option>
                                            <option value="117">GRANADA</option>
                                            <option value="118">GUATEMALA</option>
                                            <option value="119">GUYANA</option>
                                            <option value="120">GUAYANA FRANCESA</option>
                                            <option value="121">HAITI</option>
                                            <option value="122">HONDURAS</option>
                                            <option value="123">JAMAICA</option>
                                            <option value="124">MEXICO</option>
                                            <option value="125">NICARAGUA</option>
                                            <option value="126">PANAMA</option>
                                            <option value="127">PARAGUAY</option>
                                            <option value="128">PERU</option>
                                            <option value="129">PUERTO RICO</option>
                                            <option value="130">REPUBLICA DOMINICANA</option>
                                            <option value="131">SAN CRISTOBAL Y NEVIS</option>
                                            <option value="132">SAN VICENTE Y LAS GRANADINAS</option>
                                            <option value="133">SANTA LUCIA</option>
                                            <option value="134">SURINAME</option>
                                            <option value="135">TRINIDAD Y TABAGO</option>
                                            <option value="136">URUGUAY</option>
                                            <option value="137">VENEZUELA</option>
                                            <option value="201">AFGANISTAN</option>
                                            <option value="202">ARABIA SAUDITA</option>
                                            <option value="203">BAHREIN</option>
                                            <option value="204">BANGLADESH</option>
                                            <option value="205">MYANMAR</option>
                                            <option value="206">BRUNEI</option>
                                            <option value="207">BHUTAN</option>
                                            <option value="208">CHINA REPUBLICA POPULAR DE</option>
                                            <option value="209">CHIPRE</option>
                                            <option value="210">COREA REPUBLICA DE</option>
                                            <option value="211">COREA REPUBLICA DEM.POP. DE</option>
                                            <option value="212">EMIRATOS ARABES UNIDOS</option>
                                            <option value="213">FILIPINAS</option>
                                            <option value="214">INDIA</option>
                                            <option value="215">INDONESIA</option>
                                            <option value="216">IRAQ</option>
                                            <option value="217">IRAN</option>
                                            <option value="218">MALDIVAS</option>
                                            <option value="219">ISRAEL</option>
                                            <option value="220">JAPON</option>
                                            <option value="221">JORDANIA</option>
                                            <option value="222">CAMBOYA</option>
                                            <option value="223">KUWAIT</option>
                                            <option value="224">LAO REPUBLICA DEM. POP. DE</option>
                                            <option value="225">LIBANO</option>
                                            <option value="226">MALASIA, FEDERACION DE</option>
                                            <option value="227">MONGOLIA</option>
                                            <option value="228">NEPAL</option>
                                            <option value="229">OMAN</option>
                                            <option value="230">PAKISTAN</option>
                                            <option value="231">QATAR</option>
                                            <option value="232">SINGAPUR</option>
                                            <option value="233">SIRIA</option>
                                            <option value="234">SRI LANKA ( CEILAN)</option>
                                            <option value="235">TAILANDIA</option>
                                            <option value="236">TAIWAN (CHINA NACIONALISTA)</option>
                                            <option value="237">TURQUIA</option>
                                            <option value="238">VIET NAM</option>
                                            <option value="241">YEMEN REPUBLICA DE</option>
                                            <option value="242">ARMENIA</option>
                                            <option value="243">AZERBAIYAN</option>
                                            <option value="244">GEORGIA</option>
                                            <option value="245">KAZAJSTAN</option>
                                            <option value="246">KIRGUISTAN</option>
                                            <option value="247">TAYISKISTAN</option>
                                            <option value="248">TURKMENISTAN</option>
                                            <option value="249">UZBEKISTAN</option>
                                            <option value="301">ALBANIA</option>
                                            <option value="302">ALEMANIA</option>
                                            <option value="303">ANDORRA</option>
                                            <option value="304">AUSTRIA</option>
                                            <option value="305">BELGICA</option>
                                            <option value="306">BULGARIA</option>
                                            <option value="307">CHECOSLOVAQUIA</option>
                                            <option value="308">DINAMARCA</option>
                                            <option value="309">ESPAÑA</option>
                                            <option value="310">FINLANDIA
                                            <option value="311">FRANCIA</option>
                                            <option value="312">GRECIA</option>
                                            <option value="313">HUNGRIA</option>
                                            <option value="314">IRLANDA</option>
                                            <option value="315">ISLANDIA</option>
                                            <option value="316">ITALIA</option>
                                            <option value="317">LIECHTENSTEIN
                                            <option value="318">LUXEMBURGO</option>
                                            <option value="319">MALTA</option>
                                            <option value="320">MONACO PRINCIPADO DE</option>
                                            <option value="321">NORUEGA</option>
                                            <option value="322">PAISES BAJOS (HOLANDA)</option>
                                            <option value="323">POLONIA</option>
                                            <option value="324">PORTUGAL</option>
                                            <option value="325">REINO UNIDO</option>
                                            <option value="326">RUMANIA</option>
                                            <option value="327">SAN MARINO</option>
                                            <option value="328">SUECIA</option>
                                            <option value="329">SUIZA</option>
                                            <option value="331">SANTA SEDE (VATICANO)</option>
                                            <option value="333">BELARUS</option>
                                            <option value="334">ESTONIA</option>
                                            <option value="335">LETONIA</option>
                                            <option value="336">LITUANIA</option>
                                            <option value="337">MOLDOVA</option>
                                            <option value="338">RUSIA FEDERACION DE</option>
                                            <option value="339">UCRANIA</option>
                                            <option value="340">BOSNIA-HERZEGOVINA</option>
                                            <option value="341">CROACIA</option>
                                            <option value="342">ESLOVENIA</option>
                                            <option value="343">MACEDONIA REPUBLICA DE</option>
                                            <option value="344">YUGOSLAVIA REP. FEDERAL DE</option>
                                            <option value="401">AUSTRALIA</option>
                                            <option value="402">NUEVA ZELANDIA</option>
                                            <option value="403">SAMOA OCCIDENTAL</option>
                                            <option value="404">TONGA</option>
                                            <option value="405">MICRONESIA EST. FEDERADOS DE</option>
                                            <option value="406">FIJI</option>
                                            <option value="407">ISLAS MARSHALL</option>
                                            <option value="408">ISLAS SALOMON</option>
                                            <option value="409">KIRIBATI</option>
                                            <option value="410">NAURU</option>
                                            <option value="411">PAPUA NUEVA GUINEA</option>
                                            <option value="412">TUVALU</option>
                                            <option value="413">VANUATU</option>
                                            <option value="414">EMIRATOS ARABES UNIDOS</option>
                                            <option value="415">PALESTINA</option>
                                        </select>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group has-feedback">
                                        <label for="">Déjenos su número de celular</label>
                                        <input type="tel" id="p_telefono_1" name="telefono_1" class="form-control" placeholder="Ingrese el numero de celular ..." data-error="Por favor ingrese el número de celular" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group has-feedback">
                                        <label for="">¿Cuál es su correo electrónico?</label>
                                        <input type="email" id="p_email_1" name="email_1" class="form-control" placeholder="Ingrese su correo ..." data-error="Por favor ingrese un correo válido" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>      
                                <div class="col-sm-4">
                                    <div class="form-group has-feedback">
                                        <label for="">Número de inscritos</label>
                                        <input type="number" min="1" max="11" value="1" id="p_consulta_1" name="consulta_1" class="form-control" placeholder="Ingrese el número de inscritos ..." data-error="Por favor ingrese el número de inscritos" required>
                                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                      
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label><input type="checkbox" id="termin" name="terms" value="SI" data-error="Debes marcar esta casilla para continuar" required> Aceptas las condiciones para el tratamiento de tus datos personales</label>
                                            <div class="help-block with-errors"></div>
                                            <div class="condiciones">
                                                CONSENTIMIENTO PARA EL TRATAMIENTO DE DATOS PERSONALES - PERSONAS INTERESADAS</strong><br />De conformidad con la Ley N° 29733 - Ley de Protección de Datos Personales y su Reglamento aprobado mediante D.S. 003-2013-JUS, el interesado otorga su consentimiento expreso para que los datos personales que facilite queden incorporados en el <b>Banco de Datos  Personales de Personas Interesadas en la UNIVERSIDAD SAN IGNACIO DE LOYOLA S.A. – USIL</b> y sean tratados por esta con la finalidad de absolver sus consultas y brindarles información publicitaria, dándoles usos que incluyen temas referidos al análisis de perfiles, publicidad y prospección comercial, fines estadísticos, históricos, científicos y educación. El usuario autoriza a que USIL mantenga sus datos personales en el banco de datos referido en tanto sean útiles para la finalidad y usos antes mencionados. El interesado podrá ejercer su derecho de acceso, actualización, rectificación, inclusión, oposición y supresión o cancelación de datos personales descargando el formato Solicitud de Atención de Derechos PDP desde la web <a href="http://www.usil.edu.pe/arco/" target="_blank">www.usil.edu.pe/arco</a> y enviándolo a la dirección de correo electrónico <a href="mailto:arco@usil.edu.pe">arco@usil.edu.pe</a> o presentándolo físicamente en Recepción USIL, ubicada en Av. La Fontana 750, La Molina, Lima, Perú.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">

                        <input type="text" name="unidad" id="unidad" value="USIL FACULTAD DE CIENCIAS DE LA SALUD" style="display:none;">
                        <input type="text" name="campa" id="campa" value="Evento Simposio Medicina Funcional - VISA" style="display:none;">
                        <input type="text" name="destinatarios" id="destinatarios" value="wcampos@usil.edu.pe, rvega@usil.edu.pe" style="display:none;">
                        <input type="text" name="url_gracias" id="url_gracias" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp-pruebas/gracias.php" style="display:none;">
                        <input type="text" name="url_error" id="url_error" value="http://conoce.usil.edu.pe/eventos/simposio-medicina-funcional/afmcp-pruebas/error.php" style="display:none;">
                          <input type="text" class="hide" style="display:none;" id="utm_source" name="utm_source" value="<?php echo $_utm_source; ?>" required>
                          <input type="text" class="hide" style="display:none;" id="utm_medium" name="utm_medium" value="<?php echo $_utm_medium; ?>" required>
                          <input type="text" class="hide" style="display:none;" id="utm_term" name="utm_term" value="<?php echo $_utm_term; ?>" required><!-- UTM CARRERA -->
                          <input type="text" class="hide" style="display:none;" id="utm_campaign" name="utm_campaign" value="<?php echo $_utm_campaign; ?>" required>
                          <input type="text" class="hide" style="display:none;" id="utm_content" name="utm_content" value="<?php echo $_utm_content; ?>" required><!-- UTM MEDIDAS PIEZA -->
                          <button type="submit" class="btn btn-block btn-lg btn-success" style="background-color: <?php echo $_ut_colo; ?>; border-color: <?php echo $_ut_colo; ?>; text-decoration: underline;">REGISTRAR Y PAGAR</button>
                        </div>
                      </form>
                  </div>
                </div>
              </div>
            </div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="pluggins/bootstrap/jquery.js"></script>
<script type="text/javascript" src="pluggins/bootstrap/bootstrap.js"></script>
<script type="text/javascript" src="pluggins/slick/slick.js"></script>
<script type="text/javascript" src="pluggins/wow.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script src="js/validator.min.js"></script>
<script type="text/javascript">
$('#form').validator({
  disable:false,
  feedback: {
    success: 'glyphicon-ok-circle',
    error: 'glyphicon-exclamation-sign'
  }
}).on('submit', function (e) {
  if (e.isDefaultPrevented()) {}
  else {
    $("#send_form_btn").prop("disabled", true);      
  }
})

</script>

<script type="text/javascript">
$(document).ready(function(){ 
  	$("#numdni_1").keydown(function (e) {
	    // Allow: backspace, delete, tab, escape, enter and .
	    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
	    // Allow: Ctrl+A
	    (e.keyCode == 65 && e.ctrlKey === true) ||
	    // Allow: Ctrl+C
	    (e.keyCode == 67 && e.ctrlKey === true) ||
	    // Allow: Ctrl+X
	    (e.keyCode == 88 && e.ctrlKey === true) ||
	    // Allow: home, end, left, right
	    (e.keyCode >= 35 && e.keyCode <= 39)) {
	      // let it happen, don't do anything
	      return;
	    }
	    // Ensure that it is a number and stop the keypress
	    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
	      e.preventDefault();
	    }
  	});

  	<?php echo $_script_jump; ?>

	$('.modal-post').click(function(e) {
	    var modal = $('#ModalBlog'), modalBody = $('#ModalBlog .modal-body');

	    modal.on('show.bs.modal', function () {
	    	modalBody.load(e.currentTarget.href)
	    }).modal();
	    e.preventDefault();
	});

    $('.modal-profile').click(function(e) {
        var modal = $('#ModalProfile'), modalBody = $('#ModalProfile .modal-body');

        modal.on('show.bs.modal', function () {
            modalBody.load(e.currentTarget.href)
        }).modal();
        e.preventDefault();
    });

    $("#myModalvideo").on('hidden.bs.modal', function (e) {
        $("#myModalvideo iframe").attr("src", $("#myModalvideo iframe").attr("src"));
    });    

    $('.carru-fotos-hotel').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        prevArrow:'<i class="fa fa-angle-left flecha1" aria-hidden="true"></i>',
        nextArrow:'<i class="fa fa-angle-right flecha2" aria-hidden="true"></i>',
    });    
    $('.carru-hospedajes').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
    });  

});
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96178919-8', 'auto');
  ga('send', 'pageview');

</script>

<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '161979954141740');
fbq('track', "PageView");
fbq('track', 'CompleteRegistration');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=161979954141740&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->

</body>
</html>