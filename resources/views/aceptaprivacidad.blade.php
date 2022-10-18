@extends('layouts.form')

@section('content')
<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        {{-- <div class="col-lg-5 col-md-7"> --}}
        <div class="col">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                @if($errors->any())
                    <div class="text-center text-muted mb-4">
                        <small>Oops ! Se encontró un error.</small>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> {{ $errors->first()}}
                    </div>
                @endif              
              <form role="form" method="POST" action="{{ url('/confirmarpolitica') }}">
                @csrf
                <div class="card-body">
                  <div class="card-header display-4">POLITICA DE PRIVACIDAD</div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea3"></label>
                  <textarea class="form-control" id="exampleFormControlTextarea3" rows="14">
                    Declaración de Privacidad y Confidencialidad de INFOCAM SAS
                    En INFOCAM SAS creemos que la protección de los datos personales y de tu empresa es vital para nuestro desarrollo y el suyo. Nos comprometemos a hacer un uso responsable de tus datos personales y los de tu empresa. De este modo, no sólo protegemos la privacidad de quienes nos confiaron sus datos, sino que les permitimos operar con seguridad y confianza.
                    Esta Declaración de Privacidad forma parte de los Términos y Condiciones Generales de INFOCAM SAS. Prestar tu consentimiento voluntario, expreso e informado a esta Declaración de Privacidad es un requisito esencial para poder contratar y/o tener cualquier tipo de relación con INFOCAM SAS, dependiendo de la legislación aplicable en cada país.

                    1. ¿Cómo se integra INFOCAM SAS y cómo aplica esta Declaración de Privacidad?
                    El objetivo de INFOCAM SAS es proveer el mejor servicio de software, IT y seguridad posible en el mercado argentino. Creemos fervientemente en la privacidad de nuestros clientes y usuarios, especialmente para asegurar a quienes confían en nosotros que todos sus datos son confidenciales y se encuentran fuertemente protegidos.
                    Esta Declaración de Privacidad aplica a todos los servicios y operaciones de tratamiento de datos de INFOCAM SAS.
                    Creemos importante destacar que los servicios de INFOCAM SAS y cada una de sus plataformas están destinados a usuarios ubicados en aquellos países en los que INFOCAM SAS tenga presencia u operación, por ejemplo, mediante un Sitio Web específico para un país determinado.

                    2. ¿Quién es el responsable del tratamiento de la Información Personal?
                    INFOCAM SAS es el responsable del tratamiento de los datos de los usuarios y de los visitantes de sus Plataformas a través de sus empresas subsidiarias o filiales.

                    3. ¿Qué información recolectamos y tratamos?
                    INFOCAM SAS recolecta tu información personal para que puedas disfrutar de nuestros servicios, y poder mejorarlos de manera continua.
                    Recopilamos información tuya y de tu empresa de tres formas: cuando nos proporcionás información directamente, cuando recopilamos información mientras utiliza nuestros servicios y cuando recopilamos información de otras fuentes
                    No tenés la obligación de proporcionarnos la información personal que se detalla a continuación, sin embargo, este es un requisito esencial para poder contratar y/o tener cualquier tipo de relación con INFOCAM SAS y, si no proporcionás esta información, no podremos brindarte nuestros servicios o nuestra capacidad para hacerlo puede verse significativamente obstaculizada. La inexactitud o falsedad de los datos personales que proporcionés podría causar la suspensión de los servicios. Asimismo, INFOCAM SAS podrá suspender o inhabilitar definitivamente a aquellos usuarios que violen esta Declaración de Privacidad.
                    Estos son los tipos de datos que podríamos recolectar:
                    Información que nos proporcionas directamente:
                    Información financiera: información sobre números de cuentas bancarias y de tarjetas de pago.
                    Información tributaria: retenciones y estado tributario.
                    Información de identidad: nombre, dirección de correo electrónico, dirección postal, firma y número de teléfono; Número de pasaporte, número de licencia de conducir, número de identificación fiscal u otros números de identificación emitidos por la administración pública.
                    Información sobre los derechos de propiedad intelectual, titularidad de los miembros del programa Brand Protection Program (BPP) e información sobre su actividad como denunciantes.
                    Cualquier otro dato que nos proporcione de forma voluntaria, incluidas sus respuestas a encuestas; participación en concursos, promociones u otras formas o dispositivos de marketing de posibles vendedores; sugerencias de mejoras; referencias; o cualquier otra acción que realice en los servicios.
                    Información que recopilamos al utilizar nuestros servicios:
                    Información sobre los productos y servicios que usted vende, por ejemplo, inventario, precios y otros datos.
                    Información sobre sus transacciones de pago, por ejemplo, cuándo y dónde ocurren las transacciones, una descripción de las transacciones, los importes de los pagos o transferencias, información de facturación y envío, y métodos de pago utilizados para completar las transacciones.
                    Información de los dispositivos o computadoras desde los que accedes a la plataforma de INFOCAM SAS y otros datos capturados automáticamente (como el tipo o versión del navegador o del sistema operativo, configuraciones, datos de conexión, información sobre algunas de las aplicaciones descargadas y parámetros).
                    Dirección IP de internet que utilizás al conectarte a nuestros servicios o al navegar nuestros sitios web. 
                    Cierta información sobre la actividad de los usuarios y visitantes dentro de nuestro sitio web y las apps. Como por ejemplo, la URL de la que provienen o a qué URL acceden seguidamente (estén o no en nuestro sitio web). También las páginas visitadas, las interacciones con dichas páginas, las búsquedas realizadas, las publicaciones, compras o ventas, calificaciones y réplicas ingresadas, reclamos realizados y recibidos, mensajes en los foros, entre otra información podrá ser almacenada y retenida.
                    Información que usted proporciona sobre su negocio (por ejemplo, citas, disponibilidad del personal y datos de contacto) y sus empleados (por ejemplo, cargos, información de nómina y horas trabajadas y otros datos de tarjetas de horario)..
                    Datos para gestión de reclamos y juicios (información para la elaboración de documentos, antecedentes y estrategias).
                    Información en su nombre sobre sus clientes como su proveedor de servicios cuando los clientes realizan transacciones con usted o de otra forma cuando usted nos lo solicita. A esta información la denominamos Datos de sus clientes. Recopilamos los Datos de sus clientes cuando interactúan con usted mediante su uso de los productos de INFOCAM SAS, por ejemplo, cuando realizan un pago en su establecimiento, programan una cita, o reciben una factura suya.
                    Información que recopilamos de otras fuentes:
                    Información recopilada para finalidades de prevención de fraude y cumplimiento de regímenes informativos (listas PEPs, OFAC, etc.).
                    Información crediticia, positiva y negativa, que obtenemos de bases o centrales de riesgo crediticio, empresas de telecomunicaciones y/o de fuentes de acceso público, de conformidad con la legislación aplicable.
                    Información sobre cualquier persona o empresa con la cual usted haya tenido, tenga actualmente, o pueda tener una relación financiera.
                    Datos que se utilizan para la validación de identidad, completar o corregir información, obtenidos de fuentes seguras y confiables, tales como organismos públicos, proveedores de servicios o aliados comerciales con los que trabajamos.

                    En algunos casos, esta información podría ser considerada sensible de acuerdo a la legislación aplicable. En estos casos, solicitamos tu consentimiento expreso para procesarlos.

                    4. ¿Qué hacemos con la información que nos proporcionas directamente?
                    Cuando realiza una solicitud para recibir información sobre INFOCAM SAS o nuestros productos, recopilamos información de identidad que usted nos proporciona directamente. Esta información la utilizamos para poder responderte, brindarte más información y cumplir con la debida diligencia previa a contratar.
                    También utilizamos tu información personal y financiera para realizar nuestro proceso de verificación de identidad que después va a servir para verificar tu cuenta una vez creada. Podemos compartir esta información con proveedores de verificación de identidad para esta finalidad. Todo esto hace al proceso de “KYC” por sus siglas en inglés que significan “conozca a su cliente”.
                    Utilizamos tus datos para enviarte encuestas y para recibir tus comentarios, reclamos o solicitudes. Esto lo hacemos para poder conocer tu experiencia como usuario y poder mejorar nuestra prestación de servicios y evaluar la efectividad con la que resolvemos tus problemas.

                    5. ¿Qué hacemos con la información que nos proporcionas directamente al registrarte o utilizar nuestros servicios?
                    Utilizamos tus datos para entregarte la información y respaldo que nos solicitás, incluida la entrega de avisos técnicos, alertas de seguridad y mensajes administrativos y de respaldo. También la utilizamos para resolver disputas, cobrar pagos o tasas y brindarte asistencia a problemas con nuestros servicios o tu cuenta.
                    Recopilamos tu información comercial de los dispositivos que utilizás cuando interactuás con nuestros sistemas. Esto nos permite proporcionarte los servicios que hayas solicitado, incluido el procesamiento de inventario, comercio electrónico, facturación y pagos. Esto también nos va a permitir llevar a cabo investigaciones internas, medir, seguir y analizar tendencias y usos.
                    Almacenamos tus datos profesionales o relacionados con el empleo en nuestras bases de datos. Esto nos permite ofrecerte aquellos servicios que necesiten este tipo de información para funcionar correctamente.

                    6. ¿Qué hacemos con la información que recopilamos de otras fuentes?
                    Recopilamos toda la información de verificación de antecedentes sobre vos de proveedores de verificación de antecedentes, de bases de datos públicas como el BCRA, AFIP, entre otros, y procesamos dicha información utilizando sistemas antifraude y de gestión de riesgos. Esto nos va a permitir verificar tu identidad, a realizar una verificación de crédito, prevenir el fraude y evaluar los riesgos. Esto no solo que cumple con las obligaciones legales vigentes, sino que además es una práctica internacionalmente aceptada.

                    7. ¿Cómo compartimos la información personal?
                    El resguardo de tu privacidad es muy importante para INFOCAM SAS. Por ello, no vendemos ni comercializamos información que te identifique. Tampoco compartimos o transferimos de ningún otro modo tu información personal a terceros, salvo de la manera indicada a continuación:
                    INFOCAM SAS podrá ceder, transmitir y/o transferir tu información personal a: 
                    "Prestadores de Servicios": los proveedores de servicios o empresas son terceros que contratamos para que actúen en nombre de INFOCAM SAS para que presten un servicio siguiendo nuestras instrucciones y de conformidad a lo establecido en esta Declaración de Privacidad, para contribuir a mejorar o facilitar las operaciones a través de nuestra plataforma, como: empresas de transporte, logística, mensajería y paquetería, para hacerte llegar los productos que adquiriste, medios de pago, intermediarios en la gestión de pagos o seguros, para obtener el pago por los servicios o productos contratados, así como brindarte protección respecto de los  productos adquiridos, proveedores de tecnología o posibles socios para almacenar información, proporcionar software o programas que nos ayuden a proporcionar los Servicios, proveedores de marketing o eventos que nos ayuden a llevar a cabo nuestras campañas publicitarias, concursos, ofertas especiales u otros eventos o actividades, análisis de datos, proveedores de verificación de identidad que nos ayuden con la prevención de fraudes y para asistirnos en cumplir con nuestro AML, "conozca a su cliente", verificación de antecedentes y otros requisitos de cumplimiento, instituciones financieras, redes de pagos, asociaciones de tarjetas de pago y oficinas de crédito que nos ayuden a proporcionar los servicios. Estos Proveedores de Servicios sólo acceden a la información estrictamente necesaria para prestar los servicios acordados y no pueden usarlos para finalidades distintas a las que les encomiende INFOCAM SAS. 
                    “Autoridades públicas”: las autoridades administrativas y judiciales que en ejercicio de su competencia requieran información, aunque no exista una orden ni una citación ejecutiva o judicial al efecto, con la finalidades de: (i) para cumplir con cualquier ley, reglamento, proceso legal o requerimiento gubernamental aplicable (por ejemplo, de acreedores, autoridades fiscales, fuerzas del orden público, en respuesta a un embargo, gravamen, o aviso de embargo, etc.); (ii) para establecer, ejercer o defender nuestros derechos legales; (iii) para hacer cumplir o cumplir con nuestros Términos generales u otros acuerdos o políticas aplicables; (iv) para proteger nuestros derechos o nuestra propiedad, o los de nuestros clientes, o la seguridad o integridad de nuestros Servicios; (v) para una investigación de una actividad ilegal presunta o real; o (vi) para protegernos, proteger a los usuarios de nuestros Servicios o al público de daños, fraudes o actividades potencialmente prohibidas o ilegales.
                    "Intervinientes en Disputas”: autoridades, amigables componedores, tribunales o entidades que intervengan en solución de disputas con la finalidad de resolver las controversias que se llegaran a suscitar entre usuarios o entre éstos y cualquiera de las empresas del grupo corporativo de INFOCAM SAS.
                    “Entidades públicas y/o privadas que prestan servicios de información crediticia”: INFOCAM SAS podrá, siempre que la legislación aplicable así lo permita, compartir con entidades públicas o privadas que brindan servicios de información o riesgo crediticio, información vinculada a tu comportamiento crediticio o al cumplimiento o incumplimiento de obligaciones de contenido patrimonial.
                    Si INFOCAM SAS decidiese compartir tu información personal con terceros distintos a los mencionados, solicitaremos tu consentimiento previo y expreso, siempre y cuando no exista una autorización u obligación legal que permita realizarlo sin ese consentimiento.
                    Asimismo, prestás tu consentimiento expreso e informado para que INFOCAM SAS ceda, transmita o transfiera tu información personal a los destinatarios detallados en esta Declaración de Privacidad.
                    Finalmente, INFOCAM SAS no será responsable por el uso indebido de tu información personal que haga cualquier tercero cuando sean estos terceros quienes directamente recolecten y/o traten tu información personal.
                     
                    8. ¿Por cuánto tiempo vamos a almacenar la información personal?
                    Solo almacenaremos la información personal durante el tiempo necesario para cumplir con el propósito para el que se ha recopilado, para cumplir con requisitos reglamentarios o legales, o durante el periodo de prescripción legal de posibles responsabilidades legales o contractuales. El período de tiempo que conservaremos su información será determinado, en general, por el tiempo que necesitemos esa información para proporcionarle nuestros Servicios, incluida cualquier función opcional que utilice y para brindar atención al cliente
                    En determinados casos, estamos obligados a conservar su información por razones legales, lo que puede incluir el período de tiempo después de que su cuenta haya sido desactivada. Conservaremos su información cuando sea necesaria para nosotros:
                    Una vez concluido el lapso, los datos serán eliminados o anonimizados de manera tal que no pueda ser individualizada ninguna persona, según lo permita la normativa de cada país.

                     
                    9. Seguridad
                    En INFOCAM SAS nos esforzamos mucho para mantener tus datos seguros. Si bien creemos que tenemos un sólido sistema de seguridad, nadie puede garantizar que los hackers no podrán ingresar a nuestros sitios o robar sus datos mientras estén almacenados o siendo enviados desde usted hacia nosotros o vice versa.
                    Tomamos medidas razonables, incluidas las medidas administrativas y salvaguardas físicas, para proteger su información de pérdidas, robos y usos incorrectos, así como accesos no autorizados, divulgación, modificación y destrucción. Sin embargo, la internet no es un ambiente 100% seguro y no podemos garantizar la seguridad absoluta de la transmisión o almacenamiento de su información. Mantenemos la información sobre usted tanto en nuestras instalaciones como con la asistencia de proveedores de servicios externos. Su información personal será accesible para nuestros empleados, contratistas y proveedores de servicios que requieran el acceso para los fines descritos en esta Declaración de privacidad.

                    10. Información Personal de Menores
                    Nuestros servicios están dirigidos principalmente a comerciantes, emprendedores y empresas, no así a menores de 18 años. Si nos enteramos de que la información que recopilamos fue proporcionada por un menor de 18 años, eliminaremos esa información de inmediato.

                    11. ¿Cómo podés ejercer tus derechos para controlar tu información personal?
                    La normativa aplicable te confiere ciertos derechos sobre tu información personal, los cuales podrás consultar según se especifica en el anexo de cada país, como, por ejemplo: (i) acceso; (ii) actualización; (iii) rectificación; (iv) el cese en el envío de publicidades, ofertas y promociones; (v) supresión; (vi) revocación del consentimiento; (vii) confidencialidad y (viii) revisión de decisiones automatizadas. 
                    Podrás hacer consultas y/o peticiones relativas a tu información personal desde Mis derechos de Privacidad o a través de los datos de contacto provistos en los anexos de cada país incluidos debajo.

                    12. Cambios en la Declaración de Privacidad
                    INFOCAM SAS realizará actualizaciones periódicas de la Declaración de Privacidad para reflejar los cambios constantes en los servicios que ofrecemos. Estas actualizaciones reflejarán de manera transparente la forma en que la información personal es tratada. Te notificaremos de estos cambios por nuestros canales habituales, como el correo electrónico o mensajes a través de las aplicaciones. En los casos que corresponda, recabaremos tu consentimiento.
                     
                    13. Ley Aplicable y Jurisdicción
                    La Declaración de Privacidad se regirá por las leyes de la República Argentina. Ante cualquier controversia o divergencia relacionada con la interpretación, validez, celebración o cumplimiento de la presente Declaración de Privacidad, se resolverá por los tribunales competentes indicados debajo.
                    ¿Quién es el responsable del tratamiento de la Información Personal?
                    En Argentina, los Servicios de INFOCAM SAS son prestados por la razón social INFOCAM SAS, CUIT 27-22587848-5, con domicilio en Fray Mamerto Esquiú 185, 5to A, ciudad de Córdoba, provincia de Córdoba, CP 5000, República Argentina. Dichos Servicios de INFOCAM SAS son ofrecidos a través de las Plataformas www.infocam.com.ar y www.mis-citas.infocam.com.ar. El responsable de la base de datos recolectados en la República Argentina es la razón social INFOCAM SAS, CUIT 27-22587848-5. 
                    ¿Cómo podés ejercer tus derechos para controlar tu Información Personal?
                    Sin perjuicio de lo indicado en esta Declaración de Privacidad, en cumplimiento de lo dispuesto por las disposiciones de la Ley N° 25.326, el Decreto Reglamentario N° 1558/2001 y las disposiciones y/o resoluciones vinculantes emitidas por la Agencia de Acceso a la Información Pública se comunica que: "el titular de los datos personales tiene la facultad de ejercer el derecho de acceso a los mismos en forma gratuita a intervalos no inferiores a seis meses, salvo que se acredite un interés legítimo al efecto conforme lo establecido en el artículo 14, inciso 3 de la Ley Nº 25.326. LA AGENCIA DE ACCESO A LA INFORMACIÓN PÚBLICA, en su carácter de Órgano de Control de la Ley N° 25.326, tiene la atribución de atender las denuncias y reclamos que interpongan quienes resulten afectados en sus derechos por incumplimiento de las normas vigentes en materia de protección de datos personales. El titular podrá en cualquier momento solicitar el retiro o bloqueo de su nombre de los bancos de datos a los que se refiere el presente artículo. En toda comunicación con fines de publicidad que se realice por correo, teléfono, correo electrónico, Internet u otro medio a distancia a conocer, se deberá indicar, en forma expresa y destacada, la posibilidad del titular del dato de solicitar el retiro o bloqueo, total o parcial, de su nombre de la base de datos. A pedido del interesado, se deberá informar el nombre del responsable o usuario del banco de datos que proveyó la información."
                    Sin perjuicio de lo dispuesto en la Declaración de Privacidad, también podrás realizar consultas y/o ejercer los derechos de acceso, rectificación y supresión de tu Información Personal por correo postal a Fray Mamerto Esquiú 185, 5to A, Ciudad de Córdoba, Córdoba, CP 5000. Atte.: INFOCAM SAS CUIT 27-22587848-5.
                    Ley Aplicable y Jurisdicción
                    Esta Declaración de Privacidad se regirá por las leyes de la República Argentina. Ante cualquier controversia o divergencia relacionada con la interpretación, validez, celebración o cumplimiento de las mismas, tú y INFOCAM SAS declaran que se someten a la jurisdicción exclusiva de los Tribunales con asiento en la Ciudad de Córdoba, renunciando expresamente a cualquier otro fuero y/o jurisdicción que pudiera corresponderles.
                  </textarea>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name="aceptar" class="custom-control-input" id="aceptar" type="checkbox" {{ old('aceptar') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="aceptar">
                    <span class="text-muted">Aceptar Política</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Confirmar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

