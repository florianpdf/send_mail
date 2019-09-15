<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request, \Swift_Mailer $mailer)
    {
        $students = [
            ["Abderaouf_Sahraoui_student2019@wilder.school","sahraoui.abderaouf@gmail.com"],
            ["Yassine_Skiba_student2019@wilder.school","yassine.skiba@gmail.com"],
            ["Marie-Helene_Delteil_student2019@wilder.school","mariehelene.delteil@gmail.com"],
            ["Genia-Adrada_Rajzner_student2019@wilder.school","geniaadrada76@gmail.com"],
            ["Marilou_Prevoteau_student2019@wilder.school","marilou.prevoteau@gmail.com"],
            ["Sandrine_Arene_student2019@wilder.school","sandrajoe86@yahoo.fr"],
            ["Vanouna_Grava_student2019@wilder.school","grava.vanouna@gmail.com"],
            ["Jorys_Bensch_student2019@wilder.school","jorys.bensch@gmail.com"],
            ["Julien_Armentia_student2019@wilder.school","julien.armentia@laposte.net"],
            ["Edwin_Beledu_student2019@wilder.school","beleduedwin@yahoo.fr"],
            ["Laetitia_Bourgois_student2019@wilder.school","bourgois.laetitia@gmail.com"],
            ["Eddy_Lafond_student2019@wilder.school","eddy.lafond@gmail.com"],
            ["Veronique_Pichon_student2019@wilder.school","vero33.pichon@free.fr"],
            ["Valerian_Michelot_student2019@wilder.school","valerianpro@hotmail.com"],
            ["Yannis_Babin_student2019@wilder.school","yannis@athanyl.net"],
            ["Benjamin_Camino_student2019@wilder.school","camino.benjamin@gmail.com"],
            ["Valentin_Cluzan_student2019@wilder.school","valentin.cluzan33@gmail.com"],
            ["Alexandra_Hilary_student2019@wilder.school","punkydesbois@gmail.com"],
            ["Clement_Lecomte_student2019@wilder.school","lecomte.cle@gmail.com"],
            ["Jean-Christophe_Fauquenot_student2019@wilder.school","jcfauquenot@gmail.com"],
            ["Frederic_Ribot_student2019@wilder.school","frederic.ribot.pro@gmail.com"],
            ["Sandy_Carrere_student2019@wilder.school","sandycarrere@gmail.com"],
            ["Clement_Lopez_student2019@wilder.school","lopez.clmnt@gmail.com"],
            ["Jerome_Colin_student2019@wilder.school","jerome.colin64100@gmail.com"],
            ["Valerie_Burguet_student2019@wilder.school","valerie.burguet@gmail.com"],
            ["Quentin_Da-Silva_student2019@wilder.school","dasilva.quentin33@gmail.com"],
            ["Gaetan_Pennanech_student2019@wilder.school","pennanech.gaetan@gmail.com"],
            ["Arthur_Lagadec_student2019@wilder.school","arthurlagadec64@gmail.com"]
        ];

        foreach ($students as $student){

            $message = (new \Swift_Message('Your Wild adress'))
                ->setFrom([$this->getParameter('mailer_user') => 'Florian Grandjean'])
                ->setTo($student[1])
                ->setBody(
                    $this->renderView(
                    // app/Resources/views/Emails/registration.html.twig
                        'email.htlm.twig',
                        array('mailWilder' => $student[0], 'current' => $student[1])
                    ),
                    'text/html'
                )

            ;

            $mailer->send($message);
            sleep(2);

            echo $student[0] . ' ' . $student[1] . "<br>";
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
}
