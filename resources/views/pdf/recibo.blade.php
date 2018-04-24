<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{
            margin: -3mm -3mm -3mm -3mm;
            font-size: 10px;
            font-family: Helvetica;	
        }
        .titulo1{
            
        }

        .titulo2{
            /* background-color: #dfe6e9; */
            /* background-color: #b2bec3; */
        }

        .general{
            /* background-color: #2C3E50; */
            /* color: #fff; */
            font-size: 9px;
        }
        .direc{
            font-size: 9px;
        }
    </style>
    @if($recibo->cancelado==1)
        <style>
            body{
                background-image: url('http://lax.megatravel.com.mx/img/cancelado.png'); 
                background-repeat: no-repeat;
                background-position: center;
            }
        </style>
    @endif
</head>
<body>
<table class="central" width='100%' border='0' cellpadding='0' cellspacing='0'>
	<tr>
		<td>
            {{$recibo->cancelado==1?'es uno': 'no es uno'}}
			<img src='http://lax.megatravel.com.mx/expo/img/logo_mt_.png' width='200px'>
		</td>
		<td colspan="2">
			<table class='direc' width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
				<tr><td>MEGA TRAVEL OPERADORA, S.A DE C.V</td></tr>
				<tr><td>Calle Trinidad 7 Col.Las Américas</td></tr>
				<tr><td>Mpio.Naucalpan C.P53040 Estado de México</td></tr>
				<tr><td>R.F.C. MTO-171211-CN7</td></tr>	
			</table>
        </td>
		<td valign='top'>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr class='general'>
   					<th align='center'>RECIBO</th>
					<th align='center'>TIPO DE CAMBIO</th>
				</tr>
				<tr>
					<td align='center'>{{$recibo->folio}}</td>
					<td align='center'>{{$recibo->fechatc}}<br>{{$recibo->intercam}}</td>
				</tr>
			    <tr class='general'>
 					<th align='center' colspan='2'>LUGAR Y FECHA DE EXPEDICIÓN</th>
				</tr>
				<tr>
 					<td colspan='2' align='center' class='direc'>CIUDAD DE MEXICO {{$recibo->fechahoy}}</td>
				</tr>
			</table>
		</td>
    </tr>
    <!-- Linea de de separacion para el encabezado -->
    <tr>
		<td height='4' colspan='4'>
			<hr width='100%' style='border-top: 1px solid #CCC;border-bottom: 2px solid #CCCCCC; border-left:none; border-right:none; height: 3px;width:100%;'>
		</td>
    </tr>
    <!-- Fin linea de separcion enbezado -->

    <tr>
		<td>
			<table width='100%' cellpadding='0' cellspacing='0' class='direc'>
				<tr>
					<td> Av.Chapultepec No.536<br> Piso 7 Col.Roma Norte<br> Del.Cuahutémoc <br> C.P 06700 Mexico D.F. </td>
				</tr>
			</table>
        </td>
        <!-- Inicia seccion de datos personales del cliente -->
		<td colspan='3'>
			<table width='100%' cellpadding='0' cellspacing='0'>
				<tr>
					<th align='left'>CLIENTE:</th>
					<td colspan='3'>{{$recibo->nombre}}</td>
				</tr>
				<tr>
					<th align='left'>DIRECCIÓN:</th>
					<td colspan='3'>{{$recibo->direccion}}, COL. {{$recibo->colonia}}, MUN./DEL.: {{$recibo->mundel}}, ESTADO: {{$recibo->estado}}, C.P.: {{$recibo->codigop}}</td>
				</tr>
				<tr>
					<th align='left'>TELS.:</th>
					<td>{{$recibo->telefono}}</td>
                </tr>
                <tr>
                    <th>R.F.C:</th>
					<td>{{$recibo->rfc}}</td>
                </tr>
			</table>
        </td> 
        <!-- Fin seccion de datos personales del cliente -->
    </tr>

    <tr>
		<td height='4' colspan='4'>
			<hr width='100%' style='border-top: 1px solid #CCC;border-bottom: 2px solid #CCCCCC; border-left:none; border-right:none; height: 3px;width:100%;'>
		</td>
    </tr>
    <tr>
        <td ></td>
        <td></td>
        <td></td>
        <td valign='top'>
            <table width='100%' cellpadding='0' cellspacing='0'>
                <tr class='general'>
                    <th align='center'>VENTAS</th>
                </tr>
                <tr>
                    <td align='center'>{{$recibo->iniciales}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td height='4' colspan='4'>
            <hr width='100%' style='border-top: 1px solid #CCC;border-bottom: 2px solid #CCCCCC; border-left:none; border-right:none; height: 3px;width:100%;'>
        </td>
    </tr>
    <!-- Inicia seccion del expediente -->
    <tr> 
        <td colspan='4'  style='background: url(http://lax.megatravel.com.mx/expo/img/logo_mt.png) center no-repeat;'>
            <table width='100%' cellpadding='0' cellspacing='0' >
                <tr class='general'>
                    <th>EXPEDIENTE</th>
                    <th colspan='2' align='left'>PASAJEROS</th>
                    <th>F. SALIDA</th>
                    <th  align='center'>SERVICIOS</th>
                    <th  align='center'>IMPORTE </th>
                </tr>
                <tr>
                    <td>{{$recibo->cid_expediente}}</td>
                    <td  colspan='2' style='font-weight: bolder;font-family:Courier New ,Courier, monospace;'>{{$recibo->pasajero}}</td>
                    <td>{{$recibo->fsalida}}</td>
                    <td  align='center'>{{$recibo->destino}}</td>
                    <td  align='center'>{{$recibo->monto}} {{$recibo->moneda}}</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

                <tr class='titulo2'>
                    <td>&nbsp;<strong>FORMA DE PAGO:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->concepto}}</td>
                </tr>

                <tr class='titulo1'>
                    <td>&nbsp;<strong>FECHA OP:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->fechaop}}</td>
                </tr>

                <tr class='titulo2'>
                    <td>&nbsp;<strong>BANCO:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->banco}}</td>
                </tr>

                <tr class='titulo1'>
                    <td>&nbsp;<strong>CUENTA:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->cuenta}}</td>
                </tr>

                <tr class='titulo2'>
                    <td>&nbsp;<strong>MONEDA:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->moneda}}</td>
                </tr>

                <tr class='titulo1'>
                    <td>&nbsp;<strong>REFERENCIA/AUT:</strong></td>
                    <td colspan="5">&nbsp;{{$recibo->referencia}}</td>
                </tr>

                <tr>
                    <td height='20' colspan='5'>&nbsp;I.V.A. Tasa Cero por ser servicios prestados en el Extranjero.</td>
                </tr>
                <tr>
                    <td colspan='6'></td>
                </tr>
                <tr>
                    <td colspan='6' align='center' style='text-decoration:underline'>Cadena Digital</td>
                </tr>
                <tr>
                    <td colspan='6' align='center'>{{$recibo->encrip}}</td>
                </tr>
                @if($recibo->cancelado==1)
                <tr>
                    <td colspan='4' align='right'>
                        <table style='font-size:8px;' cellpadding='0' cellspacing='0'>
                            <tr>
                                <td>Cancelado Por &nbsp;</td>
                                <td>{{$recibo->quiencance}}</td>
                            </tr>
                            <tr>
                                <td>F.Cancelación &nbsp;</td>
                                <td>{{$recibo->fcancela}}</td>
                            </tr>
                            <tr>
                                <td>Motivo &nbsp;</td>
                                <td>{{$recibo->motivocanc}}</td>
                            </tr>
                        </table>		
                    </td>			
                </tr>
                @endif
            </table>
        </td>
    </tr>
    <!-- Fin seccion del expediente -->
    <tr><td height='15'>&nbsp;</td></tr>

    <!-- Inicia seccion total a pagar -->
    <tr>	
        <td colspan='4'>
            <table width='100%' cellpadding='0' cellspacing='0'>
                <tr class='general'>
                    <th colspan='3' align='left'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL CON LETRA</th>
                    <th align='center'>&nbsp;&nbsp;&nbsp;TOTAL A PAGAR $ </th>
                </tr>
                <tr >
                    <td colspan='3' align='left'>&nbsp;&nbsp;&nbsp;{{$recibo->letras}}</td>
                    <td align='center'>{{$recibo->monto}} {{$recibo->moneda}}</td>	
                </tr>
            </table>
        </td>
    </tr>
    <!--Finaliza seccion total a pagar-->
    <tr>
        <td height='4' colspan='4'>
            <hr width='100%' style='border-top: 2px solid #CCC;border-bottom: 2px solid #CCCCCC; border-left:none; border-right:none; height: 3px;width:100%;'>
        </td>
    </tr>
    <!-- Inicia extracto de contrato megatravel -->
    <tr>
        <td colspan='4' align='justify' style='background: url(http://lax.megatravel.com.mx/expo/img/logo_mt.png) center no-repeat; font-size:7px; color: #666; font-family: 'Times New Roman', Times, serif'>
        EXTRACTO DEL CONTRATO DE ADHESION DE MEGA TRAVEL OPERADORA, S.A. DE C.V. REGISTRO PROFECO 1316-05 LIBRO 2° VOL 1° NO EXPED PFC. B.E. 7/471-2005 DE FECHA 19 DE MAYO DEL 2005. TERCERA.- EL CLIENTE  acepta que la intervención de LA AGENCIA sea única y exclusivamente con carácter de intermediaria entre los prestadores directos de los servicios solicitados y señalados al anverso de este contrato. QUINTA.- EL CLIENTE reconoce y acepta su total obligación y responsabilidad de proporcionar datos veraces y correctos sobre las edades, sexo, nombres o apellidos de los usuarios-turistas, así como de los datos e información completa para la formación del itinerario y la reservación de servicios terrestres y marítimos (hoteles, visitas, autos de alquiler, restaurantes, cruceros, etc.) relevando a LA AGENCIA de cualquier responsabilidad por cambios de itinerario generados por datos mal proporcionados a LA AGENCIA, o por cualquier error en datos proporcionados por EL CLIENTE para la emisión o compra de boletos aéreos como puede ser el caso de edades, sexo nombres, apellidos, fechas, rutas, líneas aéreas, horarios, clases, categorías, etc. apegándose en su caso a las cláusulas de cancelación para servicios aéreos, terrestres, marítimos o de cruceros expresadas en este contrato. SEXTA.- Ambas partes convienen en que  LA AGENCIA  queda relevada de responsabilidades por daños, heridas, accidentes, retrasos o irregularidades que sobrevengan por causas de fuerza mayor o caso fortuito que durante la ejecución de los servicios pudiera ocurrirle a EL CLIENTE por no ser la persona directamente encargada de prestar los servicios correspondientes y por ser solo intermediarias entre estas y EL CLIENTE. SEPTIMA.- EL CLIENTE se compromete a apegarse y a respetar los reglamentos y condiciones de servicio establecidas por cada uno de los prestadores de servicios contratados por intermediación de LA AGENCIA, por lo que LA AGENCIA debe hacer del conocimiento de EL CLIENTE las que sean más importantes y en consecuencia declina cualquier responsabilidad que pudiera derivar por su incumplimiento. Así mismo, EL CLIENTE deberá por medio propios proveerse de los pasaportes o documentos de migración requeridos por las autoridades de los Estados Unidos Mexicanos, y de los países de destino ó de transito, tales como visas, permisos sanitarios, etc. en los casos de viajes internacionales y se compromete a presentarse en los aeropuertos y documentarse ante las aerolíneas con dos horas de anticipación en los casos de vuelos internacionales y con una hora y treinta minutos de anticipación en los vuelos nacionales, salvo la instrucción expresa y por escrito que reciba de LA AGENCIA. DECIMA PRIMERA.- Ambas partes convienen en que el pago de anticipos o liquidación del importe de los servicios objeto de este contrato por parte de EL CLIENTE , así como el uso del contrato mismo, cupones, boletos, cortesías, o cualquier otro documento expedido en su favor con motivo del mismo, implica de su parte la aceptación total del contrato, así como de las condiciones generales de contratación del presente contrato. DECIMA NOVENA.- Una vez que LA AGENCIA recibe por parte de EL CLIENTE el o los importes equivalente al costo de los servicios aéreos, LA AGENCIA cuenta con la autorización inmediata de EL CLIENTE para emitir, expedir o adquirir los boletos aéreos a su nombre, apegándose y aceptando las políticas de cancelación, emisión y venta de boletos de las compañías aéreas nacionales e internacionales, las políticas de expedición, emisión y venta de boletos aéreos de IATA International y a las cláusulas Vigésima Segunda y Vigésima Tercera expresadas en este contrato para el caso de los servicios aéreos. VIGESIMA.- En el caso concreto de excursiones o servicios terrestres, tanto nacionales como internacionales, EL CLIENTE podrá solicitar la cancelación de sus servicios haciéndolo saber única y estrictamente por escrito a LA AGENCIA misma que dará contestación en un lapso no mayor a 72 horas de su recepción comprobable y a falta de respuesta se entenderá que la cancelación ha sidoaceptada por LA AGENCIA admitiendo EL CLIENTE los cargos de cancelación establecidos a continuación: A) Si se efectúa hasta con un mínimo de 31 días antes de la fecha de salida, NO aplica cargos de cancelación. B) Si se efectúa de 30 a 25 días antes de la fecha de salida, un cargo por cancelación del 10% del costo total del servicio. C) Si se efectúa de 24 a 20 días antes de la fecha de salida, un cargo por cancelación del 15% del costo total del servicio. D) Si se efectúa de 19 a 15 días antes de la fecha de salida, un cargo por cancelación del  25% del costo total del servicio. E) Si se efectúa de 14 a 10 días antes de la fecha de salida, un cargo por cancelación del  50% del costo total del servicio. F) Si se efectúa con menos de 10 días antes de la fecha de salida, un cargo por cancelación del 100% del costo total del servicio. VIGESIMA PRIMERA.- En el caso concreto de los servicios contratados con empresas marítimas, navieras o de cruceros, tanto nacionales como extranjeras, EL CLIENTE podrá solicitar la cancelación de sus servicios haciéndolo saber única y estrictamente por escrito a LA AGENCIA misma que dará contestación en un lapso no mayor a 72 horas de su recepción comprobable y a falta de respuesta se entenderá que la cancelación ha sido aceptada por LA AGENCIA admitiendo EL CLIENTE los cargos de cancelación establecidos a continuación: A) Si se efectúa hasta con 17 días antes de la fecha de salida, un cargo por cancelación del 100% del costo total del servicio. B) Si se efectúa de 18 a 47 días antes de la fecha de salida, un cargo por cancelación del  50% del costo total del servicio. C) Si se efectúa con un mínimo de 48 días antes de la fecha de salida, un cargo por cancelación equivalente al total de los depósitos realizados como anticipo para realizar la reservación del servicio. VIGESIMA SEGUNDA.-  En el caso concreto de los servicios contratados con empresas aéreas, tanto nacionales como extranjeras, la política de cancelación opera de la siguiente manera: A) LA AGENCIA cuenta con la autorización del cliente para emitir, expedir, o adquirir los boletos aéreos de conformidad a la cláusula Décimo Novena de este instrumento. B) EL CLIENTE tiene conocimiento pleno y absoluto de que cualquier boleto aéreo ya expedido o emitido por LA AGENCIA o bien que ya haya sido adquirido por LA AGENCIA misma por intermediación de EL CLIENTE no es reembolsable en parte ni en la totalidad de su costo bajo ningún caso o circunstancia. C) Si la solicitud por parte de EL CLIENTE de la cancelación de las reservaciones aéreas se hicieren antes de la emisión, expedición o compra de los boletos aéreos, se aplicarán los cargos de cancelación expresados en la cláusula Vigésima de este instrumento. VIGESIMA TERCERA.- Una vez expedido los boletos aéreos a favor de el usuario-turista o de EL CLIENTE, LA AGENCIA no se responsabiliza por ningún cambio de itinerario, o por cualquier cambio o error en datos proporcionados por EL CLIENTE para la emisión de boletos aéreos como puede ser el caso de nombres, apellidos, edades, sexo, fechas, rutas, líneas aéreas, clases, categorías, etc. ocurriendo lo mismo para el caso de las reservaciones terrestres y de servicios marítimos o de cruceros. VIGESIMA SEXTA.- LA AGENCIA queda relevada de cualquier responsabilidad derivada de convenios adicionales que se hayan celebrado entre EL CLIENTE y los prestadores directos de los servicios, como son transportistas aéreos y terrestres, navieras, cruceros, hoteles, arrendadoras de autos, etc. VIGESIMA SEPTIMA.- Para el caso de que EL CLIENTE contrate los servicios de Mega Travel  Operadora, S.A. de C.V. por cuenta de diversa agencia de viajes, fungiendo la agencia de viajes como intermediaria, ya sea en el interior de la República Mexicana o en el área Metropolitana de la Ciudad de México, la agencia intermediaria tiene la obligación de hacer saber y comunicar por escrito a sus pasajeros acerca de las condiciones de contratación y de todas y cada una de las cláusulas contenidas en el presente instrumento, del mismo modo, la agencia de viajes intermediaria debe hacerle saber a sus pasajeros o usuarios-turistas que ellos se adhieren y sujetan invariablemente a este mismo contrato de adhesión y a las políticas de reservación y cancelación de los prestadores finales de los servicios. EL CONTRATO DE ADHESION INVARIABLEMENTE FORMA PARTE INTEGRAL DE LA DOCUMENTACION DE LOS SERVICIOS ADQUIRIDOS POR EL CLIENTE. EL CONTRATO DE ADHESION PUEDE SER CONSULTADO DIRECTAMENTE EN PROFECO O BIEN EN LAS OFICINAS DE MEGA TRAVEL OPERADORA, S.A. DE C.V. ES SU DERECHO. CUALQUIER PAGO POR ANTICIPO O LIQUIDACION TOTAL DE SERVICIOS IMPLICA LA ACEPTACION Y EL CONOCIMIENTO TOTAL DE LAS CLAUSULAS ENUNCIADAS EN EL CONTRATO DE ADHESION. ESTE ES UNICAMENTE UN EXTRACTO DEL CONTRATO DE ADHESION DE MEGA TRAVEL OPERADORA, S.A. DE C.V. REGISTRO PROFECO 1316-05 LIBRO 2° VOL 1° NO EXPED PFC. B.E. 7/471-2005 DE FECHA 19 DE MAYO DEL 2005.
        </td>
    </tr>
    <!--Fin extracto de contrato megatravel -->
    <tr>
        <td height='4' colspan='4'>
            <hr width='100%' style='border-top: 2px solid #CCC;border-bottom: 2px solid #CCCCCC; border-left:none; border-right:none; height: 3px;width:100%;'>
        </td>
    </tr>	
    <!-- Inicia efectos legales -->
    <tr>
    <td colspan='4'>
            <table width='100%'>
                <tr>
                    <td valign='middle'>
                        <center><img src='http://lax.megatravel.com.mx/expo/img/rfcmega.jpg' width='120' height='120'></center>
                    </td>
                    <td rowspan='4' align='justify' style='font-size:7px;  color: #666; font-family: 'Times New Roman', Times, serif;' valign='top'>
                        Documentos que sirven como comprobantes fiscales
                        1.2.4.4 Para los efectos del artículo 29 del CFF, los siguientes documentos servirán como comprobantes fiscales respecto de los servicios amparados por ellos.
                        I. Las copias de boletos de pasajeros, guías aéreas de cargo, órdenes de cargos misceláneos y comprobantes de cargo  por exceso de equipaje, expedidos por las líneas aéreas en formatos aprobados por la Secretaría de Comunicación y Transportes o por la Internacional Air Transport Association “IATA”.
                        II. Los notas de cargo a agencias de viaje o a otras líneas aéreas. 
                        III. Las copias de boletos de pasajero expedidos por las líneas de transporte terrestre de pasajeros en formatos aprobados por la Secretaria de Comunicaciones y Transporte o por la Internacional Air Transport Association “IATA”, CFF 29,29, A, RCFF, 37, (RMF 2007 2,4,6) comprobante de agencias de viajes.
                        1.2.4.5 Para los efectos de los artículos 29 y 29A del CFF y 37 de su Reglamento, las agencias de viajes se abstendrán de emitir comprobantes en los términos de dichos preceptos, respecto de las operaciones que realicen en calidad de comisionistas de prestadores de servicios y que vayan a ser prestados por estos últimos. En este caso deberán emitir únicamente los llamados “voucher de servicio”  que acrediten la contratación de tales servicios ante los prestadores de los mismos, cuando se requiera.
                        Tampoco emitirán comprobantes respecto de los ingresos por concepto de comisiones que perciban de la línea aérea y de las notas de crédito que estás les expidan. Tales ingresos se comprobarán con los reportes de boletaje vendidos de vuelos nacionales o internacionales que elaboren las propias agencias de viajes la Internacional Air Transport Association “IATA”  respectivamente en los que se precise por líneas aéreas y por agencia de viajes, el número de boletos vendidos, el importe de las comisiones y créditos correspondientes. Dichos reportes y notas de crédito servirán a las líneas aéreas para comprobar la deducción y el acreditamiento que preceda conforme a las disposiciones fiscales.  
                        CFF 29,29, A, RCFF, 37, (RMF 2007 2,4,16)						
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Fin efectos legales -->
</table>
</body>

</html>
