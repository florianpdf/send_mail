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
        $students = array(
            "Tours - Angular" => [
                "Loubna-Bouam_student2018@wilder.school" => "bouamloubna5@gmail.com",
                "Mustapha-Loda_student2018@wilder.school" => "loda29@gmail.com",
                "Jonathan-Begot_student2018@wilder.school" => "jonat.begot@laposte.net",
                "Benoit-Cordier_student2018@wilder.school" => "benoitcordier@live.co.uk",
                "Johann-Teyssandier_student2018@wilder.school" => "ordi_com@hotmail.fr",
                "Emilie-Huet_student2018@wilder.school" => "hemilie94@gmail.com",
                "Victor-Marie_student2018@wilder.school" => "victor.s.marie@gmail.com",
                "Killian-Rhelimi_student2018@wilder.school" => "kiloups@gmail.com",
                "Philippe-Roche-Oroval_student2018@wilder.school" => "aphilthedoc@gmail.com",
                "Valentin-Berruer_student2018@wilder.school" => "valb37@icloud.com",
                "Pierre-Hugo-Meillot_student2018@wilder.school" => "ph.meillot@gmail.com",
                "Yuniss-Kordjee_student2018@wilder.school" => "yuniss.kordjee@live.fr",
                "Alexandre-Gauthier_student2018@wilder.school" => "alex.gauthier41@gmail.com"
            ], "Nantes - React" => [
                "Emilie-Le-Bihan_student2018@wilder.school" => "lebihan.emilie@yahoo.fr",
                "Olivier-Bretaud_student2018@wilder.school" => "olivierbretaud@hotmail.fr",
                "Tiphaine-Deswarte_student2018@wilder.school" => "tiphaine.deswarte@live.fr",
                "Antoine-Nourris_student2018@wilder.school" => "nourrisantoine44@gmail.com",
                "Matthieu-Petit_student2018@wilder.school" => "matthieuwpetit@gmail.com",
                "Marion-Touja_student2018@wilder.school" => "marion.touja@gmail.com",
                "Geoffroy-Lauger_student2018@wilder.school" => "lauger.geoffroy@gmail.com",
                "Maeva-Duran_student2018@wilder.school" => "maeva.v.duran@gmail.com"
            ], "Bruxelles - React" => [
                "Thomas-Lambert_student2018@wilder.school" => "lambertthomas10@gmail.com",
                "Arthur-Thill_student2018@wilder.school" => "arthur.thill17.at@gmail.com",
                "Olivier-Sohy_student2018@wilder.school" => "gorgobox@gmail.com",
                "Hanaa-Oulad_student2018@wilder.school" => "ouladch@gmail.com",
                "Anja-Razafitrimo_student2018@wilder.school" => "arazafitrimo@gmail.com",
                "Joachim-Bertrand_student2018@wilder.school" => "j.bertrand0032@gmail.com",
                "Cristina-Gonzalez_student2018@wilder.school" => "cgonzalezescallon@gmail.com",
                "Audrey-Mertens-De-Wilmars_student2018@wilder.school" => "audrey.mertens92@gmail.com",
                "Carolina-Tirado_student2018@wilder.school" => "carolinatirado92@gmail.com",
                "Ayoub-Ochan_student2018@wilder.school" => "ayoub.ochan13@gmail.com",
                "Celestine-Bonaert_student2018@wilder.school" => "celestine.bonaert@gmail.com",
                "Audrey-Masamba_student2018@wilder.school" => "masambaaudrey1@gmail.com",
                "Felix-Bonaert_student2018@wilder.school" => "bonaert.felix@gmail.com",
                "Cyril-Pradal_student2018@wilder.school" => "pradal.cyril@gmail.com"
//            ], "last" => [
//                "Florian_Grandjean@wilder.school" => "florian.pdf@gmail.com"
            ]
        );

        foreach ($students as $crew){
            foreach ($crew as $mailWilder => $currentEmail){
                $message = (new \Swift_Message('Ton adresse email Wild'))
                    ->setFrom([$this->getParameter('mailer_user') => 'Florian - Wild Code School'])
                    ->setTo($currentEmail)
                    ->setBody(
                        $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                            'email.htlm.twig',
                            array('mailWilder' => $mailWilder, 'current' => $currentEmail)
                        ),
                        'text/html'
                    )

                ;

                $mailer->send($message);
                sleep(2);
            }
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
}
