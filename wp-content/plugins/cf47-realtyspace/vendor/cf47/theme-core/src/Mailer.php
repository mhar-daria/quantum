<?php
namespace cf47\themecore;

use Timber;

class Mailer
{

    public function send_contact_message($email, $message)
    {
        return $this->send_to_admin(
            'Message from ' . $email,
            Timber::compile('modules/contact/plain-email.twig',
                [
                    'sitename' => get_bloginfo('name'),
                    'email' => $email,
                    'message' => $message
                ]),
            [
                'Reply-To' => "Reply-To: " . $email
            ]
        );
    }

    public function send_to_admin($subject, $message, $headers = '', $attachements = [])
    {
        return $this->send(get_option('admin_email'), $subject, $message, $headers, $attachements);
    }

    public function send($email, $subject, $message, $headers = '', $attachements = [])
    {
        return wp_mail($email, $subject, $message, $attachements);
    }

    public function html_email()
    {
        $context = Timber::get_context();
        Timber::render('emails/html-email.twig', $context);
    }
}
