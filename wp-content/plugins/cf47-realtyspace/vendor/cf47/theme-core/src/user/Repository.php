<?php
namespace cf47\themecore\user;

class Repository
{
    public function find_current_or_throw()
    {
        $user = $this->find_current();
        if (!$user) {
            throw new \Exception('User not found');
        }

        return $user;
    }

    /**
     * @return \cf47\themecore\user\Entity|null
     */
    public function find_current()
    {
        $user = new \TimberUser(false);
        if ($user->id === null) {
            return null;
        }

        return new Entity($user);
    }

    /**
     * @return \cf47\themecore\user\Entity|null
     */
    public function find_one_by_id($id)
    {
        $id = (int)$id;
        $user = new \TimberUser($id);

        if ($user->id === null) {
            return null;
        }

        return new Entity($user);
    }
}
