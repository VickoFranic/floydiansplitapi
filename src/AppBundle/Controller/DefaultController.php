<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("api/contact_us_email")
     * @Method("POST")
     * @param  Request $request
     * @return bool
     */
    public function sendContactUsEmailAction(Request $request)
    {
        $data = json_decode($request->getContent());

        $message = \Swift_Message::newInstance()
            ->setSubject('Floydian Split: Contact Us Form')
            ->setFrom(isset($data->from) ? $data->from : 'no@mail.dev')
            ->setTo('info@floydiansplit.com')
            ->setBody(isset($data->message) ? $data->message : 'No message', 'text/html');

        try {
            $this->get('mailer')->send($message);
            $spool = $this->get('mailer')->getTransport()->getSpool();
            $transport = $this->get('swiftmailer.transport.real');
            $spool->flushQueue($transport);
        } catch (\Exception $e) {
            return new JsonResponse(false, 500);
        }
        return new JsonResponse(true);
    }
}
