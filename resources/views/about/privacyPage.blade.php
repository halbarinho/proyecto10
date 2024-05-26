@extends('layout.template-dashboard')

@section('title', 'Privacy')

@section('content')

    <div class="mr-4 overflow-auto ml-7 mt-14">


        <div
            class="grid xs:grid-cols-1 items-center p-8 mx-auto my-2 bg-white  rounded-md text-[#333] font-[sans-serif] justify-start max-w-4xl gap-20">

            <div class="flex flex-col items-center justify-start gap-5 flex-nowrap">
                <div class="">
                    <p class="px-4 py-2 font-bold text-white bg-yellowPersonal rounded-3xl">Política de Privacidad</p>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <div>
                        <h1 class="text-6xl">Introducción</h1>
                    </div>
                    <div class="flex flex-col items-center gap-3">
                        <p class="text-justify">Ewm Soluciones te informa sobre su Política de Privacidad
                            respecto del
                            tratamiento y protección
                            de los datos de carácter personal de los usuarios y clientes que puedan ser recabados por la
                            navegación o contratación de servicios a través del sitio Web DiketiveApp.</p>
                        <p class="text-justify">
                            En este sentido, el Titular garantiza el cumplimiento de la normativa vigente en materia de
                            protección de datos personales, reflejada en la Ley Orgánica 3/2018, de 5 de diciembre, de
                            Protección de Datos Personales y de Garantía de Derechos Digitales (LOPD GDD). Cumple
                            también
                            con el Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo de 27 de abril de 2016
                            relativo a la protección de las personas físicas (RGPD).</p>
                        <p class="text-justify">
                            El uso de sitio Web implica la aceptación de esta Política de Privacidad así como las
                            condiciones incluidas en el Aviso Legal.
                        </p>
                    </div>
                </div>
            </div>


            <div class="flex flex-col items-start justify-start gap-5 flex-nowrap">
                <div>
                    <p class="font-bold uppercase">Actualizado el 20-05-2024</p>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Identidad del responsable</h3>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Titular: EWM Soluciones</li>
                        <li class="text-justify">NIF/CIF: 123456789X</li>
                        <li class="text-justify">Domicilio: 50050</li>
                        <li class="text-justify">Correo electrónico: correo@ejemplo.com</li>
                        <li class="text-justify">Sitio Web: www.ewmsoluciones.es</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Principios aplicados en el tratamiento de datos
                    </h3>

                    <p class="text-justify">En el tratamiento de tus datos personales, el Titular aplicará los
                        siguientes
                        principios que se
                        ajustan a las exigencias del nuevo reglamento europeo de protección de datos:</p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify"><strong>Principio de licitud, lealtad y transparencia:</strong> El
                            Titular
                            siempre requerirá el
                            consentimiento
                            para el tratamiento de tus datos personales que puede ser para uno o varios fines
                            específicos
                            sobre los que te informará previamente con absoluta transparencia.</li>
                        <li class="text-justify"><strong>Principio de minimización de datos:</strong> El Titular te
                            solicitará solo los datos
                            estrictamente
                            necesarios para el fin o los fines que los solicita.</li>
                        <li class="text-justify"><strong>Principio de limitación del plazo de conservación:</strong> Los
                            datos se mantendrán
                            durante
                            el tiempo
                            estrictamente necesario para el fin o los fines del tratamiento.
                            El Titular te informará del plazo de conservación correspondiente según la finalidad. En el
                            caso
                            de suscripciones, el Titular revisará periódicamente las listas y eliminará aquellos
                            registros
                            inactivos durante un tiempo considerable.
                        </li>
                        <li class="text-justify"><strong>Principio de integridad y confidencialidad:</strong> Tus datos
                            serán tratados de tal
                            manera
                            que su
                            seguridad, confidencialidad e integridad esté garantizada. Debes saber que el Titular toma
                            las
                            precauciones necesarias para evitar el acceso no autorizado o uso indebido de los datos de
                            sus
                            usuarios por parte de terceros.</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Obtención de datos personales</h3>


                    <p class="text-justify">Para navegar por DiketiveApp no es necesario que facilites ningún dato
                        personal.
                        Los casos en los que
                        sí proporcionas tus datos personales son los siguientes:</p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Al contactar a través de los formularios de contacto o enviar un correo
                            electrónico.</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Tus derechos</h3>

                    <p class="text-justify">El Titular te informa que sobre tus datos personales tienes derecho a:</p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Solicitar el acceso a los datos almacenados.</li>
                        <li class="text-justify">Solicitar una rectificación o la cancelación.</li>
                        <li class="text-justify">Solicitar la limitación de su tratamiento.</li>
                        <li class="text-justify">Oponerte al tratamiento.</li>
                        <li class="text-justify">Solicitar la portabilidad de tus datos.</li>
                    </ul>

                    <p class="text-justify">El ejercicio de estos derechos es personal y por tanto debe ser ejercido
                        directamente por el
                        interesado, solicitándolo directamente al Titular, lo que significa que cualquier cliente,
                        suscriptor o colaborador que haya facilitado sus datos en algún momento puede dirigirse al
                        Titular y
                        pedir información sobre los datos que tiene almacenados y cómo los ha obtenido, solicitar la
                        rectificación de los mismos, solicitar la portabilidad de sus datos personales, oponerse al
                        tratamiento, limitar su uso o solicitar la cancelación de esos datos en los ficheros del
                        Titular.
                    </p>

                    <p class="text-justify">Para ejercitar tus derechos de acceso, rectificación, cancelación,
                        portabilidad
                        y oposición tienes
                        que enviar un correo electrónico a ewmsoluciones@correo.com junto con la prueba válida en
                        derecho
                        como una fotocopia del D.N.I. o equivalente.</p>
                    <p class="text-justify" class="text-justify">
                        Tienes derecho a la tutela judicial efectiva y a presentar una reclamación ante la autoridad de
                        control, en este caso, la Agencia Española de Protección de Datos, si consideras que el
                        tratamiento
                        de datos personales que te conciernen infringe el Reglamento.
                    </p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Finalidad del tratamiento de datos personales</h3>
                    <p class="text-justify">Cuando te conectas al sitio Web para mandar un correo al Titular, te
                        suscribes a
                        su boletín o
                        realizas una contratación, estás facilitando información de carácter personal de la que el
                        responsable es el Titular. Esta información puede incluir datos de carácter personal como pueden
                        ser
                        tu dirección IP, nombre y apellidos, dirección física, dirección de correo electrónico, número
                        de
                        teléfono, y otra información. Al facilitar esta información, das tu consentimiento para que tu
                        información sea recopilada, utilizada, gestionada y almacenada por superadmin.es , sólo como se
                        describe en el Aviso Legal y en la presente Política de Privacidad.</p>

                    <p class="text-justify">Los datos personales y la finalidad del tratamiento por parte del Titular es
                        diferente según el
                        sistema de captura de información:</p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify"><strong>Formularios de contacto:</strong> El Titular solicita datos
                            personales entre los que
                            pueden
                            estar: Nombre y apellidos, dirección de correo electrónico, número de teléfono y dirección
                            de tu
                            sitio Web con la finalidad de responder a tus consultas.
                            <p class="text-justify">Por ejemplo, el Titular utiliza esos datos para dar respuesta a tus
                                mensajes, dudas, quejas,
                                comentarios o inquietudes que puedas tener relativas a la información incluida en el
                                sitio
                                Web, los servicios que se prestan a través del sitio Web, el tratamiento de tus datos
                                personales, cuestiones referentes a los textos legales incluidos en el sitio Web, así
                                como
                                cualquier otra consulta que puedas tener y que no esté sujeta a las condiciones del
                                sitio
                                Web o de la contratación.
                            </p>
                        </li>
                    </ul>

                    <p class="text-justify">Existen otras finalidades por las que el Titular trata tus datos personales:
                    </p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Para garantizar el cumplimiento de las condiciones recogidas en el
                            Aviso
                            Legal y en la ley
                            aplicable. Esto puede incluir el desarrollo de herramientas y algoritmos que ayuden a este
                            sitio
                            Web a garantizar la confidencialidad de los datos personales que recoge.</li>
                        <li class="text-justify">Para apoyar y mejorar los servicios que ofrece este sitio Web.</li>
                        <li class="text-justify">Para analizar la navegación. El Titular recoge otros datos no
                            identificativos que se obtienen
                            mediante el uso de cookies que se descargan en tu ordenador cuando navegas por el sitio Web
                            cuyas caracterísiticas y finalidad están detalladas en la Política de Cookies .</li>
                        <li class="text-justify">Para gestionar las redes sociales. el Titular tiene presencia en redes
                            sociales. Si te haces
                            seguidor en las redes sociales del Titular el tratamiento de los datos personales se regirá
                            por
                            este apartado, así como por aquellas condiciones de uso, políticas de privacidad y
                            normativas de
                            acceso que pertenezcan a la red social que proceda en cada caso y que has aceptado
                            previamente.
                        </li>
                    </ul>

                    <p>Puedes consultar las políticas de privacidad de las principales redes sociales en estos enlaces:
                    </p>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Facebook</li>
                        <li class="text-justify">X</li>
                        <li class="text-justify">Linkedin</li>
                        <li class="text-justify">Instagram</li>
                        <li class="text-justify">YouTube</li>
                    </ul>

                    <p class="text-justify">El Titular tratará tus datos personales con la finalidad de administrar
                        correctamente su presencia en
                        la red social, informarte de sus actividades, productos o servicios, así como para cualquier
                        otra
                        finalidad que las normativas de las redes sociales permitan.</p>

                    <p class="text-justify">En ningún caso el Titular utilizará los perfiles de seguidores en redes
                        sociales
                        para enviar
                        publicidad de manera individual.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Seguridad de los datos personales</h3>

                    <p class="text-justify">Para proteger tus datos personales, el Titular toma todas las precauciones
                        razonables y sigue las
                        mejores prácticas de la industria para evitar su pérdida, mal uso, acceso indebido, divulgación,
                        alteración o destrucción de los mismos.</p>
                    <p class="text-justify">El sitio Web está alojado en ‘proveedorEjemplo’. La seguridad de tus datos
                        está
                        garantizada, ya que
                        toman todas las medidas de seguridad necesarias para ello. Puedes consultar su política de
                        privacidad para tener más información.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Contenido de otros sitios web</h3>

                    <p class="text-justify">Las páginas de este sitio Web pueden incluir contenido incrustado (por
                        ejemplo,
                        vídeos, imágenes,
                        artículos, etc.). El contenido incrustado de otras web se comporta exactamente de la misma
                        manera
                        que si hubieras visitado la otra web.</p>
                    <p class="text-justify">Estos sitios Web pueden recopilar datos sobre ti, utilizar cookies,
                        incrustar un
                        código de
                        seguimiento adicional de terceros, y supervisar tu interacción usando este código.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Política de Cookies</h3>

                    <p class="text-justify">Para que este sitio Web funcione correctamente necesita utilizar cookies,
                        que es
                        una información que
                        se almacena en tu navegador web.</p>
                    <p class="text-justify">En la página Política de Cookies puedes consultar toda la información
                        relativa a
                        la política de
                        recogida, la finalidad y el tratamiento de las cookies.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Legitimación para el tratamiento de datos</h3>

                    <p class="text-justify">La base legal para el tratamiento de tus datos es: el consentimiento.</p>
                    <p class="text-justify">Para contactar con el Titular, suscribirte a un boletín o realizar
                        comentarios
                        en este sitio Web
                        tienes que aceptar la presente Política de Privacidad.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Categorías de datos personales</h3>

                    <p class="text-justify">Las categorías de datos personales que trata el Titular son:</p>
                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Datos identificativos.</li>
                    </ul>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Conservación de datos personales</h3>

                    <p class="text-justify">Los datos personales que proporciones al Titular se conservarán hasta que
                        solicites su supresión.</p>

                    <h3 class="space-y-4 text-xl font-bold uppercase">Destinatarios de datos personales</h3>

                    <ul class="space-y-3 list-disc">
                        <li class="text-justify"><strong>Google Analytics</strong> es un servicio de analítica web
                            prestado
                            por Google, Inc., una
                            compañía de
                            Delaware cuya oficina principal está en 1600 Amphitheatre Parkway, Mountain View
                            (California),
                            CA 94043, Estados Unidos (“Google”). Encontrarás más información en:
                            https://analytics.google.com<p>Google Analytics utiliza “cookies”, que son archivos de texto
                                ubicados en tu ordenador, para ayudar al Titular a analizar el uso que hacen los
                                usuarios
                                del sitio Web. La información que genera la cookie acerca del uso del sitio Web
                                (incluyendo
                                tu dirección IP) será directamente transmitida y archivada por Google en los servidores
                                de
                                Estados Unidos.</p>
                        </li>
                        <li class="text-justify"><strong>DoubleClick by Google </strong>es un conjunto de servicios
                            publicitarios proporcionado
                            por
                            Google, Inc., una compañía de Delaware cuya oficina principal está en 1600 Amphitheatre
                            Parkway,
                            Mountain View (California), CA 94043, Estados Unidos (“Google”).
                            Encontrarás más información en: https://www.doubleclickbygoogle.com
                            DoubleClick utiliza “cookies”, que son archivos de texto ubicados en tu ordenador y que
                            sirven
                            para aumentar la relevancia de los anuncios relacionados con tus búsquedas recientes. En la
                            Política de privacidad de Google se explica cómo Google gestiona tu privacidad en lo que
                            respecta al uso de las cookies y otra información.
                        </li>
                    </ul>

                    <p class="text-justify">También puedes ver una lista de los tipos de cookies que utiliza Google y
                        sus
                        colaboradores y toda la
                        información relativa al uso que hacen de cookies publicitarias.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Navegación Web</h3>

                    <p class="text-justify">Al navegar por DiketiveApp se pueden recoger datos no identificativos, que
                        pueden incluir, la
                        dirección IP, geolocalización, un registro de cómo se utilizan los servicios y sitios, hábitos
                        de
                        navegación y otros datos que no pueden ser utilizados para identificarte.</p>
                    <p class="text-justify">El sitio Web utiliza los siguientes servicios de análisis de terceros:</p>
                    <ul class="space-y-3 list-disc">
                        <li class="text-justify">Google Analytics</li>
                        <li class="text-justify">DoubleClick por Google</li>
                    </ul>
                    <p class="text-justify">El Titular utiliza la información obtenida para obtener datos estadísticos,
                        analizar tendencias,
                        administrar el sitio, estudiar patrones de navegación y para recopilar información demográfica.
                    </p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Exactitud y veracidad de los datos personales
                    </h3>
                    <p class="text-justify">Te comprometes a que los datos facilitados al Titular sean correctos,
                        completos,
                        exactos y vigentes,
                        así como a mantenerlos debidamente actualizados.</p>
                    <p class="text-justify">Como Usuario del sitio Web eres el único responsable de la veracidad y
                        corrección de los datos que
                        remitas al sitio exonerando a el Titular de cualquier responsabilidad al respecto.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Aceptación y consentimiento</h3>

                    <p class="text-justify">Como Usuario del sitio Web declaras haber sido informado de las condiciones
                        sobre protección de datos
                        de carácter personal, aceptas y consientes el tratamiento de los mismos por parte de el Titular
                        en
                        la forma y para las finalidades indicadas en esta Política de Privacidad.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Revocabilidad</h3>

                    <p class="text-justify">Para ejercitar tus derechos de acceso, rectificación, cancelación,
                        portabilidad
                        y oposición tienes
                        que enviar un correo electrónico a ewmsoluciones@correo.com junto con la prueba válida en
                        derecho
                        como una fotocopia del D.N.I. o equivalente.</p>
                    <p class="text-justify">El ejercicio de tus derechos no incluye ningún dato que el Titular esté
                        obligado
                        a conservar con
                        fines administrativos, legales o de seguridad.</p>
                </div>
                <div class="flex flex-col gap-3">
                    <h3 class="space-y-4 text-xl font-bold uppercase">Cambios en la Política de Privacidad</h3>

                    <p class="text-justify">El Titular se reserva el derecho a modificar la presente Política de
                        Privacidad
                        para adaptarla a
                        novedades legislativas o jurisprudenciales, así como a prácticas de la industria.</p>
                    <p class="text-justify">Estas políticas estarán vigentes hasta que sean modificadas por otras
                        debidamente publicadas.</p>

                </div>

            </div>
        </div>

    </div>

@endsection
