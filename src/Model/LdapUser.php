<?php
declare(strict_types=1);

namespace magicmaster05111\Yii2LdapAuth\Model;

use magicmaster05111\Yii2LdapAuth\Exception\Yii2LdapAuthException;
use magicmaster05111\Yii2LdapAuth\LdapManager;
use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

/**
 * LDAP user model.
 *
 * @package stmswitcher\Yii2LdapAuth\Model
 * @author Denis Alexandrov <stm.switcher@gmail.com>
 * @date 30.06.2020
 */
class LdapUser extends BaseObject implements IdentityInterface
{
    /**
     * @var string LDAP UID of a user.
     */
    private $id;

    /**
     * @var string Display name of a user.
     */
    private $username;

    /**
     * @var string Email of a user.
     */
    private $email;

    /**
     * @var string distinguished name of the user within LDAP.
     */
    private $dn;

    /**
     * @var string[] list of groups of a user.
     */
    private $groups;


    private $employeetype;

    private $employeeid;

    /**
     * LdapUser constructor.
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        parent::__construct($config);
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDn(): string
    {
        return $this->dn;
    }

    public function getEmployeeid(): string
    {
        return $this->employeeid;
    }

    /**
     * @param string $dn
     */
    public function setDn(string $dn): void
    {
        $this->dn = $dn;
    }

    /**
     * @return string[]
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @param string[] $groups
     */
    public function setGroups(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @return string
     */
    public function getEmployeetype(): string
    {
        return $this->employeetype;
    }

    /**
     * @param string $employeetype
     *
     */
    public function setEmployeetype(string $employeetype): void
    {
        $this->employeetype = $employeetype;
    }

    public function setEmployeeid(string $employeeid): void
    {
        $this->employeeid = $employeeid;
    }

    /**
     * @param int|string $uid
     *
     * @return IdentityInterface|null
     */
    public static function findIdentity($uid)
    {
        $user = Yii::$app->ldapAuth->searchUid($uid);

        if (!$user) {
            return null;
        }


        $groups = [];

        $employeetype = $user['employeetype'][0];
        //Aufspalten der DN
        $ou = explode("=", explode(",", $user['dn'])[1])[1];
        switch (true) {
            case $ou == "Teachers" && $employeetype == "teacher":
                $groups[] = $ou;
                break;
            case $ou == "Students" && $employeetype == "student":
                $groups[] = $ou;
                break;
        }
        $groupItems = $user['memberof'] ?? [];
        foreach ($groupItems as $k => $groupItem) {
            if (is_integer($k) && preg_match('/CN\\=([^,]+)\\,/', $groupItem, $m)) {
                $groups[] = $m[1];
            }
        }


        return new static([
            'Id' => $user['userprincipalname'][0],
            'Username' => $user['displayname'][0],
            'Email' => $user['mail'][0],
            'Dn' => $user['dn'],
            'Groups' => $groups,
            'employeetype' => $employeetype,
            'employeeid' => $user['employeeid'][0],
        ]);
    }

    /**
     * {@inheritDoc}
     * @throws Yii2LdapAuthException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new Yii2LdapAuthException('Access token are not supported');
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthKey()
    {
        return hash('sha256', $this->id);
    }

    /**
     * {@inheritDoc}
     */
    public function validateAuthKey($authKey)
    {
        return $authKey === hash('sha256', $this->id);
    }
}
