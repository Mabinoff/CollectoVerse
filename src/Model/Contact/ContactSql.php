<?php

namespace App\Model\Contact;

readonly class ContactSql
{
    public int $id_contact;
    public int $id_user;
    public string $title_contact;
    public string $email_contact;
    public string $content_contact;
    public bool $is_admin_seen;
    public \DateTime $created_at;

    public function __construct(array $data)
    {
        $this->id_contact = (int) $data['id_contact'];
        $this->id_user = (int) $data['id_user'];
        $this->title_contact = $data['title_contact'];
        $this->email_contact = $data['email_contact'];
        $this->content_contact = $data['content_contact'];
        $this->is_admin_seen = (bool) $data['is_admin_seen'];
        $this->created_at = new \DateTime($data['created_at']);
    }
}

?>